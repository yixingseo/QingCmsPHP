<?php


class MySort
{
	public $model;
	public $table = "t_sort";

	//层级列表
	function levelList(){
		$list = $this->getList();
		var_dump($this->loopLevel(0));
		//return $this->loopLevel($list,0,0);
	}

	private function loopLevel($pid=0,$deep=0){
		global $DB;
		$result = $DB->fetchAll("select * from t_sort where pid = ". $pid ." order by weight desc,id desc");
		$array = array();
		foreach ($result as $key => $row) {
			array_push($array,$row);			
			$array[] = $this->loopLevel($row["id"],$deep++);
		}
		return $array;
	}

	//分类列表
	function getList(){
		global $DB;
		return $DB->fetchAll("select * from t_sort order by weight desc,id desc");
	}

	//读取
	function read($id=0){
		if(!$id)
			return false;
		else{
			global $DB;
			$this->model = $DB->fetchRow("select * from ".$this->table." where id =?",array($id));
			if($this->model["id"] > 0)
				return true;
		}
	}

	//修改
	function update($data){

	}

	//添加
	function insert($data){

	}
}
