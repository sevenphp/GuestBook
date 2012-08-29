<?php
    //防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}
	
	/*
	 * 用于过滤用户输入的用户名,使其合法
	 * 
	 * */
	function checkUser($userStr,$min,$max){
		//1.过滤用户输入的用户名两边的空格
		$userStr = trim($userStr);
		
		//2.判断用户输入的用户名的长度是否符合要求,长度要求大于2位小于15位
		
		if(mb_strlen($userStr,'utf-8') < $min || mb_strlen($userStr,'utf-8') > $max){
			pushAlert('用户名长度不能小于'.$min.'或者大于'.$max);
		}
		
		//3.正则匹配去掉特殊字符<>\/.(sensitive 敏感)
		$sensitiveChar = '/[<>\/\\\ \  ]/';
	
		if(preg_match($sensitiveChar, $userStr)){
			pushAlert('用户名包含敏感字符!');
		}
		
		return $userStr;
	}
	
	function checkPass($userPass,$confirmPass,$min,$max){
		//1.判断密码的长度是否符合要求(大于6,小于20个字符)
		if(mb_strlen($userPass,'utf-8') < $min || mb_strlen($userPass,'utf-8') > $max){
			pushAlert('用户密码不得小于'.$min.'字符或者不得大于'.$max.'字符');
		}else{
			//2.判断两次输入的密码是否一直
			if(!($userPass == $confirmPass)){
				//pushAlert('两次输入的密码不一致,请重新输入!');
				pushAlert2('两次输入的密码不一致,请重新输入!');
				exit();
			}
		}
		return md5($userPass);
	}
	
	function checkQuestion($question,$answer,$min,$max){
		$question = trim($question);
		//1.判断密码提示的问题长度是否符合要求
		if(mb_strlen($question,'utf-8') < $min || mb_strlen($question,'utf-8') > $max){
			//pushAlert('用户密码提示不得小于'.$min.'字符或者不得大于'.$max.'字符');
			pushAlert2('用户密码提示不得小于'.$min.'字符或者不得大于'.$max.'字符');
			exit();
		}
		return $question;
	}
	
	/*
	 * 判断密码提示和密码回答
	 * */
	function checkAnswer($question,$answer,$min,$max){
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
	
	/*
	 * 判断邮箱是否符合格式
	 * */
	function checkEmail($email){
		if(empty($email)){
			pushAlert2('邮箱不能为空!');
			exit();
		}else{	
			//使用正则匹配
			if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/', $email)){
				pushAlert2('邮箱格式不正确,请重新输入!');
				exit();
			}
		}
		return $email;
	}
	
	/*
	 * 判断QQ是否符合格式
	 * */
	function checkQQ($qq){
		if(empty($qq)){
			return null;
		}else{
			//	\d => [0-9]
			//	?	=> ?前面的内容匹配0次或1次
			if(!preg_match('/^[1-9]{1}\d{4,9}$/', $qq)){
				pushAlert2('QQ号码格式不正确');
				exit();
			}
		}
		return $qq;
	}
	
	/*
	 * 判断网址是否合法
	 * */
	function checkSite($site){
		if(empty($site) || ($site == 'http://')){
			return null;
		}else{
			if(!preg_match('/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/', $site)){
				pushAlert2('网址格式不正确!');
				exit();
			}
		}
		return $site;
	}
	
	/*
	 * 判断唯一标识符是否合法
	 * */
	function checkUniqid2($startUniqid,$endUniqid){
		
		if((mb_strlen($startUniqid,'utf-8') !=32) || ($startUniqid != $endUniqid)){
			pushAlert2('唯一标识符不一致!');
			//exit();
		}
		
		return $startUniqid;
	}
?>