 <?php  
include_once('conn.php'); 


$str="<?xml version=\"1.0\" encoding=\"utf-8\" ?>
<urlset>
<url>
    <loc>http://blog.const.net.cn/alexa/index.htmaaaaabbbbbbbbbb</loc>
    <lastmod>2007-08-29</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
</url>
<url>
    <loc>http://blog.const.net.cn/index/More.yhtmlccccccccccccc</loc>
    <lastmod>2007-09-03</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
</url> 
</urlset>"; 
    $fic = fopen("creatxml.xml", "w");  
fwrite($fic, "$str");
?>
  