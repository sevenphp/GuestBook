/**
 * @author anshao
 */

	window.onload = function (){
		var faceimg = document.getElementById('faceimg');
		var faceadd = document.getElementById('codeimg');
		faceimg.onclick = function (){	//匿名函数
			chooseFace();
		};	//匿名函数结束后的大括号后要加分号
		
		faceadd.onclick = function (){
			newgdcode(this,this.src);
		};
		
		var form = document.getElementsByTagName('form')[0];
		form.onsubmit = function (){
			//1.判断用户名是否符合要求
			if(form.username.value.length < 2 || form.username.value.length > 15){	//判断用户名长度是否符合要求
				alert('用户名长度不能小于2位或者大于15位!');
				form.username.value = "";
				form.username.focus();
				return false;
			}
			
			if(/[<>\'\"\ \  ]/.test(form.username.value)){	//正则匹配判断用户名是否包含非法字符
				alert('用户名不得包含非法字符!');
				form.username.value = '';
				form.username.focus();	//获取焦点
				return false;
			}
			
			//2.判断用户密码是否符合要求
			if(form.password.value.length < 6 || form.password.value.length > 20){
				alert('密码长度不得小于6位或者大于20位!');
				form.password.value = '';
				form.password.focus();
				return false;
			}
			
			if(form.password.value != form.rpassowrd.value){	//判断确认密码和密码是否一致
				alert('两次输入的密码不一致,请重新输入!');
				form.password.value = form.rpassword.value = '';
				form.password.focus();
				return false;
			}
			
			if(form.qpassword.value.length < 2 || form.qpassword.value.length > 15){
				alert('密码提示长度不得小于2位或者大于15位!');
				form.qpassword.value = '';
				form.qpassword.focus();
				return false;
			}
			
			if(form.apassword.value.length < 2 || form.apassword.value.length > 15){
				alert('密码回答长度不得小于2位或者大于15位!');
				form.apassword.value = '';
				form.apassword.focus();
				return false;
			}
			

			if(form.qpassword.value == form.apassword.value){
				alert('密码提示和密码回答不能一样!');
				form.apassword.value = '';
				form.apassword.focus();
				return false;
			}
			
			if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(form.email.value)){
				alert('邮箱格式不正确,请输入你的正确的邮箱!');
				form.email.value = '';
				form.email.focus();
				return false;
			}
			
			if(form.qq.value != ''){
				if(!/^[1-9]{1}[0-9]{4,9}$/.test(form.qq.value)){
					alert('QQ号码格式不正确!');
					form.qq.value = '';
					form.qq.focus();
					return false;
				}
			}
			
			if(form.site.value != '' || form.site.value != 'http://'){
				if(!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(form.site.value)){
					alert('网址格式不合法!');
					form.site.value = 'http://';
					form.site.focus();
					return false;
				}
			}
			
			
			return true;
		}		
	}
	
	/*弹出选择头像窗口*/
	function chooseFace(){
		window.open('face.php','myface','top=0,left=0,width=400,height=400,scrollbars=1');
	}
	
	/*刷新验证码*/
	function newgdcode(obj,url){
		obj.src=url+'?nowtime='+ new Date().getTime();
	}
	

