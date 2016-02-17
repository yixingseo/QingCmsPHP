<?php


class MySort
{
	public $model = array();
	public $table = "t_sort";
	public $list;

	/**
	 * 析构函数
	 */
	function __construct(){
		$this->model["id"] = 0;			
		$this->model["title"] = "";
		$this->model["pic"] = "";
		$this->model["urlname"] = "";			
		$this->model["content"] = "";
		$this->model["sort_template"] = "";
		$this->model["content_template"] = "";
		$this->model["pid"] = 0;
		$this->model["weight"] = 99;
		$this->model["is_parent"] = 0;
		$this->model["is_nav"] = 0;
		$this->model["deepTag"] = "";
	}

	/**
	 * 分类层级列表
	 */
	function getLevelList($data,$pid=0,$deep=0){		
		$array = array();
		foreach ($data as $key => $row) {
			if($row["pid"] == $pid){
					$row["deep"] = $deep;
					$row["deepTag"] = getDeep($deep);
					$this->list[] = $row;
					$array = $this->getLevelList($data,$row["id"],$deep+1);
				}
		}
		if(count($array) > 0)
			return $array;
		else
			return $this->list;		
	}

	/**
	 * 分类层级tag
	 */
	private function getDeepTag($deep){
		if($deep == 0)
			return "┠ ";		
		$str = "┈";
		for ($i=0; $i < $deep; $i++) { 
			$str .= $str;
		}
		return "└".$str;
	}

	/**
	 * 分类列表
	 */
	function getList(){
		global $DB;
		return $DB->fetchAll("SELECT * from `$this->table` order by weight desc,id desc");
	}	

	/**
	 * 读取分类
	 */
	function read($id=0){
		if(!$id)
			return false;
		else{
			global $DB;
			$this->model = $DB->fetchRow("SELECT * from `$this->table` where id =?",array($id));
			if($this->model["id"] > 0)
				return true;
		}
	}

	/**
	 * 修改分类
	 */
	function update(){	
		$sql = "UPDATE `$this->table` SET 
			title = :title,
			pid = :pid,
			urlname = :urlname,
			content = :content,
			is_parent = :is_parent,
			is_nav = :is_nav,
			sort_template = :sort_template,
			content_template = :content_template,
			pic = :pic,
			weight = :weight 
			WHERE id = :id";
		$parameters = array(
			":title" => $_POST["title"],
			":pid" => $_POST["pid"],
			":urlname" => $_POST["urlname"],
			":content" => $_POST["content"],
			":is_parent" => array_key_exists("is_parent",$_POST)? 1 : 0,
			":is_nav" => array_key_exists("is_nav",$_POST)? 1 : 0,
			":sort_template" => $_POST["sort_template"],
			":content_template" => $_POST["content_template"],
			":pic" => $_POST["pic"],
			":weight" => $_POST["weight"],
			":id" => $_POST["id"]
		);	
		global $DB;
		return $DB->update($sql,$parameters);
	}

	/**
	 * 添加分类
	 */
	function insert(){
		$sql = "insert into `$this->table` (title,pid,urlname,sort_template,content_template,content,is_parent,is_nav,pic,weight) 
		values(:title,:pid,:urlname,:sort_template,:content_template,:content,:is_parent,:is_nav,:pic,:weight)";
		$parameters = array(
			":title"=>$_POST["title"],
			":pid"=>$_POST["pid"],
			":urlname"=>$_POST["urlname"],
			":sort_template"=>$_POST["sort_template"],
			":content_template"=>$_POST["content_template"],
			":content"=>$_POST["content"],
			":is_parent" => array_key_exists("is_parent",$_POST)? 1 : 0,
			":is_nav" => array_key_exists("is_nav",$_POST)? 1 : 0,
			":pic"=>$_POST["pic"],
			":weight"=>$_POST["weight"],			
		);
		global $DB;
		return $DB->insert($sql,$parameters);
	}

	/**
	 * 删除分类
	 */
	function delete($id=0){
		if(!$id)
			return 0;		
		global $DB;
		$count = $DB->fetchValue("SELECT COUNT(*) from $this->table where pid = ?",array($id));
		if($count > 0){
			alert('删除失败：请先删除分类下的子类！');
		}else{
			return $DB->delete("DELETE FROM ". $this->table . " where id = ?",array($id));				
		}
		
	}
}
