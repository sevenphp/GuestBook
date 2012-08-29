/**
 * @author anshao
 */
	window.onload = function(){
		var chkall = document.getElementById('chkall');
		var form = document.getElementsByTagName('form')[0];
		//alert(form.elements.length);
		//alert(form.elements.length);
		//alert(form.elements[5].name);
		//功能是全选或全不选
		chkall.onclick = function (){
			for(var i =0 ; i<form.elements.length; i++){
				if(form.elements[i].name != 'checkall'){
					form.elements[i].checked = form.checkall.checked;
				}
			}
		};
		
		form.onsubmit = function(){
			if(confirm('确定要批量删除消息吗?')){
				return ture;
			}
			return false;
		};
	};