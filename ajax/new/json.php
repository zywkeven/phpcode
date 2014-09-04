<script>
var xmlHttp;
function createXMLHttpRequest(){
    if(window.XMLHttpRequest){
        xmlHttp=new XMLHttpRequest();
        if(xmlHttp.overrideMimeType){
            xmlHttp.overrideMimeType("text/xml");
        }
	}else{
        try{
            xmlHttp = new XMLHttpRequest();
        }
        catch(e){ 
            var XmlHttpVersions = new Array('Msxml2.XMLHTTP.7.0',
            'MSXML2.XMLHTTP.6.0',
            'MSXML2.XMLHTTP.5.0',
            'MSXML2.XMLHTTP.4.0',
            'MSXML2.XMLHTTP.3.0',
            'MSXML2.XMLHTTP',
            'MSXML.XMLHTTP',
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
    }
    else{
        return xmlHttp;
    } 
}

function thisclick(){ 
	xmlHttp=createXMLHttpRequest()
	if(xmlHttp){ 
		xmlHttp.open("GET","test.php",true);  
        //xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xmlHttp.setRequestHeader('Content-Type','text/xml;charset=utf-8');
		xmlHttp.onreadystatechange=function(){  
			if(xmlHttp.readyState==4&&xmlHttp.status==200){
			var test=  xmlHttp.responseText;
			//test="{name:'".addslashes('kdsjfksjfl')."',email:'17bity@gmail.com'}";
            define = test;
			eval("data = "+define);
			alert("name:"+data.name);
			alert("email:"+data.email)
			}
		}
	xmlHttp.send(null);
	}
}
</script>

<input type='button' value='click' onclick="thisclick()">