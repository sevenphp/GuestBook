<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
	//session_start();
	error_reporting(E_ALL ^ E_NOTICE);
	//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}
	
	//引入函数
	require 'func.inc.php';
	
	//引入数据库连接相关文件
	include 'conn.inc.php';
	
	//页面开始执行时间
	$startTime = runTime();
	
	/*全局消息提醒*/
	$sql = "SELECT COUNT(tc_id) AS count FROM `tc_message` WHERE `tc_to_user`='{$_COOKIE['username']}' AND `tc_state`=0 limit 1";
	$query = mysql_query($sql);
	$rs = mysql_fetch_array($query);
	
	if (empty($rs['count'])) {
		//没有新消息时的状态	
		$GLOBALS['message'] = '<strong class="noread"><a href="message_list.php"><img src="images/noread.gif" />(0)</a></strong>';
	} else {
		//有新消息时的状态
		$GLOBALS['message'] = '<strong class="read"><a href="message_list.php"><img src="images/meg.gif" />('.$rs['count'].')</a></strong>';
	}
	
	/**/
	$sql = "SELECT `tc_level` FROM `tc_user` WHERE `tc_username`='{$_COOKIE['username']}'";
	$query = mysql_query($sql);
	$rs = mysql_fetch_array($query);
	$_SESSION['level'] = $rs['tc_level'];
	//setcookie('level',$rs['tc_level']);	//用户等级
	
	
	/*系统设置*/
	$sqlStr = "SELECT * FROM `tc_system`";
	$query = mysql_query($sqlStr) or die(mysql_error());
	$rsStr = mysql_fetch_array($query);
	
	$sysInfo = array();
	
	$GLOBALS['sys_id'] = $rsStr['tc_id'];
	$GLOBALS['sys_title'] = $rsStr['tc_change_title'];	//控制网站标题
	$GLOBALS['sys_code'] = $rsStr['tc_change_code'];	//控制是否需要验证码
	$GLOBALS['sys_reg'] = $rsStr['tc_change_reg'];	//控制是否开放注册
	$GLOBALS['sys_re'] = $rsStr['tc_change_re'];	//控制限时回帖的时间
	$GLOBALS['sys_post'] = $rsStr['tc_change_post'];	//控制限时发帖的时间
	$GLOBALS['sys_photo'] = $rsStr['tc_change_photo'];	//控制相片显示数量
	$GLOBALS['sys_blog'] =$rsStr['tc_change_blog'];	//控制blog列表分页
	$GLOBALS['sys_art'] = $rsStr['tc_change_art'];	//控制文章显示列表
	$GLOBALS['sys_style'] = $rsStr['tc_change_style'];	//控制样式
	$GLOBALS['sys_content'] = $rsStr['tc_change_content'];	//非法用词
	
	//var_dump($GLOBALS['sys_id']);
?>