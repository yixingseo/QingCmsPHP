<?php


class MySort
{
	public $model = array();
	public $table = "t_sort";
	public $list;

	/**
	 * 析构函数
	 */
	function __construct($id=0){
		if($id > 0){
			$this->read($id);
		}else{
			$this->model["id"] = 0;			
			$this->model["title"] = "";
			$this->model["pic"] = "";
			$this->model["urlname"] = "";			
			$this->model["content"] = "";
			$this->model["sort_template"] = "";
			$this->model["content_template"] = "";
			$this->model["pid"] = 0;
			$this->model["weight"] = 99;
			$this->model["deepTag"] = "";
		}
	}

	//层级列表
	function levelList($data,$pid=0,$deep=0){
		$array = array();
		foreach ($data as $key => $row) {
			if($row["pid"] == $pid){
					$row["deep"] = $deep;
					$row["deepTag"] = getDeep($deep);
					$this->list[] = $row;
					$array = $this->levelList($data,$row["id"],$deep+1);
				}
		}
		if(count($array) > 0)
			return $array;
		else
			return $this->list;		
	}

	//获取层级tag
	private function getDeepTag($deep){
		if($deep == 0)
			return "┠ ";		
		$str = "┈";
		for ($i=0; $i < $deep; $i++) { 
			$str .= $str;
		}
		return "└".$str;
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
		global $DB;
		return $DB->update($sql,$parameters);
	}

	//添加
	function insert($data){
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
		global $DB;
		return $DB->update($sql,$parameters);
	}
}
