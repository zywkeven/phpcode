<script language="Javascript" type="text/javascript"> 
 
  <!--
  var states = Array("open");
  var cookieloaded = 0;
  var expireDate = new Date;
  expireDate.setDate(expireDate.getDate()+365);
 
  function cookieVal(cookieName) {
    var thisCookie = document.cookie.split("; ")
    for (var i = 0; i < thisCookie.length; i++) {
      if (cookieName == thisCookie[i].split("=")[0]) {
        return thisCookie[i].split("=")[1];
      }
    }
    return 0;
  }
 
  function saveStates() {
    document.cookie = "WS"+escape(this.location.search)+"="+states+";expires=" + expireDate.toGMTString();
  }
 
  var agt = navigator.userAgent.toLowerCase();
  var is_major = parseInt(navigator.appVersion);
  var is_nav = ((agt.indexOf('mozilla') != -1) && (agt.indexOf('spoofer') == -1) && (agt.indexOf('compatible') == -1) && (agt.indexOf('opera') == -1) && (agt.indexOf('webtv') == -1));
  var is_nav4up = (is_nav && (is_major >= 4));
  var is_ie = (agt.indexOf("msie") != -1);
  var is_ie3  = (is_ie && (is_major < 4));
  var is_ie4  = (is_ie && (is_major == 4) && (agt.indexOf("msie 5") == -1) && (agt.indexOf("msie 6") == -1));
  var is_ie4up = (is_ie && (is_major >= 4));
  var is_ie5up  = (is_ie  && !is_ie3 && !is_ie4);
  var is_mac = (agt.indexOf("mac") != -1);
  var is_gecko = (agt.indexOf("gecko") != -1);
  var view;
 
  function getItem (id) {
    var view;
    if (is_ie4) {
      view = eval(id);
    }
    if (is_ie5up || is_gecko) {
      view = document.getElementById(id);
    }
    return view;
  }
 
  function shade(id) {
    if(is_ie4up || is_gecko) {
 
      var shaderDiv = getItem('shader'+id);
      var shaderSpan = getItem('shaderspan'+id);
  //    var shaderImg = getItem('shaderimg'+id);
      var shaderImg = false;
      var footerTitle = getItem('title'+id);
      if(shaderDiv.style.display == 'block') {
        states[id] = "closed";
        shaderDiv.style.display = 'none';
        shaderSpan.innerHTML = '<span class="shadersmall">open&nbsp;</span><img alt="" src="images/shaderdown.gif" height="9" width="9" border="0" />';
        footerTitle.style.visibility = 'visible';
        if (shaderImg)
          shaderImg.src = 'images/expand.gif';
      } else {
        states[id] = "open";
        shaderDiv.style.display = 'block';
        footerTitle.style.visibility = 'hidden';
        shaderSpan.innerHTML = '<span class="shadersmall">close&nbsp;</span><img alt="" src="images/shaderup.gif" height="9" width="9" border="0" />';
        if (shaderImg){
          shaderImg.src = 'images/collapse.gif';
        }
      }
    }
    saveStates();
  }
 
  function getPref(number) {
    if (states[number] == "open") {
      return "block";
    } else if (states[number] == "closed") {
      return "none";
    }
    return "";
  }
 
  function start_div(number, default_status) {
    if (is_ie4up || is_gecko) {
      var pref = getPref(number);
      if (pref) {
        default_status = pref;
      } 
      document.writeln("<div id='shader" + number + "' name='shader" + number + "' class='shader' style='display: " + default_status + ";'>");
    }
  }
 
 
  function end_div(number, default_status) {
    if (is_ie4up || is_gecko) {
      document.writeln("</div>");
    }
  }
  var title_text = "";
  var span_text = "";
  var title_class = "";
 
  function open_span(number, default_status) {
    if (is_ie4up || is_gecko) {
      var pref = getPref(number);
      if (pref) {
        default_status = pref;
      }
      if(default_status == 'block') {
        span_text = '<span class="shadersmall">close&nbsp;</span><img src="images/shaderup.gif" alt="" height="9" width="9" border="0" />';
      } else {
        span_text = '<span class="shadersmall">open&nbsp;</span><img src="images/shaderdown.gif" alt="" height="9" width="9" border="0" />';
      }
      document.writeln("<a href='javascript: shade(" + number + ");'><span id='shaderspan" + number + "' class='shadersmalltext'>" + span_text + "</span></a>");
    }
  }
 
  function title_span(number,default_status,title) {
    if (is_ie4up || is_gecko) {
      var pref = getPref(number);
      if (pref) {
        default_status = pref;
      }
      if(default_status == 'none') {
        title_text = '<img src="images/expand.gif" alt="" height="9" width="9" border="0" />  '+title;
        title_class = "shaderfootertextvisible";
      } else {
        title_text = '<img src="images/collapse.gif" alt="" height="9" width="9" border="0" />   '+title;
        title_class = "shaderfootertexthidden";
      }
      document.writeln("<a href='javascript: shade(" + number + ");'><span id='title" + number + "' class='"+title_class+"'>" + title_text + "</span></a>");
    }
  }
//-->
</script>
    
<div class="tablewrapper">
<table width="98%" align="center" cellpadding="0" cellspacing="0" border="1">
  <tr>
      <td colspan="4" class="shaderdivider"><img src="images/transparent.png" height="1" alt="" border="0" width="1" /></td>
  </tr>
    
  <tr>
      <td class="shaderdivider"><img src="images/transparent.png" alt="" height="1" border="0" width="1" /></td>
      <td colspan="2">
      <script language="javascript" type="text/javascript">start_div(0,'block')</script>
      
      <table cellpadding="0" cellspacing="0" border="1" width="100%">
      <tr valign="top"><td><a name="users"></a><div class="listinghdname">users</div></td><td><div class="listinghdelement">confirmed</div></td><td><div class="listinghdelement">bl l</div></td><td><div class="listinghdelement">del</div></td><td><div class="listinghdelement">key</div></td><td><div class="listinghdelement">lists</div></td><td><div class="listinghdelement">msgs</div></td><td><div class="listinghdelement">bncs</div></td></tr>
      
      <tr valign="middle" class=""><td valign="top"  class="listingname"><span class="listingname"><a href="./?page=user&amp;start=0&amp;id=5&amp;find=&amp;sortby=&amp;sortorder=desc&amp;unconfirmed=0&amp;blacklisted=0" class="listingname">zyweleven@163.com</a></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/tick.gif" alt="Yes"></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><a href="javascript:deleteRec('./?page=users&amp;start=0&amp;delete=5');">del</a></span></td><td valign="top" class="listingelement"><span class="listingelement"></span></td><td valign="top" class="listingelement"><span class="listingelement">2</span></td><td valign="top" class="listingelement"><span class="listingelement">1</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td></tr><!--greenline start-->
      
      <tr valign="middle">
      <td colspan="9" bgcolor="#CCCC99"><img height="1" alt="" src="images/transparent.png" width="1" border="0" /></td>
      </tr>
      <!--greenline end-->
    <tr valign="middle" class=""><td valign="top"  class="listingname"><span class="listingname"><a href="./?page=user&amp;start=0&amp;id=7&amp;find=&amp;sortby=&amp;sortorder=desc&amp;unconfirmed=0&amp;blacklisted=0" class="listingname">zywkeven@163.com</a></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/tick.gif" alt="Yes"></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><a href="javascript:deleteRec('./?page=users&amp;start=0&amp;delete=7');">del</a></span></td><td valign="top" class="listingelement"><span class="listingelement"></span></td><td valign="top" class="listingelement"><span class="listingelement">2</span></td><td valign="top" class="listingelement"><span class="listingelement">1</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td></tr><!--greenline start-->
      <tr valign="middle">
      <td colspan="9" bgcolor="#CCCC99"><img height="1" alt="" src="images/transparent.png" width="1" border="0" /></td>
      </tr>
      <!--greenline end-->
    <tr valign="middle" class=""><td valign="top"  class="listingname"><span class="listingname"><a href="./?page=user&amp;start=0&amp;id=36&amp;find=&amp;sortby=&amp;sortorder=desc&amp;unconfirmed=0&amp;blacklisted=0" class="listingname">loginname</a></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/tick.gif" alt="Yes"></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><a href="javascript:deleteRec('./?page=users&amp;start=0&amp;delete=36');">del</a></span></td><td valign="top" class="listingelement"><span class="listingelement"></span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td></tr><!--greenline start-->
      <tr valign="middle">
      <td colspan="9" bgcolor="#CCCC99"><img height="1" alt="" src="images/transparent.png" width="1" border="0" /></td>
      </tr>
      <!--greenline end-->
    <tr valign="middle" class=""><td valign="top"  class="listingname"><span class="listingname"><a href="./?page=user&amp;start=0&amp;id=37&amp;find=&amp;sortby=&amp;sortorder=desc&amp;unconfirmed=0&amp;blacklisted=0" class="listingname">avcdf11</a></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/tick.gif" alt="Yes"></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><a href="javascript:deleteRec('./?page=users&amp;start=0&amp;delete=37');">del</a></span></td><td valign="top" class="listingelement"><span class="listingelement"></span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td></tr><!--greenline start-->
      <tr valign="middle">
      <td colspan="9" bgcolor="#CCCC99"><img height="1" alt="" src="images/transparent.png" width="1" border="0" /></td>
      </tr>
      <!--greenline end-->
    <tr valign="middle" class=""><td valign="top"  class="listingname"><span class="listingname"><a href="./?page=user&amp;start=0&amp;id=38&amp;find=&amp;sortby=&amp;sortorder=desc&amp;unconfirmed=0&amp;blacklisted=0" class="listingname">avcdf1133</a></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/tick.gif" alt="Yes"></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><a href="javascript:deleteRec('./?page=users&amp;start=0&amp;delete=38');">del</a></span></td><td valign="top" class="listingelement"><span class="listingelement"></span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td></tr><!--greenline start-->
      <tr valign="middle">
      <td colspan="9" bgcolor="#CCCC99"><img height="1" alt="" src="images/transparent.png" width="1" border="0" /></td>
      </tr>
      <!--greenline end-->
    <tr valign="middle" class=""><td valign="top"  class="listingname"><span class="listingname"><a href="./?page=user&amp;start=0&amp;id=39&amp;find=&amp;sortby=&amp;sortorder=desc&amp;unconfirmed=0&amp;blacklisted=0" class="listingname">sdfsf@sdfds.sdfdsf</a></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><img src="images/cross.gif" alt="No"></span></td><td valign="top" class="listingelement"><span class="listingelement"><a href="javascript:deleteRec('./?page=users&amp;start=0&amp;delete=39');">del</a></span></td><td valign="top" class="listingelement"><span class="listingelement"></span></td><td valign="top" class="listingelement"><span class="listingelement">1</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td><td valign="top" class="listingelement"><span class="listingelement">0</span></td></tr><!--greenline start-->
      <tr valign="middle">
      <td colspan="9" bgcolor="#CCCC99"><img height="1" alt="" src="images/transparent.png" width="1" border="0" /></td>
      </tr>
      <!--greenline end-->  
    </table>
    
    <script language="javascript" type="text/javascript">end_div();</script>
    
    
    </td>
 
    <td class="shaderdivider"><img src="images/transparent.png" alt="" height="1" border="0" width="1" /></td>
  </tr>
 
  <tr>
    <td class="shaderborder"><img src="images/transparent.png" alt="" height="1" border="0" width="1" /></td>
    <td class="shaderfooter"><script language="javascript"  type="text/javascript">title_span(0,'block','users');</script>&nbsp;</td>
    <td class="shaderfooterright"><script language="javascript" type="text/javascript">open_span(0,'block');</script>&nbsp;</td>
    <td class="shaderborder"><img src="images/transparent.png" alt="" height="1" border="0" width="1" /></td>
  </tr>
 
  <tr>
      <td colspan="4" class="shaderdivider"><img src="images/transparent.png" height="1" alt="" border="0" width="1" /></td>
  </tr>
    
</table><!-- End table from header -->
</div><!-- End tablewrapper -->
    
 
</div>
</td>

</tr>
 
 
 
 
<tr><td colspan="4">&nbsp;</td></tr>
 
 
 
<tr><td colspan="4">&nbsp;</td></tr>
</table>
