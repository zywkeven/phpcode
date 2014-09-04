<script>
var message="»¶Ó­½øÈë";
var wordcolor="yellow";
var altercolor="red";
var wordpace=300;
var n=0;
if(document.all)
{
document.write('<font color="'+wordcolor+'">')
document.write('<span >&nbsp;</span>')
for(m=0;m<message.length;m++)
document.write('<span id="neonlight">'+message.charAt(m)+'</span>')
document.write('</font>')
var tempword=document.all.neonlight
}
else
document.write(message)

function info(){
    if(n==0)
    {
        for(m=0;m<message.length;m++)
        tempword[m].style.color=wordcolor;
    }
    tempword[n].style.color=altercolor;
    if(n<tempword.length-1)
    n++;
    else{
        n=0;
        clearInterval(word)
        setTimeout("begininfo()",1000) 
       for(m=0;m<message.length;m++)
        tempword[m].style.color=wordcolor;
        
        return 
    }
}
function begininfo(){
    if(document.all)
    word=setInterval("info()",wordpace)
}
begininfo() 
</script>