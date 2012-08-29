/**
 * @author anshao
 */
	window.onload = function (){
		var message = document.getElementsByName('message');
		var friend = document.getElementsByName('friend');
		var flower = document.getElementsByName('flower');
		var post = document.getElementsByName('post_article');
		
		var codeimg = document.getElementById('codeimg');
		if(codeimg != null){
			//刷新验证码
			codeimg.onclick = function (){
				newgdcode(this,this.src);
			};
		}

		
		//alert(message);
		for(var i=0;i<message.length;i++){
			message[i].onclick = function (){
				//window.open('message.php?id='+this.title,'message','top=0,letf=0,width=400,height=400');
				openMessageWindow('message.php?id='+this.title,'message',600,450);
			};
			
		}
		
		for(var i=0;i<friend.length;i++){
			friend[i].onclick = function (){
				//window.open('message.php?id='+this.title,'message','top=0,letf=0,width=400,height=400');
				openMessageWindow('friend.php?id='+this.title,'friend',600,450);
			};
			
		}
		
		for(var i=0;i<flower.length;i++){
			flower[i].onclick = function (){
				//window.open('flower.php?id='+this.title,'flower','top=0,letf=0,width=400,height=400');
				openMessageWindow('flower.php?id='+this.title,'flower',600,450);
			};
			
		}	
		
		for(var i=0;i<post.length;i++){
			post[i].onclick = function (){
				//window.open('flower.php?id='+this.title,'flower','top=0,letf=0,width=400,height=400');
				openMessageWindow('post_article.php','flower',800,450);
			};
			
		}	
		
		var reuser = document.getElementsByName('reuser');	//回复评论人
		var quoteuser = document.getElementsByName('quoteuser'); //引用评论人
		var reauthor = document.getElementsByName('reauthor');	//回复发帖人
		var quotecontent = getElementsByClassName('quotecontent');
		//alert(reuser);
		//alert(quotecontent);
		//alert(quotecontent[2].innerHTML);
		//alert(quoteuser.length);
		//alert(document.getElementsByTagName('form')[0].title.value);
		//alert(reuser.length);
		
		//回复评论人
		for(var i=0;i<reuser.length;i++){
			reuser[i].onclick = function (){
				//alert(this.title);
				document.getElementsByTagName('form')[0].title.value = this.title;
			};
			
		}
		
		//引用评论人
//		for(var i=0;i<quoteuser.length;i++){
//			quoteuser[i].onclick = function (){
//				//alert(this.title);
//				document.getElementsByTagName('form')[0].title.value = this.title;
//				document.getElementsByTagName('form')[0].content.value = quotecontent[i].innerHTML;
//			};
//		}
		
		//回复发帖人
		if(reauthor[0] != null){
			reauthor[0].onclick = function (){
				document.getElementsByTagName('form')[0].title.value = this.title;
			};
		}

/*		for(var i=0;i<quoteuser.length;i++){
			quoteuser[i].onclick = function (){
				alert('quotecontent有'+getElementsByClassName('quotecontent','span')[i].innerHTML);
			};
		}*/
	};
	//screen.height	屏幕高度
	function openMessageWindow(url,name,width,height){
		//alert(screen.height);
		//alert(screen.width);
		var top = (screen.height - height)/2;		
		var left = (screen.width - width) /2;
		window.open(url,name,'top='+top+','+'left='+left+','+'width='+width+','+'height='+height);
	}
	
	//onclick="window.open('message.php?id=1','message','top=0,left=0,width=400,height=500')"
	
	/*刷新验证码*/
	function newgdcode(obj,url){
		obj.src=url+'?nowtime='+ new Date().getTime();
	}	
	
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
