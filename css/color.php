<script>
var h=new Array(6)
h[0]="FF";
h[1]="CC";
h[2]="99";
h[3]="66";
h[4]="33";
h[5]="00";
function action(RGB){
    parent.window.returnValue="#"+RGB;
    window.close();
}
function Mcell(R,G,B){
    document.write('<td bgcolor="#'+R+G+B+'">');
    document.write('<a href="#" onclick="action(\''+(R+G+B)+'\')">');
    document.write('<img border=0 height=12 width=12  alt=\'#'+R+G+B+'\'>');
    document.write('</a>');
    document.write('</td>');
}
function Mtr(R,B){
    document.write('<tr>');
    for(var i=0;i<6;++i)
    {Mcell(R,h[i],B)};
    document.write('</tr>');
    }
function Mtable(B){
        document.write('<table border=0>');
        for(var i=0;i<6;++i)
        {Mtr(h[i],B);}
document.write('</table>');
}
function Mcube(){
document.write('<table cellpadding=0 cellspacling=0 border=1>');
for(var i=0;i<6;i++){
if(i==3){
               document.write('<tr>');
           }
           document.write('<td bgcolor="#aaaaaa">');
            Mtable(h[i]);
            document.write('</td>');
              if(i==3){
                document.write('</tr>');
       }  
}     
 document.write('</table>');  
    }
    Mcube()
    </script>
    