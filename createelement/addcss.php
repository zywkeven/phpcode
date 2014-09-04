
<script>
function AttachStyle(styDom, styCss, styId){    
    var istyle = styDom.createElement('style');    
    istyle.setAttribute("type", "text/css");    
    if(styId!=null){if(!document.getElementById(styId)){istyle.setAttribute("id", styId);}}    
    if (istyle.styleSheet){    
        istyle.styleSheet.cssText=styCss;    
    }else{    
        istyle.appendChild(styDom.createTextNode(styCss));    
    }    
    styDom.getElementsByTagName("head")[0].appendChild(istyle);    
}  
//className=""
</script>