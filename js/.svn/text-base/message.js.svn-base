/**
 * @author anshao
 */
	window.onload = function (){
		var codeimg = document.getElementById('codeimg');
		if(codeimg != null){
			codeimg.onclick = function (){
				newgdcode(this,this.src);
			};
		}

	};
	
	/*刷新验证码*/
	function newgdcode(obj,url){
		obj.src=url+'?nowtime='+ new Date().getTime();
	}	
