<?php
/**
*@author              	anshao
*@date                  Aug 15, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

	define('IN_TAG', true);
	
	include 'includes/common.inc.php';
	//脚本开始之心执行时间
	$startTime = runTime();
	
	if(isset($_GET['img']) && isset($_GET['per'])){
		thumbPic($_GET['img'], $_GET['per']);
	}