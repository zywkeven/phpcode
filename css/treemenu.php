<script>
/*
numTotal=4;
scores[1]='KB1';
scores[2]='KB1';
scores[3]='KB2';
scores[4]='KB3';
  */


function imgload(){
    var d=document;if(d.images){if(!d.MM_p)d.MM_p=new Array();
    var i,j=d.MM_p.length,a=imgload.arguments;for(i=0;i<a.length;i++)
    if(a[i].indexOf("#")!=0){d.MM_p[j]=new Image;d.MM_[j++].src=a[i];}}
}
    
    function imgfind(n,d){
        var p,i,x;
        if(!d) d=document;if((p=n.indexOf("?"))>0&&parent.frames.length){
            d=parent.frames[n.substring(p+1)].document;n=n.substring(0,p);}
            if(!(x=d[n]&&d.all))x=d.all[n];for(i=0;!x&&i<d.forms.length;i++)x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=imgfind(n,d.layers[i].document);
            if(!x&&d.getElementById(n))x=d.getElementById(n);return x;
    }
    function imgbarter(){
        var i,j=0,x,a=imgbarter.arguments;document.MM_sr=new Array;for(i=0;i<(a.length-2);i+=3)
        if(x=imgfind(a[i])!=null){document.MM_str[j++]=x;if(!x.oSrc)x.oSrc=x.src;x.src=a[i+2];}
    }
    function display()
    {
        if(KB1Child.style.display=='none')
         document.all.KB1Child.style.display='';
         else
         document.all.KB1Child.style.display="none";
        
    }
    
    </script>
    
    <div id='KB1Parent' class='parent'>
    <table>
    <tr>
    <td><a href='#' class='white01' onclick="display();return false">
    <img height=10 width=20 src=pic.bmp height=10 width=20>常用工具</a></td>
    </tr>
    </table>
    </div>
    <div id='KB1Child' class='child' style="display:none" >
    <table >
    <?php
    include_once("../conn/conn.php");
    $result=mysql_query("select * from myguestbook");
    $row=mysql_fetch_array($result);
    if($row)
    {do{
        ?>
        <tr>
        <td class="white01"><img height=10 width=20 src="pic2.bmp"></td>
        <td><a href='#' ><?php echo $row[id];?></a></td>
        </tr>
        <tr>
        <?php
    }while($row=mysql_fetch_array($result));
    }
    ?>
    <td></td>
    </tr>
    </table>
    </div>
    
    
