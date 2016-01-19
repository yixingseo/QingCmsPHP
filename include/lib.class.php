<?php
/**
 * 输出加换行
 * string
 */
function echoLine($str){
	echo $str."<br>";
}

function alert($str){
	die("<script>alert(".$str.");</script>");
}

/**
 * 截取字符串
 * string
 */
function cutString($str,$len,$start=0,$charset="utf-8"){    
	if(mb_strlen($str,'utf-8') < $len)
		return $str;
	else
		return mb_substr($str,$start,$len,$charset) ."…";
}


/**
 * 分类深度
 * string
 */
function getDeep($deep){
	if($deep ==0)
		return "┠ ";
	$str = '';
	for($i=0; $i<$deep; $i++){
		$str.="&nbsp;&nbsp;";
	}
	return $str."└ ";
}

/**
 * 	分类模板选择框
 *	string
 */
function getTemplate(){

}

/**
 * 模板数组
 * array
 */
function getTemplateArray(){
	
}

?>
