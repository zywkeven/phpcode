<?php
    //http://extjs.org.cn/extjs/plugins/SwfUploadPanel2.2/example.php
	session_start();
	$_SESSION['test'] = 'cool. same session.';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xHTML1/DTD/xHTML1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ext.ux.SwfUploadPanel Example</title>
<link rel="stylesheet" type="text/css" href="./resources/css/ext-all.css" />
<script type="text/javascript" src="js/ext-base.js"></script>
<script type="text/javascript" src="js/ext-all.js"></script>
<!-- Files needed for SwfUploaderPanel -->
<script type="text/javascript" src="js/SwfUpload.js"></script>
<script type="text/javascript" src="js/SwfUploadPanel.js"></script>
<script type="text/javascript">
if(!console) var console = {
    log: function() {}
}
</script>
<script type="text/javascript" ><?php include("./js/uploadread.js")?></script>
</head>
<body>
<span class="style1">ExtJS Extension</span> (多文件上传)
<br/>
<br/>
<br>
<br>
<div id="PageSignature">译者：肥占<br>
      出处：<a 
href="http://extjs.org.cn">http://extjs.org.cn</a> <br>
本文版权归作者和ExtJs中文站共有，欢迎转载，但未经作者同意必须保留此段声明，且在文章页面明显位置给出原文连接。</div>
<br>
<div id="grid" style="width:400px;"></div>
<br>
<div id="btn"></div>

</body>
</html>
