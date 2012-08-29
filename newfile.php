<?php
/**
*@author              	anshao
*@date                  Jul 28, 2012
*@encoding              UTF-8
*@link                  anshao.net
*@copyright             anshao
*/

function regXml($userInfo){
	$file = 'userInfo11.xml';

	//打开文件,返回句柄
	$fp = @fopen($file, w);
	if($fp){
		//写锁
		flock($fp, LOCK_EX);
			
		$infoString = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";
		fwrite($fp, $infoString,strlen($infoString));
		$infoString = "<vip>\r\n";
		fwrite($fp, $infoString,strlen($infoString));
		$infoString = "\t<id>{$userInfo['id']}</id>\r\n";
		fwrite($fp, $infoString,strlen($infoString));
		$infoString = "\t<username>{$userInfo['username']}</username>\r\n";
		fwrite($fp, $infoString,strlen($infoString));
		$infoString = "\t<sex>{$userInfo['sex']}</sex>\r\n";
		fwrite($fp, $infoString,strlen($infoString));
		$infoString = "</vip>\r\n";
		fwrite($fp, $infoString,strlen($infoString));
		//解锁
		flock($fp, LOCK_UN);
			
		//关闭文件句柄
		fclose($fp);
	}else{
	echo ('xml生成失败');
		}
}

$userInfo = array();

$userInfo['id'] = 3;
$userInfo['username'] = 'zhangsan33';
$userInfo['sex'] = 'man33';


regXml($userInfo);