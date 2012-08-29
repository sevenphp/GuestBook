<?php
	header("Content-Type:text/html;charset=utf-8");
    @mysql_connect('localhost','root','shao520') or die('数据库连接出错');
	
	mysql_select_db("testcms");
	
	mysql_query("SET NAMES UTF8");
	
	//$username = $_POST['username'];
	
	$sql = "select * from tc_user where tc_username='dreamk400'";
	
	$query = mysql_query($sql);
	
	$rs = mysql_fetch_array($query);
	
	if($rs['tc_id']){
		die('该用户名已被使用');
	}else{
		die('恭喜!该用户名可以使用');
	}
?>