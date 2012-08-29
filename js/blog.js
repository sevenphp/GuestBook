/**
 * @author anshao
 */
	window.onload = function (){
		var message = document.getElementsByName('message');
		var friend = document.getElementsByName('friend');
		var flower = document.getElementsByName('flower');
		var post = document.getElementsByName('post_article');
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
				openMessageWindow('article_post.php','article_post',800,450);
			};
			
		}	
		
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
	
