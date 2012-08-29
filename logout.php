<?php
	//开启SESSION
	session_start();
	header("Content-Type:text/html; charset=utf-8");
	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	
	if(isset($_COOKIE['username'])){
		setcookie('username','',time()-1);
		setcookie('uniqid','',time()-1);	//并不能绝对的消除cookie
		pushAlert('退出成功!');
		pushLocation('index.php');
	}else{
		pushAlert2('你没有登录!');
	}
?>