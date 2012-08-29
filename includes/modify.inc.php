<?php
    //防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}
	
	function checkPassModify($userPass,$min,$max){
		//1.判断密码的长度是否符合要求(大于6,小于15个字符)
		if(!empty($userPass)){
			if(strlen($userPass) < $min || strlen($userPass) > $max){
				pushAlert('用户密码不得小于'.$min.'字符或者不得大于'.$max.'字符');
			}
		}else{
			return null;
		}
		return md5($userPass);
	}
	
	function checkSiteModify($site){
		if(empty($site)){
			return null;
		}else{
			if(!preg_match('/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/', $site)){
				pushAlert('网址格式不正确!');
			}
		}
		return $site;
	}	
	
	/*
	 * 判断QQ是否符合格式
	 * */
	function checkQQModify($qq){
		if(empty($qq)){
			return null;
		}else{
			//	\d => [0-9]
			//	?	=> ?前面的内容匹配0次或1次
			if(!preg_match('/^[1-9]{1}\d{4,9}$/', $qq)){
				pushAlert('QQ号码格式不正确');
			}
		}
		return $qq;
	}	
	
	function checkEmailModify($email){
		if(empty($email)){
			pushAlert('邮箱不能为空!');
		}else{	
			//使用正则匹配
			if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email)){
				pushAlert('邮箱格式不正确,请重新输入!');
			}
		}
		return $email;
	}	
	
	function checkSignModify($sign,$min,$max){
		if(!empty($sign)){
			if(strlen($sign) < $min || strlen($sign) > $max){
				pushAlert2('个性签名内容不得小于'.$min.'位或大于'.$max.'位');
				exit();
			}else{
				return $sign;
			}
		}
	}
	
	
	function checkQuestionModify($question,$min,$max){
		$question = trim($question);
		if(mb_strlen($question,'utf-8') < $min || mb_strlen($question,'utf-8') > $max){
			pushAlert2('用户密码提示不得小于'.$min.'字符或者不得大于'.$max.'字符');
			exit();
		}
		return $question;
	}
	
	function checkAnswerModify($answer,$question,$min,$max){
		//1.判断密码回答的长度是否符合要求
		if(mb_strlen($answer,'utf-8') < $min || mb_strlen($answer,'utf-8') > $max){
			pushAlert2('用户密码提示不得小于'.$min.'字符或者不得大于'.$max.'字符');
			exit();
		}else{
			//2.判断密码提示和密码回答是否一致
			if($question == $answer){
				pushAlert2('密码提示和密码回答不能一致!');
				exit();
			}
		}
		return md5($answer);		
	}
	
	//function checkUniqid($dbUniqid,$cookieUniqid){
	//	if($dbUniqid != $cookieUniqid){
	//		pushAlert('唯一标识符异常!');
	//		pushLocation('member.php');
	//	}
	//}
	
?>