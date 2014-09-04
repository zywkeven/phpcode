<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<script>
function AjaxDO(){ 
    this.HttpRequest = null; 
    this.openMethod = null; //HTTP请求的方法，为Get、Post 或者Head 
    this.openURL = null; //是目标URL。基于安全考虑，这个URL 只能是同网域的，否则会提示“没有权限”的错误。 
    this.openAsync = null; //是指定在等待服务器返回信息的时间内是否继续执行下面的代码。如果为False，则不会继续执行，直到服务器返回信息。默认为True。 
    this.ProcessRequestFunction = function(_HttpRequest) {return;} //处理返回信息的函数入口 
    this.ProcessRequestParam = null; //处理访问信息时的附加参数 
    this.LoadingImg = null; //正在载入的图片，一般为.gif动画   
    //初始化HttpRequest 
    this.InitHttpRequest = function(){ 
    var http; 
    if(window.XMLHttpRequest){
        http=new XMLHttpRequest();
        if(http.overrideMimeType){
            http.overrideMimeType("text/xml");
        }
    }else{
        try{
            http = new XMLHttpRequest();
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
            for (var i=0; i<XmlHttpVersions.length && !http; i++){
                try{  
                    http = new ActiveXObject(XmlHttpVersions[i]);
                }
                catch (e) {
                    
                }
            }
        }
    }
    if(!http){ 
        alert("It can not create XMLHttpRequest object!"); 
        return http; 
    } 
    this.HttpRequest = http; 
    return http; 
    } 
//检测 this.HttpRequest 
    this.checkHttpRequest = function(){ 
        if(!this.HttpRequest){ 
            return this.InitHttpRequest(); 
        } 
        return this.HttpRequest; 
    } 

    this.setRequestHeader = function(mime){ 
        if(!this.checkHttpRequest()){ 
            return false; 
        } 
        try{ 
            this.HttpRequest.setRequestHeader("Content-Type", mime);             
            return true; 
        }catch(e){ 
            if(e instanceof Error){ 
                alert("Modify MIME type error!"); 
                return false; 
            } 
        } 
    } 
//设置状态改变的事件触发器 
    this.setOnReadyStateChange = function(funHandle, Param){ 
        if(!this.checkHttpRequest()){ 
            return false; 
        } 
        this.ProcessRequestFunction = funHandle; 
        this.ProcessRequestParam = Param; 
        return true; 
    } 
    this.setLoadingImg = function(ImgID){ 
        this.LoadingImg = ImgID; 
    } 
//建立HTTP连接 

    this.Open = function(method, url, async, username, psw){ 
        if(!this.checkHttpRequest()){ 
            return false; 
        } 
        this.openMethod = method; 
        this.openURL = url; 
        this.openAsync = async; 
        if((this.openMethod==null) || ((this.openMethod.toUpperCase()!="GET")&&(this.openMethod.toUpperCase()!="POST")&&(this.openMethod.toUpperCase()!="HEAD"))){ 
            alert("HTTP Requset method should be Get、Post or Head!"); 
            return false; 
        } 
        if((this.openURL==null)||(this.openURL=="")){ 
            alert("Wrong URL"); 
            return false; 
        } 
        try{ 
            this.HttpRequest.open(this.openMethod, this.openURL, this.openAsync, username, psw); 
        }catch(e){ 
            if(e instanceof Error){ 
                alert("It can not connect HTTP"); 
                return false; 
            } 
        } 
        if(this.openMethod.toUpperCase()=="POST"){ 
            if(!this.setRequestHeader("application/x-www-form-urlencoded")){ 
                alert("Modify MIME type failed!"); 
                return false; 
            } 
        } 
        if(this.openAsync){ //异步模式，程序继续执行 
            if(this.ProcessRequestFunction==null){ 
                alert("Please type the process function!"); 
                return false; 
            } 
            var _http_request_ajax = this.HttpRequest; 
            var _this_ajax = this; 
            this.HttpRequest.onreadystatechange = function(){ 
                if(_http_request_ajax.readyState==4) { 
                    if(_http_request_ajax.status==200) { 
                        _this_ajax.ProcessRequestFunction(_http_request_ajax, _this_ajax.ProcessRequestParam, _this_ajax.LoadingImg); 
                    }else{ 
                        alert("Wrong url"); 
                        return false; 
                    } 
                } 
            } 
        } 
        if(this.LoadingImg!=null){ 
            funShow(this.LoadingImg); 
        } 
        return true; 
    } 
//向服务器发出HTTP请求 
//格式：name=value&anothername=othervalue&so=on 
    this.Send = function(idata){ 
        if(!this.checkHttpRequest()){ 
            return false; 
        } 
        var data = null; 
        if(this.openMethod.toUpperCase()=="POST"){ 
            data = funEscapeAll(idata); 
            //data = funEscapeAll(idata); 
        } 
        try{ 
            this.HttpRequest.send(data); 
            return true; 
        }catch(e){ 
            if(e instanceof Error){ 
                alert("HTTP request failed!"); 
                return false; 
            } 
        } 
    } 
//处理服务器返回的信息 
    this.getResponseText = function(type){
    
        if(!this.checkHttpRequest()){ 
            return false; 
        } 
        if(this.HttpRequest.readyState==4) { 
            if(this.HttpRequest.status==200) { 
                if((type!=null) && (type.toUpperCase()=="XML")){ 
                    return this.HttpRequest.responseXML; 
                } 
                return this.HttpRequest.responseText; 
            }else{ 
                alert("Wrong url"); 
                return false; 
            } 
        } 
    } 
//停止当前请求 
    this.abort = function(){ 
        if(!this.checkHttpRequest()){ 
            return false; 
        } 
        if(this.LoadingImg!=null){ 
            funHide(this.LoadingImg); 
        } 
        if(this.HttpRequest.readyState>0 && this.HttpRequest.readyState<4){ 
            this.HttpRequest.abort(); 
        } 
    } 
} 

function funEscapeAll(str){ 
    var t = "&"; 
    var s = str.split(t); 
    if(s.length<=0) return str; 
    for(var i=0; i<s.length; i++){     
        s[i] = funEscapeOne(s[i]); 
    }  
    return s.join(t); 
} 
function funEscapeOne(str){ 
    var i = str.indexOf("="); 
    if(i==-1) {
        return str; 
    }
    var t = URLEncode(str.substr(i+1));
    
    return str.substring(0, i+1)+t; 
} 
function URLEncode(str){ 
    return encodeURIComponent(str); 
} 

function funEscapeXML(content) { 
    if (content == undefined){ 
        return ""; 
    }
    if (!content.length || !content.charAt){
        content = new String(content);
    }
    var result = ""; 
    var length = content.length; 
    for (var i = 0; i < length; i++) { 
        var ch = content.charAt(i); 
        switch (ch) { 
            case '&': 
            result += "&"; 
            break; 
            case '<': 
            result += "<"; 
            break; 
            case '>': 
            result += ">"; 
            break; 
            case '"': 
            result += '"'; 
            break; 
            case "\\":           
            if(i<(length-1)&&content.charAt(i+1)=="'"){
                result += "'";   
                i+=1; 
           }             
            break; 
            default: 
            result += ch; 
        } 
    } 
    return result; 
}





/*
function processRequest(http_request){
    return (decodeURIComponent(http_request.responseText))   
} 

var data = "abc=文77777777777777d"; 
var ajax = new AjaxDO();
ajax.setOnReadyStateChange(processRequest); 
ajax.Open("POST", 'test.php', true); //异步模式，程序继续执行 
ajax.Send(data);*/

function changev(){
    //the dada shoulb be written by encodeURIComponent
var data = "abc="+encodeURIComponent(document.getElementById('test1').value);
 
var ajax = new AjaxDO();
ajax.setOnReadyStateChange(function(http_request){
    return;
    document.getElementById('test1').value=funEscapeXML(http_request.responseText)+'  end '
    //alert(data+ "       aaaaaa              "+http_request.responseText)
},data); 
ajax.Open("POST", 'test.php', true); //异步模式，程序继续执行 
ajax.Send(data);
alert('ccccc');
/*
ajax.Open("POST", 'test.php', false); //异步模式，程序继续执行 
ajax.Send(data);
var text_doc = ajax.getResponseText("TEXT"); */  
//alert(text_doc) 
}
</script>
<input type='text' id='test1'  >
<input type='button' value='click' onclick='changev()'>