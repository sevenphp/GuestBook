/**
 * @author anshao
 */
	window.onload = function (){
		var dir = document.getElementById('dir');
		var modify = document.getElementsByName('modify');
		var del = document.getElementsByName('del');
	//	var upimg = document.getElementsByName('uploadimg');
		//alert(upimg[0].title);
		//添加新相册目录
		if(dir != null){
			dir.onclick = function (){
				openMessageWindow('photo_add_dir.php','add-dir',600,450);
			};				
		}

		
		//修改相册目录
		if(modify != null){
			for(var i=0;i<modify.length;i++){
				modify[i].onclick = function (){	
					openMessageWindow('photo_modify_dir.php?id='+this.title,'add-dir',600,450);
				};
			}			
		}

		
		//删除相册目录
		if(del != null){
			for(var i=0;i<del.length;i++){
				del[i].onclick = function(){
					if(confirm('确定要删除相册?')){
						return true;
					}else{
						return false;
					}
				};
			}			
		}

/*		if(upimg != null){
			for(var i=0;i<upimg.length;i++){
				upimg[0].onclick = function(){
					openMessageWindow('photo_upload_img.php?dir='+this.title,'upimg',400,100);
				};
			}			
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
	
