	window.onload = function (){
		var form = document.getElementsByTagName('form')[0];
		var type = document.getElementsByName('ptype');
		var showpass = document.getElementById('showpass');
		//alert(type[1].checked);
		type[0].onclick = function (){
			showpass.style.display = 'block';
		};
		
		type[1].onclick = function (){
			showpass.style.display = 'none';
		};
		
		if(type[0].checked){
			showpass.style.display = 'block';
		}
		
		window.onsubmit = function(){
			
				//判断相册名称是否超出长度限制
				if(form.pname.value.length < 6 || form.pname.value.length > 50){
					alert('相册名称长度不符合要求,不能小于6位或大于50位');
					form.pname.value = '';
					form.pname.focus();
					return false;
				}				
			

			
			if(type[0].checked){	//当选择私密时才验证密码
				if(form.ppass.value.length != 0){
					//判断相册密码是否超出长度限制
					if(form.ppass.value.length < 6 || form.ppass.value.length > 20){
						alert('相册密码长度不符合要求,不能小于6位或大于20位');
						form.ppass.value = '';
						form.ppass.focus();
						return false;
					}
				}
			}
			return true;
		};

	};