<script language="javascript">

function setCookie(name,value,expires)
{
document.cookie=name+"="+escape(value)+",path=/"+((expires==null)?"  ":",expires="+
expires.toGMTString());
}

var exp=new Date();
exp.setTime(exp.getTime()+(1000*60*60*24*31));
setCookie("my name","my value",exp);
var cookieName='_welcome';
var theMessage='Since this is your first time';

function getCookie(name){
    var cname=name+"=";
    var dc=document.cookie;
    if(dc.length>0)
    {
        begin=dc.indexOf(cname);
        if(begin!=-1){
            begin+=cname.length;
            end=dc.indexOf(";",begin);
            if(end==-1)
            end=dc.length;
            return unescape(dc.substring(begin,end));
        }
    }
    return null;
}
 function showWelc()
 {
     if(getCookie(cookieName)=null||getcookie(cookieName)=="welcome")
     {
         setCookie(cookieName,"welcome",exp);
         document.write(theMessage);
     }
     else
     {setCookie(cookieName,"nowelcome",exp);
     }
 }
 function toggleWelc(){
     if(getCookie(cookieName)=="welcome"){
         setCookie(cookieName,"nowelcome",exp);
     }
     else
     {
         setCookie(cookieName,"welcome",exp);
     }
 }
     function showForm(){
         if(getCookie(cookieName)==null||getCookie(cookieName)=="welcom"){
             document.write('<form><input type="checkbox" onclick="toggleWelc()">');
             document.write('Don\'t show welcome message.</form>');
         }
     }
 
</script>

<body onload="showForm();">
</body>

