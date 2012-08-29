

	function checkLogin(obj){
		//1.创建ajax对象
		if(window.XMLHttpRequest){
			ajax = new XMLHttpRequest();	//非IE系列浏览器实例化XMLHttpRequest
		}else{
			if(window.ActiveXobject){
				try{
					ajax = new ActiveXobject("Msxml2.XMLHTTP");
				}catch(e){
					try{
						ajax = new ActiveXobject("Microsoft.XMLHTTP");
					}catch(e){}
				}
			}
		}
		
		if(!ajax){
			window.alert('你的浏览器版本太低!');
		}
		
		//2.设置一个回调函数
		ajax.onreadystatechange = back_checkLogin;
		
		//3.打开连接
		ajax.open('get','ajax.check.username.php',true);	//open()有三个参数
		
		//4.发送数据	ajax.send()	send()只对Post方法有效
		ajax.send('?username='+obj.value+'&'+Math.random());
		
	}

	function back_checkLogin(){
		//判断状态码是否符合要求
		if(ajax.readyState == 4 && ajax.status== 200){
			//alert(ajax.responseText);
			var nameNotice = document.getElementsByName('username');
			nameNotice[1].innerHTML = ajax.responseText;
		}
	}