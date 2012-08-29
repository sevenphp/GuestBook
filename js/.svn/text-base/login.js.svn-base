/**
 * @author anshao
 */
	window.onload = function (){
		var changeCode = document.getElementById('codeimg');
		changeCode.onclick = function (){
			newgdcode(this,this.src);
		};

	
	
	var form = document.getElementsByTagName('form')[0];
	window.onsubmit = function (){
		
		//1.判断用户名是否符合要求
		if(form.username.value < 2 || form.username.value > 15){
			alert('用户名长度不能小于2位或者大于15位!');
			form.username.value = "";
			form.username.focus();
			return false;
		}
		
		if(/[<>\'\"\ \  ]/.test(form.username.value)){
			alert('用户名不得包含非法字符!');
			form.username.value = "";
			form.username.focus();
			return false;			
		}
		
		//2.判断密码是否符合要求
		if(form.password.value.length < 6 || form.password.value.length > 20){
			alert('密码长度不得小于6位或者大于20位!');
			form.password.value = '';
			form.password.focus();
			return false;
		}		
		
		//验证码长度是否符合要求
		if(form.code.value.length != 4){
			alert('验证码长度应该为4位!');
			form.code.value = '';
			form.code.focus();
			return false;			
		}
		
		return true;
	};
		};
	 	function newgdcode(obj,url){
			obj.src=url+'?nowtime='+ new Date().getTime();
		}