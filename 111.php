<?php
	header('Content-Type:text/html;charset="utf-8"');
	echo __FILE__;
	echo '<br />';
	echo $_SERVER['PHP_SELF'];
	echo '<br />';
	echo $_SERVER['SCRIPT_NAME'].'<br />';
	echo $_SERVER['SCRIPT_FILENAME'].'<br />';
	echo 8%(-2).'<br />';
	echo (-8)%(-2).'<br />';
	echo (-8)%(3).'<br />';

	/*function scanDir($dir){
		$files = array();

		if(is_dir($dir)){
			$handle = opendir($dir);
			if($handle){
				$file = readdir($handle);
				while($file){
					if($file != '.' && $file != '..'){
						if(is_dir($dir.'/'.$file)){
							$files[$file] = scanDir($dir.'/'.$file);
						}else{
							$files[] = $dir.'/'.$file;
						}	
					}
				}
				closedir($handle);
				return $files;
			}
		}
	print_r(scanDir($_SERVER[''DOCUMENT_ROOT']));*/

	echo '现在'.date('Y-m-d H:i:s',time()).'<br />';
	echo '昨天的现在'.date('Y-m-d H:i:s',date('U')-60*60*24).'<br />';
	echo '昨天的现在'.date('Y-m-d H:i:s',strtotime('-1 day'));
	echo '上星期的现在'.date('Y-m-d H:i:s',strtotime('last week'));
	echo '<br />';
	echo '字符串翻转';
	$str = 'abcdefghijk';
	//echo $str(1);
	$sstr = '';
	for($i=strlen($str)-1;$i>=0;$i--){
		$sstr .= $str{$i};
	}
	echo $sstr.'<br />';
	echo '自定义方法截取中文字符串';
	function gbSubstr($string,$start,$length){
		if(strlen($string) > $length){
			$str = '';
			$len = $start + $length;
			for($i=$start;$i<$len;$i++){
			
				if(ord(substr($string,$i,1)) > 0xa0){
					$str .= substr($string,$i,2);
					$i++;
				}else{
					$str .= substr($string,$i,1);
				}
			}
			return $str.'...';
		}else{
			return $string;
		}
	} $ssstr = '这是一组字符串,不知道好不好截取呢..';
	echo gbSubstr($ssstr,0,5);
?>
