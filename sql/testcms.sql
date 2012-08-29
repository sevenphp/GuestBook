-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 29 日 18:29
-- 服务器版本: 5.5.25a
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `testcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `tc_article`
--

CREATE TABLE IF NOT EXISTS `tc_article` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_reid` int(10) unsigned NOT NULL COMMENT '//回复的帖子id',
  `tc_art_author` varchar(20) NOT NULL COMMENT '//帖子作者',
  `tc_art_title` varchar(50) NOT NULL COMMENT '//帖子标题',
  `tc_art_type` int(2) NOT NULL COMMENT '//帖子类型',
  `tc_art_content` text NOT NULL COMMENT '//帖子内容',
  `tc_sent_time` datetime NOT NULL COMMENT '//帖子发表时间',
  `tc_modify_time` datetime NOT NULL COMMENT '//文章最后修改时间',
  `tc_read_count` int(11) NOT NULL COMMENT '//帖子阅读数',
  `tc_comment_count` int(11) NOT NULL COMMENT '//帖子评论数',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- 转存表中的数据 `tc_article`
--

INSERT INTO `tc_article` (`tc_id`, `tc_reid`, `tc_art_author`, `tc_art_title`, `tc_art_type`, `tc_art_content`, `tc_sent_time`, `tc_modify_time`, `tc_read_count`, `tc_comment_count`) VALUES
(52, 0, '罗宾', '内容是重发了呢..这可真是相当的纠结了...', 2, '<p>\r\n	内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...内容是重发了呢..这可真是相当的纠结了...\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&lt;script&gt;alert(''xxx'')&lt;/script&gt;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	内容是重发了呢..这可真是相当的纠结了...\r\n</p>', '2012-07-31 20:57:54', '0000-00-00 00:00:00', 10, 4),
(53, 0, 'seven', '我就seven,这真是让人情何以堪呢。。。', 1, '<p>\r\n	<span style="background-color:#99BB00;">我就seven,这真是让人情何以堪呢。。。</span><span style="background-color:#99BB00;">我就seven,这真是让人情何以堪呢。。。</span><span style="background-color:#99BB00;">我就seven,这真是让人情何以堪呢。。。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<strong>我就seven,这真是让人情何以堪呢。。。</strong><strong>我就seven,这真是让人情何以堪呢。。。</strong>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120731/20120731145943_45254.jpg" alt="" />\r\n</p>\r\n<p>\r\n	<em>我就seven,这真是让人情何以堪呢。。。</em><em>我就seven,这真是让人情何以堪呢。。。</em><em>我就seven,这真是让人情何以堪呢。。。</em>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:right;">\r\n	<u>我就seven,这真是让人情何以堪呢。。。</u><u></u>\r\n</p>', '2012-07-31 20:59:50', '0000-00-00 00:00:00', 3, 0),
(54, 0, 'seven', '还是发水贴比较好..水贴也会火...', 8, '<p>\r\n	还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...还是发水贴比较好..水贴也会火...\r\n</p>', '2012-07-31 21:00:27', '0000-00-00 00:00:00', 5, 1),
(55, 52, 'seven', 'RE:内容是重发了呢..这可真是相当的纠结了...', 2, '这是肿么了。。', '2012-07-31 21:03:48', '0000-00-00 00:00:00', 0, 0),
(56, 52, 'seven', 'RE:第2楼的seven的帖子', 2, '自己回复一下自己&nbsp;。。。', '2012-07-31 21:05:57', '0000-00-00 00:00:00', 0, 0),
(57, 52, 'six', 'RE:内容是重发了呢..这可真是相当的纠结了...', 2, '<img src="http://localhost/sevenphp/1/cms/editor/plugins/emoticons/images/11.gif" border="0" alt="" /><img src="http://localhost/sevenphp/1/cms/editor/plugins/emoticons/images/2.gif" border="0" alt="" /><img src="http://localhost/sevenphp/1/cms/editor/plugins/emoticons/images/13.gif" border="0" alt="" /><img src="http://localhost/sevenphp/1/cms/editor/plugins/emoticons/images/13.gif" border="0" alt="" />', '2012-07-31 21:06:45', '0000-00-00 00:00:00', 0, 0),
(58, 0, 'six', '新人报道。。。', 16, '<p>\r\n	新人报道。。。新人报道。。。\r\n</p>\r\n<p>\r\n	新人报道。。。新人报道。。。新人报道。。。\r\n</p>\r\n<p>\r\n	新人报道。。。新人报道。。。新人报道。。。新人报道。。。\r\n</p>\r\n<p>\r\n	新人报道。。。新人报道。。。新人报道。。。新人报道。。。新人报道。。。\r\n</p>\r\n<p>\r\n	新人报道。。。新人报道。。。新人报道。。。新人报道。。。新人报道。。。新人报道。。。\r\n</p>\r\n<p>\r\n	新人报道。。。新人报道。。。新人报道。。。新人报道。。。新人报道。。。新人报道。。。新人报道。。。\r\n</p>\r\n<p>\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120731/20120731150735_19907.jpg" alt="" />\r\n</p>', '2012-07-31 21:07:41', '0000-00-00 00:00:00', 2, 0),
(59, 0, 'six', 'ubuntu下配置VIM做PHP的IDE开发环境', 2, '<h4 style="font-family:Tahoma, Arial, Helvetica, STHeiti;font-size:14px;color:#666666;text-align:left;background-color:#FAFAFA;">\r\n	<span>发布于: February 15, 2012, 5:01 pm</span>&nbsp;<span>分类:&nbsp;<a href="http://cc.ecjtu.net/category/php5">PHP</a>,<a href="http://cc.ecjtu.net/category/lamp">linux,web服务器</a></span>&nbsp;<span>作者:&nbsp;<a href="http://cc.ecjtu.net/authors/3">Cyrec</a></span>&nbsp;<span>阅读: [1048]</span>\r\n</h4>\r\n<div style="border:0px;margin:0px 5px 5px 0px;padding:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	<p>\r\n		今天在ubuntu下将VIM配置成了PHP的IDE,用到了NERDtree,taglist,AutoComplPop,ZenCoding插件和一些\r\n	</p>\r\n	<p>\r\n		配置,具体步骤记录下：\r\n	</p>\r\n	<p>\r\n		安装vim:更新下源,sudo apt-get update ,然后在下载安装vim,sudo apt-get install vim。\r\n	</p>\r\n	<p>\r\n		设置在上篇文章：<a href="http://cc.ecjtu.net/posts/ubuntu-c-environment">这里有介绍</a>\r\n	</p>\r\n	<p>\r\n		上述设置启用了格式化高亮、行号显示，以及括号匹配、自动缩进等编辑功能，对于大多数情况都可以获得理\r\n	</p>\r\n	<p>\r\n		想的编辑体验。不过此时对.php文件的支持还不完善，需要下载专门的php插件。\r\n	</p>\r\n	<p>\r\n		下载地址：<a href="http://www.vim.org/scripts/script.php?script_id=1571">http://www.vim.org/scripts/script.php?script_id=1571</a><br />\r\n下载文件：php.tar.gz\r\n	</p>\r\n	<p>\r\n		将其中的php.vim复制到$VIM\\vimfiles\\syntax目录中即可。$VIM根据不同系统不同,我的是ubuntu,执行\r\n	</p>\r\n	<p>\r\n		whereis vim :\r\n	</p>\r\n	<p>\r\n		root@Cyrec-desktop:/usr/share/vim/vimfiles# whereis vim<br />\r\nvim: /usr/bin/vim /usr/bin/vim.basic /etc/vim /usr/share/vim /usr/share/man/man1/vim.1.gz 可以找到vim安装\r\n	</p>\r\n	<p>\r\n		在/usr/share/vim中,下面的/usr/share/vim都用$VIM代替。\r\n	</p>\r\n	<p>\r\n		一开始在设置里更换主题一直无法显示,后来找到问题的原因：\r\n	</p>\r\n	<p>\r\n		一般的Linux发行版默认的终端都是16色的，但事实上几乎所有的终端都支持256色终端。\r\n	</p>\r\n	<p>\r\n		1.将Terminal设为Xterm模式:编辑-&gt;配置文件首选项-&gt;颜色 设置为自定义,内置方案选择XTerm.\r\n	</p>\r\n	<p>\r\n		2.vimrc里设置：set t_Co=256\r\n	</p>\r\n	<p>\r\n		然后就可以随便color自己喜欢到主题了。我是用的:colorscheme desert。\r\n	</p>\r\n	<h2 style="color:#222222;font-weight:normal;">\r\n		打造PHP IDE\r\n	</h2>\r\n	<p>\r\n		IDE左侧是目录导航，中间是编辑区域，而右侧则是<a target="_self">方法</a>列表，用于在已经打开的文件中快速跳转。在编辑区\r\n	</p>\r\n	<p>\r\n		域按下CTRL+X键，还会显示已打开文件的列表。&nbsp;\r\n	</p>\r\n	<p>\r\n		其他诸如自动补全、代码模板等功能，都应有尽有。看过了漂亮的截图，我们就来一步步打造PHP IDE吧。\r\n	</p>\r\n	<h3 style="color:#333333;font-size:1.2em;">\r\n		用NERDTree实现目录导航\r\n	</h3>\r\n	<p>\r\n		在进行PHP应用开发时，同时编辑多个文件是很正常的事情。所以必须有一个方便的目录导航工具，以便在目\r\n	</p>\r\n	<p>\r\n		录结构间快速切换，找到需要编辑的文件。\r\n	</p>\r\n	<p>\r\n		vim中提供该类功能的插件很多，比较知名的有project、winmanager等。但笔者个人认为最好用的还是The\r\n	</p>\r\n	<p>\r\n		NERD Tree这个插件。NERDTree不但可以显示完整的目录树结构，还可以将任何一个目录设置为根目录。并\r\n	</p>\r\n	<p>\r\n		且提供了目录导航的书签功能，可谓非常方便。\r\n	</p>\r\n	<p>\r\n		下载地址：<a href="http://www.vim.org/scripts/script.php?script_id=1658">http://www.vim.org/scripts/script.php?script_id=1658</a><br />\r\n下载文件：NERD_tree.zip\r\n	</p>\r\n	<p>\r\n		解压缩时，要把压缩包中的目录结构完整的解压缩到$VIM\\vimfiles目录中。完成后，应该分别找到$VIM\r\n	</p>\r\n	<p>\r\n		\\vimfiles\\doc\\NERD_tree.txt文件和$VIM\\vimfiles\\plugin\\NERD_tree.vim文件。然后在vim中输入命令:helptags\r\n	</p>\r\n	<p>\r\n		$VIM\\vimfiles\\doc，将NERDTree的帮助文档添加到vim中。\r\n	</p>\r\n	<p>\r\n		最后在_vimrc添加如下内容：\r\n	</p>\r\n	<div style="border:0px;margin:0px auto;padding:0px;">\r\n		<p>\r\n			” NERDTree\r\n		</p>\r\n		<p>\r\n			map &lt;F8&gt; :NERDTreeToggle&lt;CR&gt;\r\n		</p>\r\n	</div>\r\n	<p>\r\n		重启vim后，按下F8键，就可以在左侧看到一个目录树了。在目录树窗口中按下?键可以查看详细的帮助信息\r\n	</p>\r\n	<p>\r\n		最常用的操作键有：\r\n	</p>\r\n	<table border="1" cellpadding="1" cellspacing="1" style="border:0px;margin:0px auto;padding:0px;">\r\n		<tbody>\r\n			<tr>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;按键\r\n				</td>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;作用\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;C（大写C键）\r\n				</td>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;将光标所在目录设置为根目录\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;u（小写u键）\r\n				</td>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;转到上一级目录\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;o（小写o键，不是“零”）\r\n				</td>\r\n				<td style="border:0px;font-family:Tahoma, Arial, Helvetica, STHeiti;">\r\n					&nbsp;展开（或折叠）光标所在目录的子目录。如果光标所在位置是一个文件，则在编辑窗口中打开该文件\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p>\r\n		此外在目录树窗口中输入目录<span style="color:#FF0000;">:Bookmark 收藏名</span>还可以将光标所在目录添加到收藏夹中。下次使\r\n	</p>\r\n	<p>\r\n		用<span style="color:#FF0000;">:BookmarkToRoot 收藏名</span>可以直接转到该目录，并且以该目录作为根目录。更多命令可以参考NERDTree的\r\n	</p>\r\n	<p>\r\n		帮助文档。\r\n	</p>\r\n	<h3 style="color:#333333;font-size:1.2em;">\r\n		用taglist实现代码导航\r\n	</h3>\r\n	<p>\r\n		解决了目录和文件导航问题，我们还要为代码之间的跳转提供辅助手段，taglist就是这样一个插件。taglist可以\r\n	</p>\r\n	<p>\r\n		列出已打开文件中定义的类、函数、常量，甚至变量。\r\n	</p>\r\n	<p>\r\n		下载地址：<a href="http://www.vim.org/scripts/script.php?script_id=273">http://www.vim.org/scripts/script.php?script_id=273</a><br />\r\n下载文件：taglist_45.zip\r\n	</p>\r\n	<p>\r\n		压缩包需要完整解压缩到$VIM\\vimfiles目录，并且用:helptags $VIM\\vimfiles\\doc命令索引taglist插件的帮助文\r\n	</p>\r\n	<p>\r\n		档。taglist插件需要依赖ctags程序才能工作。目前常用的ctags版本是Exuberant Ctags。\r\n	</p>\r\n	<p>\r\n		sudo apt-get install ctags,然后whereis ctags,找到ctags: /usr/bin/ctags 这目录下的ctags。\r\n	</p>\r\n	<p>\r\n		将ctags复制到$VIM\\vim72目录中即可。\r\n	</p>\r\n	<p>\r\n		最后在/etc/vim/vimrc添加下列内容，设置好taglist插件：\r\n	</p>\r\n	<p>\r\n		“”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"\r\n	</p>\r\n	<p>\r\n		” =&gt; Plugin configuration\r\n	</p>\r\n	<p>\r\n		“”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"”"\r\n	</p>\r\n	<p>\r\n		” taglist\r\n	</p>\r\n	<p>\r\n		let Tlist_Auto_Highlight_Tag = 1\r\n	</p>\r\n	<p>\r\n		let Tlist_Auto_Open = 1\r\n	</p>\r\n	<p>\r\n		let Tlist_Auto_Update = 1\r\n	</p>\r\n	<p>\r\n		let Tlist_Close_On_Select = 0\r\n	</p>\r\n	<p>\r\n		let Tlist_Compact_Format = 0\r\n	</p>\r\n	<p>\r\n		let Tlist_Display_Prototype = 0\r\n	</p>\r\n	<p>\r\n		let Tlist_Display_Tag_Scope = 1\r\n	</p>\r\n	<p>\r\n		let Tlist_Enable_Fold_Column = 0\r\n	</p>\r\n	<p>\r\n		let Tlist_Exit_OnlyWindow = 0\r\n	</p>\r\n	<p>\r\n		let Tlist_File_Fold_Auto_Close = 0\r\n	</p>\r\n	<p>\r\n		let Tlist_GainFocus_On_ToggleOpen = 1\r\n	</p>\r\n	<p>\r\n		let Tlist_Hightlight_Tag_On_BufEnter = 1\r\n	</p>\r\n	<p>\r\n		let Tlist_Inc_Winwidth = 0\r\n	</p>\r\n	<p>\r\n		<span style="font-family:新宋体;">利用ctrl+ww来进行两个窗口之间的切换。</span>\r\n	</p>\r\n	<p>\r\n		<span style="font-family:新宋体;"><span style="font-family:Tahoma, Arial, Helvetica, STHeiti;"><span>在</span><span>taglist</span><span>窗口中，可以使用下面的快捷键：</span></span></span>\r\n	</p>\r\n	<div style="border:0px;margin:0px auto;padding:0px;">\r\n		&lt;CR&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;跳到光标下tag所定义的位置，用鼠标双击此tag功能也一样<br />\r\no&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 在一个新打开的窗口中显示光标下tag<br />\r\n&lt;Space&gt;&nbsp;&nbsp;显示光标下tag的原型定义<br />\r\nu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 更新taglist窗口中的tag<br />\r\ns&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 更改排序方式，在按名字排序和按出现顺序排序间切换<br />\r\nx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; taglist窗口放大和缩小，方便查看较长的tag<br />\r\n+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 打开一个折叠，同zo<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 将tag折叠起来，同zc<br />\r\n*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 打开所有的折叠，同zR<br />\r\n=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 将所有tag折叠起来，同zM<br />\r\n[[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;跳到前一个文件<br />\r\n]]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 跳到后一个文件<br />\r\nq&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关闭taglist窗口\r\n	</div>\r\n	<div style="border:0px;margin:0px auto;padding:0px;">\r\n		在vimrc中加下面设置可以按F6打开关闭taglist\r\n	</div>\r\n	<div style="border:0px;margin:0px auto;padding:0px;">\r\n		"函数和变量列表<br />\r\nmap &lt;F6&gt; :TlistToggle&lt;CR&gt;\r\n	</div>\r\n	<h3 style="color:#333333;font-size:1.2em;">\r\n		用AutoComplPop实现代码自动提示\r\n	</h3>\r\n	<p>\r\n		点击下面网址，进去下载autocomplpop插件\r\n	</p>\r\n	<p>\r\n		<a href="http://www.vim.org/scripts/script.php?script_id=1879">http://www.vim.org/scripts/script.php?script_id=1879</a>\r\n	</p>\r\n	<p>\r\n		下载的是一个zip文件,解压后会有三个文件夹,分别是autoload,doc,plugin。到Vim的根目录下,找到名字\r\n	</p>\r\n	<p>\r\n		和这三个一样的文件夹。不同系统目录位置不同。我的fedora是/usr/share/vim/vimfiles\r\n	</p>\r\n	<p>\r\n		按照文件夹对应的把里面的acp.vim和其他的什么文件都copy过去。然后重启Vim。这时候可能会有错误提示\r\n	</p>\r\n	<blockquote>\r\n		<p>\r\n			Error detected while processing /home/carlos/.vim/plugin/acp.vim:<br />\r\nline 13:<br />\r\n***** L9 library must be installed! *****\r\n		</p>\r\n	</blockquote>\r\n	<p>\r\n		这是插件放出的一个错误提示，查看plugin里的acp.vim可以看到。是缺少L9 library库。这个也是需要下载的。地址在下面\r\n	</p>\r\n	<p>\r\n		<a href="http://www.vim.org/scripts/script.php?script_id=3252" target="_blank">http://www.vim.org/scripts/script.php?script_id=3252</a>\r\n	</p>\r\n	<p>\r\n		下载下来，它也是一个插件形式，以同样的方式copy到Vim目录下。\r\n	</p>\r\n	<p>\r\n		安装完后就可以了。\r\n	</p>\r\n	<p>\r\n		再就是这个插件默认是没有设置php自动补全的，可以设置一个PHP函数字典，让其根据字典的内容进行自动\r\n	</p>\r\n	<p>\r\n		补全。\r\n	</p>\r\n<pre>这个是一个PHP字典:.</pre>\r\n<pre>编辑配置文件.vimrc,在文件后面加上下面的代码</pre>\r\n<pre>au FileType php setlocal dict+=/etc/vim/php_funclist.txt</pre>\r\n<pre>后面跟着的是字典的目录地址，根据自己的需求存放在一个地方就好。我是放到了/etc/vim/目录下。\r\n\r\nphp_funclist下载:<a href="http://cc.ecjtu.net/uploads/php_funclist.tar.gz">php_funclist.tar.gz</a></pre>\r\n	<p>\r\n		再附加一些自动补全配置（加入到vimrc中）：\r\n	</p>\r\n	<p>\r\n		php 中 一般是会在 "$", "-&gt;", "::" 后需要出现自动补全，在 .vimrc 中加入以下代码：\r\n	</p>\r\n<pre>if !exists(''g:AutoComplPop_Behavior'')\r\n    let g:AutoComplPop_Behavior = {}\r\n    let g:AutoComplPop_Behavior[''php''] = []\r\n    call add(g:AutoComplPop_Behavior[''php''], {\r\n            \\   ''command''   : "\\&lt;C-x&gt;\\&lt;C-o&gt;", \r\n            \\   ''pattern''   : printf(''\\(-&gt;\\|::\\|\\$\\)\\k\\{%d,}$'', 0),\r\n            \\   ''repeat''    : 0,\r\n            \\})\r\nendif</pre>\r\n	<p>\r\n		在 Vim 中实现括号自动补全：\r\n	</p>\r\n	<p>\r\n		:inoremap ( ()&lt;ESC&gt;i<br />\r\n:inoremap ) &lt;c-r&gt;=ClosePair('')'')&lt;CR&gt;<br />\r\n:inoremap { {}&lt;ESC&gt;i<br />\r\n:inoremap } &lt;c-r&gt;=ClosePair(''}'')&lt;CR&gt;<br />\r\n:inoremap [ []&lt;ESC&gt;i<br />\r\n:inoremap ] &lt;c-r&gt;=ClosePair('']'')&lt;CR&gt;<br />\r\n:inoremap &lt; &lt;&gt;&lt;ESC&gt;i<br />\r\n:inoremap &gt; &lt;c-r&gt;=ClosePair(''&gt;'')&lt;CR&gt;<br />\r\n<br />\r\nfunction ClosePair(char)<br />\r\nif getline(''.'')[col(''.'') - 1] == a:char<br />\r\nreturn "\\&lt;Right&gt;"<br />\r\nelse<br />\r\nreturn a:char<br />\r\nendif<br />\r\nendf\r\n	</p>\r\n	<p>\r\n		这样，写代码的时候不再担心会丢掉右边的括号了，尤其是函数嵌套的时候。\r\n	</p>\r\n	<h3 style="color:#333333;font-size:1.2em;">\r\n		安装ZenCoding插件\r\n	</h3>\r\n	<p>\r\n		到<a href="http://github.com/mattn/zencoding-vim">http://github.com/mattn/zencoding-vim</a>下载压缩包,然后解压到vimfiles文件夹,和上面一样,将doc plugin\r\n	</p>\r\n	<p>\r\n		autoload三个文件夹放到相应文件夹下。然后在vim中输入helptags /etc/vim/doc 导入帮助文件.就OK了。\r\n	</p>\r\n	<p>\r\n		zencoing可以很方便的写html,一些常用命令：\r\n	</p>\r\n	<p>\r\n		输入 div&gt;p#foo$*3&gt;a 这样的缩写,然后按 ctrl + y + , 来展开(注意那个逗号)，展开后它应该是这个样子的\r\n	</p>\r\n<pre> &lt;div&gt;\r\n      &lt;p id="foo1"&gt;\r\n          &lt;a href=""&gt;&lt;/a&gt;\r\n      &lt;/p&gt;\r\n      &lt;p id="foo2"&gt;\r\n          &lt;a href=""&gt;&lt;/a&gt;\r\n      &lt;/p&gt;\r\n      &lt;p id="foo3"&gt;\r\n          &lt;a href=""&gt;&lt;/a&gt;\r\n      &lt;/p&gt;\r\n  &lt;/div&gt;\r\n</pre>\r\n	<ul>\r\n		<li>\r\n			多行缩写\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		输入如下:\r\n	</p>\r\n<pre>test1\r\ntest2\r\ntest3\r\n</pre>\r\n	<p>\r\n		然后进入行选择模式，选中这三行按 ctrl + y + ,，接着它会提示你要使用的tag名称，TAG: 输入 ‘ul&gt;li* 会变成如下的样子\r\n	</p>\r\n<pre>&lt;ul&gt;\r\n    &lt;li&gt;test1&lt;/li&gt;\r\n    &lt;li&gt;test2&lt;/li&gt;\r\n    &lt;li&gt;test3&lt;/li&gt;\r\n&lt;/ul&gt;\r\n</pre>\r\n	<p>\r\n		如果是输入blockquote，那么会变成这样\r\n	</p>\r\n<pre>  &lt;blockquote&gt;\r\n      test1\r\n      test2\r\n      test3\r\n  &lt;/blockquote&gt;\r\n</pre>\r\n	<ul>\r\n		<li>\r\n			跳转到下一个标签编辑位置\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		输入ctrl + y + n 进入插入模式\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			跳转到上一个标签编辑位置\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		输入ctrl + y + N 进入插入模式\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			更新标签中图片大小\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		假如有以下内容\r\n	</p>\r\n<pre>&lt;img src="foo.png" /&gt;\r\n</pre>\r\n	<p>\r\n		光标移动到img标签上，按下ctrl + y + i 该插件会自动获取foo.png的大小并插入宽高属性 看起来像这个样子\r\n	</p>\r\n<pre>&lt;img src="foo.png" width="32" height="48" /&gt;\r\n</pre>\r\n	<ul>\r\n		<li>\r\n			切换注释\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		如有以下段\r\n	</p>\r\n<pre>&lt;div&gt;\r\n    hello world\r\n&lt;/div&gt;\r\n</pre>\r\n	<p>\r\n		光标移动到此段落，输入ctrl + y + /变成\r\n	</p>\r\n<pre>&lt;!-- &lt;div&gt;\r\n    hello world\r\n&lt;/div&gt; --&gt;\r\n</pre>\r\n	<p>\r\n		再次输入则还原\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			生成url连接\r\n		</li>\r\n	</ul>\r\n	<p>\r\n		将光标移动到一个url上，如：\r\n	</p>\r\n<pre>http://www.google.com/\r\n</pre>\r\n	<p>\r\n		输入ctrl + y + a 它会自动获取url页面的标题并生成一个连接\r\n	</p>\r\n<pre>&lt;a href="http://www.google.com/"&gt;&lt;/a&gt;\r\n</pre>\r\n	<p>\r\n		Zen Coding官方提供的速查手册(PDF)：<a href="http://zen-coding.googlecode.com/files/ZenCodingCheatSheet.pdf">http://zen-coding.googlecode.com/files/ZenCodingCheatSheet.pdf</a>\r\n	</p>\r\n	<p>\r\n		配置OK了，最后上张帅气的vim图:\r\n	</p>\r\n</div>', '2012-07-31 21:08:39', '0000-00-00 00:00:00', 12, 0),
(60, 0, 'six', 'ubuntu搭建C/C++环境附VIM的常用命令表', 14, '<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	1，配置gcc\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	刚装好的的gcc什么文件都不能编译，因为没有一些必须的头文件，所以必须安装build-essential包，安装这\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	个包会安装上g++、libc6-dev、linux-libc-dev、libstdc++6-4.1-dev等好多必须的软件和头文件。\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	在终端执行sudo apt-get install build-essential 这里面包含了\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	2，安装vim\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	Ubuntu中的vi不完全，安装vim。\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	在终端中执行：sudo apt-get install vim\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	网上找了一份VIM C编辑器的配置：\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	sudo vim&nbsp;/etc/vimcd/vimrc 将如下配置加入其中。\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	还可以下载一个ctags插件来查看C源码：\r\n</p>\r\n<p style="font-family:Tahoma, Arial, Helvetica, STHeiti;color:#494949;font-size:14px;text-align:left;background-color:#FAFAFA;">\r\n	sudo apt-get install ctags\r\n</p>', '2012-07-31 21:09:29', '0000-00-00 00:00:00', 2, 0),
(61, 0, 'six', '天涯运维之路，熟悉一个开源项目', 3, '<ul style="color:#555555;font-family:宋体, Arial, Helvetica, sans-serif;background-color:#FFFFFF;">\r\n	<li>\r\n		04 天涯的运维之路 文/周小军\r\n	</li>\r\n	<li>\r\n		06 系统管理员该学什么语言？ 文/Tom Limoncelli 编译/核子可乐\r\n	</li>\r\n	<li>\r\n		08 还在使用6年前的设备？你需要叉车式升级 文/ Henry Newman 编译/布加迪\r\n	</li>\r\n	<li>\r\n		10 腾讯后台开发技术总监浅谈过载保护 小心雪崩效应 文/mysqlops\r\n	</li>\r\n	<li>\r\n		12 一个DBA眼中的HBase 文 / vogts\r\n	</li>\r\n	<li>\r\n		14 异构存储系统数据迁移步骤分享 文/miskey07\r\n	</li>\r\n	<li>\r\n		15 iptables自动封杀暴力破解（Qmail邮件系统）者的IP地址 文/sfzhang88\r\n	</li>\r\n	<li>\r\n		19 Zimbra邮件系统安装与使用过程中各种报错与问题的详细解决方法 文/heminjie\r\n	</li>\r\n	<li>\r\n		22 一次被黑经历与一些反思 文/old_hoodlum\r\n	</li>\r\n	<li>\r\n		28 又一次运维，恶意 js 脚本注入访问伪随机域名 文/尘埃落定\r\n	</li>\r\n	<li>\r\n		30 如何熟悉一个开源项目？ 文/庄周梦蝶\r\n	</li>\r\n	<li>\r\n		31 四个新的 HTTP 状态码 文/红薯\r\n	</li>\r\n	<li>\r\n		32 云计算时代，运维人你们准备好了吗？ 文/杨赛\r\n	</li>\r\n</ul>', '2012-07-31 21:10:13', '0000-00-00 00:00:00', 3, 0),
(62, 54, 'six', 'RE:还是发水贴比较好..水贴也会火...', 8, '楼主V5。。', '2012-07-31 21:11:04', '0000-00-00 00:00:00', 0, 0),
(63, 0, 'five', 'five报道。。。。', 15, '<p>\r\n	five报道。。。。five报道。。。。five报道。。。。five报道。。。。\r\n</p>\r\n<p>\r\n	five报道。。。。five报道。。。。five报道。。。。five报道。。。。five报道。。。。\r\n</p>\r\n<p>\r\n	five报道。。。。five报道。。。。five报道。。。。five报道。。。。five报道。。。。five报道。。。。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	five报道。。。。five报道。。。。five报道。。。。five报道。。。。five报道。。。。five报道。。。。\r\n</p>\r\n<p>\r\n	five报道。。。。five报道。。。。five报道。。。。five报道。。。。five报道。。。。\r\n</p>\r\n<p>\r\n	five报道。。。。five报道。。。。five报道。。。。five报道。。。。\r\n</p>', '2012-07-31 21:12:04', '0000-00-00 00:00:00', 3, 1),
(64, 0, 'five', '希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。', 1, '<p>\r\n	<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。</em>\r\n</p>\r\n<p>\r\n	<em><em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。</em></em></em>\r\n</p>\r\n<p>\r\n	<em><em><em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。</em></em></em></em></em>\r\n</p>\r\n<p>\r\n	<em><em><em><em><em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。</em></em></em></em></em></em></em></em>\r\n</p>\r\n<p>\r\n	<em><em><em><em><em><em><em><em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。<em>希望大家能够利用 DeepinUI 开发出越来越多漂亮的 Linux 桌面应用。</em></em></em></em></em></em></em></em></em></em></em><br />\r\n</em>\r\n</p>', '2012-07-31 21:12:32', '0000-00-00 00:00:00', 2, 0),
(65, 0, 'five', 'vim php ide', 9, '<p>\r\n	vim php ide\r\n</p>\r\n<p>\r\n	vim php idevim php ide\r\n</p>\r\n<p>\r\n	vim php idevim php idevim php ide\r\n</p>\r\n<p>\r\n	vim php idevim php idevim php idevim php ide\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	vim php idevim php idevim php idevim php ide\r\n</p>\r\n<p>\r\n	vim php idevim php idevim php idevim php idevim php ide\r\n</p>\r\n<p>\r\n	vim php idevim php idevim php idevim&nbsp;\r\n</p>', '2012-07-31 21:13:21', '0000-00-00 00:00:00', 2, 0),
(66, 52, 'five', 'RE:内容是重发了呢..这可真是相当的纠结了...', 2, '我也来顶了。。。', '2012-07-31 21:14:05', '0000-00-00 00:00:00', 0, 0),
(67, 0, 'first', '我是first，报道来了。。。', 12, '我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。我是first，报道来了。。。', '2012-07-31 21:14:53', '0000-00-00 00:00:00', 5, 1),
(68, 0, 'first', '都不知道要写什么了。。该怎么办呢。。。', 11, '<p>\r\n	都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。\r\n</p>\r\n<p>\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120731/20120731151529_90797.jpg" alt="" /> \r\n</p>\r\n<p>\r\n	该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。都不知道要写什么了。。该怎么办呢。。。v\r\n</p>', '2012-07-31 21:15:46', '0000-00-00 00:00:00', 10, 0),
(69, 0, 'first', '终于13了，你真是个213,全家213', 10, '终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213终于13了，你真是个213,全家213', '2012-07-31 21:16:30', '0000-00-00 00:00:00', 15, 3),
(70, 0, '罗宾', '罗宾来发终极帖子了。。。测试修改帖子。。。', 11, '<p style="text-align:center;">\r\n	罗宾来发终极帖子了。。。罗宾来发终极帖子了。。。\r\n</p>\r\n<p style="text-align:center;">\r\n	罗宾来发终极帖子了。。。罗宾来发终极帖子了。。。罗宾来发终极帖子了。。。\r\n</p>\r\n<p style="text-align:center;">\r\n	罗宾来发终极帖子了。。。罗宾来发终极帖子了。。。罗宾来发终极帖子了。。。罗宾来发终极帖子了。。。\r\n</p>\r\n<p style="text-align:center;">\r\n	测试修改帖子\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120731/20120731151755_81554.jpg" alt="" /> \r\n</p>', '2012-07-31 21:18:01', '2012-08-01 14:49:19', 85, 14),
(71, 0, '罗宾', '又见神贴。。。修改过的。。', 10, '无言的神贴。。修改过的。。', '2012-07-31 21:18:41', '2012-08-02 18:57:17', 35, 1),
(72, 70, 'four', 'RE:罗宾来发终极帖子了。。。', 2, '<span>刷屏了。。。<span>刷屏了。。。<span>刷屏了。。。<span>刷屏了。。。<span>刷屏了。。。</span></span></span></span></span>', '2012-07-31 21:20:14', '0000-00-00 00:00:00', 0, 0),
(73, 70, 'four', 'RE:罗宾来发终极帖子了。。。', 2, '<img src="http://localhost/sevenphp/1/cms/editor/plugins/emoticons/images/0.gif" border="0" alt="" />', '2012-07-31 21:20:26', '0000-00-00 00:00:00', 0, 0),
(74, 70, 'seven', 'RE:第2楼的four的帖子', 2, '2楼好样的。。。', '2012-07-31 21:21:39', '0000-00-00 00:00:00', 0, 0),
(75, 70, 'seven', 'RE:第4楼的seven的帖子', 2, '我自己也是好样的。。做等分页。。', '2012-07-31 21:22:19', '0000-00-00 00:00:00', 0, 0),
(76, 70, 'seven', 'RE:罗宾来发终极帖子了。。。', 2, '楼主这是神贴。。。', '2012-07-31 21:22:56', '0000-00-00 00:00:00', 0, 0),
(77, 70, 'anshao', 'RE:第6楼的seven的帖子', 2, '神你妹子哦。。淡定。。', '2012-07-31 21:23:48', '0000-00-00 00:00:00', 0, 0),
(78, 70, 'anshao', 'RE:罗宾来发终极帖子了。。。', 2, '<p>\r\n	浮云。。。\r\n</p>\r\n<p>\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120731/20120731152402_12435.jpg" alt="" />\r\n</p>', '2012-07-31 21:24:08', '0000-00-00 00:00:00', 0, 0),
(79, 70, 'anshao', 'RE:第2楼的four的帖子', 2, '我也回复一下你吧。。', '2012-07-31 21:24:46', '0000-00-00 00:00:00', 0, 0),
(80, 70, 'second', 'RE:罗宾来发终极帖子了。。。', 2, '速度。。速度。。。速度', '2012-07-31 21:25:32', '0000-00-00 00:00:00', 0, 0),
(81, 70, 'second', 'RE:第2楼的four的帖子', 2, '神一样的2楼。。。', '2012-07-31 21:25:54', '0000-00-00 00:00:00', 0, 0),
(82, 70, 'second', 'RE:第4楼的seven的帖子', 2, '摸3楼狗头。。。', '2012-07-31 21:26:30', '0000-00-00 00:00:00', 0, 0),
(83, 0, 'second', '我想发一个神贴。。球帮助。。。2012-7-31', 13, '我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。我想发一个神贴。。球帮助。。。', '2012-07-31 21:27:27', '2012-07-31 21:53:01', 18, 1),
(84, 0, 'second', '好吧。。再发测试贴。。。', 12, '<p>\r\n	好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。</span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><br />\r\n</span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。</span></span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><span><br />\r\n</span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><span><img src="/sevenphp/1/cms/editor/attached/image/20120731/20120731154955_92411.jpg" alt="" /></span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。</span></span>\r\n</p>\r\n<p>\r\n	<span><br />\r\n</span>\r\n</p>\r\n<p>\r\n	<span><span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。</span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><br />\r\n</span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。<span>好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。好吧。。再发测试贴。。。</span></span></span></span></span></span></span>\r\n</p>', '2012-07-31 21:49:34', '2012-07-31 21:50:08', 81, 3),
(85, 84, 'second', 'RE:好吧。。再发测试贴。。。', 12, '', '2012-07-31 21:55:55', '0000-00-00 00:00:00', 0, 0),
(86, 84, '罗宾', 'RE:好吧。。再发测试贴。。。', 12, '神一样的帖子。。。<br />', '2012-08-01 14:47:43', '0000-00-00 00:00:00', 0, 0),
(87, 70, '罗宾', 'RE:罗宾来发终极帖子了。。。测试修改帖子。。。', 11, 'HOT..HOT..帖子修改成功...<br />', '2012-08-01 14:49:55', '0000-00-00 00:00:00', 0, 0),
(88, 70, '罗宾', 'RE:第7楼的anshao的帖子', 11, '谢谢捧场。。。<br />', '2012-08-01 14:50:17', '0000-00-00 00:00:00', 0, 0),
(89, 71, 'second', 'RE:又见神贴。。。修改过的。。', 10, '真是好神奇&nbsp;&nbsp;&nbsp;。。。', '2012-08-02 19:16:30', '0000-00-00 00:00:00', 0, 0),
(90, 67, 'second', 'RE:我是first，报道来了。。。', 12, 'first你好，我们作个朋友吧。。', '2012-08-02 22:52:32', '0000-00-00 00:00:00', 0, 0),
(91, 69, 'second', 'RE:终于13了，你真是个213,全家213', 10, '楼主天生213，无人能及...', '2012-08-02 22:54:40', '0000-00-00 00:00:00', 0, 0),
(92, 83, 'seven', 'RE:我想发一个神贴。。球帮助。。。2012-7-31', 13, '真是见鬼..', '2012-08-03 09:08:05', '0000-00-00 00:00:00', 0, 0),
(93, 84, 'seven', 'RE:好吧。。再发测试贴。。。', 12, '<p>\r\n	<img src="http://tp2.sinaimg.cn/2053695357/180/5627979618/1" alt="" />\\\r\n</p>\r\n<p>\r\n	xxxxxxxxxxxxxxxxxxxxxxx\r\n</p>', '2012-08-03 09:11:24', '0000-00-00 00:00:00', 0, 0),
(94, 63, 'seven', 'RE:five报道。。。。', 15, '我是seven,你好阿。。。', '2012-08-03 14:16:41', '0000-00-00 00:00:00', 0, 0),
(95, 0, 'seven', '测试限时发帖1.。。。。', 10, '<p>\r\n	测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;测试限时发帖1.。。。。\r\n</p>\r\n<p>\r\n	测试限时发帖1.。。。。\r\n</p>', '2012-08-04 08:59:28', '0000-00-00 00:00:00', 0, 0),
(96, 0, 'seven', '233352435R452', 1, '<p>\r\n	DFAFADFZCVZV\r\n</p>\r\n<p>\r\n	DAFFAJHKZHV\r\n</p>\r\n<p>\r\n	A\r\n</p>\r\n<p>\r\n	FAFAF\r\n</p>', '2012-08-04 08:59:48', '0000-00-00 00:00:00', 2, 0),
(97, 0, 'seven', '111111111111111111111111111111', 5, '<p>\r\n	3333333333333333333333334444444ddf\r\n</p>\r\n<p>\r\n	faddddddddddddddddddd\r\n</p>\r\n<p>\r\n	测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。\r\n</p>', '2012-08-04 09:01:20', '0000-00-00 00:00:00', 0, 0),
(98, 0, 'seven', '333333333333333', 15, '测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。测试限时发帖1.。。。。', '2012-08-04 09:02:20', '0000-00-00 00:00:00', 3, 0),
(99, 0, 'seven', 'dddddddddd', 11, 'dddddddddddddddddddddddddd', '2012-08-04 09:03:21', '0000-00-00 00:00:00', 2, 0),
(100, 0, 'seven', '限时发帖了1限时发帖了1', 1, '<p>\r\n	限时发帖了1限时发帖了1限时发帖了1限时发帖了1\r\n</p>\r\n<p>\r\n	限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1\r\n</p>\r\n<p>\r\n	限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1限时发帖了1\r\n</p>', '2012-08-04 09:20:31', '0000-00-00 00:00:00', 2, 0),
(101, 0, 'seven', '限时发帖了2限时发帖了2限时发帖了2', 1, '限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2限时发帖了2', '2012-08-04 09:21:31', '0000-00-00 00:00:00', 5, 0),
(102, 69, 'seven', 'RE:第2楼的second的帖子', 10, '不知道怎样才好忣。。。', '2012-08-04 09:27:55', '0000-00-00 00:00:00', 0, 0),
(103, 69, 'seven', 'RE:第3楼的seven的帖子', 10, '回复自己', '2012-08-04 09:28:36', '0000-00-00 00:00:00', 0, 0),
(104, 0, 'nocheck', '我是nocheck，测试一下新账号...', 16, '<p>\r\n	我是nocheck，测试一下新账号我是nocheck，测试一下新账号我是nocheck，测试一下新账号我是nocheck，测试一下新账号我是nocheck，测试一下新账号我是nocheck，测试一下新账号我是nocheck，测试一下新账号\r\n</p>\r\n<p>\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120807/20120807101234_71912.png" alt="" /> \r\n</p>\r\n<br />', '2012-08-07 16:12:43', '2012-08-07 16:13:11', 4, 0);
INSERT INTO `tc_article` (`tc_id`, `tc_reid`, `tc_art_author`, `tc_art_title`, `tc_art_type`, `tc_art_content`, `tc_sent_time`, `tc_modify_time`, `tc_read_count`, `tc_comment_count`) VALUES
(105, 0, 'second', '我是second，测试一下新账号', 5, '我是second，测试一下新账号我是second，测试一下新账号我是second，测试一下新账号我是second，测试一下新账号...<br />', '2012-08-07 21:04:18', '2012-08-07 21:12:34', 24, 6),
(106, 105, 'second', 'RE:我是second，测试一下新账号', 5, '没有验证码真好///<br />', '2012-08-07 21:31:48', '0000-00-00 00:00:00', 0, 0),
(107, 105, 'second', 'RE:我是second，测试一下新账号', 5, '有验证码也没什么不好的。。。<br />', '2012-08-07 21:32:22', '0000-00-00 00:00:00', 0, 0),
(108, 105, 'second', 'RE:我是second，测试一下新账号', 5, '神奇的15s11111<br />', '2012-08-07 21:35:20', '0000-00-00 00:00:00', 0, 0),
(109, 105, 'second', 'RE:我是second，测试一下新账号', 5, '神奇的15s11111<br />', '2012-08-07 21:35:52', '0000-00-00 00:00:00', 0, 0),
(110, 105, 'second', 'RE:我是second，测试一下新账号', 5, '<span>神奇的15s11111</span>2222<br />', '2012-08-07 21:37:12', '0000-00-00 00:00:00', 0, 0),
(111, 105, 'second', 'RE:我是second，测试一下新账号', 5, '<span>神奇的15s11111</span>2222<span>神奇的15s11111</span>2222DDD<br />', '2012-08-07 21:37:30', '0000-00-00 00:00:00', 0, 0),
(112, 0, 'second', '再看看限时发帖。。。', 12, '再看看限时发帖。。。再看看限时发帖。。。再看看限时发帖。。。再看看限时发帖。。。<br />', '2012-08-07 21:46:04', '0000-00-00 00:00:00', 1, 0),
(113, 0, 'second', '再看看限时发帖。。。2再看看限时发帖。。。2', 7, '再看看限时发帖。。。2再看看限时发帖。。。2再看看限时发帖。。。2再看看限时发帖。。。2再看看限时发帖。。。2<br />', '2012-08-07 21:46:38', '0000-00-00 00:00:00', 2698, 1),
(114, 70, 'second', 'RE:罗宾来发终极帖子了。。。测试修改帖子。。。', 11, '........<br />', '2012-08-07 22:31:08', '0000-00-00 00:00:00', 0, 0),
(115, 113, '罗宾', 'RE:再看看限时发帖。。。2再看看限时发帖。。。2', 7, '.................', '2012-08-16 14:39:01', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_dir`
--

CREATE TABLE IF NOT EXISTS `tc_dir` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_dir_name` varchar(50) NOT NULL COMMENT '//相册目录名称',
  `tc_dir_path` varchar(200) NOT NULL COMMENT '//相册路径',
  `tc_dir_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '//相册目录类型',
  `tc_dir_pass` char(32) DEFAULT NULL COMMENT '//相册目录密码',
  `tc_dir_face` varchar(255) NOT NULL COMMENT '//相册封面',
  `tc_dir_content` varchar(100) DEFAULT NULL COMMENT '//相册目录描述',
  `tc_dir_time` datetime NOT NULL COMMENT '//相册创建时间',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tc_dir`
--

INSERT INTO `tc_dir` (`tc_id`, `tc_dir_name`, `tc_dir_path`, `tc_dir_type`, `tc_dir_pass`, `tc_dir_face`, `tc_dir_content`, `tc_dir_time`) VALUES
(1, 'my first photo', 'photo/1344865452', 0, 'e10adc3949ba59abbe56e057f20f883e', 'http://tp2.sinaimg.cn/2053695357/50/5627979618/1', 'my first photo', '2012-08-13 21:44:12'),
(2, 'my second photo', 'photo/1344865651', 1, '', 'suolv/chinajoy.jpg', 'my second photo', '2012-08-13 21:47:31'),
(3, '这是第三个相册..', 'photo/1344865858', 0, 'e10adc3949ba59abbe56e057f20f883e', 'suolv/chinajoy.jpg', '这是第三个相册..222', '2012-08-13 21:50:58'),
(4, '12345678', 'photo/1344923460', 0, 'e10adc3949ba59abbe56e057f20f883e', 'suolv/moshou.jpg', '', '2012-08-14 13:51:01');

-- --------------------------------------------------------

--
-- 表的结构 `tc_flower`
--

CREATE TABLE IF NOT EXISTS `tc_flower` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_to_user` varchar(20) NOT NULL COMMENT '//收花人',
  `tc_from_user` varchar(20) NOT NULL COMMENT '//送花人',
  `tc_content` varchar(200) NOT NULL COMMENT '//送花留言',
  `tc_sent_time` datetime NOT NULL COMMENT '//送花时间',
  `tc_flower_count` int(11) NOT NULL COMMENT '//送花数目',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tc_flower`
--

INSERT INTO `tc_flower` (`tc_id`, `tc_to_user`, `tc_from_user`, `tc_content`, `tc_sent_time`, `tc_flower_count`) VALUES
(1, 'fulanji', '罗宾', '给你送花了..', '2012-07-17 19:05:56', 19),
(2, '罗宾', 'fulanji', '', '2012-07-17 19:32:58', 50),
(4, '罗宾', 'fulanji', '罗宾罗宾罗宾罗宾', '2012-07-17 19:33:32', 20),
(5, 'buluke', '罗宾', '朋友,我给你送花了', '2012-07-17 19:49:53', 50),
(6, 'buluke', '罗宾', '你好,布鲁克..', '2012-07-17 19:50:18', 50),
(7, 'buluke', '罗宾', '朋友,我给你送花了', '2012-07-17 19:50:48', 50),
(8, '罗宾', 'nocheck', '朋友,我给你送花了', '2012-08-07 17:07:46', 50),
(9, '罗宾', 'nocheck', '朋友,我给你送花了', '2012-08-07 17:08:38', 10),
(10, '罗宾', 'second', '朋友,我给你送花了', '2012-08-07 21:15:23', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tc_friend`
--

CREATE TABLE IF NOT EXISTS `tc_friend` (
  `tc_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_to_user` varchar(20) NOT NULL COMMENT '//加为好友',
  `tc_from_user` varchar(20) NOT NULL COMMENT '//被加为好友',
  `tc_content` varchar(50) NOT NULL COMMENT '//验证内容',
  `tc_friend_time` datetime NOT NULL COMMENT '//加为好友的日期',
  `tc_friend_state` int(1) NOT NULL DEFAULT '0' COMMENT '//加为好友的状态 0为未验证 1为已验证',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `tc_friend`
--

INSERT INTO `tc_friend` (`tc_id`, `tc_to_user`, `tc_from_user`, `tc_content`, `tc_friend_time`, `tc_friend_state`) VALUES
(1, 'fulanji', '罗宾', '交个朋友吧!', '2012-07-13 19:35:28', 0),
(2, 'buluke', '罗宾', '交个朋友吧!', '2012-07-13 19:45:24', 0),
(3, 'buluke', 'fulanji', '交个朋友吧!', '2012-07-13 19:47:18', 0),
(4, '罗宾', '鸣人', '交个朋友吧!鸣人鸣人鸣人鸣人鸣人鸣人鸣人鸣人鸣人鸣人鸣人鸣人鸣人', '2012-07-17 14:31:05', 1),
(5, 'buluke', '鸣人', '交个朋友吧!鸣人鸣人', '2012-07-17 14:31:19', 0),
(6, '罗宾', '宁次', '交个朋友吧!宁次宁次宁次宁次宁次', '2012-07-17 14:31:49', 0),
(7, 'sanji', '罗宾', '我要和你做个朋友,可以么！', '2012-07-17 14:32:30', 1),
(8, 'evillove520', '罗宾', '交个朋友吧!', '2012-07-17 14:32:38', 0),
(9, '我是海评', '罗宾', '交个朋友吧!', '2012-07-17 14:33:21', 0),
(10, 'wosuopu', '罗宾', '交个朋友吧!', '2012-07-17 14:33:31', 1),
(11, '罗宾', 'luffy', '交个朋友吧!luffy', '2012-07-17 15:10:39', 1),
(12, 'second', '罗宾', '交个朋友吧!', '2012-07-18 21:26:26', 0),
(13, 'ceshixml', 'seven', '交个朋友吧!', '2012-07-30 21:58:25', 0),
(14, '罗宾', 'nocheck', '交个朋友吧!', '2012-08-07 16:57:36', 1),
(15, 'testxml', 'nocheck', '交个朋友吧!', '2012-08-07 16:58:19', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_message`
--

CREATE TABLE IF NOT EXISTS `tc_message` (
  `tc_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_to_user` varchar(20) NOT NULL COMMENT '//收件人',
  `tc_from_user` varchar(20) NOT NULL COMMENT '//发件人',
  `tc_content` varchar(200) NOT NULL COMMENT '//发件内容',
  `tc_sent_time` datetime NOT NULL COMMENT '//发件时间',
  `tc_state` int(1) NOT NULL COMMENT '//消息状态 0未读 1已读',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `tc_message`
--

INSERT INTO `tc_message` (`tc_id`, `tc_to_user`, `tc_from_user`, `tc_content`, `tc_sent_time`, `tc_state`) VALUES
(5, '鸣人', '我是好人', '''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消息发送成功!''''消', '2012-07-11 17:08:20', 0),
(6, '罗宾', 'namei', '罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试罗宾，你好,这是一个测试', '2012-07-11 22:09:22', 1),
(10, '鸣人', 'buluke', '加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好TO:鸣人TO:鸣人TO:鸣人加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为好加为', '2012-07-11 22:12:09', 0),
(17, '罗宾', '海贼王', '跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..跟我一起出航吧,我是要当海贼王的男人..', '2012-07-11 22:17:38', 1),
(19, '罗宾', '鸣人', 'linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习linux下c语言学习li', '2012-07-12 20:57:14', 1),
(20, '罗宾', '罗宾', 'TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾', '2012-07-13 13:27:07', 1),
(21, '罗宾', '罗宾', '版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©anshao.net版权所有 ©an', '2012-07-13 13:27:37', 1),
(22, '罗宾', '罗宾', '我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一个多用户内容管理系统我的第一', '2012-07-13 13:28:18', 1),
(23, '罗宾', '罗宾', '本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:0.00186s本页面执行耗时:', '2012-07-13 13:29:19', 1),
(24, '罗宾', '罗宾', '罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息罗宾给自己发消息', '2012-07-13 14:43:26', 0),
(25, '<', 'fulanji', 'DFADFADFADFZCVZASFA', '2012-07-13 14:51:45', 0),
(26, '罗宾', 'fulanji', 'fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulanji是变态的机器人，fulan', '2012-07-13 14:53:46', 1),
(27, 'fulanji', '罗宾', '你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬你是基佬,你真的是基佬,你还真的是基佬', '2012-07-13 15:21:54', 1),
(28, '罗宾', '罗宾', '我给自己发一条消息我给自己发一条消息我给自己发一条消息我给自己发一条消息我给自己发一条消息我给自己发一条消息我给自己发一条消息我给自己发一条消息', '2012-07-13 18:59:42', 0),
(29, '罗宾', '罗宾', '这是一个测试,虽然很是简单,但是依然有BUG，，，', '2012-07-13 19:04:12', 0),
(30, '罗宾', 'fulanji', '我已经添加你为好友,请你验证', '2012-07-13 19:48:10', 1),
(31, 'testxml', '罗宾', 'XML,XLM，测试XML。。。', '2012-07-18 21:21:52', 0),
(32, '没有xml', 'second', '哈哈...', '2012-07-26 17:16:48', 0),
(33, '罗宾', 'second', '你好啊。。顶你的帖子了。。', '2012-07-26 17:17:38', 1),
(34, '罗宾', 'nocheck', '你好阿。。我想跟你作个朋友,不知道可不可以呢。。。', '2012-08-07 17:18:44', 1),
(35, '罗宾', 'nocheck', 'TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾TO:罗宾', '2012-08-07 17:19:38', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_photo`
--

CREATE TABLE IF NOT EXISTS `tc_photo` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_pid` int(11) NOT NULL COMMENT '//相册ID',
  `tc_photo_name` varchar(50) NOT NULL COMMENT '//相片名称',
  `tc_photo_content` varchar(200) NOT NULL COMMENT '//相片描述',
  `tc_photo_path` varchar(255) NOT NULL COMMENT '//相片全路径',
  `tc_photo_time` datetime NOT NULL COMMENT '//相片上传时间',
  `tc_photo_username` varchar(50) NOT NULL COMMENT '//相片上传者',
  `tc_read_count` int(11) NOT NULL COMMENT '//相片阅读数',
  `tc_comment_count` int(11) NOT NULL COMMENT '//相片评论数',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `tc_photo`
--

INSERT INTO `tc_photo` (`tc_id`, `tc_pid`, `tc_photo_name`, `tc_photo_content`, `tc_photo_path`, `tc_photo_time`, `tc_photo_username`, `tc_read_count`, `tc_comment_count`) VALUES
(2, 1, '这次可以成功了', '这次可以成功了', 'photo/1344865452/2012081507374572.jpg', '2012-08-15 07:37:45', '罗宾', 24, 0),
(3, 2, 'ubuntu桌面背景', '漂亮的桌面背景', 'photo/1344865651/2012081507423019.jpg', '2012-08-15 07:42:30', '罗宾', 4, 0),
(4, 2, '漂亮的桌面背景', '漂亮的桌面背景', 'photo/1344865651/2012081507433181.jpg', '2012-08-15 07:43:31', '罗宾', 1, 0),
(5, 3, '桌面', '第三个相册', 'photo/1344865858/2012081508454540.jpg', '2012-08-15 08:45:45', '罗宾', 13, 1),
(7, 2, '手机图片1', '手机图片', 'photo/1344865651/2012081513315685.png', '2012-08-15 13:31:56', 'second', 105, 0),
(8, 2, '第二个相册', '第二个相册', 'photo/1344865651/2012081515553642.jpg', '2012-08-15 15:55:36', '罗宾', 3, 0),
(9, 2, '第二个相册', '第二个相册', 'photo/1344865651/2012081515555959.jpg', '2012-08-15 15:55:59', '罗宾', 3, 0),
(10, 2, 'gnome shell', 'gnome shell', 'photo/1344865651/2012081515563991.png', '2012-08-15 15:56:39', '罗宾', 3, 0),
(11, 2, 'gnome shell', 'gnome shell', 'photo/1344865651/2012081515572158.png', '2012-08-15 15:57:21', '罗宾', 3, 0),
(12, 2, 'gnome shell', 'gnome shell', 'photo/1344865651/2012081515575598.png', '2012-08-15 15:57:55', '罗宾', 68, 6),
(13, 2, '桌面壁纸', '桌面壁纸', 'photo/1344865651/2012081515582352.jpg', '2012-08-15 15:58:23', '罗宾', 10, 0),
(14, 2, '桌面壁纸', '桌面壁纸', 'photo/1344865651/2012081515584632.jpg', '2012-08-15 15:58:46', '罗宾', 4, 0),
(15, 2, '桌面壁纸', '桌面壁纸', 'photo/1344865651/2012081515590312.jpg', '2012-08-15 15:59:03', '罗宾', 8, 0),
(16, 4, '桌面壁纸', '桌面壁纸', 'photo/1344923460/2012081516024944.jpg', '2012-08-15 16:02:49', '罗宾', 8, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tc_photo_comment`
--

CREATE TABLE IF NOT EXISTS `tc_photo_comment` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_pid` int(11) NOT NULL COMMENT '//相片ID',
  `tc_comment_user` varchar(30) NOT NULL COMMENT '//评论人',
  `tc_comment_content` text NOT NULL COMMENT '//评论内容',
  `tc_comment_name` varchar(50) NOT NULL COMMENT '//相片名称',
  `tc_comment_time` datetime NOT NULL COMMENT '//评论时间',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `tc_photo_comment`
--

INSERT INTO `tc_photo_comment` (`tc_id`, `tc_pid`, `tc_comment_user`, `tc_comment_content`, `tc_comment_name`, `tc_comment_time`) VALUES
(1, 12, '罗宾', '自己给的第一条评论....<img src="http://localhost/sevenphp/1/cms/editor/plugins/emoticons/images/0.gif" border="0" alt="" />', 'RE:gnome shell', '2012-08-16 21:02:09'),
(2, 12, '罗宾', 'ddddd', 'RE:gnome shell', '2012-08-16 21:02:27'),
(3, 12, '罗宾', 'ddddd', 'RE:gnome shell', '2012-08-16 21:02:43'),
(4, 12, 'second', '真是纠结的大V<br />', 'RE:gnome shell', '2012-08-16 21:04:50'),
(5, 5, '罗宾', '111111111111', 'RE:桌面', '2012-08-16 21:16:45'),
(6, 12, '罗宾', '听说小米要逆天了..', 'RE:gnome shell', '2012-08-16 21:50:41'),
(7, 12, '罗宾', 'MX情何以堪..', 'RE:gnome shell', '2012-08-16 21:51:15'),
(8, 17, 'seven', 'xxxxx', 'RE:1234567', '2012-08-16 22:19:56');

-- --------------------------------------------------------

--
-- 表的结构 `tc_system`
--

CREATE TABLE IF NOT EXISTS `tc_system` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_change_code` int(11) NOT NULL DEFAULT '1' COMMENT '//是否启用验证码',
  `tc_change_blog` int(2) NOT NULL COMMENT '//blog分页',
  `tc_change_style` int(1) NOT NULL COMMENT '//样式编号',
  `tc_change_photo` int(2) NOT NULL COMMENT '//相册数据',
  `tc_change_title` varchar(50) NOT NULL COMMENT '//网站标题',
  `tc_change_reg` int(11) NOT NULL DEFAULT '1' COMMENT '//是否开放注册',
  `tc_change_post` int(11) NOT NULL COMMENT '//发贴限时',
  `tc_change_re` int(11) NOT NULL COMMENT '//回复限时',
  `tc_change_art` int(11) NOT NULL COMMENT '//文章分页',
  `tc_change_content` varchar(100) NOT NULL DEFAULT '你妈的|TMD|SB|2B|去死吧|胡锦涛|老毛|操|' COMMENT '//屏蔽内容',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tc_system`
--

INSERT INTO `tc_system` (`tc_id`, `tc_change_code`, `tc_change_blog`, `tc_change_style`, `tc_change_photo`, `tc_change_title`, `tc_change_reg`, `tc_change_post`, `tc_change_re`, `tc_change_art`, `tc_change_content`) VALUES
(1, 0, 15, 2, 8, '多用户留言板(anshao.net)', 1, 60, 15, 13, '你妈的|TMD|SB|2B|去死吧|胡锦涛|老毛|操sss');

-- --------------------------------------------------------

--
-- 表的结构 `tc_user`
--

CREATE TABLE IF NOT EXISTS `tc_user` (
  `tc_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `tc_uniqid` char(32) NOT NULL COMMENT '//验证登录唯一标识符',
  `tc_active` char(32) NOT NULL COMMENT '//激活账户唯一标识符',
  `tc_username` varchar(20) NOT NULL COMMENT '//用户名',
  `tc_password` char(32) NOT NULL COMMENT '//密码',
  `tc_question` varchar(20) NOT NULL COMMENT '//密码提示',
  `tc_answer` char(32) NOT NULL COMMENT '//密码回答',
  `tc_email` varchar(25) NOT NULL COMMENT '//邮箱',
  `tc_qq` varchar(10) DEFAULT NULL COMMENT '//QQ',
  `tc_site` varchar(25) DEFAULT NULL COMMENT '//个人主页',
  `tc_sex` char(1) NOT NULL COMMENT '//性别',
  `tc_face` char(12) NOT NULL COMMENT '//头像',
  `tc_switch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//个人签名开关',
  `tc_sign` varchar(200) DEFAULT NULL COMMENT '//个人签名内容',
  `tc_level` tinyint(1) NOT NULL COMMENT '//用户级别 0普通用户 1管理员',
  `tc_reg_time` datetime NOT NULL COMMENT '//注册时间',
  `tc_last_time` datetime NOT NULL COMMENT '//最后登录时间',
  `tc_re_time` int(11) NOT NULL COMMENT '//最后发表回复的时间戳',
  `tc_photo_re_time` int(11) NOT NULL COMMENT '//评论相片时间戳',
  `tc_post_time` int(11) NOT NULL COMMENT '//最后发表文章的时间戳',
  `tc_last_ip` varchar(15) NOT NULL COMMENT '//最后登陆IP',
  `tc_login_count` smallint(5) unsigned NOT NULL COMMENT '//用户登录次数',
  PRIMARY KEY (`tc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `tc_user`
--

INSERT INTO `tc_user` (`tc_id`, `tc_uniqid`, `tc_active`, `tc_username`, `tc_password`, `tc_question`, `tc_answer`, `tc_email`, `tc_qq`, `tc_site`, `tc_sex`, `tc_face`, `tc_switch`, `tc_sign`, `tc_level`, `tc_reg_time`, `tc_last_time`, `tc_re_time`, `tc_photo_re_time`, `tc_post_time`, `tc_last_ip`, `tc_login_count`) VALUES
(23, '6de703a6842e0dce476a384f8bd99abb', '', 'namei', 'e10adc3949ba59abbe56e057f20f883e', 'namei', 'e10adc3949ba59abbe56e057f20f883e', 'namei@sina.com', '', '', '女', 'face/m30.gif', 0, NULL, 0, '2012-07-01 09:50:17', '2012-07-11 23:33:34', 0, 0, 0, '127.0.0.1', 2),
(22, 'a07659e5a49a363210407511c5708eed', '', 'luffy', 'e10adc3949ba59abbe56e057f20f883e', 'luffy', 'e10adc3949ba59abbe56e057f20f883e', 'luffy@anshao.net', '122828409', 'http://luffy.anshao.net', '男', 'face/m09.gif', 1, '密码提示的答案是123456', 0, '2012-07-01 09:49:34', '2012-07-17 15:10:27', 0, 0, 0, '127.0.0.1', 1),
(20, 'f7b22998ebf7b771923c043d4fd7e462', '', '我是坏人', '9d01be2d83f25610dbcb051db74e69d9', '你是谁', '9a272bac4703b5744fd30d1338c5670f', 'huairen@sina.com', '12345677', 'http://haohuai.com', '男', 'face/m12.gif', 0, NULL, 0, '2012-06-29 21:51:13', '2012-06-29 21:51:13', 0, 0, 0, '127.0.0.1', 0),
(19, '57bd230ea83171bbcd0419521498f972', '', 'dreamk400', 'c83b2d5bb1fb4d93d9d064593ed6eea2', '我的答案是什么', '14f99921d9c1a0f8613d68e0d6774cc9', 'dreamk400@sina.com', '3535674', 'http://dreamk400.sina.com', '男', 'face/m30.gif', 0, '', 0, '2012-06-29 11:22:42', '2012-06-29 11:22:42', 0, 0, 0, '127.0.0.1', 0),
(18, '69b10e2ee2c9a0bd8a32e74e5d5b37ce', '', 'evillove520', 'e10adc3949ba59abbe56e057f20f883e', 'evillove', 'e10adc3949ba59abbe56e057f20f883e', '630191204@qq.com', '', '', '女', 'face/m11.gif', 0, '', 1, '2012-06-29 11:13:57', '2012-06-29 11:13:57', 0, 0, 0, '127.0.0.1', 0),
(17, '56eb64a7797c8a45af7ce9116f02d5ce', '', 'ihaiping', '9d01be2d83f25610dbcb051db74e69d9', '海评', 'a3eaa3435a3cb9ba68a8a654bdd68f4d', 'haiping@sina.com', '476782788', 'http://haiping.sina.com', '女', 'face/m06.gif', 0, NULL, 1, '2012-06-29 11:05:06', '2012-08-09 23:30:15', 0, 0, 0, '127.0.0.1', 1),
(24, '58111271fea4fabb4eb915e604ac1741', '', 'zoro', 'e10adc3949ba59abbe56e057f20f883e', 'zoro', 'e10adc3949ba59abbe56e057f20f883e', 'zoro@sina.com', '', '', '男', 'face/m29.gif', 0, NULL, 0, '2012-07-01 09:51:17', '2012-07-01 09:51:17', 0, 0, 0, '127.0.0.1', 0),
(25, '9f90f8764e43d664974b857b56977652', '', 'sanji', 'e10adc3949ba59abbe56e057f20f883e', 'sanji', 'e10adc3949ba59abbe56e057f20f883e', 'sanji@sina.com', '', '', '男', 'face/m48.gif', 0, NULL, 0, '2012-07-01 09:52:22', '2012-07-01 09:52:22', 0, 0, 0, '127.0.0.1', 0),
(26, '4c16e22c2de44c966872c36eca8d4517', '', 'wosuopu', 'e10adc3949ba59abbe56e057f20f883e', 'wosuopu', 'e10adc3949ba59abbe56e057f20f883e', 'wosuopu@sina.com', '', '', '男', 'face/m24.gif', 0, NULL, 0, '2012-07-01 09:54:35', '2012-07-01 09:54:35', 0, 0, 0, '127.0.0.1', 0),
(27, '541715d12c2f41d6fe51609cd945276e', '', 'qiaoba', 'e10adc3949ba59abbe56e057f20f883e', 'qiaoba', 'e10adc3949ba59abbe56e057f20f883e', 'qiaoba@sian.com', '', '', '女', 'face/m32.gif', 0, NULL, 0, '2012-07-01 09:58:44', '2012-07-01 09:58:44', 0, 0, 0, '127.0.0.1', 0),
(28, 'f7e4515d51c41aeb1b72a6592a5c7806', '', '海贼王', 'e10adc3949ba59abbe56e057f20f883e', '海贼王', 'e10adc3949ba59abbe56e057f20f883e', 'haizeiw@sian.com', '', '', '男', 'face/m37.gif', 0, NULL, 0, '2012-07-01 10:58:19', '2012-07-11 22:16:55', 0, 0, 0, '127.0.0.1', 1),
(29, '0fc49a4b15df2084ae2d1da02a111d8a', '', '鸣人', 'e10adc3949ba59abbe56e057f20f883e', '鸣人', 'e10adc3949ba59abbe56e057f20f883e', 'mingren@sina.com', '', 'http://mingren.sina.com', '男', 'face/m07.gif', 0, NULL, 0, '2012-07-01 10:59:27', '2012-07-17 14:30:49', 0, 0, 0, '127.0.0.1', 2),
(30, 'eddae3fbb541d940b0c9ce917c077a9b', '', '佐助', 'e10adc3949ba59abbe56e057f20f883e', '佐助', 'e10adc3949ba59abbe56e057f20f883e', 'zuozhu@sina.com', '', 'http://zuozhu.sina.com', '男', 'face/m55.gif', 0, NULL, 0, '2012-07-01 11:00:26', '2012-07-01 11:00:26', 0, 0, 0, '127.0.0.1', 0),
(31, 'd6afbebe39e17c88a30757f3576168cf', '', 'xiaoyin', 'e10adc3949ba59abbe56e057f20f883e', 'xiaoyin', 'e10adc3949ba59abbe56e057f20f883e', 'xiaoyin@sian.com', '', '', '女', 'face/m51.gif', 0, NULL, 0, '2012-07-01 11:01:40', '2012-07-01 11:01:40', 0, 0, 0, '127.0.0.1', 0),
(32, 'bbbbd329e4bf2f65d4b6e58df903bea6', '', '宁次', 'e10adc3949ba59abbe56e057f20f883e', 'ningci', 'e10adc3949ba59abbe56e057f20f883e', 'ningci@sina.com', '', '', '男', 'face/m44.gif', 0, NULL, 0, '2012-07-01 11:02:19', '2012-07-17 14:31:39', 0, 0, 0, '127.0.0.1', 1),
(33, 'a808fb437be013ac6605c7881d9127b5', '', 'luwan', 'e10adc3949ba59abbe56e057f20f883e', 'luwan', 'e10adc3949ba59abbe56e057f20f883e', 'luwan@sian.com', '', 'http://luwan.sian.com', '男', 'face/m35.gif', 0, NULL, 0, '2012-07-01 11:03:03', '2012-07-11 22:09:59', 0, 0, 0, '127.0.0.1', 1),
(34, '857166c35eb943267e9f1ca31a2430a2', '', 'buluke', 'e10adc3949ba59abbe56e057f20f883e', 'buluke', 'e10adc3949ba59abbe56e057f20f883e', 'buluke@sian.com', '', '', '男', 'face/m46.gif', 0, NULL, 0, '2012-07-01 11:03:45', '2012-07-24 12:12:37', 0, 0, 0, '127.0.0.1', 2),
(35, '1b4d2031ea51a163565ea7b6d7ccf5c6', '', 'fulanji', 'e10adc3949ba59abbe56e057f20f883e', 'fulanji', 'e10adc3949ba59abbe56e057f20f883e', 'fulanji@sian.com', '', '', '男', 'face/m61.gif', 0, NULL, 0, '2012-07-01 11:05:01', '2012-07-17 19:32:25', 0, 0, 0, '127.0.0.1', 6),
(36, '1d1224868d6ea5d4a8c6562fd8b7c59b', '', '罗宾', 'e10adc3949ba59abbe56e057f20f883e', 'luobin', '14e1b600b1fd579f47433b88e8d85291', 'luobin@anshao.net', '', '', '男', 'face/m09.gif', 0, '', 1, '2012-07-01 11:06:11', '2012-08-29 10:18:31', 1345099142, 1345125075, 0, '127.0.0.1', 57),
(37, '62fd40c3b73cbe9391b9abc71f3045dc', '', '我不是好人', 'e10adc3949ba59abbe56e057f20f883e', '我不是好人', 'e10adc3949ba59abbe56e057f20f883e', 'bushihaoren@sian.com', '', '', '男', 'face/m02.gif', 0, NULL, 0, '2012-07-01 11:07:22', '2012-07-01 11:07:22', 0, 0, 0, '127.0.0.1', 0),
(38, '8effef357dfbde0ded7162f43fd3c6a8', '', '测试XML', 'e10adc3949ba59abbe56e057f20f883e', '你是谁', '469d1ab78cb139e209169464abf419c6', 'xml@sina.com.cn', '1008611', 'http://xml.sina.com.cn', '女', 'face/m07.gif', 0, NULL, 0, '2012-07-18 12:51:56', '2012-07-18 12:51:56', 0, 0, 0, '127.0.0.1', 0),
(39, 'b153e8b0ceb181b6330aa6251d427e03', '', 'ceshixml', 'e10adc3949ba59abbe56e057f20f883e', '我是seven', 'e10adc3949ba59abbe56e057f20f883e', 'cesshixml@sina.com', '786543243', 'http://ceshixml.sina.com', '男', 'face/m01.gif', 0, NULL, 0, '2012-07-18 12:53:28', '2012-07-18 12:53:28', 0, 0, 0, '127.0.0.1', 0),
(40, '1c3ab6706a6821921725056f0ba59f5f', '', 'testxml', 'e10adc3949ba59abbe56e057f20f883e', '你是谁', 'e586d0fd6b8e898afa3b640a861eebab', 'textxml@sina.com.cn', '53675785', 'http://textxml.sina.com.c', '女', 'face/m20.gif', 0, NULL, 0, '2012-07-18 19:49:14', '2012-07-18 19:49:14', 0, 0, 0, '127.0.0.1', 0),
(41, 'f80a93a07a127f28803838adef0e4578', '3ee4a547f7b1c9e079c00d11a0b739f1', 'testxml', 'e10adc3949ba59abbe56e057f20f883e', '你是谁', '469d1ab78cb139e209169464abf419c6', 'testxml@sina.com.cn', '12345677', 'http://testxml.sina.com.c', '女', 'face/m11.gif', 0, NULL, 0, '2012-07-18 19:51:35', '2012-07-18 19:51:35', 0, 0, 0, '127.0.0.1', 0),
(42, '', '', 'first', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2bb3f73d51f8f4eed43deba994853a31', '123456@12.com', '65335468', 'http://123456@sina.com', '男', 'face/m09.gif', 0, NULL, 0, '2012-07-18 21:22:45', '2012-07-31 21:14:22', 0, 0, 0, '127.0.0.1', 2),
(43, '6519a2f1a7d2b57c802b753a62116358', '', 'second', 'e10adc3949ba59abbe56e057f20f883e', '654321', 'e10adc3949ba59abbe56e057f20f883e', '654321@sina.com', '8654356', 'http://654321.sina.com', '女', 'face/m32.gif', 1, '<p>\r\n	神一样的存在。。。膜拜吧。。哈哈。。。\r\n</p>\r\n<p>\r\n	<img src="/sevenphp/1/cms/editor/attached/image/20120802/20120802164329_26702.jpg" alt="" />\r\n</p>', 0, '2012-07-18 21:25:45', '2012-08-22 14:33:31', 1344349868, 1345122290, 1344347198, '127.0.0.1', 15),
(44, '6ae0a2bed8d1b4cf6c311feeb61696bd', '', '没有xml', 'e10adc3949ba59abbe56e057f20f883e', '我是seven', 'e10adc3949ba59abbe56e057f20f883e', 'xml@sin.com.org', '548884356', 'http://xml.sin.com.org', '女', 'face/m15.gif', 0, NULL, 0, '2012-07-19 23:51:16', '2012-07-19 23:51:16', 0, 0, 0, '127.0.0.1', 0),
(45, '79193baf816e2b8b4393d0478728ecdf', '', '功能完整', 'e10adc3949ba59abbe56e057f20f883e', 'luobin', 'fcea920f7412b5da7be0cf42b8c93759', 'gongneng@sian.com', '8586843', 'http://gongneng.sian.com', '女', 'face/m16.gif', 0, NULL, 0, '2012-07-25 00:22:33', '2012-07-25 00:22:55', 0, 0, 0, '127.0.0.1', 1),
(46, 'f8cd599159c438d66827327cec79dc93', '', 'anshao', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'fcea920f7412b5da7be0cf42b8c93759', 'anshao@anshao.net', '35354674', 'http://anshao.net', '男', 'face/m05.gif', 0, NULL, 0, '2012-07-26 20:59:06', '2012-07-31 21:23:16', 0, 0, 0, '127.0.0.1', 2),
(47, 'c63c066b9b803b710a813f104c40a333', '', 'hello', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'fcea920f7412b5da7be0cf42b8c93759', 'hello@sina.com', '', '', '男', 'face/m03.gif', 0, NULL, 0, '2012-07-26 21:13:21', '2012-07-26 21:13:21', 0, 0, 0, '127.0.0.1', 0),
(48, '0f51255c57d8bd39675fab06f5d84b4b', '', 'world', 'e10adc3949ba59abbe56e057f20f883e', '542423', '98a09a93454205cac12cd99550295e91', 'world@anshao.net', '', '', '女', 'face/m07.gif', 0, NULL, 0, '2012-07-26 21:17:00', '2012-07-26 21:17:00', 0, 0, 0, '127.0.0.1', 0),
(49, '093f3a60744c0322f53e82cf6ec7a6e8', '', 'four', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'fcea920f7412b5da7be0cf42b8c93759', 'four@sian.com', '1231314', 'http://four.sina.com', '男', 'face/m23.gif', 0, NULL, 0, '2012-07-28 21:46:51', '2012-07-31 21:19:09', 0, 0, 0, '127.0.0.1', 1),
(50, 'b09ef1068c0f17a68298e9e71c5160b7', '', 'five', 'e10adc3949ba59abbe56e057f20f883e', '12345', 'ff35d6575ad33d18e5615d8fc76df9e0', 'five@sina.com', '684806', 'http://five.sina.com', '男', 'face/m01.gif', 0, NULL, 0, '2012-07-28 21:50:39', '2012-07-31 21:11:28', 0, 0, 0, '127.0.0.1', 1),
(51, 'ac0a83ab62a47941e8b5949715b044df', '', 'six', 'e10adc3949ba59abbe56e057f20f883e', '546644', 'fcea920f7412b5da7be0cf42b8c93759', 'six@sina.com', '6654996', 'http://six.sian.com', '女', 'face/m06.gif', 0, NULL, 0, '2012-07-28 21:52:56', '2012-07-31 21:06:20', 0, 0, 0, '127.0.0.1', 1),
(52, 'e834a6c98cd6d420831dd7e984266c41', '', 'seven', 'e10adc3949ba59abbe56e057f20f883e', 'shao520', 'e10adc3949ba59abbe56e057f20f883e', 'seven@anshao.net', '', '', '男', 'face/m15.gif', 1, 'dddddddddddddddddddddddddddddddddddd', 1, '2012-07-30 13:04:31', '2012-08-16 22:10:56', 1344043716, 1345126796, 1344043291, '127.0.0.1', 21),
(53, '31bbb38f43fd76ccb8c1f1872fcc74d0', '', 'tubeor', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'c33367701511b4f6020ec61ded352059', 'tubeor@sina.com', '', 'http://tubeor.com', '女', 'face/m03.gif', 0, NULL, 0, '2012-08-07 15:29:23', '2012-08-07 15:36:13', 0, 0, 0, '127.0.0.1', 2),
(54, '63b864cb3e11e52242cdd554cb7df5f5', '', 'nocheck', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'c33367701511b4f6020ec61ded352059', 'nocheck@sian.com', '467856543', 'http://nocheck.com', '男', 'face/m01.gif', 0, NULL, 0, '2012-08-07 16:11:22', '2012-08-07 20:59:20', 0, 0, 1344327163, '127.0.0.1', 3);

-- --------------------------------------------------------

--
-- 表的结构 `test_content`
--

CREATE TABLE IF NOT EXISTS `test_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '//自动编号',
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `test_content`
--

INSERT INTO `test_content` (`id`, `content`) VALUES
(1, '<p style="text-align:center;">\r\n	<strong><span style="font-size:18px;">这是我测试编辑器用的页面</span></strong> \r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; 呵呵,不知道好不好用呢！\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&n'),
(2, '<h2 style="font-size:20px;color:#3E4349;background-color:#FFFFFF;">\r\n	3. 修改HTML页面<a href="http://www.kindsoft.net/docs/usage.html#html"></a> \r\n</h2>\r\n<ol style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<li>\r\n		在需要显示编辑器的位置添加textarea输入框。\r\n	</li>\r\n</ol>\r\n<div style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<div style="background-color:white;">\r\n<pre><span style="color:#004461;font-weight:bold;">&lt;textarea</span> <span style="color:#C4A000;">id=</span><span style="color:#4E9A06;">"editor_id"</span> <span style="color:#C4A000;">name=</span><span style="color:#4E9A06;">"content"</span> <span style="color:#C4A000;">style=</span><span style="color:#4E9A06;">"width:700px;height:300px;"</span><span style="color:#004461;font-weight:bold;">&gt;</span> <span style="color:#CE5C00;">&amp;lt;</span>strong<span style="color:#CE5C00;">&amp;gt;</span>HTML内容<span style="color:#CE5C00;">&amp;lt;</span>/strong<span style="color:#CE5C00;">&amp;gt;</span> <span style="color:#004461;font-weight:bold;">&lt;/textarea&gt;</span> </pre>\r\n	</div>\r\n</div>\r\n<div style="margin:20px 0px;padding:10px;background-color:#FAFAFA;border:1px solid #CCCCCC;color:#3E4349;font-size:14px;">\r\n	<p style="font-size:18px;">\r\n		Note\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			id在当前页面必须是唯一的值。\r\n		</li>\r\n		<li>\r\n			在textarea里设置HTML内容即可实现编辑，在这里需要注意的是，如果从服务器端程序(ASP、PHP、ASP.NET等)直接显示内容，则必须转换HTML特殊字符(&gt;,&lt;,&amp;,”)。具体请参考各语言目录下面的demo.xxx程序，目前支持ASP、ASP.NET、PHP、JSP。\r\n		</li>\r\n		<li>\r\n			在有些浏览器上不设宽度和高度可能显示有问题，所以最好设一下宽度和高度。宽度和高度可用inline样式设置，也可用&nbsp;<a href="http://www.kindsoft.net/docs/option.html"><em>编辑器初始化参数</em></a>&nbsp;设置。\r\n		</li>\r\n	</ul>\r\n</div>\r\n<ol style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<li>\r\n		在该HTML页面添加以下脚本。\r\n	</li>\r\n</ol>\r\n<div style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<div style="background-color:white;">\r\n<pre><span style="color:#004461;font-weight:bold;">&lt;script </span><span style="color:#C4A000;">charset=</span><span style="color:#4E9A06;">"utf-8"</span> <span style="color:#C4A000;">src=</span><span style="color:#4E9A06;">"/editor/kindeditor.js"</span><span style="color:#004461;font-weight:bold;">&gt;&lt;/script&gt;</span> <span style="color:#004461;font-weight:bold;">&lt;script </span><span style="color:#C4A000;">charset=</span><span style="color:#4E9A06;">"utf-8"</span> <span style="color:#C4A000;">src=</span><span style="color:#4E9A06;">"/editor/lang/zh_CN.js"</span><span style="color:#004461;font-weight:bold;">&gt;&lt;/script&gt;</span> <span style="color:#004461;font-weight:bold;">&lt;script&gt;</span> <span style="color:#004461;font-weight:bold;">var</span> <span style="color:#000000;">editor</span><span style="color:#000000;font-weight:bold;">;</span> <span style="color:#000000;">KindEditor</span><span style="color:#000000;font-weight:bold;">.</span><span style="color:#000000;">ready</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#004461;font-weight:bold;">function</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#000000;">K</span><span style="color:#000000;font-weight:bold;">)</span> <span style="color:#000000;font-weight:bold;">{</span> <span style="color:#000000;">editor</span> <span style="color:#582800;">=</span> <span style="color:#000000;">K</span><span style="color:#000000;font-weight:bold;">.</span><span style="color:#000000;">create</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#4E9A06;">''#editor_id''</span><span style="color:#000000;font-weight:bold;">);</span> <span style="color:#000000;font-weight:bold;">});</span> <span style="color:#004461;font-weight:bold;">&lt;/script&gt;</span> </pre>\r\n	</div>\r\n</div>\r\n<div style="margin:20px 0px;padding:10px;background-color:#FAFAFA;border:1px solid #CCCCCC;color:#3E4349;font-size:14px;">\r\n	<p style="font-size:18px;">\r\n		Note\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			第一个参数可用其它CSS选择器，匹配多个textarea时只在第一个元素上加载编辑器。\r\n		</li>\r\n		<li>\r\n			通过K.create函数的第二个参数，可以对编辑器进行配置，具体参数请参考&nbsp;<a href="http://www.kindsoft.net/docs/option.html"><em>编辑器初始化参数</em></a>&nbsp;。\r\n		</li>\r\n	</ul>\r\n</div>\r\n<img src="/sevenphp/1/cms/editor/attached/image/20120719/20120719124803_18410.jpg" alt="" /><br />'),
(3, '<h2 style="font-size:20px;color:#3E4349;background-color:#FFFFFF;">\r\n	4. 获取HTML数据<a href="http://www.kindsoft.net/docs/usage.html#id4"></a> \r\n</h2>\r\n<div style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<div style="background-color:white;">\r\n<pre><span style="color:#8F5902;font-style:italic;">// 取得HTML内容</span> <span style="color:#000000;">html</span> <span style="color:#582800;">=</span> <span style="color:#000000;">editor</span><span style="color:#000000;font-weight:bold;">.</span><span style="color:#000000;">html</span><span style="color:#000000;font-weight:bold;">();</span> <span style="color:#8F5902;font-style:italic;">// 同步数据后可以直接取得textarea的value</span> <span style="color:#000000;">editor</span><span style="color:#000000;font-weight:bold;">.</span><span style="color:#000000;">sync</span><span style="color:#000000;font-weight:bold;">();</span> <span style="color:#000000;">html</span> <span style="color:#582800;">=</span> <span style="color:#004461;">document</span><span style="color:#000000;font-weight:bold;">.</span><span style="color:#000000;">getElementById</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#4E9A06;">''editor_id''</span><span style="color:#000000;font-weight:bold;">).</span><span style="color:#000000;">value</span><span style="color:#000000;font-weight:bold;">;</span> <span style="color:#8F5902;font-style:italic;">// 原生API</span> <span style="color:#000000;">html</span> <span style="color:#582800;">=</span> <span style="color:#000000;">K</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#4E9A06;">''#editor_id''</span><span style="color:#000000;font-weight:bold;">).</span><span style="color:#000000;">val</span><span style="color:#000000;font-weight:bold;">();</span> <span style="color:#8F5902;font-style:italic;">// KindEditor Node API</span> <span style="color:#000000;">html</span> <span style="color:#582800;">=</span> <span style="color:#000000;">$</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#4E9A06;">''#editor_id''</span><span style="color:#000000;font-weight:bold;">).</span><span style="color:#000000;">val</span><span style="color:#000000;font-weight:bold;">();</span> <span style="color:#8F5902;font-style:italic;">// jQuery</span> <span style="color:#8F5902;font-style:italic;">// 设置HTML内容</span> <span style="color:#000000;">editor</span><span style="color:#000000;font-weight:bold;">.</span><span style="color:#000000;">html</span><span style="color:#000000;font-weight:bold;">(</span><span style="color:#4E9A06;">''HTML内容''</span><span style="color:#000000;font-weight:bold;">);</span> </pre>\r\n	</div>\r\n</div>\r\n<div style="margin:20px 0px;padding:10px;background-color:#FAFAFA;border:1px solid #CCCCCC;color:#3E4349;font-size:14px;">\r\n	<p style="font-size:18px;">\r\n		Note\r\n	</p>\r\n	<ul>\r\n		<li>\r\n			KindEditor的可视化操作在新创建的iframe上执行，代码模式下的textarea框也是新创建的，所以最后提交前需要将HTML数据同步到原来的textarea，editor.sync()函数会完成这个动作。\r\n		</li>\r\n		<li>\r\n			KindEditor在默认情况下自动寻找textarea所属的form元素，找到form后onsubmit事件里添加sync函数，所以用form方式提交数据，不需要手动执行sync()函数。\r\n		</li>\r\n	</ul>\r\n</div>\r\nda<img src="/sevenphp/1/cms/editor/attached/image/20120719/20120719125025_18363.jpg" alt="" />'),
(4, '<h1 style="font-size:24px;color:#3E4349;background-color:#FFFFFF;">\r\n	编辑器使用方法<a href="http://www.kindsoft.net/docs/usage.html#id1"></a> \r\n</h1>\r\n<div style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<h2 style="font-size:20px;">\r\n		1. 下载编辑器<a href="http://www.kindsoft.net/docs/usage.html#id2"></a> \r\n	</h2>\r\n	<p>\r\n		下载 KindEditor 最新版本，下载之后打开 examples/index.html 就可以看到演示。\r\n	</p>\r\n	<p>\r\n		下载页面:&nbsp;<a href="http://www.kindsoft.net/down.php">http://www.kindsoft.net/down.php</a> \r\n	</p>\r\n</div>\r\n<div style="color:#3E4349;font-size:14px;background-color:#FFFFFF;">\r\n	<h2 style="font-size:20px;">\r\n		2. 部署编辑器<a href="http://www.kindsoft.net/docs/usage.html#id3"></a> \r\n	</h2>\r\n	<p>\r\n		解压 kindeditor-x.x.x.zip 文件，将所有文件上传到您的网站程序目录里，例如：http://您的域名/editor/\r\n	</p>\r\n	<div style="margin:20px 0px;padding:10px;background-color:#FAFAFA;border:1px solid #CCCCCC;">\r\n		<p style="font-size:18px;">\r\n			Note\r\n		</p>\r\n		<p>\r\n			您可以根据需求删除以下目录后上传到服务器。\r\n		</p>\r\n		<ul>\r\n			<li>\r\n				asp - ASP程序\r\n			</li>\r\n			<li>\r\n				asp.net - ASP.NET程序\r\n			</li>\r\n			<li>\r\n				php - PHP程序\r\n			</li>\r\n			<li>\r\n				jsp - JSP程序\r\n			</li>\r\n			<li>\r\n				examples - 演示文件\r\n			</li>\r\n		</ul>\r\n	</div>\r\n</div>\r\na<img src="/sevenphp/1/cms/editor/attached/image/20120719/20120719125436_62981.jpg" alt="" />');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
