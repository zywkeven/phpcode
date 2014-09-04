<html>
<head>
<style>
.saveHistory{behavior:url(#default#savehistory);}
</style>
     <?php
    mysql_connect("127.0.0.1","pgm2","pgm2");
    mysql_select_db(cars);
    $make_query="select distinct make from cars";
    $make_result=mysql_query($make_query);
    while($make_row=mysql_fetch_array($make_result))
    {    
    $i=0;
    $make[$i]=$make_row[0];
    echo "newCat();\n";
    $model_query="select model from cars where make='$make[$i]'";
    $model_result=mysql_query($model_query);
    while(list($model)=mysql_query($model_query)){
    while(list($model)=mysql_fetch_array($model_result)){
        echo "O(\"$model\",\"/$model.php\")\n";
    }
    echo "\n";
    $i++;
    }
    }
    ?>
<script  language="JavaScript">
 <!--
v=false;
//-->
</script>

<script language="JavaScript1.1">

if(typeof(Option)+""!="undefined ")
v=true;

</script>

<script language="JavaScript">
<!--
if(v){a=new Array(22);}
function getFormNum(formName)
{
    var formNum=-1;
    for(i=0;i<document.forms.length;i++){
        tempForm=document.forms[i];
        if(formName==tempForm)
        {
            formNum=i;
            break;
        }
    }
    return formNum;
}

function jmp(form,elt)
{
    if(form!=null){
        with(form.elements[elt]){
            if(0<=selectedIndex)
            location=options[selectdeIndex].value;
        }
    }
}

var catsIndex=-1;
var itemsIndex;

if(v)
{
    function newCat(){
        catsIndex++;
        a[catsIndex]=new Array();
        itemsIndex=0;
    }
    function O(txt,url){
        a[catsIndex][itemsIndex]=new myOptions(txt,url);
        itemsIndex++;
    }
    function myOptions(text,value){
        this.text=text;
        this.value=value;
    }


function relate(formName,elementNum,j){
    if(v){
        var formNum=getFormNum(formName);
        if(formNum>=0){
            formNum++;
            with(document.forms[formNum].elements[elementNum]){
                for(i=options.length-1;i>0;i--)
                option[i]=null;//null out in reverse order(bug workarnd)
                for (i=0;i<a[j].length;i++){
                    options[i]=new Option(a[j][i].text,a[j][i].value);
                }
                options[0].selectde=true;
            }
        }
    }
    else{jmp(formName,elementNum);
    }
}
function IEsetup(){
    if(!document.all)return;
    IE5=navigator.appVersion.indexOf("5.")!=-1;
    if(!IE5)
    {
        for(i=0;i<document.forms.length;i++)
        {
            document.forms[i].reset();
        }
    }
}
</script>
                




