<?php
require_once 'globals.php';
// json(201,'对不起~演示站点，不支持此操作');
$act = isset($_GET['act']) ? purge($_GET['act']) : '';
$act_Arr = explode("_",$act);
if(count($act_Arr) == 2){
	$Path = $act_Arr[0];//路径
	$act = $act_Arr[1];//操作
	if(file_exists(FCPATH.ADM_EXTEND_MULU."/{$Path}/api/{$Path}.php")){
		require FCPATH.ADM_EXTEND_MULU."/{$Path}/api/{$Path}.php";//载入接口
	}else{
		json(201,'错误的操作文件');
	}
}elseif(count($act_Arr) == 3){
	$Path = $act_Arr[0];//路径
	$File = $act_Arr[1];//文件
	$act = $act_Arr[2];//操作
	if(file_exists(FCPATH.ADM_EXTEND_MULU."/{$Path}/api/{$File}.php")){
		require FCPATH.ADM_EXTEND_MULU."/{$Path}/api/{$File}.php";//载入接口
	}else{
		json(201,'错误的操作文件');
	}
}else{
	json(201,'错误的操作接口');
}
?>