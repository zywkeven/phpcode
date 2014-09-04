function checkvalue(formname)
{
var  upfile=document.form1.upfile.value; 
var  filename=document.form1.filename.value;
                                            

if(upfile=='')
{ 
alert('invalidate file');
return false;
}

if(filename=='')
{
alert('invalidate filename');
return false;
}
return true; 

}