<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Parsing XML Responses with the W3C DOM</title>
    
<script type="text/javascript">
var xmlHttp;
var requestType = ""; 
function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}
    
function startRequest(requestedList) {
    requestType = requestedList;
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = handleStateChange;
    xmlHttp.open("GET", "parseXML.xml", true);
    xmlHttp.send(null);
}
    
function handleStateChange() {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
            if(requestType == "north") {
                listNorthStates();
            }
            else if(requestType == "all") {
                listAllStates();
            }
        }
    }
}
 
function listNorthStates() {
    var xmlDoc = xmlHttp.responseXML;
    var northNode = xmlDoc.getElementsByTagName("north")[0];
    
    var out = "Northern States";
    var northStates = northNode.getElementsByTagName("state");
    
    outputList("Northern States", northStates);
}

function listAllStates() {
    var xmlDoc = xmlHttp.responseXML;
    var allStates = xmlDoc.getElementsByTagName("state");
    
    outputList("All States in Document", allStates);
}

function outputList(title, states) {
    var out = title;
    var currentState = null;
    for(var i = 0; i < states.length; i++) {
        currentState = states[i];
        out = out + "\n- " + currentState.childNodes[0].nodeValue;
    }
    
    alert(out);
}
</script>
</head>

<body>
    <h1>Process XML Document of U.S. States</h1>
    <br/><br/>
    <form action="#">
        <input type="button" value="View All Listed States" onclick="startRequest('all');"/>
        <br/><br/>
        <input type="button" value="View All Listed Northern States" onclick="startRequest('north');"/>
    </form>
</body>
</html>
