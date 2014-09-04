 <script>
 function jscheckallfunc()
 {
  var inputs = document.getElementsByTagName('input');
        var inputsLen = inputs.length;
   var vcheckall=document.form1.elements['checkall'];    
  if(vcheckall.checked==true){
        for (var i = 0; i < inputsLen ; i++ )
 {
            if (inputs[i].type.toLowerCase() == 'checkbox'&&(inputs[i].name!='checkall'))
 {
                inputs[i].checked = true;   
    }
 }
  }else
 {          for (var i = 0; i < inputsLen ; i++ )
 {
            if (inputs[i].type.toLowerCase() == 'checkbox'&&(inputs[i].name!='checkall'))
 {
                inputs[i].checked = false;   
    }
 }
 
 }
 }
 </script>
 <form name=form1>
 <input type=checkbox name='checkall' onclick="jscheckallfunc()"> 
 <input type=checkbox name='one[]'> 
 <input type=checkbox name='one[]'> 
 <input type=checkbox name='one[]'> 
 <input type=checkbox name='one[]'> 
 <input type=checkbox name='one[]'> 
 </form>