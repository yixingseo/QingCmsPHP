<?php
//error_reporting(2)

/**
 * POST
 * string
 */
function post($str){
    if(isset($POST[$str]))
        return $POST[$str];
    else
        return '';
}

/**
 * GET
 */
function get($str){
    if(isset($GET[$str]))
        return $GET[$str];
    else
        return '';
}

/**
 * 输出加换行
 * string
 */
function echoLine($str){
	echo $str."<br>";
}

/**
 * 弹出窗口
 */
function alert($str){
	die("<script>alert('".$str."');history.go(-1);</script>");
}

/**
 * 网址跳转
 */
function redirect($str){
    if(isset($_GET['redirect']))
        header("Location:" . $_GET['redirect']);
    else
        header("Location:" . $str);
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
 * 生成guid
 */
function guid(){
    if (function_exists('com_create_guid')){
        return trim(com_create_guid(),'{}');
    }else{
        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}

/**
 * 获取用户IP地址
 */
function getIP()
{
    if (!emptyempty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!emptyempty($_SERVER['HTTP_X_FORWARDED_FOR']))
    //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * 生成随机字符串
 */
function randString($l){
  $c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  srand((double)microtime()*1000000);
  for($i=0; $i<$l; $i++) {
      $rand.= $c[rand()%strlen($c)];
  }
  return $rand;
 }

/**
 * 分类深度
 * string
 */
function getDeepTag($deep){
	if($deep ==0)
		return "┠ ";
	$str = '';
	for($i=0; $i<$deep; $i++){
		$str.="&nbsp;&nbsp;";
	}
	return $str."└ ";
}

/**
 * 分类层级列表
 * array
 */
$category_tree_list = array();

function getCategoryTree($pid=0){
    global $DB;
    $arr = $DB->fetchAll("SELECT * FROM `t_sort` order by weight desc, id desc");
}

function categoryTree($pid=0,$level=0){

}


/**
 * 分类层级列表
 * string
 */
function getCategorySelectBox($name='pid',$id='pid'){
    return '<select name="'.$name.'" id="'.$id.'">'.getCategoryOptions().'</select>';
}

function getCategoryOptions($pid=0,$level=0){
    global $DB;
    $str = '';
    $arr = $DB->fetchAll("SELECT * FROM `t_sort` where pid=? order by weight desc, id desc",array($pid));
    foreach ($arr as $key => $row) {
        $str.='<option value="'.$row['id'].'">'.getDeepTag($level).$row['title'].'</option>';
        $str.=getCategoryOptions($row['id'],$level+1);
    }
    return $str;
}

/**
 * 	template列表
 *	array
 */
function getTemplate(){
    return getFile("../content/templates/");
}

/**
 * 读取.html文件列表
 */
function getFile($dir) {
    $fileArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".."&&strpos($file,".")) {
                if(substr($file,-5) == '.html'){
                    $fileArray[$i] = $file;
                     $i++;
                }                
            }
        }
        //关闭句柄
        closedir ( $handle );
    }
    return $fileArray;
}


/**
 * 获取当前页码
 */
function getCurrentPage(){
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;    
    if($current_page < 1)
        $current_page = 1;    
    return $current_page;
}

/**
 * 获取Mysql Limit
 */
function getLimit($pagesize){    
    $limit = (getCurrentPage() - 1) * $pagesize;
    return "LIMIT $limit,$pagesize";
}

/**
 * 显示分页
 */
function getPagelist($total,$pagesize=10){
    $page_count = ceil($total / $pagesize);
    $current_page = getCurrentPage();

    $thisurl = $_SERVER['PHP_SELF'];
    $pas = '';
    foreach ($_GET as $key => $value) {
        if($key != 'page')
            $pas.="$key=$value&";
    }
    $pas = '?' . $pas .'page=';        
    $thisurl.=$pas;


    //分页条
    $html = '<nav class="text-center">';
    $html.= '<ul class="pagination">';
    //上一页
    if($current_page > 1){
        $html.= '<li>';
        $html.= '<a href="'.$thisurl. ($current_page-1) .'" aria-label="Previous"><span aria-hidden="true">上一页</span></a></li>';
    }else{
        $html.= '<li class="disabled">';
        $html.= '<a href="#" aria-label="Previous"><span aria-hidden="true">上一页</span></a></li>';
    }
    //页数

    for($i=1;$i<$page_count+1;$i++){
        $active = $i==$current_page ? ' class="active"' : '';
        $html.='<li'.$active.'><a href="'. $thisurl . $i .'">'. $i .'</a></li>';
    }

    //下一页    
    if($current_page < $page_count){
        $html.='<li>';
        $html.= '<a href="'.$thisurl . ($current_page + 1) . '" aria-label="Next"><span aria-hidden="true">下一页</span></a></li>';
        //$html.='<a href="'.$thisurl . ($current_page + 1) . '" aria-label="Next"><span aria-hidden="true">下一页</span></a></li>'
    }else{
        $html.='<li class="disabled">';
        $html.='<a href="#" aria-label="Next"><span aria-hidden="true">下一页</span></a></li>';        
    }   
    $html.= '</ul></nav>';
    return $html;
}

?>
