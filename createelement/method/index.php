 <html>
 <head>
 <script language="Javascript" src="jquery-1.4.4.min.js" type="text/javascript"></script>
 </head>
 <body>
 <?php
   $fieldNumber=1;  
 echo "<table>";  
 echo "<tr id='trid$fieldNumber'><td colspan='3' width='100%'>field $fieldNumber:<br />";          
 echo "<input typt='text'></td></tr>";   
 $fieldNumber++;
 echo "<input type='hidden' id='largestid' name='largestid' value='$fieldNumber'>";    
 echo "<tr><td colspan='3' width='100%'><input type='button' value='Add field' onclick=\"addNewField()\">&nbsp;</td></tr>"; 
 echo "<tr><td colspan='3' align='center'><input type='button' value='Update' >&nbsp;</td></tr>";          
 
 echo "</table>";
 ?>
 <script>
 function addNewField(){    
    var fieldNumber =$("#largestid").attr("value");   
    
    for(var existfield=fieldNumber;existfield>0;existfield--){
        if(document.getElementById("trid"+existfield)){            
            break;
        }        
    }   
    fieldNumber=  existfield; 
    var xaddElement = $("#trid"+fieldNumber);  
    fieldNumber++;   
    $("#largestid").attr("value",fieldNumber);
    var xtext = "<tr id='trid"+fieldNumber+"'><td colspan='3' width='100%'>field "+fieldNumber+":<br />";
   // xtext+="<textarea name='eachfield[]' style='width:85%;height:200px'></textarea>";
    
    xtext+="<input typt='text'><input type='button' value='Remove'"+
    " onclick=\"removeField("+fieldNumber+")\"></td></tr>"; 
    xaddElement.after(xtext); 
}

function removeField(id){
    xaddElement = $("#trid"+id).remove(); 
}
</script>
