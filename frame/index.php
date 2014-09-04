
<Iframe id='myi' name='frm1' src="1.php"   scrolling="yes" frameborder="1"></iframe> 
<Iframe src="2.php" width="250" height="200" scrolling="no" frameborder="0"></iframe>
<input type='button' value='click' onclick="funcclick()">
<script>
window.onload=function(){
var iObj = document.getElementById('myi'); 
iObj.height =  iObj.contentWindow.document.documentElement.scrollHeight; 
}
      

function funcclick(){
        alert("aaaaaa")
        var iObj = document.getElementById('myi').contentWindow; 

        alert(document.frames["frm1"].document.getElementById('myH1') .innerHTML)                                       
         alert(iObj.document.getElementById('myH1') .innerHTML) 
         
         iObj.document.designMode = 'On'; 
iObj.document.contentEditable = true; 
iObj.document.open(); 
iObj.document.writeln('<html><head>'); 
iObj.document.writeln('<style>body {background:#000;font-size:9pt;margin: 2px; padding: 0px;}</style>'); 
iObj.document.writeln('</head><body>666666</body></html>'); 
iObj.document.close(); 
                                      
}
</script>