<html>
<head>
<meta http-equiv="Content-Type" content="text/xml; charset=utf-8"> 
<title></title> 
<script type="text/javascript">   
var GetNodeValue = function(obj)
{
var str = "";
if(window.ActiveXObject)    //IE
{
str = obj.text;
}
else //Mozilla
{
try
{
   str = obj.childNodes[0].nodeValue;
}
catch(ex)
{
   str = "";
}
}
return str;
}

if(document.implementation && document.implementation.createDocument)
{
XMLDocument.prototype.loadXML = function(xmlString)
{
var childNodes = this.childNodes;
for (var i = childNodes.length - 1; i >= 0; i--)
   this.removeChild(childNodes[i]);

var dp = new DOMParser();
var newDOM = dp.parseFromString(xmlString, "text/xml");
var newElt = this.importNode(newDOM.documentElement, true);
this.appendChild(newElt);
};

// check for XPath implementation
if( document.implementation.hasFeature("XPath", "3.0") )
{
    // prototying the XMLDocument
    XMLDocument.prototype.selectNodes = function(cXPathString, xNode)
    {
    if( !xNode ) { xNode = this; }
    var oNSResolver = this.createNSResolver(this.documentElement)
    var aItems = this.evaluate(cXPathString, xNode, oNSResolver,
        XPathResult.ORDERED_NODE_SNAPSHOT_TYPE, null)
    var aResult = [];
    for( var i = 0; i < aItems.snapshotLength; i++)
    {
    aResult[i] = aItems.snapshotItem(i);
    }
    return aResult;
    }

    // prototying the Element
    Element.prototype.selectNodes = function(cXPathString)
    {
    if(this.ownerDocument.selectNodes)
    {
    return this.ownerDocument.selectNodes(cXPathString, this);
    }
    else{throw "For XML Elements Only";}
    }
}

// check for XPath implementation
if( document.implementation.hasFeature("XPath", "3.0") )
{
    // prototying the XMLDocument
    XMLDocument.prototype.selectSingleNode = function(cXPathString, xNode)
    {
    if( !xNode ) { xNode = this; }
    var xItems = this.selectNodes(cXPathString, xNode);
    if( xItems.length > 0 )
    {
    return xItems[0];
    }
    else
    {
    return null;
    }
    }
   
    // prototying the Element
    Element.prototype.selectSingleNode = function(cXPathString)
    {   
    if(this.ownerDocument.selectSingleNode)
    {
    return this.ownerDocument.selectSingleNode(cXPathString, this);
    }
    else{throw "For XML Elements Only";}
    }
}
}  
function loadXML()
{  
    var xmlHttp2;
    var xmlHttp;   
        if(window.ActiveXObject)
    {
        xmlHttp2= new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest)
    {
        xmlHttp2 = new XMLHttpRequest();
    } 
    if(xmlHttp2)
    { 
       var getvalue;
       getvalue=document.getElementById('indextext').value;
    
     xmlHttp2.onreadystatechange = function()
        {
            if(xmlHttp2.readyState == 4)
            {
                if (xmlHttp2.status == 200)
                { 
                                     
                } 
            }
        }
           xmlHttp2.open("GET", "ajaxxml.php?id="+getvalue,false); 
            xmlHttp2.send(null); 
     }   
            
     
    var name;
    if(window.ActiveXObject)
    {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest)
    {
        xmlHttp = new XMLHttpRequest();
    }
    try
    {
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4)
            {
                if (xmlHttp.status == 200)
                {
                    // 取得XML的DOM对象
                    var xmlDOM = xmlHttp.responseXML;
                    // 取得XML文档的根
                    var root = xmlDOM.documentElement;
                    try
                    {  
                       var items = root.selectNodes("//maindir/subdir");
                        var msg=document.getElementById("msg"); 
                        msg.innerHTML='';
                       for(var i=0;i<items.length;i++)
                       {
                        //取得XML文件中内容:)                       
                        var strTitle = GetNodeValue(items[i].selectSingleNode("subinf1"));
                        var strLastMod=GetNodeValue(items[i].selectSingleNode("subinf2"));
                     
                        msg.innerHTML+=strTitle+"&nbsp;&nbsp;"+strLastMod+"<br/>"; 
                       }
                    }
                    catch(exception)
                    {
                        alert("error");
                    }
                }
            }
        }
         xmlHttp.open("GET", "test1.xml", true);  
     
        xmlHttp.send(null);
    }  
    catch(exception)
    {
      alert("您要访问的资源不存在!");
    }
}

</script>
</head>
<body > 
<div><input type=text id=indextext  onkeyup="loadXML()"><input type=button value='getfromdb' onclick="loadXML();"></div>
<div id="msg" style="width:500px; height:auto;"></div> 
 
</body>
</html>