<script>
 var total=1;   

function Add()
{  
  if(document.form1.smalllength1.value==""||document.form1.smalllength1.value==0||(isNaN(document.form1.smalllength1.value)))
      {
          alert('Please enter smalllength');
          document.form1.smalllength1.focus();
          
      }
      else
       if(document.form1.smallwidth1.value==""||document.form1.smallwidth1.value==0||(isNaN(document.form1.smallwidth1.value)))
      {
          alert('Please enter smallwidth1');
          document.form1.smallwidth1.focus();
          
      }
      else
       if(document.form1.account1.value==""||document.form1.account1.value==0||(isNaN(document.form1.account1.value)))
      {
          alert('Please enter account1');
          document.form1.account1.focus();
          
      }
      
        else{
 
  var text1=document.form1.smalllength1.value;
  var text2=document.form1.smallwidth1.value;
  var text3=document.form1.account1.value;  
  
  var  len1=document.form1.select1.length;
    
     if(document.form1.select1.length>=5)
     alert("超出5项");
     else{
  
  var opt1=new Option(text1+','+text2+','+text3,text1+','+text2+','+text3) ;
  document.form1.select1.options[len1]=opt1; 
    document.form1.smalllength1.value="";
    document.form1.smallwidth1.value=""; 
    document.form1.account1.value=""; 
     } 
      }
} 
function Del()
{   
     
   var len1=document.form1.select1.length;    
  
    for(var i=len1-1;i>-1;i--)
    {  
        if(document.form1.select1[i].selected)
        {
            document.form1.select1.remove(i);
        }   
    }   
} 


 
  
 
</script>  
<div  align="center">PHP--图形
<div  style="width:300px;background-color:#CBFEFE;" >
<fieldset >
<form name="form1" method="post" action="dataaccept.php" onsubmit="checkvalue()" >
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
<tr><td>长:</td><td><input type="text" name="smalllength1" ></td></tr>
<tr><td>宽:</td><td><input type="text" name="smallwidth1"  ></td></tr>
<tr><td>数量:</td><td><input type="text" name="account1"  ></td></tr>
<tr><td colspan="2" align="center">
<button name=btn1 onclick="Add()">Add</button>&nbsp;&nbsp; 
<button name=btn1 onclick="Del()">Del</button></td></tr>  
<div > 
   <tr>
   <td colspan="2" align=center>
   <select name="select1" size="5" style="width:170px" multiple="true"> 
    </select>   
   </td>
   </tr>
</div>


</table>   






</fieldset >
</div >
</div >

  <hr align="center"> 
 <table>   
 <tr><td>间隔距离:</td><td><input type="text" name="distance"></td></tr>
</table>
<hr>

<input type=hidden name=smalllength >
<input type=hidden name=smallwidth >
<input type=hidden name=account >   

<table border="1" align="center"> 
 <input type=hidden name=totalnumber value=1>
<input type="submit" name="submit" value="确定">
</table>

<script>

 function checkvalue()
 {
    
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
      if(document.form1.select1.length==0)
     {    
         alert('Please Add ');
         document.form1.smalllength1.focus();
         return false;
     } 
        
  //distance   
       if(document.form1.distance.value==""||document.form1.distance.value==0||(isNaN(document.form1.distance.value)))
      {
          alert('Please enter distance');
          document.form1.distance.focus();
          return false; 
      }  
      
        before_post();
        return true;  
 
 }
 function before_post()
 {   
     document.form1.totalnumber.value=document.form1.select1.length;; 
      
     var len1=document.form1.select1.length; 
     
     var arr=new Array(len1); 
     for(var i=0;i<len1;i++)
     {
         arr[i]=document.form1.select1.options[i].value;
     }
      var index=0;
      var str2="";  
      var index2=0; 
      
      var smalllengthar=new Array(len1); 
      var smallwidthar=new Array(len1); 
      var smallaccountar=new Array(len1); 
      
        
     for(i=0;i<len1;i++)
     {  
     index=arr[i].indexOf(","); 
     smalllengthar[i]=arr[i].substring(0,index);
     str2=arr[i].substring(index+1,arr[i].length); 
      index2=str2.indexOf(",");
      smallwidthar[i]=str2.substring(0,index2)
      smallaccountar[i]=str2.substring(index2+1,index2.length);
     }
     document.form1.smalllength.value=smalllengthar;
     document.form1.smallwidth.value=smallwidthar;
     document.form1.account.value=smallaccountar;
     
     
   
 }
 </script>

</form>
</fieldset>
</div>
</div>