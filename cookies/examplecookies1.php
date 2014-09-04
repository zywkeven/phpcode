<script language="javascript">
//如果要http: //www.jzxue.com/devhead/filters/ 和http://www.jzxue.com/devhead/stories/共 享cookies，就要把path设成“/devhead”。
function setCookie(name,value)
{
document.cookie=name+"="+value;
}  
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

//setCookie('my name','10011')
//getCookie("my name");
document.write(getCookie("my name"));
</script>

