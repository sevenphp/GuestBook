/**
 * @author anshao
 */
	window.onload = function (){
		var upimg = document.getElementsByName('uploadimg');

		if(upimg != null){
			for(var i=0;i<upimg.length;i++){
				upimg[0].onclick = function(){
					openMessageWindow('photo_upload_img.php?dir='+this.title,'upimg',400,100);
				};
			}			
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
	
