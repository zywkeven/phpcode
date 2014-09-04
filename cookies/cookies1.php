<script language="javascript">
function setCookie(name,value,expires)
{
document.cookie=name+"="+value+",path=/"+((expires==null)?"  ":",expires="+
expires.toGMTString());
}
var exp=new Date();
exp.setTime(exp.getTime()+(1000*60*60*24*31));
setCookie("my name","my 111",exp);

function getCookie(name)
{
    var cname=name+"=";
    var dc=document.cookie;
    if(dc.length>0)
    {
        begin=dc.indexOf(cname);
        if(begin!=-1)
        {
            begin+=cname.length;
            end=dc.indexOf(";",begin);
            if(end==-1)
            end=dc.length;
            return unescape(dc.substring(begin,end));
        }
    }
    return null;
}
getCookie("my name");
document.write(getCookie("my name"));
</script>

