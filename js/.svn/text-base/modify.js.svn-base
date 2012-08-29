/**
 * @author anshao
 */
	window.onload = function (){
		var faceimg = document.getElementById('codeimg');
		if(faceimg != null){
			faceimg.onclick = function (){
				newgdcode(this,this.src);
			};
		}
		var form = document.getElementsByTagName('form')[0];
		//alert(form);
		form.onsubmit = function (){
			//判断新密码
			if(form.newpassword.value.length != 0){
				if(form.newpassword.value.length <6 || form.newpassword.value.length > 15){
					alert('新密码长度不能小于6位或大于15位');
					form.newpassword.value = '';
					form.newpassword.focus();	
					return false;
				}
			}
			
			//电子邮件
			if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(form.email.value)){
				alert('邮箱格式不正确,请输入你的正确的邮箱!');
				//form.email.value = '';
				form.email.focus();
				return false;
			}
			
			//网站
			if(form.site.value.length != 0){
				if(!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(form.site.value)){
					alert('网址格式不合法!');
					form.site.value = '';
					form.site.focus();
					return false;
				}
			}
			
			//QQ
			if(form.qq.value.length != 0){
				if(!/^[1-9]{1}[0-9]{4,9}$/.test(form.qq.value)){
					alert('QQ号码格式不正确!');
					form.qq.value = '';
					form.qq.focus();
					return false;
				}
			}
			
			//密码提示
			if(form.question.value.length < 2 || from.question.value.length > 10){
				alert('密码提示长度不得小于2位或大于10位');
				form.question.focus();
				return false;
			}
			
			//密码回答
			
			
			//验证码
			if(form.code.value.length != 4){
				alert('验证码长度必须为4位');
				form.code.value = '';
				form.code.focus();
				return false;
			}
			
			return true;			
		};
	};
	
	
	/*刷新验证码*/
	function newgdcode(obj,url){
		obj.src=url+'?nowtime='+ new Date().getTime();
	}
	
