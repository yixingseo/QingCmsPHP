<?php 

class MyConfig{

	public $table = "t_config";
	public $data = array();

	/**
	 * 析构函数
	 */
	function __construct(){
		$model["id"] = 0;
		$model["name"] = '';
		$model['value'] = '';
	}

	/**
	 * 读取
	 */
	function read(){
		global $DB;
		$rs = $DB->fetchAll("SELECT * FROM `$this->table` ORDER BY ID");
		foreach ($rs as $key => $row) {
			$this->data[$row['name']] = $row['value'];
		}

	}

	/**
	 * 读取
	 * 名称
	 */
	function readerByName($name){
		if(!$name)
			return;
		global $DB;
		$rs = $DB->fetchRow("SELECT `name` FROM `$this->table` WHERE `name`=?",array($name));
		return $rs('name');
	}

	/**
	 * 添加
	 */
	function insert(){

	}

	/**
	 * 修改
	 */
	function update(){
		if(!$_POST)
			return;
		var_dump($_POST);
		global $DB;

		foreach ($_POST as $key => $value) {
			echo "UPDATE `$this->table` SET value=$value WHERE `name`=$key <br>";
			echo $DB->update("UPDATE `$this->table` SET value=:value WHERE name=:name",array(':value'=>$value,':name'=>$key));	
			echo "<br>"		;
			//echo "$key=>$value";
		}
	}

	/**
	 * 删除
	 */
	function delete(){

	}

}


 ?>