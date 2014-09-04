<?
$language_menu;
$language_script='';
class gsranasaloter{
		public static function compleate_the_work()
		{
		   $GLOBALS['language_menu2']="<div id=\"translate\">Loading translations&hellip; <img src=\"loader.gif\" alt=\"loading\" /></div>";
		   $GLOBALS['language_script'].="<script type=\"text/javascript\" src=\"jquery.min.js\"></script>";
		   $GLOBALS['language_script'].="<script type=\"text/javascript\" src=\"jquery.translate-1.4.0.min.js\"></script>";
		   $GLOBALS['language_script'].="<script type=\"text/javascript\" src=\"jquery.cookie.min.js\"></script>";
		   $GLOBALS['language_script'].="<script type=\"text/javascript\" src=\"site.min.js\"></script>";
		}
		

}
gsranasaloter::compleate_the_work();
?>