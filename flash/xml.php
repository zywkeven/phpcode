<?php
include_once("../conn/conn.php");
if(file_exists("xml/bcastr.xml"))
{
unlink("xml/bcastr.xml");//存在就先删除
}
// create doctype头
$dom = new DOMDocument("1.0","utf-8");
// create root element对像
$root = $dom->createElement("bcaster");
$dom->appendChild($root);
$dom->formatOutput=true;
// create attribute node
$playtime = $dom->createAttribute("autoPlayTime");
$root->appendChild($playtime);
// create attribute value node
$playtimeValue = $dom->createTextNode("4");//在flash里的播放速度
$playtime->appendChild($playtimeValue);
// create text node
/*$text = $dom->createTextNode("pepperoni");
$item->appendChild($text);*/
// create attribute node
$sql = "SELECT * FROM myguestbook";//从数据库里读数据
$res = mysql_query($sql);
while($row = mysql_fetch_array($res))
{
$title = iconv("gb2312","utf-8",$row['title']);//进行编码转换
// create child element
$item = $dom->createElement("item");
$root->appendChild($item);
$item_url = $dom->createAttribute("item_url");
$item->appendChild($item_url);
// create attribute value node
$item_urlValue = $dom->createTextNode($row['imgpath']);//图片路径
$item_url->appendChild($item_urlValue);
// create attribute node
$itemtitle = $dom->createAttribute("itemtitle");
$item->appendChild($itemtitle);
// create attribute value node
$itemtitleValue = $dom->createTextNode($title);//图片名称
$itemtitle->appendChild($itemtitleValue);
}
// save tree to file
$dom->save("bcastr.xml");//保存到指定目录下
?>
