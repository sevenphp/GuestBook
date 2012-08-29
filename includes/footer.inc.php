<?php
/**
*@author               anshao
*@date                 2012-6-22
*@encoding             UTF-8
*@link                 anshao.net
*@copyright            Anshao
*/
		//防止直接调用(非法调用)
	if(!defined("IN_TAG")){
		exit('Access Tag No Defined');
	}
	
	global $startTime;
?>
<div id="footer">
	<p>版权所有 &copy;<a href="http://anshao.net" title="Anshao微博客">anshao.net</a></p>
	<p>我的第一个<?php echo $GLOBALS['sys_title'];?></p>
	<p>本页面执行耗时:<?php echo round(runTime()-$startTime,5); ?>s</p>
</div>