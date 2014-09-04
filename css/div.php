 <script>
var load_line_i=1;
var load_line_step=200;
function loading(txt)
    {    
        load_line_i+=400/load_line_step;
        load_txt.innerText=txt+" "+Math.floor(load_line_i/4.00)+"%";
        document.all("line").width=load_line_i;
    }                                            
    function finish()
    {
        window.location.href="marquee.php";
    }
</script> 

<link rel=stylesheet type=text/css href=main.css>
   
<body onload=finish()> 
<div id=load style="background-color:#aaaaaa"><span class="style1">请稍候...</span>
<div class=px1><img id=line style="background:red" width=14 height=14></div>
<div class="style1" id=load_txt>loading</div>
</div>
<?php  
for($i=0;$i<200;$i++)
{
    ?>
    <script>  
    loading('Loading');
    </script>
    <?php
} 
 
?>
</body>

