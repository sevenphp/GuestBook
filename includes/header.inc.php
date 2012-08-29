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
?>
<div id="header">
	<ul>
		<li><a href="index.php">首页</a></li>
		<?php
			if(isset($_COOKIE['username'])){
				echo '<li><a href="member.php">'.$_COOKIE['username'].'#个人中心</a>&nbsp;'.$GLOBALS['message'].'</li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="blog.php">博友</a></li>';
				echo "\n";
				echo "\t\t";
				if($_SESSION['level'] == 1){
					echo '<li><a href="manager.php">管理</a></li>';
					echo "\n";
					echo "\t\t";
				}
				echo '<li><a href="styles.php">风格</a></li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="photo.php">相册</a></li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="logout.php">退出</a></li>';
			}else{
				echo '<li><a href="reg.php">注册</a></li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="login.php">登陆</a></li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="blog.php">博友</a></li>';
				echo "\n";
				echo "\t\t";
				echo '<li><a href="photo.php">相册</a></li>';
				echo "\n";
				echo "\t\t";				
				echo '<li><a href="styles.php">风格</a></li>';
			}
		?>

		
	</ul>
</div>
<script>
</script>