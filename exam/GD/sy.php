<script>
 var total=1;
 function checkvalue()
 {
     var num=parseInt(document.form1.totalnumber.value);
  //large    
      if(document.form1.largelength.value==""||document.form1.largelength.value==0||(isNaN(document.form1.largelength.value)))
      {
          alert('Please enter largelength');
          document.form1.largelength.focus();
          return false; 
      }
       if(document.form1.largewidth.value==""||document.form1.largewidth.value==0||(isNaN(document.form1.largewidth.value)))
      {
          alert('Please enter largewidth');
          document.form1.largewidth.focus();
          return false; 
      }
//small      
        var count=0;   
       for(count=0;count<num;count++)
       {
            if(document.all.smalllength[count].value==""||document.all.smalllength[count].value==0||(isNaN(document.all.smalllength[count].value)))
      {
          alert('Please enter smalllength');
          document.form1.smalllength[count].focus();
          return false; 
      }
           if(document.all.smallwidth[count].value==""||document.all.smallwidth[count].value==0||(isNaN(document.all.smallwidth[count].value)))
      {
          alert('Please enter smallwidth');
          document.all.smallwidth[count].focus();
          return false; 
      }  
          if(document.all.account[count].value==""||document.all.account[count].value==0||(isNaN(document.all.account[count].value)))
      {
          alert('Please enter account');
          document.all.account[count].focus();
          return false; 
      }              
      } 
   
  //distance   
       if(document.form1.distance.value==""||document.form1.distance.value==0||(isNaN(document.form1.distance.value)))
      {
          alert('Please enter distance');
          document.form1.distance.focus();
          return false; 
      }  
      
        return true;  
 
 }
 
 
 
 
function Add(number)
{   total++;
     document.form1.totalnumber.value=total;
    document.all.object[number].style.display="";
    if(number==0)
    document.all.btn1[number].style.display="none";
    else{document.all.btn1[number].style.display="none";
         document.all.btn2[number-1].style.display="none";}  

}

function Del(number,a,b,c)
{     total--;
     document.form1.totalnumber.value=total;
     document.all.object[number].style.display="none"; 
     if(number==0)
     {
    document.all.btn1[number].style.display="";
          document.all.smalllength[number+1].value='';
          document.all.smallwidth[number+1].value='';
          document.all.account[number+1].value=''; 
          }
    else{
        document.all.btn1[number].style.display="";
        document.all.btn2[number-1].style.display="";
           document.all.smalllength[number+1].value='';
           document.all.smallwidth[number+1].value='';
           document.all.account[number+1].value='';
          }
}





</script>

<div  align="center">PHP--图形
<div  style="width:300px;background-color:#CBFEFE;" >
<fieldset >
<form name="form1" method="post" action="dataaccept.php" onsubmit="return checkvalue();">
<table border="0" align="center">
<caption>容器</caption>
<tr><td>容器的长:</td><td><input type="text" name="largelength"></td></tr>
<tr><td>容器的宽:</td><td><input type="text" name="largewidth"></td></tr> 

</table>
<hr align="center">

<div  align="center">
<div  style="width:250px;" >
<fieldset >

<table  align="center">
<caption>填充物品</caption> 
<tr><td>长:</td><td><input type="text" name="smalllength[]" id="smalllength"></td></tr>
<tr><td>宽:</td><td><input type="text" name="smallwidth[]"  id="smallwidth"></td></tr>
<tr><td>数量:</td><td><input type="text" name="account[]"  id="account"></td></tr>
<tr><td colspan="2" align="center">
<button name=btn1 onclick="Add(0)">Add</button></td></tr>  
</table> 

 
<div  id=object style="display:none" > 
<hr align="center">
<table >
<tr><td >长:</td><td><input type="text" name="smalllength[]" id="smalllength"></td></tr>
<tr><td>宽:</td><td><input type="text" name="smallwidth[]"  id="smallwidth"></td></tr>
<tr><td>数量:</td><td><input type="text" name="account[]"  id="account"></td></tr>
</table>
<td><button name=btn1 onclick="Add(1)">Add</button></td>
<td><button name=btn2 onclick="Del(0)">Del</button></td>
 </div>


<div id=object style="display:none" >
<hr align="center">  
<table >
<tr><td>长:</td><td><input type="text" name="smalllength[]" id="smalllength"></td></tr>
<tr><td>宽:</td><td><input type="text" name="smallwidth[]"  id="smallwidth"></td></tr>
<tr><td>数量:</td><td><input type="text" name="account[]"   id="account"></td></tr>
</table>
<td><button name=btn1 onclick="Add(2)">Add</button></td>
<td><button name=btn2 onclick="Del(1)">Del</button></td>
</div>


<div id=object style="display:none" >
<hr align="center">  
<table >
<tr><td>长:</td><td><input type="text" name="smalllength[]"  id="smalllength"></td> </tr>  
<tr><td>宽:</td><td><input type="text" name="smallwidth[]"   id="smallwidth"></td></tr>
<tr><td>数量:</td><td><input type="text" name="account[]"    id="account"></td></tr>
</table> 
<td><button name=btn1 onclick="Add(3)">Add</button></td>
<td><button name=btn2 onclick="Del(2)">Del</button></td>
</div>


<div  id=object style="display:none" > 
<hr align="center">
<table >
<tr><td>长:</td><td><input type="text" name="smalllength[]"  id="smalllength"></td></tr>
<tr><td>宽:</td><td><input type="text" name="smallwidth[]"   id="smallwidth"></td></tr> 
<tr><td>数量:</td><td><input type="text" name="account[]"    id="account"></td></tr>
 <tr><td colspan=2 align="center">
<button name=btn2 onclick="Del(3)">Del</button>
</td> </tr>  
</table>  
</div>
</fieldset >
</div >
</div >

  <hr align="center"> 
 <table>   
 <tr><td>间隔距离:</td><td><input type="text" name="distance"></td></tr>
</table>
<hr>
<table border="1" align="center"> 
 <input type=hidden name=totalnumber value=1>
<input type="submit" name="submit" value="确定">
</table>

</form>
</fieldset>
</div>
</div>