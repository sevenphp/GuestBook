	window.onload = function (){
		var aDel = getElementsByClassName('managerDel','a');
		var aModify = getElementsByClassName('managerModify','a');
		//alert(aDel.length);
		for(var i=0 ; i < aDel.length ; i++){
			aDel[i].onclick = function (){
				if(confirm('确定要删除吗?')){
					return true;
				}
				return false;
			};
		}
	};
	
	/*通过classname来获取标签*/
	function getElementsByClassName(className,tagName){  
			var ele=[],all=document.getElementsByTagName(tagName||"*");  
			for(var i=0;i<all.length;i++){  
				if(all[i].className.match(new RegExp('(\\s|^)'+className+'(\\s|$)'))){  
				ele[ele.length]=all[i];  
				}  
			}  
			return ele;  
	} 