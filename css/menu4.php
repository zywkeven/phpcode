<script>
function show(obj,maxg,obj2)
{
if(obj.style.pixelHeight<maxg)
{
    obj.style.pixelHeight+=maxg/10;
    obj.filters.alpha.opacity+=20;
    
    obj2.background="pic.bmp";
    if(obj.style.pixelHeight==maxg/10)
    obj.style.display='block';
    myObj=obj;
    mymaxg=maxg;
    myObj2=obj2;
    setTimeout('show(myObj,mymaxg,myObj2)','5');
}
}
function hide(obj,max,obj2)
{
    if(obj.style.pixHeight>0){
        if(obj.style.pixelHeight==maxg/5)
        obj.style.pixelHeight=maxg/5;
        obj.filters.alpha.opacity-=10;
        
        myObj=obj;
        mymaxg=maxg;
        myObj2=obj2;
        setTimeout('hide(myObj,mymaxg,myObj2)','5');
    }
         else
         if(whichcontinue)
         whichcontinue.click();
    }
    
</script>
<script>
function chang(obj,maxg,obj2){
    if(obj.style.pixelHeight){
        hide(obj,maxg,obj2);
        nopen='';
        whichcontinue='';
    }
    else
    if(nopen){
        whichcontinud=obj2;
        nopen.click();
    }
    else{
        shoe(obj,maxg,obj2);
        nopen=obj2;
        whichcontinue='';
    }
}
</script>
<td class=list_title id=list1 onmouseover="this.typename='list_title2'" onclick="chang(menu1,60,list1);" onmouseout="this.typename='list_title'" background='pic.bmp' height=25><span>admin</span></td>