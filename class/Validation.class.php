<?php
	class Validation{
		//成员属性
		private $width;	
		private $height;
		private $codeNum;
		private $image;
		private $disturbNum;
		private $checkCode;
		
		//1.实例化对象
		function __construct($width,$height,$codeNum){
			$this->width=$width;
			$this->height=$height;
			$this->codeNum=$codeNum;
			$num=$width*$height/10;
			if($num > 250-$codeNum){
				$this->disturbNum=250-$codeNum;
			}else{
				$this->disturbNum=$num;
			}
			$this->checkCode=$this->setCheckCode();
		}
		
		
		//2.创建验证码图像
		function displayImage(){
			//1.创建图像背景
			$this->createImage();
			//2.输出干扰色
			$this->disturbColor();
			//3.输出验证字符串
			$this->outputText();
			//4.向浏览器输出整个验证码图像
			$this->outputImage();
		}
		
		
		//3.验证码内容
		function getCheckCode(){
			return $this->checkCode;
		}
		
		private function createImage(){
			$this->image=imagecreatetruecolor($this->width,$this->height);
			$bgcolor=imagecolorallocate($this->image,rand(220,255),rand(220,255),rand(220,255));
			imagefill($this->image,0,0,$bgcolor);
			$borderColor=imagecolorallocate($this->image,0,0,0);
			imagerectangle($this->image,0,0,$this->width-2,$this->height-2,$borderColor);
		}
		
		private function disturbColor(){
			for($i=0;$i<$this->disturbNum;$i++){	
				$color=imagecolorallocate($this->image,rand(0,255),rand(0,255),rand(0,255));
				imagesetpixel($this->image,rand(1,$this->width-2),rand(1,$this->height-2),$color);
			}
			for($i=0;$i<10;$i++){
				$color=imagecolorallocate($this->image,rand(100,200),rand(100,200),rand(100,200));
				imagearc($this->image,rand(-10,$this->width),rand(-10,$this->height),rand(30,300),rand(20,200),50,44,$color);
			}
		}
		
		private function outputText(){
			for($i=0;$i<$this->codeNum;$i++){
				$fontColor=imagecolorallocate($this->image,rand(0,110),rand(0,110),rand(0,110));
				$fontSize=rand(3,5);
				$x=floor($this->width/$this->codeNum)*$i+3;
				$y=rand(0,$this->height-15);
				imagechar($this->image,$fontSize,$x,$y,$this->checkCode{$i},$fontColor);
			}
		}
		
		private function setCheckCode(){
			$code="23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";
			$str="";
			for($i=0;$i<$this->codeNum;$i++){
				$char=$code{rand(0,strlen($code)-1)};
				$str.=$char;
			}
			return $str;
		}
		
		private function outputImage(){
			if(imagetypes() & IMG_GIF){
				header("Content-Type:image/gif");
				imagegif($this->image);
			}elseif(imagetypes() & IMG_PNG){
				header("Content-Type:image/png");
				imagepng($this->image);
			}elseif(imagetypes() & IMG_JPEG){
				header("Content-Type:image/jpeg");
				imagejpeg($this->jpeg);
			}else{
				die("不能创建验证码图像!");
			}
		}
		
		function __destruct(){
			imagedestroy($this->image);
		}
		
	}
?>