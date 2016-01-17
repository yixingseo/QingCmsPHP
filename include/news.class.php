<?php

class MyNews
{

	//public $id,$title,$seotitle,$keywords,$description,$content,$url,$pic,$att,$show,$insert_user,$insert_date,$urlname,$guid,$hits,$weight,$info;
	public $model;
	public $table = 't_news';

	//读取列表
	function read_list($sqlWhere='',$order='weight desc,id desc'){
		$sql = "select * from ". $this->table ." where show > -1 ";
		$order = " order by ".$order;
		$sql = $sqlWhere!='' ? $sql ."and " .$sqlWhere .$order : $sql .$order;
		//var_dump($sql);
		$DB->prepare($sql);

	}

	//读取
	function read($id=0){
		if($id==0)
			return false;
		global $DB;
		$this->model = $DB->fetchRow("select * from ". $this->table ." where id = ?",array($id));
		if($this->model["id"] > 0)
			return true;
	}

	//保存
	function update($data){
		if(!$data)
			return 0;
		$sql = "update ". $this->table ." set title = :title,seotitle = :seotitle,keywords = :keywords,description = :description,content = :content,url = :url,pic = :pic,
		urlname = :urlname,weight = :weight,info = :info where id = :id";
		$parameters = array(
			":title"=>$data["title"],
			":seotitle"=>$data["seotitle"],
			":keywords"=>$data["keywords"],
			":description"=>$data["description"],
			":content"=>$data["content"],
			":url"=>'',
			":pic"=>$data["pic"],
			":urlname"=>$data["urlname"],
			":weight"=>$data["weight"],
			":info"=>$data["info"],
			":id"=>$data["id"]
		);
		//var_dump($data);
		global $DB;
		return $DB->update($sql,$parameters);
	}

	//添加guid=UUID()
	function insert($data=array()){
		if(!$data)
			return 0;
		$sql = "insert into";
	}
}
