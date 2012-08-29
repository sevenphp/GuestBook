/**
 * @author anshao
 */
	window.onload = function (){
		var faceimg = document.getElementsByTagName('img');
		for(var i=0;i<faceimg.length;i++){
			faceimg.item(i).onclick = function (){
				chFaceImg(this.alt);
				};	//匿名函数结束后的大括号后要加分号
		}
	};	//匿名函数结束后的大括号后要加分号

	function chFaceImg(alt){
		//获取父窗口id为faceimg的src的值
		var faceUrl = opener.document.getElementById('faceimg');
		var faceAdd = opener.document.getElementById('faceadd');
		faceUrl.src = alt;
		faceUrl.alt = alt;
		faceAdd.value = alt;
		//opener.document.reg.faceadd.value = alt;
	}