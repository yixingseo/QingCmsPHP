<?php
class DB extends PDO {

    public function __construct($host, $username, $password, $database, $port = '3306', $charset = 'UTF8') {
        $driverOptions = array (
                //PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        if ($host) {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=' . $charset . ';port=' . $port . '';
        } else {
            $dsn = 'odbc:driver={microsoft access driver (*.mdb)};dbq=' . realpath ( $database ) . ';PWD=' . $password;
        }
        try {
            return parent::__construct ( $dsn, $username, $password, $driverOptions );
        } catch ( PDOException $e ) {
            echo $e->getMessage ();
        }
    }

    public function fetchAll($query, $parameters = array(), $type = PDO::FETCH_ASSOC) {
        $rs = $this->prepareAndExecute ( $query, $parameters );
        $rows = $rs->fetchAll ( $type );
        $rs->closeCursor ();
        unset ( $rs );
        return $rows;
    }

    public function fetchRow($query, $parameters = array(), $type = PDO::FETCH_ASSOC) {
        $rs = $this->prepareAndExecute ( $query, $parameters );
        $row = $rs->fetch ( $type );
        $rs->closeCursor ();
        unset ( $rs );
        return $row;
    }

    public function fetchValue($query, $parameters = array()) {
        return $this->fetchRowValue ( $query, $parameters, 0 );
    }

    public function fetchRowValue($query, $parameters = array(), $column = 0) {
        $rs = $this->prepareAndExecute ( $query, $parameters );

        $row = $rs->fetchColumn ( $column );
        $rs->closeCursor();

        unset ( $rs );
        return $row;
    }

    public function update($query, $parameters) {
        $rs = $this->prepareAndExecute ( $query, $parameters );
        return $rs->rowCount();
    }

    public function insert($query, $parameters = array()) {
        $rs = $this->prepareAndExecute ( $query, $parameters );
        return $this->lastInsertId();
    }

    public function prepareAndExecute($query, $parameters = array()) {
        $rs = $this->prepare ( $query );
        $rs->execute ( $parameters );
        return $rs;
    }
}

/*
$Mysql = new DB ( 'localhost', 'root', '', 'test' );
$result = $Mysql->fetchAll("select * from sort");
foreach ($result as $key => $value) {
  echo $value["name"]."<br />";
}*/

//var_dump ( $Mysql->getAttribute ( PDO::ATTR_DRIVER_NAME ) );


//$Access = new DB ( false, false, '', 'e9data.mdb' );
//$result = $Access->fetchAll("select * from t_news");
//foreach ($result as $key => $value) {
//  echo $value["title"]."<br />";
//}


//var_dump ( $Access->getAttribute ( PDO::ATTR_DRIVER_NAME ) );
