<?php

class MyNews
{
	public $model;
	public $table = 't_news';

	/**
	 * 析构函数
	 */
	function __construct(){
		$this->model["guid"] = guid();
		$this->model["id"] = 0;
		$this->model["weight"] = 99;
		$this->model["pid"] = 0;
		$this->model["title"] = '';
		$this->model["seotitle"] = '';
		$this->model["keywords"] = '';
		$this->model["description"] = '';
		$this->model["urlname"] = '';
		$this->model["info"] = '';
		$this->model["pic"] = '';
		$this->model["content"] = '';
		$this->model["insert_date"] = '';
		$this->model["insert_user"] = '';
	}

	/**
	 * 内容列表		 	
	 */
	function getList($sqlWhere='',$order='weight desc,id desc'){
		$sql = "SELECT * FROM `$this->table` where show > -1 ";
		$order = " order by ".$order;
		$sql = $sqlWhere!='' ? $sql ."and " .$sqlWhere .$order : $sql .$order;
		//var_dump($sql);
		$DB->prepare($sql);
	}

	/**
	 * 读取
	 */
	function read($id=0){
		if($id==0)
			return false;
		global $DB;
		$this->model = $DB->fetchRow("SELECT * FROM ". $this->table ." WHERE id = ?",array($id));
		if($this->model["id"] > 0)
			return true;
	}

	/**
	 * 更新
	 */
	function update(){
		if(!$_POST)
			return 0;		
		$sql = "UPDATE `$this->table` SET pid=:pid,title=:title,seotitle=:seotitle,keywords=:keywords,description=:description,content=:content,url=:url,pic=:pic,
		urlname=:urlname,weight=:weight,info=:info where id=:id";
		$parameters = array(
			":pid"=>$_POST["pid"],
			":title"=>$_POST["title"],
			":seotitle"=>$_POST["seotitle"],
			":keywords"=>$_POST["keywords"],
			":description"=>$_POST["description"],
			":content"=>$_POST["content"],
			":url"=>'',
			":pic"=>$_POST["pic"],
			":urlname"=>$_POST["urlname"],
			":weight"=>$_POST["weight"],
			":info"=>$_POST["info"],
			":id"=>$_POST["id"]
		);
		global $DB;
		return $DB->update($sql,$parameters);
	}

	/**
	 * 添加
	 * guid=uuid
	 */
	function insert(){
		if(!$_POST)
			return 0;		
		$sql = "INSERT INTO `$this->table`(pid,title,seotitle,keywords,description,content,pic,insert_date,urlname,guid,hits,weight,info)
		VALUES(:pid,:title,:seotitle,:keywords,:description,:content,:pic,:insert_date,:urlname,:guid,0,:weight,:info)";
		$parameters = array(
			":pid"=>$_POST["pid"],
			":title"=>$_POST["title"],
			":seotitle"=>$_POST["seotitle"],
			":keywords"=>$_POST["keywords"],
			":description"=>$_POST["description"],
			":content"=>$_POST["content"],
			":pic"=>$_POST["pic"],
			":insert_date"=>$_POST["insert_date"],
			":urlname"=>$_POST["urlname"],
			":guid"=>$_POST["guid"],
			":weight"=>$_POST["weight"],
			":info"=>$_POST["info"]
		);
		global $DB;
		return $DB->insert($sql,$parameters);
	}

	/**
	 * 删除
	 */
	function delete($id=0){

	}
}
