<script>
function move(x,y)
{
    if(document.all)
    {
       object1.style.pixelLeft+=x;
       object1.style.pixelTop+=y;
    }
    else
    if(document.layers){
        document.object1.left+=x;
        document.object1.top+=y;
    }
}
function position(){
    document.object1.left+=-82;
    document.object1.top+=0;
    document.object1.visibility="show";
}

function makeStatic(){
    if(document.all){object1.style.pixelTop=document.body.scrollTop+20}
    else{eval('document.object1.top=eval(window.pageYOffset+20)');}
    setTimeout("makeStatic()",1000);
}
</script >
<tbody id=object1  >
<tr>
<td >menu1</td>
<td width=14 height=201 rowspan="100" align=left bgcolor=#444444>
<script>
if(document.all||document.layers)
document.write("<p align='center'>зд<br>ЖЏ<br>вў<br>Ви<br>ВЫ<br>ЕЅ</p>");
</script>
</td></tr> 
<script>
if(document.all||document.layers)
makeStatic();
if(document.layers)
{
    winodow.onload=position;
}
var sitems=new Array();
var sitemlinks=new Array();
sitems[0]='menu1';
sitems[1]='menu2';  
sitems[2]='menu3';  
sitems[3]='menu4';  
sitems[4]='menu5';  
sitems[5]='menu6';  
                                    
sitemlinks[0]='menu1';
sitemlinks[1]='menu2';  
sitemlinks[2]='menu3';  
sitemlinks[3]='menu4';  
sitemlinks[4]='menu5';  
sitemlinks[5]='menu6';  
for(i=0;i<sitems.length;i++)
if(document.all){document.write('<tr><td bgcolor="EFF234" onclick="location=\"+sitemlinks[i]+\" onmouseover="className=\'h1\'"onmouseout="className=\'n\'">'+sitems[i]+'</td></tr>')};
else if(document.layers){document.write('<tr><td bgcolor="white"><a >'+sitems[i]+'</td></tr>')}
function h1(n){n.className='h1'}
function n(h){
    h.className='n'}
    </script>
    </tbody></table>
    <script>
    if(document.all)
    document.write('<\/div>')
    </script>
    


