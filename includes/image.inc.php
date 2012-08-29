<?php
	//开启SESSION
	session_start();

	include '../class/Validation.class.php';
	
	$code = new Validation(75,25,4);
	
	//生成验证码图像
	$code->displayImage();
	$_SESSION['code'] = $code->getCheckCode();
?>