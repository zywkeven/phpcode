<input type='button' value='click' id='btnclick' onclick='getValue()'>
<script>
var xmlHttp;
function createXMLHttpRequest(){
    if(window.XMLHttpRequest){
        var xmlHttp=new XMLHttpRequest();
        if(xmlHttp.overrideMimeType){
            xmlHttp.overrideMimeType("text/xml");
        }
    }else{
        try{
            xmlHttp = new XMLHttpRequest();
        }catch(e){ 
            var XmlHttpVersions = new Array('MSXML2.XMLHTTP.6.0',
            'MSXML2.XMLHTTP.5.0',
            'MSXML2.XMLHTTP.4.0',
            'MSXML2.XMLHTTP.3.0',
            'MSXML2.XMLHTTP',
            'Microsoft.XMLHTTP');
            for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++){
                try{  
                    xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
                }
                catch (e) {                
                }
            }
        }
    } 
    if (!xmlHttp){
        alert("Error creating the XMLHttpRequest object.");
    }else{
    return xmlHttp;
    } 
}
function getValue(){ 
    var url="./test.php"
    xmlHttp=createXMLHttpRequest();
    xmlHttp.open("POST", url, true);
    xmlHttp.onreadystatechange =function(){
        if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
           document.getElementById('btnclick').value=xmlHttp.responseText;
        }
    }}
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    
    xmlHttp.send("value=Test");   
}  

</script>