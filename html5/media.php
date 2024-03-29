http://www.whatwg.org/specs/web-apps/current-work/#the-canvas
<!DOCTYPE html> 
<html class="split chapter" lang="en-US-x-hixie"><title>4.8.6 The video element &mdash; HTML5 (including next generation additions still in development)</title><script> 
   var loadTimer = new Date();
   var current_revision = "r" + "$Revision: 5065 $".substr(11);
   current_revision = current_revision.substr(0, current_revision.length - 2);
   var last_known_revision = current_revision;
   function getCookie(name) {
     var params = location.search.substr(1).split("&");
     for (var index = 0; index < params.length; index++) {
       if (params[index] == name)
         return "1";
       var data = params[index].split("=");
       if (data[0] == name)
         return unescape(data[1]);
     }
     var cookies = document.cookie.split("; ");
     for (var index = 0; index < cookies.length; index++) {
       var data = cookies[index].split("=");
       if (data[0] == name)
         return unescape(data[1]);
     }
     return null;
   }
   var currentAlert;
   var currentAlertTimeout;
   function showAlert(s, href) {
     if (!currentAlert) {
       currentAlert = document.createElement('div');
       currentAlert.id = 'alert';
       var x = document.createElement('button');
       x.textContent = '\u2573';
       x.onclick = closeAlert2;
       currentAlert.appendChild(x);
       currentAlert.appendChild(document.createElement('span'));
       currentAlert.onmousemove = function () {
         clearTimeout(currentAlertTimeout);
         currentAlert.className = '';
         currentAlertTimeout = setTimeout(closeAlert, 10000);
       }
       document.body.appendChild(currentAlert);
     } else {
       clearTimeout(currentAlertTimeout);
       currentAlert.className = '';
     }
     currentAlert.lastChild.textContent = s + ' ';
     if (href) {
       var link = document.createElement('a');
       link.href = href;
       link.textContent = href;
       currentAlert.lastChild.appendChild(link);
     }
     currentAlertTimeout = setTimeout(closeAlert, 10000);
   }
   function closeAlert() {
     clearTimeout(currentAlertTimeout);
     if (currentAlert) {
       currentAlert.className = 'closed';
       currentAlertTimeout = setTimeout(closeAlert2, 3000);
     }
   }
   function closeAlert2() {
     clearTimeout(currentAlertTimeout);
     if (currentAlert) {
       currentAlert.parentNode.removeChild(currentAlert);
       currentAlert = null;
     }
   }
   window.addEventListener('keydown', function (event) {
     if (event.keyCode == 27) {
       if (currentAlert)
         closeAlert2();
     } else {
       closeAlert();
     }
   }, false);
   window.addEventListener('scroll', function (event) {
     closeAlert();
   }, false);
   function load(script) {
     var e = document.createElement('script');
     e.setAttribute('src', 'http://www.whatwg.org/specs/web-apps/current-work/' + script + '?' + encodeURIComponent(location) + '&' + encodeURIComponent(document.referrer));
     document.body.appendChild(e);
   }
  </script><link href="/style/specification" rel="stylesheet"><link href="/images/icon" rel="icon"><style> 
   .proposal { border: blue solid; padding: 1em; }
   .bad, .bad *:not(.XXX) { color: gray; border-color: gray; background: transparent; }
   #updatesStatus { display: none; }
   #updatesStatus.relevant { display: block; position: fixed; right: 1em; top: 1em; padding: 0.5em; font: bold small sans-serif; min-width: 25em; width: 30%; max-width: 40em; height: auto; border: ridge 4px gray; background: #EEEEEE; color: black; }
   div.head .logo { width: 11em; margin-bottom: 20em; }
   #configUI { position: absolute; z-index: 20; top: 10em; right: 0; width: 11em; padding: 0 0.5em 0 0.5em; font-size: small; background: gray; background: rgba(32,32,32,0.9); color: white; border-radius: 1em 0 0 1em; -moz-border-radius: 1em 0 0 1em; }
   #configUI p { margin: 0.75em 0; padding: 0.3em; }
   #configUI p label { display: block; }
   #configUI #updateUI, #configUI .loginUI { text-align: center; }
   #configUI input[type=button] { display: block; margin: auto; }
   #configUI :link, #configUI :visited { color: white; }
   #configUI :link:hover, #configUI :visited:hover { background: transparent; }
   #reviewer { position: fixed; bottom: 0; right: 0; padding: 0.15em 0.25em 0em 0.5em; white-space: nowrap; overflow: hidden; z-index: 30; background: gray; background: rgba(32,32,32,0.9); color: white; border-radius: 1em 0 0 0; -moz-border-radius: 1em 0 0 0; max-width: 90%; }
   #reviewer input { max-width: 50%; }
   #reviewer * { font-size: small; }
   #reviewer.off > :not(:first-child) { display: none; }
   #alert { position: fixed; top: 20%; left: 20%; right: 20%; font-size: 2em; padding: 0.5em; z-index: 40; background: gray; background: rgba(32,32,32,0.9); color: white; border-radius: 1em; -moz-border-radius: 1em; -webkit-transition: opacity 1s linear; }
   #alert.closed { opacity: 0; }
   #alert button { position: absolute; top: -1em; right: 2em; border-radius: 1em 1em 0 0; border: none; line-height: 0.9; color: white; background: rgb(64,64,64); font-size: 0.6em; font-weight: 900; cursor: pointer; }
   #alert :link, #alert :visited { color: white; }
   #alert :link:hover, #alert :visited:hover { background: transparent; }
   @media print { #configUI { display: none; } }
   .rfc2119 { font-variant: small-caps; text-shadow: 0 0 0.5em yellow; position: static; }
   .rfc2119::after { position: absolute; left: 0; width: 25px; text-align: center; color: yellow; text-shadow: 0.075em 0.075em 0.2em black; }
   .rfc2119.m\ust::after { content: '\2605'; }
   .rfc2119.s\hould::after { content: '\2606'; }
   [hidden] { display: none; }
  </style><style type="text/css"> 
 
   .applies thead th > * { display: block; }
   .applies thead code { display: block; }
   .applies tbody th { whitespace: nowrap; }
   .applies td { text-align: center; }
   .applies .yes { background: yellow; }
 
   .matrix, .matrix td { border: none; text-align: right; }
   .matrix { margin-left: 2em; }
 
   .dice-example { border-collapse: collapse; border-style: hidden solid solid hidden; border-width: thin; margin-left: 3em; }
   .dice-example caption { width: 30em; font-size: smaller; font-style: italic; padding: 0.75em 0; text-align: left; }
   .dice-example td, .dice-example th { border: solid thin; width: 1.35em; height: 1.05em; text-align: center; padding: 0; }
 
   #table-example-1 { border: solid thin; border-collapse: collapse; margin-left: 3em; }
   #table-example-1 * { font-family: "Essays1743", serif; line-height: 1.01em; }
   #table-example-1 caption { padding-bottom: 0.5em; }
   #table-example-1 thead, #table-example-1 tbody { border: none; }
   #table-example-1 th, #table-example-1 td { border: solid thin; }
   #table-example-1 th { font-weight: normal; }
   #table-example-1 td { border-style: none solid; vertical-align: top; }
   #table-example-1 th { padding: 0.5em; vertical-align: middle; text-align: center; }
   #table-example-1 tbody tr:first-child td { padding-top: 0.5em; }
   #table-example-1 tbody tr:last-child td { padding-bottom: 1.5em; }
   #table-example-1 tbody td:first-child { padding-left: 2.5em; padding-right: 0; width: 9em; }
   #table-example-1 tbody td:first-child::after { content: leader(". "); }
   #table-example-1 tbody td { padding-left: 2em; padding-right: 2em; }
   #table-example-1 tbody td:first-child + td { width: 10em; }
   #table-example-1 tbody td:first-child + td ~ td { width: 2.5em; }
   #table-example-1 tbody td:first-child + td + td + td ~ td { width: 1.25em; }
 
   .apple-table-examples { border: none; border-collapse: separate; border-spacing: 1.5em 0em; width: 40em; margin-left: 3em; }
   .apple-table-examples * { font-family: "Times", serif; }
   .apple-table-examples td, .apple-table-examples th { border: none; white-space: nowrap; padding-top: 0; padding-bottom: 0; }
   .apple-table-examples tbody th:first-child { border-left: none; width: 100%; }
   .apple-table-examples thead th:first-child ~ th { font-size: smaller; font-weight: bolder; border-bottom: solid 2px; text-align: center; }
   .apple-table-examples tbody th::after, .apple-table-examples tfoot th::after { content: leader(". ") }
   .apple-table-examples tbody th, .apple-table-examples tfoot th { font: inherit; text-align: left; }
   .apple-table-examples td { text-align: right; vertical-align: top; }
   .apple-table-examples.e1 tbody tr:last-child td { border-bottom: solid 1px; }
   .apple-table-examples.e1 tbody + tbody tr:last-child td { border-bottom: double 3px; }
   .apple-table-examples.e2 th[scope=row] { padding-left: 1em; }
   .apple-table-examples sup { line-height: 0; }
 
   .details-example img { vertical-align: top; }
 
   #named-character-references-table {
     font-size: 0.6em;
     column-width: 28em;
     column-gap: 1em;
     -moz-column-width: 28em;
     -moz-column-gap: 1em;
     -webkit-column-width: 28em;
     -webkit-column-gap: 1em;
   }
   #named-character-references-table > table > tbody > tr > td:last-child { text-align: center; }
   #named-character-references-table > table > tbody > tr > td:last-child:hover > span { position: absolute; top: auto; left: auto; margin-left: 0.5em; line-height: 1.2; font-size: 5em; border: outset; padding: 0.25em 0.5em; background: white; width: 1.25em; height: auto; text-align: center; }
 
  </style><style> 
   .domintro:before { display: table; margin: -1em -0.5em -0.5em auto; width: auto; content: 'This box is non-normative. Implementation requirements are given below this box.'; color: black; font-style: italic; border: solid 2px; background: white; padding: 0 0.25em; }
  </style><link href="data:text/css," id="complete" rel="stylesheet" title="Complete specification"><link href="data:text/css,.impl%20{%20display:%20none;%20}%0Ahtml%20{%20border:%20solid%20yellow;%20}%20.domintro:before%20{%20display:%20none;%20}" id="author" rel="alternate stylesheet" title="Author documentation only"><link href="data:text/css,.impl%20{%20background:%20%23FFEEEE;%20}%20.domintro:before%20{%20background:%20%23FFEEEE;%20}" id="highlight" rel="alternate stylesheet" title="Highlight implementation requirements"><link href="status.css" rel="stylesheet"><script> 
   function init() {
     if (location.search == '?slow-browser')
       return;
     var configUI = document.createElement('div');
     configUI.id = 'configUI';
     document.body.appendChild(configUI);
     load('reviewer.js');
     if (document.documentElement.className == "" || document.documentElement.className == "split index")
       load('toc.js');
     load('styler.js');
     load('updater.js');
     load('dfn.js');
     load('status.js');
     if (getCookie('profile') == '1')
       document.getElementsByTagName('h2')[0].textContent += '; load: ' + (new Date() - loadTimer) + 'ms';
   }
  </script> 
  <script src="link-fixup.js"></script> 
  <link href="the-iframe-element.html" rel="prev" title="4.8.2 The iframe element"> 
  <link href="index.html#contents" rel="index" title="Table of contents"> 
  <link href="the-canvas-element.html" rel="next" title="4.8.10 The canvas element"> 
  <body class="draft" onload="fixBrokenLink(); init()"><header class="head" id="head"><p><a class="logo" href="http://www.whatwg.org/" rel="home"><img alt="WHATWG" src="/images/logo"></a></p> 
   <hgroup><h1>HTML5 (including next generation additions still in development)</h1> 
    <h2 class="no-num no-toc">Draft Standard &mdash; 26 April 2010</h2> 
   </hgroup></header><nav> 
   <a href="the-iframe-element.html">&larr; 4.8.2 The iframe element</a> &ndash;
   <a href="index.html#contents">Table of contents</a> &ndash;
   <a href="the-canvas-element.html">4.8.10 The canvas element &rarr;</a> 
  <ol class="toc"><li><ol><li><ol><li><a href="video.html#video"><span class="secno">4.8.6 </span>The <code>video</code> element</a><li><a href="video.html#audio"><span class="secno">4.8.7 </span>The <code>audio</code> element</a><li><a href="video.html#the-source-element"><span class="secno">4.8.8 </span>The <code>source</code> element</a><li><a href="video.html#media-elements"><span class="secno">4.8.9 </span>Media elements</a> 
      <ol><li><a href="video.html#error-codes"><span class="secno">4.8.9.1 </span>Error codes</a><li><a href="video.html#location-of-the-media-resource"><span class="secno">4.8.9.2 </span>Location of the media resource</a><li><a href="video.html#mime-types"><span class="secno">4.8.9.3 </span>MIME types</a><li><a href="video.html#network-states"><span class="secno">4.8.9.4 </span>Network states</a><li><a href="video.html#loading-the-media-resource"><span class="secno">4.8.9.5 </span>Loading the media resource</a><li><a href="video.html#offsets-into-the-media-resource"><span class="secno">4.8.9.6 </span>Offsets into the media resource</a><li><a href="video.html#the-ready-states"><span class="secno">4.8.9.7 </span>The ready states</a><li><a href="video.html#playing-the-media-resource"><span class="secno">4.8.9.8 </span>Playing the media resource</a><li><a href="video.html#seeking"><span class="secno">4.8.9.9 </span>Seeking</a><li><a href="video.html#user-interface"><span class="secno">4.8.9.10 </span>User interface</a><li><a href="video.html#time-ranges"><span class="secno">4.8.9.11 </span>Time ranges</a><li><a href="video.html#mediaevents"><span class="secno">4.8.9.12 </span>Event summary</a><li><a href="video.html#security-and-privacy-considerations"><span class="secno">4.8.9.13 </span>Security and privacy considerations</a></ol></ol></ol></ol></nav> 
 
  <h4 id="video"><span class="secno">4.8.6 </span>The <dfn><code>video</code></dfn> element</h4> 
 
  <dl class="element"><dt>Categories</dt> 
   <dd><a href="content-models.html#flow-content">Flow content</a>.</dd> 
   <dd><a href="content-models.html#phrasing-content">Phrasing content</a>.</dd> 
   <dd><a href="content-models.html#embedded-content">Embedded content</a>.</dd> 
   <dd>If the element has a <code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code> attribute: <a href="content-models.html#interactive-content">Interactive content</a>.</dd> 
   <dt>Contexts in which this element may be used:</dt> 
   <dd>Where <a href="content-models.html#embedded-content">embedded content</a> is expected.</dd> 
   <dt>Content model:</dt> 
   <dd>If the element has a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute: <a href="content-models.html#transparent">transparent</a>, but with no <a href="#media-element">media element</a> descendants.</dd> 
   <dd>If the element does not have a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute: one or more <code><a href="#the-source-element">source</a></code> elements, then, <a href="content-models.html#transparent">transparent</a>, but with no <a href="#media-element">media element</a> descendants.</dd> 
   <dt>Content attributes:</dt> 
   <dd><a href="elements.html#global-attributes">Global attributes</a></dd> 
   <dd><code title="attr-media-src"><a href="#attr-media-src">src</a></code></dd> 
   <dd><code title="attr-video-poster"><a href="#attr-video-poster">poster</a></code></dd> 
   <dd><code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code></dd> 
   <dd><code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code></dd> 
   <dd><code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code></dd> 
   <dd><code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code></dd> 
   <dd><code title="attr-dim-width"><a href="the-map-element.html#attr-dim-width">width</a></code></dd> 
   <dd><code title="attr-dim-height"><a href="the-map-element.html#attr-dim-height">height</a></code></dd> 
   <dt>DOM interface:</dt> 
   <dd> 
    <pre class="idl">interface <dfn id="htmlvideoelement">HTMLVideoElement</dfn> : <a href="#htmlmediaelement">HTMLMediaElement</a> {
           attribute DOMString <a href="the-map-element.html#dom-dim-width" title="dom-dim-width">width</a>;
           attribute DOMString <a href="the-map-element.html#dom-dim-height" title="dom-dim-height">height</a>;
  readonly attribute unsigned long <a href="#dom-video-videowidth" title="dom-video-videoWidth">videoWidth</a>;
  readonly attribute unsigned long <a href="#dom-video-videoheight" title="dom-video-videoHeight">videoHeight</a>;
           attribute DOMString <a href="#dom-video-poster" title="dom-video-poster">poster</a>;
};</pre> 
   </dd> 
  </dl><p>A <code><a href="#video">video</a></code> element is used for playing videos or
  movies.</p> 
 
  <p>Content may be provided inside the <code><a href="#video">video</a></code> 
  element<span class="impl">. User agents should not show this content
  to the user</span>; it is intended for older Web browsers which do
  not support <code><a href="#video">video</a></code>, so that legacy video plugins can be
  tried, or to show text to the users of these older browsers informing
  them of how to access the video contents.</p> 
 
  <p class="note">In particular, this content is not intended to
  address accessibility concerns. To make video content accessible to
  the blind, deaf, and those with other physical or cognitive
  disabilities, authors are expected to provide alternative media
  streams and/or to embed accessibility aids (such as caption or
  subtitle tracks, audio description tracks, or sign-language
  overlays) into their media streams.</p> 
 
  <p>The <code><a href="#video">video</a></code> element is a <a href="#media-element">media element</a> 
  whose <a href="#media-data">media data</a> is ostensibly video data, possibly
  with associated audio data.</p> 
 
  <p>The <code title="attr-media-src"><a href="#attr-media-src">src</a></code>, <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code>, <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code>, <code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code>, and <code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code> attributes are <a href="#media-element-attributes" title="media element attributes">the attributes common to all media
  elements</a>.</p> 
 
  <p>The <dfn id="attr-video-poster" title="attr-video-poster"><code>poster</code></dfn> 
  attribute gives the address of an image file that the user agent can
  show while no video data is available. The attribute, if present,
  must contain a <a href="urls.html#valid-non-empty-url-potentially-surrounded-by-spaces">valid non-empty URL potentially surrounded by
  spaces</a>. <span class="impl">If the specified resource is to be
  used, then, when the element is created or when the <code title="attr-video-poster"><a href="#attr-video-poster">poster</a></code> attribute is set, if its
  value is not the empty string, its value must be <a href="urls.html#resolve-a-url" title="resolve a url">resolved</a> relative to the element, and
  if that is successful, the resulting <a href="urls.html#absolute-url">absolute URL</a> must
  be <a href="urls.html#fetch" title="fetch">fetched</a>, from the element's
  <code><a href="infrastructure.html#document">Document</a></code>'s <a href="origin-0.html#origin">origin</a>; this must <a href="the-end.html#delay-the-load-event">delay
  the load event</a> of the element's document. The <dfn id="poster-frame">poster
  frame</dfn> is then the image obtained from that resource, if
  any.</span></p> <!-- thus it is unaffected by changes to the base
  URL. --> 
 
  <p class="note">The image given by the <code title="attr-video-poster"><a href="#attr-video-poster">poster</a></code> attribute, the <i><a href="#poster-frame">poster
  frame</a></i>, is intended to be a representative frame of the video
  (typically one of the first non-blank frames) that gives the user an
  idea of what the video is like.</p> 
 
  <div class="impl"> 
 
  <p>The <dfn id="dom-video-poster" title="dom-video-poster"><code>poster</code></dfn> IDL
  attribute must <a href="urls.html#reflect">reflect</a> the <code title="attr-video-poster"><a href="#attr-video-poster">poster</a></code> content attribute.</p> 
 
  <hr><p>When no video data is available (the element's <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute is either
  <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>, or <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> but no video
  data has yet been obtained at all), the <code><a href="#video">video</a></code> element
  <a href="rendering.html#represents">represents</a> either the <a href="#poster-frame">poster frame</a>, or
  nothing.</p> 
 
  <p>When a <code><a href="#video">video</a></code> element is <a href="#dom-media-paused" title="dom-media-paused">paused</a> and the <a href="#current-playback-position" title="current
  playback position">current playback position</a> is the first
  frame of video, the element <a href="rendering.html#represents">represents</a> either the frame
  of video corresponding to the <a href="#current-playback-position" title="current playback
  position">current playback position</a> or the <a href="#poster-frame">poster
  frame</a>, at the discretion of the user agent.</p> 
 
  <p>Notwithstanding the above, the <a href="#poster-frame">poster frame</a> should
  be preferred over nothing, but the <a href="#poster-frame">poster frame</a> should
  not be shown again after a frame of video has been shown.</p> 
 
  <p>When a <code><a href="#video">video</a></code> element is <a href="#dom-media-paused" title="dom-media-paused">paused</a> at any other position, the
  element <a href="rendering.html#represents">represents</a> the frame of video corresponding to
  the <a href="#current-playback-position" title="current playback position">current playback
  position</a>, or, if that is not yet available (e.g. because the
  video is seeking or buffering), the last frame of the video to have
  been rendered.</p> 
 
  <p>When a <code><a href="#video">video</a></code> element is <a href="#potentially-playing">potentially
  playing</a>, it <a href="rendering.html#represents">represents</a> the frame of video at the
  continuously increasing <a href="#current-playback-position" title="current playback
  position">"current" position</a>. When the <a href="#current-playback-position">current playback
  position</a> changes such that the last frame rendered is no
  longer the frame corresponding to the <a href="#current-playback-position">current playback
  position</a> in the video, the new frame must be
  rendered. Similarly, any audio associated with the video must, if
  played, be played synchronized with the <a href="#current-playback-position">current playback
  position</a>, at the specified <a href="#dom-media-volume" title="dom-media-volume">volume</a> with the specified <a href="#dom-media-muted" title="dom-media-muted">mute state</a>.</p> 
 
  <p>When a <code><a href="#video">video</a></code> element is neither <a href="#potentially-playing">potentially
  playing</a> nor <a href="#dom-media-paused" title="dom-media-paused">paused</a> 
  (e.g. when seeking or stalled), the element <a href="rendering.html#represents">represents</a> 
  the last frame of the video to have been rendered.</p> 
 
  <p class="note">Which frame in a video stream corresponds to a
  particular playback position is defined by the video stream's
  format.</p> 
 
  <p>In addition to the above, the user agent may provide messages to
  the user (such as "buffering", "no video loaded", "error", or more
  detailed information) by overlaying text or icons on the video or
  other areas of the element's playback area, or in another
  appropriate manner.</p> 
 
  <p>User agents that cannot render the video may instead make the
  element <a href="rendering.html#represents" title="represents">represent</a> a link to an
  external video playback utility or to the video data itself.</p> 
 
  <hr></div> 
 
  <dl class="domintro"><dt><var title="">video</var> . <code title="dom-video-videoWidth"><a href="#dom-video-videowidth">videoWidth</a></code></dt> 
   <dt><var title="">video</var> . <code title="dom-video-videoHeight"><a href="#dom-video-videoheight">videoHeight</a></code></dt> 
 
   <dd> 
 
    <p>These attributes return the intrinsic dimensions of the video,
    or zero if the dimensions are not known.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="concept-video-intrinsic-width" title="concept-video-intrinsic-width">intrinsic
  width</dfn> and <dfn id="concept-video-intrinsic-height" title="concept-video-intrinsic-height">intrinsic height</dfn> of the
  <a href="#media-resource">media resource</a> are the dimensions of the resource in
  CSS pixels after taking into account the resource's dimensions,
  aspect ratio, clean aperture, resolution, and so forth, as defined
  for the format used by the resource. If an anamorphic format does
  not define how to apply the aspect ratio to the video data's
  dimensions to obtain the "correct" dimensions, then the user agent
  must apply the ratio by increasing one dimension and leaving the
  other unchanged.</p> 
 
  <p>The <dfn id="dom-video-videowidth" title="dom-video-videoWidth"><code>videoWidth</code></dfn> IDL
  attribute must return the <a href="#concept-video-intrinsic-width" title="concept-video-intrinsic-width">intrinsic width</a> of the
  video in CSS pixels. The <dfn id="dom-video-videoheight" title="dom-video-videoHeight"><code>videoHeight</code></dfn> IDL
  attribute must return the <a href="#concept-video-intrinsic-height" title="concept-video-intrinsic-height">intrinsic height</a> of
  the video in CSS pixels. If the element's <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute is <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>, then the
  attributes must return 0.</p> 
 
  </div> 
 
  <p>The <code><a href="#video">video</a></code> element supports <a href="the-map-element.html#dimension-attributes">dimension
  attributes</a>.</p> 
 
  <div class="impl"> 
 
  <p>Video content should be rendered inside the element's playback
  area such that the video content is shown centered in the playback
  area at the largest possible size that fits completely within it,
  with the video content's aspect ratio being preserved. Thus, if the
  aspect ratio of the playback area does not match the aspect ratio of
  the video, the video will be shown letterboxed or pillarboxed. Areas
  of the element's playback area that do not contain the video
  represent nothing.</p> 
 
  <p>The intrinsic width of a <code><a href="#video">video</a></code> element's playback
  area is the <a href="#concept-video-intrinsic-width" title="concept-video-intrinsic-width">intrinsic
  width</a> of the video resource, if that is available; otherwise
  it is the intrinsic width of the <a href="#poster-frame">poster frame</a>, if that
  is available; otherwise it is 300 CSS pixels.</p> 
 
  <p>The intrinsic height of a <code><a href="#video">video</a></code> element's playback
  area is the <a href="#concept-video-intrinsic-height" title="concept-video-intrinsic-height">intrinsic
  height</a> of the video resource, if that is available; otherwise
  it is the intrinsic height of the <a href="#poster-frame">poster frame</a>, if that
  is available; otherwise it is 150 CSS pixels.</p> 
 
  <hr><p>User agents should provide controls to enable or disable the
  display of closed captions, audio description tracks, and other
  additional data associated with the video stream, though such
  features should, again, not interfere with the page's normal
  rendering.</p> 
 
  <p>User agents may allow users to view the video content in manners
  more suitable to the user (e.g. full-screen or in an independent
  resizable window). As for the other user interface features,
  controls to enable this should not interfere with the page's normal
  rendering unless the user agent is <a href="#expose-a-user-interface-to-the-user" title="expose a user
  interface to the user">exposing a user interface</a>. In such an
  independent context, however, user agents may make full user
  interfaces visible, with, e.g., play, pause, seeking, and volume
  controls, even if the <code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code> attribute is absent.</p> 
 
  <p>User agents may allow video playback to affect system features
  that could interfere with the user's experience; for example, user
  agents could disable screensavers while video playback is in
  progress.</p> 
 
  <p class="warning">User agents should not provide a public API to
  cause videos to be shown full-screen. A script, combined with a
  carefully crafted video file, could trick the user into thinking a
  system-modal dialog had been shown, and prompt the user for a
  password. There is also the danger of "mere" annoyance, with pages
  launching full-screen videos when links are clicked or pages
  navigated. Instead, user-agent-specific interface features may be
  provided to easily allow the user to obtain a full-screen playback
  mode.</p> 
 
  </div> 
 
  <div class="example"> 
 
   <p>This example shows how to detect when a video has failed to play
   correctly:</p> 
 
   <pre>&lt;script&gt;
 function failed(e) {
   // video playback failed - show a message saying why
   switch (e.target.error.code) {
     case e.target.error.MEDIA_ERR_ABORTED:
       alert('You aborted the video playback.');
       break;
     case e.target.error.MEDIA_ERR_NETWORK:
       alert('A network error caused the video download to fail part-way.');
       break;
     case e.target.error.MEDIA_ERR_DECODE:
       alert('The video playback was aborted due to a corruption problem or because the video used features your browser did not support.');
       break;
     case e.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:
       alert('The video could not be loaded, either because the server or network failed or because the format is not supported.');
       break;
     default:
       alert('An unknown error occurred.');
       break;
   }
 }
&lt;/script&gt;
&lt;p&gt;&lt;video src="tgif.vid" autoplay controls onerror="failed(event)"&gt;&lt;/video&gt;&lt;/p&gt;
&lt;p&gt;&lt;a href="tgif.vid"&gt;Download the video file&lt;/a&gt;.&lt;/p&gt;</pre> 
 
  </div> 
 
 
 
 
  <!--CODECS
 
  <div class="impl">
 
  <h5>Video and audio codecs for <code>video</code> elements</h5>
 
  <p>User agents may support any video and audio codecs and container
  formats.</p>
 
  <p class="note">Certain user agents might support no codecs at all,
  e.g. text browsers running over SSH connections.</p>
 
  <!- - similar note in audio codecs section - ->
  <p class="note">Implementations are free to implement support for
  video codecs either natively, or using platform-specific APIs, or
  using plugins: this specification does not specify how codecs are to
  be implemented.</p>
 
  </div>
 
  (when replacing this text, also fix "- -" nested comments)--> 
 
 
 
 
 
  <h4 id="audio"><span class="secno">4.8.7 </span>The <dfn><code>audio</code></dfn> element</h4> 
 
  <dl class="element"><dt>Categories</dt> 
   <dd><a href="content-models.html#flow-content">Flow content</a>.</dd> 
   <dd><a href="content-models.html#phrasing-content">Phrasing content</a>.</dd> 
   <dd><a href="content-models.html#embedded-content">Embedded content</a>.</dd> 
   <dd>If the element has a <code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code> attribute: <a href="content-models.html#interactive-content">Interactive content</a>.</dd> 
   <dt>Contexts in which this element may be used:</dt> 
   <dd>Where <a href="content-models.html#embedded-content">embedded content</a> is expected.</dd> 
   <dt>Content model:</dt> 
   <dd>If the element has a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute: <a href="content-models.html#transparent">transparent</a>, but with no <a href="#media-element">media element</a> descendants.</dd> 
   <dd>If the element does not have a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute: one or more <code><a href="#the-source-element">source</a></code> elements, then, <a href="content-models.html#transparent">transparent</a>, but with no <a href="#media-element">media element</a> descendants.</dd> 
   <dt>Content attributes:</dt> 
   <dd><a href="elements.html#global-attributes">Global attributes</a></dd> 
   <dd><code title="attr-media-src"><a href="#attr-media-src">src</a></code></dd> 
   <dd><code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code></dd> 
   <dd><code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code></dd> 
   <dd><code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code></dd> 
   <dd><code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code></dd> 
   <dt>DOM interface:</dt> 
   <dd> 
    <pre class="idl">[NamedConstructor=<a href="#dom-audio" title="dom-Audio">Audio</a>(),
 NamedConstructor=<a href="#dom-audio-s" title="dom-Audio-s">Audio</a>(in DOMString src)]
interface <dfn id="htmlaudioelement">HTMLAudioElement</dfn> : <a href="#htmlmediaelement">HTMLMediaElement</a> {};</pre> 
   </dd> 
  </dl><p>An <code><a href="#audio">audio</a></code> element <a href="rendering.html#represents">represents</a> a sound or
  audio stream.</p> 
 
  <!-- v2 (actually v3) suggestions:
    * Audio syntesis. Use cases from Charles Pritchard:
      > Use a sound of varying pitch to hint to a user the location of their
      > mouse (is it hovering over a button, is it x/y pixels away from the edge
      > of the screen, how close is it to the center).
      >
      > Alter the pitch of a sound to make a very cheap midi instrument.
      >
      > Pre-mix a few generated sounds, because the client processor is slow.
      >
      > Alter the pitch of an actual audio recording, and pre-mix it, to give
      > different sounding voices to pre-recorded readings of a single text. As
      > has been tried for "male" "female" sound fonts.
      >
      > Support very simple audio codecs, and programmable synthesizers.
  --> 
 
  <p>Content may be provided inside the <code><a href="#audio">audio</a></code> 
  element<span class="impl">. User agents should not show this content
  to the user</span>; it is intended for older Web browsers which do
  not support <code><a href="#audio">audio</a></code>, so that legacy audio plugins can be
  tried, or to show text to the users of these older browsers informing
  them of how to access the audio contents.</p> 
 
  <p class="note">In particular, this content is not intended to
  address accessibility concerns. To make audio content accessible to
  the deaf or to those with other physical or cognitive disabilities,
  authors are expected to provide alternative media streams and/or to
  embed accessibility aids (such as transcriptions) into their media
  streams.</p> 
 
  <p>The <code><a href="#audio">audio</a></code> element is a <a href="#media-element">media element</a> 
  whose <a href="#media-data">media data</a> is ostensibly audio data.</p> 
 
  <p>The <code title="attr-media-src"><a href="#attr-media-src">src</a></code>, <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code>, <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code>, <code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code>, and <code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code> attributes are <a href="#media-element-attributes" title="media element attributes">the attributes common to all media
  elements</a>.</p> 
 
  <div class="impl"> 
 
  <p>When an <code><a href="#audio">audio</a></code> element is <a href="#potentially-playing">potentially
  playing</a>, it must have its audio data played synchronized with
  the <a href="#current-playback-position">current playback position</a>, at the specified <a href="#dom-media-volume" title="dom-media-volume">volume</a> with the specified <a href="#dom-media-muted" title="dom-media-muted">mute state</a>.</p> 
 
  <p>When an <code><a href="#audio">audio</a></code> element is not <a href="#potentially-playing">potentially
  playing</a>, audio must not play for the element.</p> 
 
  </div> 
 
  <dl class="domintro"><dt><var title="">audio</var> = new <code title="dom-Audio"><a href="#dom-audio">Audio</a></code>( [ <var title="">url</var> ] )</dt> 
 
   <dd> 
 
    <p>Returns a new <code><a href="#audio">audio</a></code> element, with the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute set to the value
    passed in the argument, if applicable.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>Two constructors are provided for creating
  <code><a href="#htmlaudioelement">HTMLAudioElement</a></code> objects (in addition to the factory
  methods from DOM Core such as <code title="">createElement()</code>): <dfn id="dom-audio" title="dom-Audio"><code>Audio()</code></dfn> and <dfn id="dom-audio-s" title="dom-Audio-s"><code>Audio(<var title="">src</var>)</code></dfn>. When invoked as constructors,
  these must return a new <code><a href="#htmlaudioelement">HTMLAudioElement</a></code> object (a new
  <code><a href="#audio">audio</a></code> element). The element must have its <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code> attribute set to the
  literal value "<code title="attr-media-preload-auto"><a href="#attr-media-preload-auto">auto</a></code>". If the <var title="">src</var> argument is present, the object created must have
  its <code title="attr-media-src"><a href="#attr-media-src">src</a></code> content attribute set to
  the provided value, and the user agent must invoke the object's
  <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
  algorithm</a> before returning. The element's document must be
  the <a href="browsers.html#active-document">active document</a> of the <a href="browsers.html#browsing-context">browsing
  context</a> of the <code><a href="browsers.html#window">Window</a></code> object on which the
  interface object of the invoked constructor is found.</p> 
 
  </div> 
 
 
 
  <!--CODECS
 
  <div class="impl">
 
  <h5>Audio codecs for <code>audio</code> elements</h5>
 
  <p>User agents may support any audio codecs and container
  formats.</p>
 
  <p>User agents must support the WAVE container format with audio
  encoded using the 16 bit PCM (LE) codec, at sampling frequencies of
  11.025kHz, 22.050kHz, and 44.100kHz, and for both mono and
  stereo. <a href="#- -refsWAVE">[WAVE]</a></p>
 
  <!- -
   <dt id="- -refsWAVE">WAVE</dt>
   <dd>http://en.wikipedia.org/wiki/WAV? </dd>
  - ->
 
  <!- - similar note in video codecs section - ->
  <p class="note">Implementations are free to implement support for
  audio codecs either natively, or using platform-specific APIs, or
  using plugins: this specification does not specify how codecs are to
  be implemented.</p>
 
  </div>
 
  (when replacing this text, also fix "- -" nested comments)--> 
 
 
 
  <h4 id="the-source-element"><span class="secno">4.8.8 </span>The <dfn><code>source</code></dfn> element</h4> 
 
  <dl class="element"><dt>Categories</dt> 
   <dd>None.</dd> 
   <dt>Contexts in which this element may be used:</dt> 
   <dd>As a child of a <a href="#media-element">media element</a>, before any <a href="content-models.html#flow-content">flow content</a>.</dd> 
   <dt>Content model:</dt> 
   <dd>Empty.</dd> 
   <dt>Content attributes:</dt> 
   <dd><a href="elements.html#global-attributes">Global attributes</a></dd> 
   <dd><code title="attr-source-src"><a href="#attr-source-src">src</a></code></dd> 
   <dd><code title="attr-source-type"><a href="#attr-source-type">type</a></code></dd> 
   <dd><code title="attr-source-media"><a href="#attr-source-media">media</a></code></dd> 
   <dt>DOM interface:</dt> 
   <dd> 
<pre class="idl">interface <dfn id="htmlsourceelement">HTMLSourceElement</dfn> : <a href="elements.html#htmlelement">HTMLElement</a> {
           attribute DOMString <a href="#dom-source-src" title="dom-source-src">src</a>;
           attribute DOMString <a href="#dom-source-type" title="dom-source-type">type</a>;
           attribute DOMString <a href="#dom-source-media" title="dom-source-media">media</a>;
};</pre> 
   </dd> 
  </dl><p>The <code><a href="#the-source-element">source</a></code> element allows authors to specify
  multiple alternative <a href="#media-resource" title="media resource">media
  resources</a> for <a href="#media-element" title="media element">media
  elements</a>. It does not <a href="rendering.html#represents" title="represents">represent</a> anything on its own.</p> 
 
  <p>The <dfn id="attr-source-src" title="attr-source-src"><code>src</code></dfn> attribute
  gives the address of the <a href="#media-resource">media resource</a>. The value must
  be a <a href="urls.html#valid-non-empty-url-potentially-surrounded-by-spaces">valid non-empty URL potentially surrounded by
  spaces</a>. This attribute must be present.</p> 
 
  <p>The <dfn id="attr-source-type" title="attr-source-type"><code>type</code></dfn> 
  attribute gives the type of the <a href="#media-resource">media resource</a>, to help
  the user agent determine if it can play this <a href="#media-resource">media
  resource</a> before fetching it. If specified, its value must be
  a <a href="infrastructure.html#valid-mime-type">valid MIME type</a>. The <code title="">codecs</code> 
  parameter may be specified and might be necessary to specify exactly
  how the resource is encoded. <a href="references.html#refsRFC4281">[RFC4281]</a></p> 
 
  <div class="example"> 
 
   <p>The following list shows some examples of how to use the <code title="">codecs=</code> MIME parameter in the <code title="attr-source-type"><a href="#attr-source-type">type</a></code> attribute.</p> 
 
   <dl><dt>H.264 Simple baseline profile video (main and extended video compatible) level 3 and Low-Complexity AAC audio in MP4 container</dt> 
    <dd><pre>&lt;source src='video.mp4' type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'&gt;</pre></dd> 
 
    <dt>H.264 Extended profile video (baseline-compatible) level 3 and Low-Complexity AAC audio in MP4 container</dt> 
    <dd><pre>&lt;source src='video.mp4' type='video/mp4; codecs="avc1.58A01E, mp4a.40.2"'&gt;</pre></dd> 
 
    <dt>H.264 Main profile video level 3 and Low-Complexity AAC audio in MP4 container</dt> 
    <dd><pre>&lt;source src='video.mp4' type='video/mp4; codecs="avc1.4D401E, mp4a.40.2"'&gt;</pre></dd> 
 
    <dt>H.264 'High' profile video (incompatible with main, baseline, or extended profiles) level 3 and Low-Complexity AAC audio in MP4 container</dt> 
    <dd><pre>&lt;source src='video.mp4' type='video/mp4; codecs="avc1.64001E, mp4a.40.2"'&gt;</pre></dd> 
 
 
    <dt>MPEG-4 Visual Simple Profile Level 0 video and Low-Complexity AAC audio in MP4 container</dt> 
    <dd><pre>&lt;source src='video.mp4' type='video/mp4; codecs="mp4v.20.8, mp4a.40.2"'&gt;</pre></dd> 
 
    <dt>MPEG-4 Advanced Simple Profile Level 0 video and Low-Complexity AAC audio in MP4 container</dt> 
    <dd><pre>&lt;source src='video.mp4' type='video/mp4; codecs="mp4v.20.240, mp4a.40.2"'&gt;</pre></dd> 
 
    <dt>MPEG-4 Visual Simple Profile Level 0 video and AMR audio in 3GPP container</dt> 
    <dd><pre>&lt;source src='video.3gp' type='video/3gpp; codecs="mp4v.20.8, samr"'&gt;</pre></dd> 
 
 
    <dt>Theora video and Vorbis audio in Ogg container</dt> 
    <dd><pre>&lt;source src='video.ogv' type='video/ogg; codecs="theora, vorbis"'&gt;</pre></dd> 
 
    <dt>Theora video and Speex audio in Ogg container</dt> 
    <dd><pre>&lt;source src='video.ogv' type='video/ogg; codecs="theora, speex"'&gt;</pre></dd> 
 
    <dt>Vorbis audio alone in Ogg container</dt> 
    <dd><pre>&lt;source src='audio.ogg' type='audio/ogg; codecs=vorbis'&gt;</pre></dd> 
 
    <dt>Speex audio alone in Ogg container</dt> 
    <dd><pre>&lt;source src='audio.spx' type='audio/ogg; codecs=speex'&gt;</pre></dd> 
 
    <dt>FLAC audio alone in Ogg container</dt> 
    <dd><pre>&lt;source src='audio.oga' type='audio/ogg; codecs=flac'&gt;</pre></dd> 
 
    <dt>Dirac video and Vorbis audio in Ogg container</dt> 
    <dd><pre>&lt;source src='video.ogv' type='video/ogg; codecs="dirac, vorbis"'&gt;</pre></dd> 
 
    <dt>Theora video and Vorbis audio in Matroska container</dt> 
    <dd><pre>&lt;source src='video.mkv' type='video/x-matroska; codecs="theora, vorbis"'&gt;</pre></dd> 
 
<!-- awaiting definition by the Ogg or BBC guys:
    <dt>Dirac video and Vorbis audio in Matroska container</dt>
    <dd><pre>&lt;source src='video.mkv' type='video/x-matroska; codecs='></pre></dd>
--> 
 
 
<!-- awaiting definition by the Microsoft guys:
 
    <dt>WMV9 video and WMA 2 audio in ASF container</dt>
    <dd><pre>&lt;source src='video.wmv' type='video/x-ms-wmv; codecs='></pre></dd>
 
    <dt>WMV8 video and WMA 2 audio in ASF container</dt>
    <dd><pre>&lt;source src='video.wmv' type='video/x-ms-wmv; codecs='></pre></dd>
 
    <dt>VC-1 video and WMA 10 Pro audio in ASF container</dt>
    <dd><pre>&lt;source src='video.wmv' type='video/x-ms-wmv; codecs='></pre></dd>
 
    <dt>XviD video and MP3 audio in AVI container</dt>
    <dd><pre>&lt;source src='video.avi' type='video/x-msvideo; codecs='></pre></dd>
 
    <dt>Motion-JPEG video and uncompressed PCM audio in AVI container</dt>
    <dd><pre>&lt;source src='video.avi' type='video/x-msvideo; codecs='></pre></dd>
 
--> 
 
 
<!-- awaiting definition by Real:
    <dt>Real Video 10 video and High-Efficiency AAC audio in Real Media container</dt>
    <dd><pre>&lt;source src='video.rm' type='application/vnd.rn-realmedia; codecs='></pre></dd>
--> 
 
 
<!--  undefined:
    <dt>MPEG-1 video and MPEG-1 Audio Layer II audio in MPEG-1 program stream</dt>
    <dd><pre>&lt;source src='video.mpg' type='video/mpeg; codecs='></pre></dd>
--> 
 
   </dl></div> 
 
  <p>The <dfn id="attr-source-media" title="attr-source-media"><code>media</code></dfn> 
  attribute gives the intended media type of the <a href="#media-resource">media
  resource</a>, to help the user agent determine if this
  <a href="#media-resource">media resource</a> is useful to the user before fetching
  it. Its value must be a <a href="common-microsyntaxes.html#valid-media-query">valid media query</a>.</p> 
 
  <p id="source-default-media">The default, if the <code title="attr-srouce-media">media</code> attribute is omitted, is
  "<code title="">all</code>", meaning that by default the <a href="#media-resource">media
  resource</a> is suitable for all media.</p> 
 
  <div class="impl"> 
 
  <p>If a <code><a href="#the-source-element">source</a></code> element is inserted as a child of a
  <a href="#media-element">media element</a> that has no <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute and whose <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> has the value
  <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code>, the user
  agent must invoke the <a href="#media-element">media element</a>'s <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
  algorithm</a>.</p> 
 
  <p>The IDL attributes <dfn id="dom-source-src" title="dom-source-src"><code>src</code></dfn>, <dfn id="dom-source-type" title="dom-source-type"><code>type</code></dfn>, and <dfn id="dom-source-media" title="dom-source-media"><code>media</code></dfn> must
  <a href="urls.html#reflect">reflect</a> the respective content attributes of the same
  name.</p> 
 
  </div> 
 
  <div class="example"> 
 
   <p>If the author isn't sure if the user agents will all be able to
   render the media resources provided, the author can listen to the
   <code title="event-error">error</code> event on the last
   <code><a href="#the-source-element">source</a></code> element and trigger fallback behavior:</p> 
 
   <pre>&lt;script&gt;
 function fallback(video) {
   // replace &lt;video&gt; with its contents
   while (video.hasChildNodes()) {
     if (video.firstChild instanceof HTMLSourceElement)
       video.removeChild(video.firstChild);
     else
       video.parentNode.insertBefore(video.firstChild, video);
   }
   video.parentNode.removeChild(video);
 }
&lt;/script&gt;
&lt;video controls autoplay&gt;
 &lt;source src='video.mp4' type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'&gt;
 &lt;source src='video.ogv' type='video/ogg; codecs="theora, vorbis"'
         onerror="fallback(parentNode)"&gt;
 ...
&lt;/video&gt;</pre> 
 
  </div> 
 
 
 
  <h4 id="media-elements"><span class="secno">4.8.9 </span>Media elements</h4> 
 
  <p><dfn id="media-element" title="media element">Media elements</dfn> implement the
  following interface:</p> 
 
  <pre class="idl">interface <dfn id="htmlmediaelement">HTMLMediaElement</dfn> : <a href="elements.html#htmlelement">HTMLElement</a> {
 
  // error state
  readonly attribute <a href="#mediaerror">MediaError</a> <a href="#dom-media-error" title="dom-media-error">error</a>;
 
  // network state
           attribute DOMString <a href="#dom-media-src" title="dom-media-src">src</a>;
  readonly attribute DOMString <a href="#dom-media-currentsrc" title="dom-media-currentSrc">currentSrc</a>;
  const unsigned short <a href="#dom-media-network_empty" title="dom-media-NETWORK_EMPTY">NETWORK_EMPTY</a> = 0;
  const unsigned short <a href="#dom-media-network_idle" title="dom-media-NETWORK_IDLE">NETWORK_IDLE</a> = 1;
  const unsigned short <a href="#dom-media-network_loading" title="dom-media-NETWORK_LOADING">NETWORK_LOADING</a> = 2;
  const unsigned short <a href="#dom-media-network_no_source" title="dom-media-NETWORK_NO_SOURCE">NETWORK_NO_SOURCE</a> = 3;
  readonly attribute unsigned short <a href="#dom-media-networkstate" title="dom-media-networkState">networkState</a>;
           attribute DOMString <a href="#dom-media-preload" title="dom-media-preload">preload</a>;
<!--v3BUF  readonly attribute float <span title="dom-media-bufferingRate">bufferingRate</span>;
  readonly attribute boolean <span title="dom-media-bufferingThrottled">bufferingThrottled</span>;
-->  readonly attribute <a href="#timeranges">TimeRanges</a> <a href="#dom-media-buffered" title="dom-media-buffered">buffered</a>;
  void <a href="#dom-media-load" title="dom-media-load">load</a>();
  DOMString <a href="#dom-navigator-canplaytype" title="dom-navigator-canPlayType">canPlayType</a>(in DOMString type);
 
  // ready state
  const unsigned short <a href="#dom-media-have_nothing" title="dom-media-HAVE_NOTHING">HAVE_NOTHING</a> = 0;
  const unsigned short <a href="#dom-media-have_metadata" title="dom-media-HAVE_METADATA">HAVE_METADATA</a> = 1;
  const unsigned short <a href="#dom-media-have_current_data" title="dom-media-HAVE_CURRENT_DATA">HAVE_CURRENT_DATA</a> = 2;
  const unsigned short <a href="#dom-media-have_future_data" title="dom-media-HAVE_FUTURE_DATA">HAVE_FUTURE_DATA</a> = 3;
  const unsigned short <a href="#dom-media-have_enough_data" title="dom-media-HAVE_ENOUGH_DATA">HAVE_ENOUGH_DATA</a> = 4;
  readonly attribute unsigned short <a href="#dom-media-readystate" title="dom-media-readyState">readyState</a>;
  readonly attribute boolean <a href="#dom-media-seeking" title="dom-media-seeking">seeking</a>;
 
  // playback state
           attribute float <a href="#dom-media-currenttime" title="dom-media-currentTime">currentTime</a>;
  readonly attribute float <a href="#dom-media-starttime" title="dom-media-startTime">startTime</a>;
  readonly attribute float <a href="#dom-media-duration" title="dom-media-duration">duration</a>;
  readonly attribute boolean <a href="#dom-media-paused" title="dom-media-paused">paused</a>;
           attribute float <a href="#dom-media-defaultplaybackrate" title="dom-media-defaultPlaybackRate">defaultPlaybackRate</a>;
           attribute float <a href="#dom-media-playbackrate" title="dom-media-playbackRate">playbackRate</a>;
  readonly attribute <a href="#timeranges">TimeRanges</a> <a href="#dom-media-played" title="dom-media-played">played</a>;
  readonly attribute <a href="#timeranges">TimeRanges</a> <a href="#dom-media-seekable" title="dom-media-seekable">seekable</a>;
  readonly attribute boolean <a href="#dom-media-ended" title="dom-media-ended">ended</a>;
           attribute boolean <a href="#dom-media-autoplay" title="dom-media-autoplay">autoplay</a>;
           attribute boolean <a href="#dom-media-loop" title="dom-media-loop">loop</a>;
  void <a href="#dom-media-play" title="dom-media-play">play</a>();
  void <a href="#dom-media-pause" title="dom-media-pause">pause</a>();
<!--v2CUERANGE
  // cue ranges
  void <span title="dom-media-addCueRange">addCueRange</span>(in DOMString className, in DOMString id, in float start, in float end, in boolean pauseOnExit, in <span>CueRangeCallback</span> enterCallback, in <span>CueRangeCallback</span> exitCallback);
  void <span title="dom-media-removeCueRanges">removeCueRanges</span>(in DOMString className);
--> 
  // controls
           attribute boolean <a href="#dom-media-controls" title="dom-media-controls">controls</a>;
           attribute float <a href="#dom-media-volume" title="dom-media-volume">volume</a>;
           attribute boolean <a href="#dom-media-muted" title="dom-media-muted">muted</a>;
};<!--v2CUERANGE
 
[Callback=FunctionOnly, NoInterfaceObject]
interface <dfn>CueRangeCallback</dfn> {
  void <span title="dom-CueRangeCallback-handleEvent">handleEvent</span>(in DOMString id);
};--></pre> 
 
  <p>The <dfn id="media-element-attributes">media element attributes</dfn>, <code title="attr-media-src"><a href="#attr-media-src">src</a></code>, <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code>, <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code>, <code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code>, and <code title="attr-media-controls"><a href="#attr-media-controls">controls</a></code>, apply to all <a href="#media-element" title="media element">media elements</a>. They are defined in
  this section.</p> 
 
  <!-- proposed v2 (actually v3!) features:
    * frame forward / backwards / step(n) while paused
    * hasAudio, hasVideo, hasCaptions, etc
    * per-frame control: get current frame; set current frame
    * queue of content
      - pause current stream and insert content at front of queue to play immediately
      - pre-download another stream
      - add stream(s) to play at end of current stream
      - pause playback upon reaching a certain time
      - playlists, with the ability to get metadata out of them (e.g. xspf)
    * control over closed captions:
      - enable, disable, select language
      - event that sends caption text to script
    * in-band metadata and cue points to allow:
      - Chapter markers that synchronize to playback (without having to poll
        the playhead position)
      - Annotations on video content (i.e., pop-up video)
      - General custom metadata store (ratings, etc.)
    * notification of chapter labels changing on the fly:
      - onchapterlabelupdate, which has a time and a label
    * cue points that trigger at fixed intervals, so that
      e.g. animation can be synced with the video
    * general meta data, implemented as getters (don't expose the whole thing)
      - getMetadata(key: string, language: string) => HTMLImageElement or string
      - onmetadatachanged (no context info)
    * external captions support (request from John Foliot)
    * video: applying CSS filters
    * an event to notify people of when the video size changes
      (e.g. for chained Ogg streams of multiple independent videos)
    * balance and 3D position audio
    * audio filters
    * audio synthesis (see <audio> section for use cases)
    * feedback to the script on how well the video is playing
       - frames per second?
       - skipped frames per second?
       - an event that reports playback difficulties?
       - an arbitrary quality metric?
    * bufferingRate/bufferingThrottled (see v3BUF)
    * events for when the user agent's controls get shown or hidden
      so that the author's controls can get away of the UA's
  --> 
 
  <!-- v2 features that already have experimental implementations:
    * webkitPreservesPitch (for when playbackRate != 1.0)
  --> 
 
  <p><a href="#media-element" title="media element">Media elements</a> are used to
  present audio data, or video and audio data, to the user. This is
  referred to as <dfn id="media-data">media data</dfn> in this section, since this
  section applies equally to <a href="#media-element" title="media element">media
  elements</a> for audio or for video. The term <dfn id="media-resource">media
  resource</dfn> is used to refer to the complete set of media data,
  e.g. the complete video file, or complete audio file.</p> 
 
  <div class="impl"> 
 
  <p>Except where otherwise specified, the <a href="webappapis.html#task-source">task source</a> 
  for all the tasks <a href="webappapis.html#queue-a-task" title="queue a task">queued</a> in this
  section and its subsections is the <dfn id="media-element-event-task-source">media element event task
  source</dfn>.</p> 
 
  </div> 
 
 
 
  <h5 id="error-codes"><span class="secno">4.8.9.1 </span>Error codes</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-error"><a href="#dom-media-error">error</a></code></dt> 
 
   <dd> 
 
    <p>Returns a <code><a href="#mediaerror">MediaError</a></code> object representing the
    current error state of the element.</p> 
 
    <p>Returns null if there is no error.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>All <a href="#media-element" title="media element">media elements</a> have an
  associated error status, which records the last error the element
  encountered since its <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
  algorithm</a> was last invoked. The <dfn id="dom-media-error" title="dom-media-error"><code>error</code></dfn> attribute, on
  getting, must return the <code><a href="#mediaerror">MediaError</a></code> object created for
  this last error, or null if there has not been an error.</p> 
 
  </div> 
 
  <pre class="idl">interface <dfn id="mediaerror">MediaError</dfn> {
  const unsigned short <a href="#dom-mediaerror-media_err_aborted" title="dom-MediaError-MEDIA_ERR_ABORTED">MEDIA_ERR_ABORTED</a> = 1;
  const unsigned short <a href="#dom-mediaerror-media_err_network" title="dom-MediaError-MEDIA_ERR_NETWORK">MEDIA_ERR_NETWORK</a> = 2;
  const unsigned short <a href="#dom-mediaerror-media_err_decode" title="dom-MediaError-MEDIA_ERR_DECODE">MEDIA_ERR_DECODE</a> = 3;
  const unsigned short <a href="#dom-mediaerror-media_err_src_not_supported" title="dom-MediaError-MEDIA_ERR_SRC_NOT_SUPPORTED">MEDIA_ERR_SRC_NOT_SUPPORTED</a> = 4;
  readonly attribute unsigned short <a href="#dom-mediaerror-code" title="dom-MediaError-code">code</a>;
};</pre> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-error"><a href="#dom-media-error">error</a></code> . <code title="dom-MediaError-code"><a href="#dom-mediaerror-code">code</a></code></dt> 
 
   <dd> 
 
    <p>Returns the current error's error code, from the list below.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-mediaerror-code" title="dom-MediaError-code"><code>code</code></dfn> 
  attribute of a <code><a href="#mediaerror">MediaError</a></code> object must return the code
  for the error, which must be one of the following:</p> 
 
  </div> 
 
  <dl><dt><dfn id="dom-mediaerror-media_err_aborted" title="dom-MediaError-MEDIA_ERR_ABORTED"><code>MEDIA_ERR_ABORTED</code></dfn> (numeric value 1)</dt> 
 
   <dd>The fetching process for the <a href="#media-resource">media resource</a> was
   aborted by the user agent at the user's request.</dd> 
 
   <dt><dfn id="dom-mediaerror-media_err_network" title="dom-MediaError-MEDIA_ERR_NETWORK"><code>MEDIA_ERR_NETWORK</code></dfn> (numeric value 2)</dt> 
 
   <dd>A network error of some description caused the user agent to
   stop fetching the <a href="#media-resource">media resource</a>, after the resource
   was established to be usable.</dd> 
 
   <dt><dfn id="dom-mediaerror-media_err_decode" title="dom-MediaError-MEDIA_ERR_DECODE"><code>MEDIA_ERR_DECODE</code></dfn> (numeric value 3)</dt> 
 
   <dd>An error of some description occurred while decoding the
   <a href="#media-resource">media resource</a>, after the resource was established to
   be usable.</dd> 
 
   <dt><dfn id="dom-mediaerror-media_err_src_not_supported" title="dom-MediaError-MEDIA_ERR_SRC_NOT_SUPPORTED"><code>MEDIA_ERR_SRC_NOT_SUPPORTED</code></dfn> (numeric value 4)</dt> 
 
   <dd>The <a href="#media-resource">media resource</a> indicated by the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute was not suitable.</dd> 
 
  </dl><h5 id="location-of-the-media-resource"><span class="secno">4.8.9.2 </span>Location of the media resource</h5> 
 
  <p>The <dfn id="attr-media-src" title="attr-media-src"><code>src</code></dfn> content
  attribute on <a href="#media-element" title="media element">media elements</a> gives
  the address of the media resource (video, audio) to show. The
  attribute, if present, must contain a <a href="urls.html#valid-non-empty-url-potentially-surrounded-by-spaces">valid non-empty
  URL potentially surrounded by spaces</a>.</p> 
 
  <div class="impl"> 
 
  <p>If a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute of a
  <a href="#media-element">media element</a> is set or changed, the user agent must
  invoke the <a href="#media-element">media element</a>'s <a href="#media-element-load-algorithm">media element load
  algorithm</a>. (<em>Removing</em> the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute does not do this, even
  if there are <code><a href="#the-source-element">source</a></code> elements present.)</p> 
 
  <p>The <dfn id="dom-media-src" title="dom-media-src"><code>src</code></dfn> IDL
  attribute on <a href="#media-element" title="media element">media elements</a> must
  <a href="urls.html#reflect">reflect</a> the content attribute of the same name.</p> 
 
  </div> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-currentSrc"><a href="#dom-media-currentsrc">currentSrc</a></code></dt> 
 
   <dd> 
 
    <p>Returns the address of the current <a href="#media-resource">media resource</a>.</p> 
 
    <p>Returns the empty string when there is no <a href="#media-resource">media resource</a>.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-media-currentsrc" title="dom-media-currentSrc"><code>currentSrc</code></dfn> IDL
  attribute is initially the empty string. Its value is changed by the
  <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
  algorithm</a> defined below.</p> 
 
  </div> 
 
  <p class="note">There are two ways to specify a <a href="#media-resource">media
  resource</a>, the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> 
  attribute, or <code><a href="#the-source-element">source</a></code> elements. The attribute overrides
  the elements.</p> 
 
 
 
  <h5 id="mime-types"><span class="secno">4.8.9.3 </span>MIME types</h5> 
 
  <p>A <a href="#media-resource">media resource</a> can be described in terms of its
  <em>type</em>, specifically a <a href="infrastructure.html#mime-type">MIME type</a>, optionally
  with a <code title="">codecs</code> parameter. <a href="references.html#refsRFC4281">[RFC4281]</a></p> 
 
  <p>Types are usually somewhat incomplete descriptions; for example
  "<code title="">video/mpeg</code>" doesn't say anything except what
  the container type is, and even a type like "<code title="">video/mp4; codecs="avc1.42E01E,
  mp4a.40.2"</code>" doesn't include information like the actual
  bitrate (only the maximum bitrate). Thus, given a type, a user agent
  can often only know whether it <em>might</em> be able to play
  media of that type (with varying levels of confidence), or whether
  it definitely <em>cannot</em> play media of that type.</p> 
 
  <p><dfn id="a-type-that-the-user-agent-knows-it-cannot-render">A type that the user agent knows it cannot render</dfn> is
  one that describes a resource that the user agent definitely does
  not support, for example because it doesn't recognize the container
  type, or it doesn't support the listed codecs.</p> 
 
  <p>The <a href="infrastructure.html#mime-type">MIME type</a> "<code title="">application/octet-stream</code>" with no parameters is
  never <a href="#a-type-that-the-user-agent-knows-it-cannot-render">a type that the user agent knows it cannot
  render</a>. User agents must treat that type as equivalent to the
  lack of any explicit <a href="urls.html#content-type" title="Content-Type">Content-Type
  metadata</a> when it is used to label a potential <a href="#media-resource">media
  resource</a>.</p> 
 
  <p class="note">In the absence of a <!-- pretty crazy --> 
  specification to the contrary, the <a href="infrastructure.html#mime-type">MIME type</a> "<code title="">application/octet-stream</code>" when used <em>with</em> 
  parameters, e.g. "<code title="">application/octet-stream;codecs=theora</code>", <em>is</em> 
  <a href="#a-type-that-the-user-agent-knows-it-cannot-render">a type that the user agent knows it cannot render</a>.</p> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-navigator-canPlayType"><a href="#dom-navigator-canplaytype">canPlayType</a></code>(<var title="">type</var>)</dt> 
 
   <dd> 
 
    <p>Returns the empty string (a negative response), "maybe", or
    "probably" based on how confident the user agent is that it can
    play media resources of the given type.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-navigator-canplaytype" title="dom-navigator-canPlayType"><code>canPlayType(<var title="">type</var>)</code></dfn> method must return the empty
  string if <var title="">type</var> is <a href="#a-type-that-the-user-agent-knows-it-cannot-render">a type that the user
  agent knows it cannot render</a>; it must return "<code title="">probably</code>" if the user agent is confident that the
  type represents a <a href="#media-resource">media resource</a> that it can render if
  used in with this <code><a href="#audio">audio</a></code> or <code><a href="#video">video</a></code> element;
  and it must return "<code title="">maybe</code>"
  otherwise. Implementors are encouraged to return "<code title="">maybe</code>" unless the type can be confidently
  established as being supported or not. Generally, a user agent
  should never return "<code title="">probably</code>" if the type
  doesn't have a <code title="">codecs</code> parameter.</p> 
 
  </div> 
 
  <div class="example"> 
 
   <p>This script tests to see if the user agent supports a
   (fictional) new format to dynamically decide whether to use a
   <code><a href="#video">video</a></code> element or a plugin:</p> 
 
   <pre>&lt;section id="video"&gt;
 &lt;p&gt;&lt;a href="playing-cats.nfv"&gt;Download video&lt;/a&gt;&lt;/p&gt;
&lt;/section&gt;
&lt;script&gt;
 var videoSection = document.getElementById('video');
 var videoElement = document.createElement('video');
 var support = videoElement.canPlayType('video/x-new-fictional-format;codecs="kittens,bunnies"');
 if (support != "probably" &amp;&amp; "New Fictional Video Plug-in" in navigator.plugins) {
   // not confident of browser support
   // but we have a plugin
   // so use plugin instead
   videoElement = document.createElement("embed");
 } else if (support == "") {
   // no support from browser and no plugin
   // do nothing
   videoElement = null;
 }
 if (videoElement) {
   while (videoSection.hasChildNodes())
     videoSection.removeChild(videoSection.firstChild);
   videoElement.setAttribute("src", "playing-cats.nfv");
   videoSection.appendChild(videoElement);
 }
&lt;/script&gt;</pre> 
 
  </div> 
 
  <p class="note">The <code title="attr-source-type"><a href="#attr-source-type">type</a></code> 
  attribute of the <code><a href="#the-source-element">source</a></code> element allows the user agent
  to avoid downloading resources that use formats it cannot
  render.</p> 
 
 
  <h5 id="network-states"><span class="secno">4.8.9.4 </span>Network states</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code></dt> 
 
   <dd> 
 
    <p>Returns the current state of network activity for the element,
    from the codes in the list below.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>As <a href="#media-element" title="media element">media elements</a> interact
  with the network, their current network activity is represented by
  the <dfn id="dom-media-networkstate" title="dom-media-networkState"><code>networkState</code></dfn> 
  attribute. On getting, it must return the current network state of
  the element, which must be one of the following values:</p> 
 
  </div> 
 
  <dl><dt><dfn id="dom-media-network_empty" title="dom-media-NETWORK_EMPTY"><code>NETWORK_EMPTY</code></dfn> (numeric value 0)</dt> 
 
   <dd>The element has not yet been initialized. All attributes are in
   their initial states.</dd> 
 
   <dt><dfn id="dom-media-network_idle" title="dom-media-NETWORK_IDLE"><code>NETWORK_IDLE</code></dfn> (numeric value 1)</dt> 
 
   <dd>The element<span class="impl">'s <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a> is active and</span> has selected a <a href="#media-resource" title="media resource">resource</a>, but it is not actually
   using the network at this time.</dd> 
 
   <dt><dfn id="dom-media-network_loading" title="dom-media-NETWORK_LOADING"><code>NETWORK_LOADING</code></dfn> (numeric value 2)</dt> 
 
   <dd>The user agent is actively trying to download data.</dd> 
 
   <dt><dfn id="dom-media-network_no_source" title="dom-media-NETWORK_NO_SOURCE"><code>NETWORK_NO_SOURCE</code></dfn> (numeric value 3)</dt> 
 
   <dd>The element<span class="impl">'s <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a> is active, but it</span> has failed to find a
   <a href="#media-resource" title="media resource">resource</a> to use.</dd> 
 
  </dl><div class="impl"> 
 
  <p>The <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
  algorithm</a> defined below describes exactly when the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute changes
  value and what events fire to indicate changes in this state.</p> 
 
  </div> 
 
 
 
 
  <h5 id="loading-the-media-resource"><span class="secno">4.8.9.5 </span>Loading the media resource</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-load"><a href="#dom-media-load">load</a></code>()</dt> 
 
   <dd> 
 
    <p>Causes the element to reset and start selecting and loading a
    new <a href="#media-resource">media resource</a> from scratch.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>All <a href="#media-element" title="media element">media elements</a> have an
  <dfn id="autoplaying-flag">autoplaying flag</dfn>, which must begin in the true state, and
  a <dfn id="delaying-the-load-event-flag">delaying-the-load-event flag</dfn>, which must begin in the
  false state. While the <a href="#delaying-the-load-event-flag">delaying-the-load-event flag</a> is
  true, the element must <a href="the-end.html#delay-the-load-event">delay the load event</a> of its
  document.</p> 
 
  <p>When the <dfn id="dom-media-load" title="dom-media-load"><code>load()</code></dfn> 
  method on a <a href="#media-element">media element</a> is invoked, the user agent
  must run the <a href="#media-element-load-algorithm">media element load algorithm</a>.</p> 
 
  <p>The <dfn id="media-element-load-algorithm">media element load algorithm</dfn> consists of the
  following steps.</p> 
 
  <ol><li><p>Abort any already-running instance of the <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a> for this element.</li> 
 
   <li> 
 
    <p>If there are any <a href="webappapis.html#concept-task" title="concept-task">tasks</a> from
    the <a href="#media-element">media element</a>'s <a href="#media-element-event-task-source">media element event task
    source</a> in one of the <a href="webappapis.html#task-queue" title="task queue">task
    queues</a>, then remove those tasks.</p> 
 
    <p class="note">Basically, pending events and callbacks for the
    media element are discarded when the media element starts loading
    a new resource.</p> 
 
   </li> 
 
   <li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> is set to <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code> or <code title="dom-media-NETWORK_IDLE"><a href="#dom-media-network_idle">NETWORK_IDLE</a></code>, <a href="webappapis.html#queue-a-task">queue a
   task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-abort"><a href="#event-media-abort">abort</a></code> at the <a href="#media-element">media
   element</a>.</li> 
 
   <li> 
 
    <p>If the <a href="#media-element">media element</a>'s <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> is not set to
    <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code>, then
    run these substeps:</p> 
 
    <ol><li><p>If a fetching process is in progress for the <a href="#media-element">media
     element</a>, the user agent should stop it.</li> 
 
     <li>Set the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
     <a href="#dom-media-network_empty" title="dom-media-NETWORK_EMPTY">NETWORK_EMPTY</a>.</li> 
 
     <li>If <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> is
     not set to <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>, then set it
     to that state.</li> 
 
     <li>If the <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute
     is false, then set to true.</li> 
 
     <li>If <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> is true,
     set it to false.</li> 
 
     <li>Set the <a href="#current-playback-position">current playback position</a> to 0.</li> 
 
     <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
     event</a> named <code title="event-media-emptied"><a href="#event-media-emptied">emptied</a></code> at the <a href="#media-element">media
     element</a>.</li> 
 
    </ol></li> 
 
   <li><p>Set the <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> attribute to the
   value of the <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code> 
   attribute.</li> 
 
   <li><p>Set the <code title="dom-media-error"><a href="#dom-media-error">error</a></code> attribute
   to null and the <a href="#autoplaying-flag">autoplaying flag</a> to true.</li> 
 
   <li><p>Invoke the <a href="#media-element">media element</a>'s <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a>.</li> 
 
   <li> 
 
    <p class="note">Playback of any previously playing <a href="#media-resource">media
    resource</a> for this element stops.</p> 
 
   </li> 
 
  </ol><p>The <dfn id="concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
  algorithm</dfn> for a <a href="#media-element">media element</a> is as follows. This
  algorithm is always invoked synchronously, but one of the first
  steps in the algorithm is to return and continue running the
  remaining steps asynchronously, meaning that it runs in the
  background with scripts and other <a href="webappapis.html#concept-task" title="concept-task">tasks</a> running in parallel. In addition,
  this algorithm interacts closely with the <a href="webappapis.html#event-loop">event loop</a> 
  mechanism; in particular, it has <a href="webappapis.html#synchronous-section" title="synchronous
  section">synchronous sections</a> (which are triggered as part of
  the <a href="webappapis.html#event-loop">event loop</a> algorithm). Steps in such sections are
  marked with &#8987;.</p> 
 
  <ol><li><p>Set the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> to <code title="dom-media-NETWORK_NO_SOURCE"><a href="#dom-media-network_no_source">NETWORK_NO_SOURCE</a></code>.</li> 
 
   <li><p>Asynchronously <a href="webappapis.html#await-a-stable-state">await a stable state</a>, allowing
   the <a href="webappapis.html#concept-task" title="concept-task">task</a> that invoked this
   algorithm to continue. The <a href="webappapis.html#synchronous-section">synchronous section</a> 
   consists of all the remaining steps of this algorithm until the
   algorithm says the <a href="webappapis.html#synchronous-section">synchronous section</a> has
   ended. (Steps in <a href="webappapis.html#synchronous-section" title="synchronous section">synchronous
   sections</a> are marked with &#8987;.)</li> 
 
   <li> 
 
    <p>&#8987; If the <a href="#media-element">media element</a> has a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute, then let <var title="">mode</var> be <i title="">attribute</i>.</p> 
 
    <p>&#8987; Otherwise, if the <a href="#media-element">media element</a> does not
    have a <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute but has a
    <code><a href="#the-source-element">source</a></code> element child, then let <var title="">mode</var> be <i title="">children</i> and let <var title="">candidate</var> be the first such <code><a href="#the-source-element">source</a></code> 
    element child in <a href="infrastructure.html#tree-order">tree order</a>.</p> 
 
    <p>&#8987; Otherwise the <a href="#media-element">media element</a> has neither a
    <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute nor a
    <code><a href="#the-source-element">source</a></code> element child: set the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> to <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code>, and abort
    these steps; the <a href="webappapis.html#synchronous-section">synchronous section</a> ends.</p> 
 
   </li> 
 
   <li><p>&#8987; Set the <a href="#media-element">media element</a>'s
   <a href="#delaying-the-load-event-flag">delaying-the-load-event flag</a> to true (this <a href="the-end.html#delay-the-load-event" title="delay the load event">delays the load event</a>), and set
   its <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> to
   <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code>.</li> 
 
   <li><p>&#8987; <a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
   event</a> named <code title="event-media-loadstart"><a href="#event-media-loadstart">loadstart</a></code> at the <a href="#media-element">media
   element</a>.</li> 
 
   <li> 
 
    <p>If <var title="">mode</var> is <i title="">attribute</i>, then
    run these substeps:</p> 
 
    <ol><li><p>&#8987; <i>Process candidate</i>: If the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute's value is the empty
     string, then end the <a href="webappapis.html#synchronous-section">synchronous section</a>, and jump
     down to the <i title="">failed</i> step below.</li> 
 
     <li><p>&#8987; Let <var title="">absolute URL</var> be the
     <a href="urls.html#absolute-url">absolute URL</a> that would have resulted from <a href="urls.html#resolve-a-url" title="resolve a url">resolving</a> the <a href="urls.html#url">URL</a> 
     specified by the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> 
     attribute's value relative to the <a href="#media-element">media element</a> when
     the <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute was last
     changed.</p> <!-- i.e. changing xml:base or <base> after src=""
     has no effect --> 
 
     <li><p>&#8987; If <var title="">absolute URL</var> was obtained
     successfully, set the <code title="dom-media-currentSrc"><a href="#dom-media-currentsrc">currentSrc</a></code> attribute to <var title="">absolute URL</var>.</li> 
 
     <li><p>End the <a href="webappapis.html#synchronous-section">synchronous section</a>, continuing the
     remaining steps asynchronously.</li> 
 
     <li><p>If <var title="">absolute URL</var> was obtained
     successfully, run the <a href="#concept-media-load-resource" title="concept-media-load-resource">resource fetch
     algorithm</a> with <var title="">absolute URL</var>. If that
     algorithm returns without aborting <em>this</em> one, then the
     load failed.</li> 
 
     <li><p><i>Failed</i>: Reaching this step indicates that the media
     resource failed to load or that the given <a href="urls.html#url">URL</a> could
     not be <a href="urls.html#resolve-a-url" title="resolve a url">resolved</a>. Set the <code title="dom-media-error"><a href="#dom-media-error">error</a></code> attribute to a new
     <code><a href="#mediaerror">MediaError</a></code> object whose <code title="dom-MediaError-code"><a href="#dom-mediaerror-code">code</a></code> attribute is set to <code title="dom-MediaError-MEDIA_ERR_SRC_NOT_SUPPORTED"><a href="#dom-mediaerror-media_err_src_not_supported">MEDIA_ERR_SRC_NOT_SUPPORTED</a></code>.</li> 
 
     <li><p>Set the element's <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
     the <a href="#dom-media-network_no_source" title="dom-media-NETWORK_NO_SOURCE">NETWORK_NO_SOURCE</a> 
     value.</li> 
 
     <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
     event</a> named <code title="event-media-error"><a href="#event-media-error">error</a></code> 
     at the <a href="#media-element">media element</a>.</li> 
 
     <li><p>Set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event flag</a> 
     to false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load event">delaying
     the load event</a>.</li> 
 
     <li><p>Abort these steps. Until the <code title="dom-media-load"><a href="#dom-media-load">load()</a></code> method is invoked or the
     <code title="attr-media-src"><a href="#attr-media-src">src</a></code> attribute is changed, the
     element won't attempt to load another resource.</li> 
     <!-- it took its ball and went home, sulking. --> 
 
    </ol><p>Otherwise, the <code><a href="#the-source-element">source</a></code> elements will be used; run
    these substeps:</p> 
 
    <ol><li> 
 
      <p>&#8987; Let <var title="">pointer</var> be a position
      defined by two adjacent nodes in the <a href="#media-element">media
      element</a>'s child list, treating the start of the list
      (before the first child in the list, if any) and end of the list
      (after the last child in the list, if any) as nodes in their own
      right. One node is the node before <var title="">pointer</var>,
      and the other node is the node after <var title="">pointer</var>. Initially, let <var title="">pointer</var> be the position between the <var title="">candidate</var> node and the next node, if there are
      any, or the end of the list, if it is the last node.</p> 
 
      <p>As nodes are inserted and removed into the <a href="#media-element">media
      element</a>, <var title="">pointer</var> must be updated as
      follows:</p> 
 
      <dl><dt>If a new node is inserted between the two nodes that
       define <var title="">pointer</var></dt> 
 
       <dd>Let <var title="">pointer</var> be the point between the
       node before <var title="">pointer</var> and the new node. In
       other words, insertions at <var title="">pointer</var> go after
       <var title="">pointer</var>.</dd> 
 
       <dt>If the node before <var title="">pointer</var> is removed</dt> 
 
       <dd>Let <var title="">pointer</var> be the point between the
       node after <var title="">pointer</var> and the node before the
       node after <var title="">pointer</var>. In other words, <var title="">pointer</var> doesn't move relative to the remaining
       nodes.</dd> 
 
       <dt>If the node after <var title="">pointer</var> is removed</dt> 
 
       <dd>Let <var title="">pointer</var> be the point between the
       node before <var title="">pointer</var> and the node after the
       node before <var title="">pointer</var>. Just as with the
       previous case, <var title="">pointer</var> doesn't move
       relative to the remaining nodes.</dd> 
 
      </dl><p>Other changes don't affect <var title="">pointer</var>.</p> 
 
     </li> 
 
     <li><p>&#8987; <i>Process candidate</i>: If <var title="">candidate</var> does not have a <code title="attr-source-src"><a href="#attr-source-src">src</a></code> attribute, or if its <code title="attr-source-src"><a href="#attr-source-src">src</a></code> attribute's value is the empty
     string, then end the <a href="webappapis.html#synchronous-section">synchronous section</a>, and jump
     down to the <i title="">failed</i> step below.</li> 
 
     <li><p>&#8987; Let <var title="">absolute URL</var> be the
     <a href="urls.html#absolute-url">absolute URL</a> that would have resulted from <a href="urls.html#resolve-a-url" title="resolve a url">resolving</a> the <a href="urls.html#url">URL</a> 
     specified by <var title="">candidate</var>'s <code title="attr-source-src"><a href="#attr-source-src">src</a></code> attribute's value relative to
     the <var title="">candidate</var> when the <code title="attr-source-src"><a href="#attr-source-src">src</a></code> attribute was last
     changed.</p> <!-- i.e. changing xml:base or <base> after src=""
     has no effect --> 
 
     <li><p>&#8987; If <var title="">absolute URL</var> was not
     obtained successfully, then end the <a href="webappapis.html#synchronous-section">synchronous
     section</a>, and jump down to the <i title="">failed</i> step
     below.</li> 
 
     <li><p>&#8987; If <var title="">candidate</var> has a <code title="attr-source-type"><a href="#attr-source-type">type</a></code> attribute whose value, when
     parsed as a <a href="infrastructure.html#mime-type">MIME type</a> (including any codecs
     described by the <code title="">codecs</code> parameter),
     represents <a href="#a-type-that-the-user-agent-knows-it-cannot-render">a type that the user agent knows it cannot
     render</a>, then end the <a href="webappapis.html#synchronous-section">synchronous section</a>, and
     jump down to the <i title="">failed</i> step below.</li> 
 
     <li><p>&#8987; If <var title="">candidate</var> has a <code title="attr-source-media"><a href="#attr-source-media">media</a></code> attribute whose value does
     not <a href="common-microsyntaxes.html#matches-the-environment" title="matches the environment">match the
     environment</a>, then end the <a href="webappapis.html#synchronous-section">synchronous
     section</a>, and jump down to the <i title="">failed</i> step
     below.</li> 
 
     <li><p>&#8987; Set the <code title="dom-media-currentSrc"><a href="#dom-media-currentsrc">currentSrc</a></code> attribute to <var title="">absolute URL</var>.</li> 
 
     <li><p>End the <a href="webappapis.html#synchronous-section">synchronous section</a>, continuing the
     remaining steps asynchronously.</li> 
 
     <li><p>Run the <a href="#concept-media-load-resource" title="concept-media-load-resource">resource
     fetch algorithm</a> with <var title="">absolute URL</var>. If
     that algorithm returns without aborting <em>this</em> one, then
     the load failed.</li> 
 
     <li><p><i title="">Failed</i>: <a href="webappapis.html#queue-a-task">Queue a task</a> to
     <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-error">error</code> at the <var title="">candidate</var> element, in the context of the <a href="urls.html#fetch" title="fetch">fetching process</a> that was used to try to
     obtain <var title="">candidate</var>'s corresponding <a href="#media-resource">media
     resource</a> in the <a href="#concept-media-load-resource" title="concept-media-load-resource">resource fetch
     algorithm</a>.</li> 
 
     <li><p>Asynchronously <a href="webappapis.html#await-a-stable-state">await a stable state</a>. The
     <a href="webappapis.html#synchronous-section">synchronous section</a> consists of all the remaining
     steps of this algorithm until the algorithm says the
     <a href="webappapis.html#synchronous-section">synchronous section</a> has ended. (Steps in <a href="webappapis.html#synchronous-section" title="synchronous section">synchronous sections</a> are
     marked with &#8987;.)</li> 
 
     <li><p>&#8987; <i title="">Find next candidate</i>: Let <var title="">candidate</var> be null.</li> 
 
     <li><p>&#8987; <i title="">Search loop</i>: If the node after
     <var title="">pointer</var> is the end of the list, then jump to
     the <i title="">waiting</i> step below.</li> 
 
     <li><p>&#8987; If the node after <var title="">pointer</var> is
     a <code><a href="#the-source-element">source</a></code> element, let <var title="">candidate</var> 
     be that element.</li> 
 
     <li><p>&#8987; Advance <var title="">pointer</var> so that the
     node before <var title="">pointer</var> is now the node that was
     after <var title="">pointer</var>, and the node after <var title="">pointer</var> is the node after the node that used to be
     after <var title="">pointer</var>, if any.</li> 
 
     <li><p>&#8987; If <var title="">candidate</var> is null, jump
     back to the <i title="">search loop</i> step. Otherwise, jump
     back to the <i title="">process candidate</i> step.</li> 
 
     <li><p>&#8987; <i title="">Waiting</i>: Set the element's <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
     the <a href="#dom-media-network_no_source" title="dom-media-NETWORK_NO_SOURCE">NETWORK_NO_SOURCE</a> 
     value.</li> 
 
     <li><p>&#8987; Set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event
     flag</a> to false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load
     event">delaying the load event</a>.</li> 
 
     <li><p>End the <a href="webappapis.html#synchronous-section">synchronous section</a>, continuing the
     remaining steps asynchronously.</li> 
 
     <li><p>Wait until the node after <var title="">pointer</var> is a
     node other than the end of the list. (This step might wait
     forever.)</li> 
 
     <li><p>Asynchronously <a href="webappapis.html#await-a-stable-state">await a stable state</a>. The
     <a href="webappapis.html#synchronous-section">synchronous section</a> consists of all the remaining
     steps of this algorithm until the algorithm says the
     <a href="webappapis.html#synchronous-section">synchronous section</a> has ended. (Steps in <a href="webappapis.html#synchronous-section" title="synchronous section">synchronous sections</a> are
     marked with &#8987;.)</li> 
 
     <li><p>&#8987; Set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event
     flag</a> back to true (this <a href="the-end.html#delay-the-load-event" title="delay the load
     event">delays the load event</a> again, in case it hasn't been
     fired yet).</p> 
 
     <li><p>&#8987; Set the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> back to <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code>.</li> 
 
     <li><p>&#8987; Jump back to the <i title="">find next
     candidate</i> step above.</li> 
 
    </ol></li> 
 
  </ol><p>The <dfn id="concept-media-load-resource" title="concept-media-load-resource">resource fetch
  algorithm</dfn> for a <a href="#media-element">media element</a> and a given
  <a href="urls.html#absolute-url">absolute URL</a> is as follows:</p> 
 
  <ol><li><p>Let the <var title="">current media resource</var> be the
   resource given by the <a href="urls.html#absolute-url">absolute URL</a> passed to this
   algorithm. This is now the element's <a href="#media-resource">media
   resource</a>.</li> 
 
   <li> 
 
    <p>Begin to <a href="urls.html#fetch">fetch</a> the <var title="">current media
    resource</var>, from the <a href="#media-element">media element</a>'s
    <code><a href="infrastructure.html#document">Document</a></code>'s <a href="origin-0.html#origin">origin</a>.</p> <!-- not
    http-origin privacy sensitive (looking forward to CORS here) --> 
 
    <p>Every 350ms (&plusmn;200ms) or for every byte received, whichever
    is <em>least</em> frequent, <a href="webappapis.html#queue-a-task">queue a task</a> to
    <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-progress"><a href="#event-media-progress">progress</a></code> at the element.</p> 
 
    <p>If at any point the user agent has received no data for more
    than about three seconds, then <a href="webappapis.html#queue-a-task">queue a task</a> to
    <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-stalled"><a href="#event-media-stalled">stalled</a></code> at the element.</p> 
 
    <p>User agents may allow users to selectively block or slow
    <a href="#media-data">media data</a> downloads. When a <a href="#media-element">media
    element</a>'s download has been blocked altogether, the user
    agent must act as if it was stalled (as opposed to acting as if
    the connection was closed). The rate of the download may also be
    throttled automatically by the user agent, e.g. to balance the
    download with other connections sharing the same bandwidth.</p> 
 
    <p>User agents may decide to not download more content at any
    time, e.g. after buffering five minutes of a one hour media
    resource, while waiting for the user to decide whether to play the
    resource or not, or while waiting for user input in an interactive
    resource. When a <a href="#media-element">media element</a>'s download has been
    suspended, the user agent must set the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> to <code title="dom-media-NETWORK_IDLE"><a href="#dom-media-network_idle">NETWORK_IDLE</a></code> and <a href="webappapis.html#queue-a-task">queue
    a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-suspend"><a href="#event-media-suspend">suspend</a></code> at the element. If and
    when downloading of the resource resumes, the user agent must set
    the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> to
    <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code>.</p> 
 
    <p class="note">The <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code> attribute provides a
    hint regarding how much buffering the author thinks is advisable,
    even in the absence of the <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code> attribute.</p> 
 
    <p>When a user agent decides to completely stall a download,
    e.g. if it is waiting until the user starts playback before
    downloading any further content, the element's
    <a href="#delaying-the-load-event-flag">delaying-the-load-event flag</a> must be set to
    false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load event">delaying the
    load event</a>.</p> 
 
    <p>The user agent may use whatever means necessary to fetch the
    resource (within the constraints put forward by this and other
    specifications); for example, reconnecting to the server in the
    face of network errors, using HTTP range retrieval requests, or
    switching to a streaming protocol. The user agent must consider a
    resource erroneous only if it has given up trying to fetch it.</p> 
 
    <p>The <a href="webappapis.html#networking-task-source">networking task source</a> <a href="webappapis.html#concept-task" title="concept-task">tasks</a> to process the data as it is
    being fetched must, when appropriate, include the relevant
    substeps from the following list:</p> 
 
    <dl class="switch"><dt>If the <a href="#media-data">media data</a> cannot be fetched at all, due
     to network errors, causing the user agent to give up trying to
     fetch the resource</dt> 
 
     <dt>If the <a href="#media-resource">media resource</a> is found to have <a href="urls.html#content-type" title="Content-Type">Content-Type metadata</a> that, when
     parsed as a <a href="infrastructure.html#mime-type">MIME type</a> (including any codecs
     described by the <code title="">codecs</code> parameter),
     represents <a href="#a-type-that-the-user-agent-knows-it-cannot-render">a type that the user agent knows it cannot
     render</a> (even if the actual <a href="#media-data">media data</a> is in a
     supported format)</dt> 
 
     <dt>If the <a href="#media-data">media data</a> can be fetched but is found by
     inspection to be in an unsupported format, or can otherwise not
     be rendered at all</dt> 
 
     <dd> 
 
      <p>DNS errors, HTTP 4xx and 5xx errors (and equivalents in
      other protocols), and other fatal network errors that occur
      before the user agent has established whether the <var title="">current media resource</var> is usable, as well as
      the file using an unsupported container format, or using
      unsupported codecs for all the data, must cause the user agent
      to execute the following steps:</p> 
 
      <ol><li><p>The user agent should cancel the fetching
       process.</li> 
 
       <li><p>Abort this subalgorithm, returning to the <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
       algorithm</a>.</p> 
 
      </ol></dd> 
 
 
     <!-- insert content sniffing here if we want to define that --> 
     <!-- (in practice I don't think that's necessary since it's not
     like you can do anything with the resource if you sniff it as the
     wrong type) --> 
 
 
     <dt id="getting-media-metadata">Once enough of the <a href="#media-data">media
     data</a> has been fetched to determine the duration of the
     <a href="#media-resource">media resource</a>, its dimensions, and other
     metadata</dt> 
 
     <dd> 
 
      <p>This indicates that the resource is usable. The user agent
      must follow these substeps:</p> 
 
      <ol><li><p>Set the <a href="#current-playback-position">current playback position</a> to the
       <a href="#earliest-possible-position">earliest possible position</a>.</li> 
 
       <li><p>Set the <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute to
       <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code>.</li> 
 
       <li><p>For <code><a href="#video">video</a></code> elements, set the <code title="dom-video-videoWidth"><a href="#dom-video-videowidth">videoWidth</a></code> and <code title="dom-video-videoHeight"><a href="#dom-video-videoheight">videoHeight</a></code> 
       attributes.</li> 
 
       <li> 
 
        <p>Set the <code title="dom-media-duration"><a href="#dom-media-duration">duration</a></code> 
        attribute to the duration of the resource.</p> 
 
        <p class="note">The user agent <a href="#durationChange">will</a> <a href="webappapis.html#queue-a-task">queue a task</a> to
        <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-durationchange"><a href="#event-media-durationchange">durationchange</a></code> at the
        element at this point.</p> 
 
       </li> 
 
       <li id="fire-loadedmetadata"> 
 
        <p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
        event</a> named <code title="event-media-loadedmetadata"><a href="#event-media-loadedmetadata">loadedmetadata</a></code> at the
        element.</p> 
 
        <p class="note">Before this task is run, as part of the event
        loop mechanism, the rendering will have been updated to resize
        the <code><a href="#video">video</a></code> element if appropriate.</p> 
 
       </li> 
 
       <li> 
 
        <p>If either the <a href="#media-resource">media resource</a> or the address
        of the <var title="">current media resource</var> indicate a
        particular start time, then <a href="#dom-media-seek" title="dom-media-seek">seek</a> to that time. Ignore any
        resulting exceptions (if the position is out of range, it is
        effectively ignored).</p> 
 
        <p class="example">For example, a fragment identifier could be
        used to indicate a start position.</p> 
 
       </li> 
 
       <li> 
 
        <p>Once the <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute
        reaches <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code>,
        <a href="#fire-loadeddata">after the <code title="event-media-loadeddata">loadeddata</code> event has been
        fired</a>, set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event
        flag</a> to false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load
        event">delaying the load event</a>.</p> 
 
        <p class="note">A user agent that is attempting to reduce
        network usage while still fetching the metadata for each
        <a href="#media-resource">media resource</a> would also stop buffering at this
        point, causing the <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute
        to switch to the <code title="dom-media-NETWORK_IDLE"><a href="#dom-media-network_idle">NETWORK_IDLE</a></code> value.</p> 
 
       </li> 
 
      </ol><p class="note">The user agent is <em>required</em> to
      determine the duration of the <a href="#media-resource">media resource</a> and
      go through this step before playing.</p> <!-- actually defined
      in the 'duration' section --> 
 
     </dd> 
 
 
     <dt>Once the entire <a href="#media-resource">media resource</a> has been <a href="urls.html#fetch" title="fetch">fetched</a> (but potentially before any of it
     has been decoded)</dt> 
 
     <dd> 
 
      <p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> 
      named <code title="event-media-progress"><a href="#event-media-progress">progress</a></code> at the
      <a href="#media-element">media element</a>.</p> 
 
     </dd> 
 
 
     <dt>If the connection is interrupted, causing the user agent to
     give up trying to fetch the resource</dt> 
 
     <dd> 
 
      <p>Fatal network errors that occur after the user agent has
      established whether the <var title="">current media
      resource</var> is usable must cause the user agent to execute
      the following steps:</p> 
 
      <ol><li><p>The user agent should cancel the fetching
       process.</li> 
 
       <li><p>Set the <code title="dom-media-error"><a href="#dom-media-error">error</a></code> 
       attribute to a new <code><a href="#mediaerror">MediaError</a></code> object whose <code title="dom-MediaError-code"><a href="#dom-mediaerror-code">code</a></code> attribute is set to
       <code title="dom-MediaError-MEDIA_ERR_NETWORK"><a href="#dom-mediaerror-media_err_network">MEDIA_ERR_NETWORK</a></code>.</li> 
 
       <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
       event</a> named <code title="event-media-error"><a href="#event-media-error">error</a></code> 
       at the <a href="#media-element">media element</a>.</li> 
 
       <li><p>Set the element's <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
       the <a href="#dom-media-network_empty" title="dom-media-NETWORK_EMPTY">NETWORK_EMPTY</a> 
       value and <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
       event</a> named <code title="event-media-emptied"><a href="#event-media-emptied">emptied</a></code> 
       at the element.</li> 
 
       <li><p>Set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event
       flag</a> to false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load
       event">delaying the load event</a>.</li> 
 
       <li><p>Abort the overall <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
       algorithm</a>.</li> 
 
      </ol></dd> 
 
 
     <dt id="fatal-decode-error">If the <a href="#media-data">media data</a> is
     corrupted</dt> 
 
     <dd> 
 
      <p>Fatal errors in decoding the <a href="#media-data">media data</a> that
      occur after the user agent has established whether the <var title="">current media resource</var> is usable must cause the
      user agent to execute the following steps:</p> 
 
      <ol><li><p>The user agent should cancel the fetching
       process.</li> 
 
       <li><p>Set the <code title="dom-media-error"><a href="#dom-media-error">error</a></code> 
       attribute to a new <code><a href="#mediaerror">MediaError</a></code> object whose <code title="dom-MediaError-code"><a href="#dom-mediaerror-code">code</a></code> attribute is set to
       <code title="dom-MediaError-MEDIA_ERR_DECODE"><a href="#dom-mediaerror-media_err_decode">MEDIA_ERR_DECODE</a></code>.</li> 
 
       <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
       event</a> named <code title="event-media-error"><a href="#event-media-error">error</a></code> 
       at the <a href="#media-element">media element</a>.</li> 
 
       <li><p>Set the element's <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
       the <a href="#dom-media-network_empty" title="dom-media-NETWORK_EMPTY">NETWORK_EMPTY</a> 
       value and <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
       event</a> named <code title="event-media-emptied"><a href="#event-media-emptied">emptied</a></code> 
       at the element.</li> 
 
       <li><p>Set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event
       flag</a> to false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load
       event">delaying the load event</a>.</li> 
 
       <li><p>Abort the overall <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
       algorithm</a>.</li> 
 
      </ol></dd> 
 
 
     <dt>If the <a href="#media-data">media data</a> fetching process is aborted by
     the user</dt> 
 
     <dd> 
 
      <p>The fetching process is aborted by the user, e.g. because the
      user navigated the browsing context to another page, the user
      agent must execute the following steps. These steps are not
      followed if the <code title="dom-media-load"><a href="#dom-media-load">load()</a></code> 
      method itself is invoked while these steps are running, as the
      steps above handle that particular kind of abort.</p> 
 
      <ol><li><p>The user agent should cancel the fetching
       process.</li> 
 
       <li><p>Set the <code title="dom-media-error"><a href="#dom-media-error">error</a></code> 
       attribute to a new <code><a href="#mediaerror">MediaError</a></code> object whose <code title="dom-MediaError-code"><a href="#dom-mediaerror-code">code</a></code> attribute is set to
       <code title="dom-MediaError-MEDIA_ERR_ABORTED"><a href="#dom-mediaerror-media_err_aborted">MEDIA_ERR_ABORTED</a></code>.</li> 
 
       <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
       event</a> named <code title="event-media-abort"><a href="#event-media-abort">abort</a></code> 
       at the <a href="#media-element">media element</a>.</li> 
 
       <li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute has a
       value equal to <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>, set the
       element's <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
       the <a href="#dom-media-network_empty" title="dom-media-NETWORK_EMPTY">NETWORK_EMPTY</a> 
       value and <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
       event</a> named <code title="event-media-emptied"><a href="#event-media-emptied">emptied</a></code> 
       at the element. Otherwise, set the element's <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute to
       the <a href="#dom-media-network_idle" title="dom-media-NETWORK_IDLE">NETWORK_IDLE</a> 
       value.</li> 
 
       <li><p>Set the element's <a href="#delaying-the-load-event-flag">delaying-the-load-event
       flag</a> to false. This stops <a href="the-end.html#delay-the-load-event" title="delay the load
       event">delaying the load event</a>.</li> 
 
       <li><p>Abort the overall <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
       algorithm</a>.</li> 
 
      </ol></dd> 
 
 
     <dt id="non-fatal-media-error">If the <a href="#media-data">media data</a> can
     be fetched but has non-fatal errors or uses, in part, codecs that
     are unsupported, preventing the user agent from rendering the
     content completely correctly but not preventing playback
     altogether</dt> 
 
     <dd> 
 
      <p>The server returning data that is partially usable but cannot
      be optimally rendered must cause the user agent to render just
      the bits it can handle, and ignore the rest.</p> 
 
      <!-- v2: fire a 'warning' event and set the 'error' flag to 'MEDIA_ERR_SUBOPTIMAL' or something --> 
 
     </dd> 
 
    </dl><p>When the <a href="webappapis.html#networking-task-source">networking task source</a> has <a href="webappapis.html#queue-a-task" title="queue a task">queued</a> the last <a href="webappapis.html#concept-task" title="concept-task">task</a> as part of <a href="urls.html#fetch" title="fetch">fetching</a> the <a href="#media-resource">media resource</a> 
    (i.e. once the download has completed), if the fetching process
    completes without errors, including decoding the media data, and
    if all of the data is available to the user agent without network
    access, then, the user agent must move on to the next step. This
    might never happen, e.g. when streaming an infinite resource such
    as Web radio, or if the resource is longer than the user agent's
    ability to cache data.</p> 
 
    <p>While the user agent might still need network access to obtain
    parts of the <a href="#media-resource">media resource</a>, the user agent must
    remain on this step.</p> 
 
    <p class="example">For example, if the user agent has discarded
    the first half of a video, the user agent will remain at this step
    even once the <a href="#ended-playback" title="ended playback">playback has
    ended</a>, because there is always the chance the user will
    seek back to the start. In fact, in this situation, once <a href="#ended-playback" title="ended playback">playback has ended</a>, the user agent
    will end up dispatching a <code title="event-media-stalled"><a href="#event-media-stalled">stalled</a></code> event, as described
    earlier.</p> 
 
   </li> 
 
   <li><p>If the user agent ever reaches this step (which can only
   happen if the entire resource gets loaded and kept available):
   abort the overall <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a>.</li> 
 
  </ol></div> 
 
  <hr><p>The <dfn id="attr-media-preload" title="attr-media-preload"><code>preload</code></dfn> 
  attribute is an <a href="common-microsyntaxes.html#enumerated-attribute">enumerated attribute</a>. The following table
  lists the keywords and states for the attribute &mdash; the keywords
  in the left column map to the states in the cell in the second
  column on the same row as the keyword.</p> 
 
  <table><thead><tr><th> Keyword
     <th> State
     <th> Brief description
   <tbody><tr><td><dfn id="attr-media-preload-none" title="attr-media-preload-none"><code>none</code></dfn> 
     <td><dfn id="attr-media-preload-none-state" title="attr-media-preload-none-state">None</dfn> 
     <td>Hints to the user agent that either the author does not expect the user to need the media resource, or that the server wants to minimise unnecessary traffic.
    <tr><td><dfn id="attr-media-preload-metadata" title="attr-media-preload-metadata"><code>metadata</code></dfn> 
     <td><dfn id="attr-media-preload-metadata-state" title="attr-media-preload-metadata-state">Metadata</dfn> 
     <td>Hints to the user agent that the author does not expect the user to need the media resource, but that fetching the resource metadata (dimensions, first frame, track list, duration, etc) is reasonable.
    <tr><td><dfn id="attr-media-preload-auto" title="attr-media-preload-auto"><code>auto</code></dfn> 
     <td><dfn id="attr-media-preload-auto-state" title="attr-media-preload-auto-state">Automatic</dfn> 
     <td>Hints to the user agent that the user agent can put the user's needs first without risk to the server, up to and including optimistically downloading the entire resource.
  </table><p>The empty string is also a valid keyword, and maps to the <a href="#attr-media-preload-auto-state" title="attr-media-preload-auto-state">Automatic</a> state. The
  attribute's <i>missing value default</i> is user-agent defined,
  though the <a href="#attr-media-preload-auto-state" title="attr-media-preload-auto-state">Metadata</a> state is
  suggested as a compromise between reducing server load and providing
  an optimal user experience.</p> 
 
  <div class="impl"> 
 
  <p>The <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code> attribute is
  intended to provide a hint to the user agent about what the author
  thinks will lead to the best user experience. The attribute may be
  ignored altogether, for example based on explicit user preferences
  or based on the available connectivity.</p> 
 
  <p>The <dfn id="dom-media-preload" title="dom-media-preload"><code>preload</code></dfn> IDL
  attribute must <a href="urls.html#reflect">reflect</a> the content attribute of the
  same name.</p> 
 
  </div> 
 
  <p class="note">The <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code> attribute can overrride
  the <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code> attribute (since
  if the media plays, it naturally has to buffer first, regardless of
  the hint given by the <code title="attr-media-preload"><a href="#attr-media-preload">preload</a></code> attribute). Including
  both is not an error, however.</p> 
 
  <hr><!--v3BUF (when readding this, also add a domintro block)
  <p>The <dfn
  title="dom-media-bufferingRate"><code>bufferingRate</code></dfn>
  attribute must return the average number of bits received per second
  for the current download over the past few seconds. If there is no
  download in progress, the attribute must return 0.</p>
 
  <p>The <dfn
  title="dom-media-bufferingThrottled"><code>bufferingThrottled</code></dfn>
  attribute must return true if the user agent is intentionally
  throttling the bandwidth used by the download (including when
  throttling to zero to pause the download altogether), and false
  otherwise.</p>
 
  <hr>
--><dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-buffered"><a href="#dom-media-buffered">buffered</a></code></dt> 
 
   <dd> 
 
    <p>Returns a <code><a href="#timeranges">TimeRanges</a></code> object that represents the
    ranges of the <a href="#media-resource">media resource</a> that the user agent has
    buffered.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-media-buffered" title="dom-media-buffered"><code>buffered</code></dfn> 
  attribute must return a new static <a href="#normalized-timeranges-object">normalized
  <code>TimeRanges</code> object</a> that represents the ranges of
  the <a href="#media-resource">media resource</a>, if any, that the user agent has
  buffered, at the time the attribute is evaluated. Users agents must
  accurately determine the ranges available, even for media streams
  where this can only be determined by tedious inspection.</p> 
 
  <p class="note">Typically this will be a single range anchored at
  the zero point, but if, e.g. the user agent uses HTTP range requests
  in response to seeking, then there could be multiple ranges.</p> 
 
  <p>User agents may discard previously buffered data.</p> 
 
  <p class="note">Thus, a time position included within a range of the
  objects return by the <code title="dom-media-buffered"><a href="#dom-media-buffered">buffered</a></code> attribute at one time can
  end up being not included in the range(s) of objects returned by the
  same attribute at later times.</p> 
 
  </div> 
 
 
 
  <h5 id="offsets-into-the-media-resource"><span class="secno">4.8.9.6 </span>Offsets into the media resource</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-duration"><a href="#dom-media-duration">duration</a></code></dt> 
 
   <dd> 
 
    <p>Returns the length of the <a href="#media-resource">media resource</a>, in
    seconds.</p> 
 
    <p>Returns NaN if the duration isn't available.<p> 
 
    <p>Returns Infinity for unbounded streams.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-currentTime"><a href="#dom-media-currenttime">currentTime</a></code> [ = <var title="">value</var> ]</dt> 
 
   <dd> 
 
    <p>Returns the <a href="#current-playback-position">current playback position</a>, in seconds.</p> 
 
    <p>Can be set, to seek to the given time.<p> 
 
    <p>Will throw an <code><a href="urls.html#invalid_state_err">INVALID_STATE_ERR</a></code> exception if there
    is no selected <a href="#media-resource">media resource</a>. Will throw an
    <code><a href="urls.html#index_size_err">INDEX_SIZE_ERR</a></code> exception if the given time is not
    within the ranges to which the user agent can seek.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-startTime"><a href="#dom-media-starttime">startTime</a></code></dt> 
 
   <dd> 
 
    <p>Returns the <a href="#earliest-possible-position">earliest possible position</a>, in
    seconds. This is the time for the start of the current clip. It
    might not be zero if the clip's timeline is not zero-based, or if
    the resource is a streaming resource (in which case it gives the
    earliest time that the user agent is able to seek back to).</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-media-duration" title="dom-media-duration"><code>duration</code></dfn> 
  attribute must return the length of the <a href="#media-resource">media resource</a>,
  in seconds. If no <a href="#media-data">media data</a> is available, then the
  attributes must return the Not-a-Number (NaN) value. If the
  <a href="#media-resource">media resource</a> is known to be unbounded (e.g. a
  streaming radio), then the attribute must return the positive
  Infinity value.</p> 
 
  <p>The user agent must determine the duration of the <a href="#media-resource">media
  resource</a> before playing any part of the <a href="#media-data">media
  data</a> and before setting <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> to a value equal to
  or greater than <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code>, even if doing
  so requires seeking to multiple parts of the resource.</p> 
 
  <p id="durationChange">When the length of the <a href="#media-resource">media
  resource</a> changes (e.g. from being unknown to known, or from a
  previously established length to a new length) the user agent must
  <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named
  <code title="event-media-durationchange"><a href="#event-media-durationchange">durationchange</a></code> at the
  <a href="#media-element">media element</a>.</p> 
 
  <p class="example">If an "infinite" stream ends for some reason,
  then the duration would change from positive Infinity to the time of
  the last frame or sample in the stream, and the <code title="event-media-durationchange"><a href="#event-media-durationchange">durationchange</a></code> event would be
  fired. Similarly, if the user agent initially estimated the
  <a href="#media-resource">media resource</a>'s duration instead of determining it
  precisely, and later revises the estimate based on new information,
  then the duration would change and the <code title="event-media-durationchange"><a href="#event-media-durationchange">durationchange</a></code> event would be
  fired.</p> 
 
  <p><a href="#media-element" title="media element">Media elements</a> have a
  <dfn id="current-playback-position">current playback position</dfn>, which must initially be
  zero. The current position is a time.</p> 
 
  <p>The <dfn id="dom-media-currenttime" title="dom-media-currentTime"><code>currentTime</code></dfn> 
  attribute must, on getting, return the <a href="#current-playback-position">current playback
  position</a>, expressed in seconds. On setting, the user agent
  must <a href="#dom-media-seek" title="dom-media-seek">seek</a> to the new value
  (which might raise an exception).</p> 
 
  <p>If the <a href="#media-resource">media resource</a> is a streaming resource, then
  the user agent might be unable to obtain certain parts of the
  resource after it has expired from its buffer. Similarly, some <a href="#media-resource" title="media resource">media resources</a> might have a timeline
  that doesn't start at zero. The <dfn id="earliest-possible-position">earliest possible
  position</dfn> is the earliest position in the stream or resource
  that the user agent can ever obtain again.</p> 
 
  <p>The <dfn id="dom-media-starttime" title="dom-media-startTime"><code>startTime</code></dfn> 
  attribute must, on getting, return the <a href="#earliest-possible-position">earliest possible
  position</a>, expressed in seconds.</p> 
 
  <p>When the <a href="#earliest-possible-position">earliest possible position</a> changes, then:
  if the <a href="#current-playback-position">current playback position</a> is before the
  <a href="#earliest-possible-position">earliest possible position</a>, the user agent must <a href="#dom-media-seek" title="dom-media-seek">seek</a> to the <a href="#earliest-possible-position">earliest possible
  position</a>; otherwise, if the user agent has not fired a <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> event at the
  element in the past 15 to 250ms and is not still running event
  handlers for such an event, then the user agent must <a href="webappapis.html#queue-a-task">queue a
  task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the element.</p> 
 
  <p class="note">Because of the above requirement and the requirement
  in the <a href="#concept-media-load-resource" title="concept-media-load-resource">resource fetch
  algorithm</a> that kicks in <a href="#getting-media-metadata">when the metadata of the clip becomes
  known</a>, the <a href="#current-playback-position">current playback position</a> can never be
  less than the <a href="#earliest-possible-position">earliest possible position</a>.</p> 
 
  <p>User agents must act as if the timeline of the <a href="#media-resource">media
  resource</a> increases linearly starting from the <a href="#earliest-possible-position">earliest
  possible position</a>, even if the underlying <a href="#media-data">media
  data</a> has out-of-order or even overlapping time codes.</p> 
 
  <p class="example">For example, if two clips have been concatenated
  into one video file, but the video format exposes the original times
  for the two clips, the video data might expose a timeline that goes,
  say, 00:15..00:29 and then 00:05..00:38. However, the user agent
  would not expose those times; it would instead expose the times as
  00:15..00:29 and 00:29..01:02, as a single video.</p> 
 
  </div> 
 
  <p>The <dfn id="attr-media-loop" title="attr-media-loop"><code>loop</code></dfn> 
  attribute is a <a href="common-microsyntaxes.html#boolean-attribute">boolean attribute</a> that, if specified,
  indicates that the <a href="#media-element">media element</a> is to seek back to the
  start of the <a href="#media-resource">media resource</a> upon reaching the end.</p> 
 
  <div class="impl"> 
 
  <p>The <dfn id="dom-media-loop" title="dom-media-loop"><code>loop</code></dfn> IDL
  attribute must <a href="urls.html#reflect">reflect</a> the content attribute of the
  same name.</p> 
 
  </div> 
 
 
 
  <h5 id="the-ready-states"><span class="secno">4.8.9.7 </span>The ready states</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code></dt> 
 
   <dd> 
 
    <p>Returns a value that expresses the current state of the element
    with respect to rendering the <a href="#current-playback-position">current playback
    position</a>, from the codes in the list below.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p><a href="#media-element" title="media element">Media elements</a> have a
  <i>ready state</i>, which describes to what degree they are ready
  to be rendered at the <a href="#current-playback-position">current playback position</a>. The
  possible values are as follows; the ready state of a media element
  at any particular time is the greatest value describing the state of
  the element:</p> 
 
  </div> 
 
  <dl><dt><dfn id="dom-media-have_nothing" title="dom-media-HAVE_NOTHING"><code>HAVE_NOTHING</code></dfn> (numeric value 0)</dt> 
 
   <dd>No information regarding the <a href="#media-resource">media resource</a> is
   available. No data for the <a href="#current-playback-position">current playback position</a> 
   is available. <a href="#media-element" title="media element">Media elements</a> 
   whose <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> 
   attribute is <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code> are always in
   the <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code> 
   state.</dd> 
 
   <dt><dfn id="dom-media-have_metadata" title="dom-media-HAVE_METADATA"><code>HAVE_METADATA</code></dfn> (numeric value 1)</dt> 
 
   <dd>Enough of the resource has been obtained that the duration of
   the resource is available. In the case of a <code><a href="#video">video</a></code> 
   element, the dimensions of the video are also available. The API
   will no longer raise an exception when seeking. No <a href="#media-data">media
   data</a> is available for the immediate <a href="#current-playback-position">current playback
   position</a>.</dd> 
 
   <dt><dfn id="dom-media-have_current_data" title="dom-media-HAVE_CURRENT_DATA"><code>HAVE_CURRENT_DATA</code></dfn> (numeric value 2)</dt> 
 
   <dd>Data for the immediate <a href="#current-playback-position">current playback position</a> 
   is available, but either not enough data is available that the user
   agent could successfully advance the <a href="#current-playback-position">current playback
   position</a> in the <a href="#direction-of-playback">direction of playback</a> at all
   without immediately reverting to the <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> state, or
   there is no more data to obtain in the <a href="#direction-of-playback">direction of
   playback</a>. For example, in video this corresponds to the user
   agent having data from the current frame, but not the next frame;
   and to when <a href="#ended-playback" title="ended playback">playback has
   ended</a>.</dd> 
 
   <dt><dfn id="dom-media-have_future_data" title="dom-media-HAVE_FUTURE_DATA"><code>HAVE_FUTURE_DATA</code></dfn> (numeric value 3)</dt> 
 
   <dd>Data for the immediate <a href="#current-playback-position">current playback position</a> 
   is available, as well as enough data for the user agent to advance
   the <a href="#current-playback-position">current playback position</a> in the <a href="#direction-of-playback">direction
   of playback</a> at least a little without immediately reverting
   to the <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> 
   state. For example, in video this corresponds to the user agent
   having data for at least the current frame and the next frame. The
   user agent cannot be in this state if <a href="#ended-playback" title="ended
   playback">playback has ended</a>, as the <a href="#current-playback-position">current playback
   position</a> can never advance in this case.</dd> 
 
   <dt><dfn id="dom-media-have_enough_data" title="dom-media-HAVE_ENOUGH_DATA"><code>HAVE_ENOUGH_DATA</code></dfn> (numeric value 4)</dt> 
 
   <dd>All the conditions described for the <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> state
   are met, and, in addition, the user agent estimates that data is
   being fetched at a rate where the <a href="#current-playback-position">current playback
   position</a>, if it were to advance at the rate given by the
   <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code> 
   attribute, would not overtake the available data before playback
   reaches the end of the <a href="#media-resource">media resource</a>.</dd> 
 
  </dl><div class="impl"> 
 
  <p>When the ready state of a <a href="#media-element">media element</a> whose <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> is not <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code> changes, the
  user agent must follow the steps given below:</p> 
 
  <dl class="switch"><!-- going up to metadata --><dt>If the previous ready state was <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>, and the new
   ready state is <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code></dt> 
 
   <dd> 
 
    <p class="note">A <code title="event-media-loadedmetadata"><a href="#event-media-loadedmetadata">loadedmetadata</a></code> DOM event <a href="#fire-loadedmetadata">will be fired</a> as part of the <code title="dom-media-load"><a href="#dom-media-load">load()</a></code> algorithm.</p> 
 
   </dd> 
 
   <!-- going up to current for the first time --> 
 
   <dt id="handling-first-frame-available">If the previous ready state
   was <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> and
   the new ready state is <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code> or
   greater</dt> 
 
   <dd> 
 
    <p id="fire-loadeddata">If this is the first time this occurs for
    this <a href="#media-element">media element</a> since the <code title="dom-media-load"><a href="#dom-media-load">load()</a></code> algorithm was last invoked,
    the user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a
    simple event</a> named <code title="event-media-loadeddata"><a href="#event-media-loadeddata">loadeddata</a></code> at the element.</p> 
 
    <p>If the new ready state is <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> or
    <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code>,
    then the relevant steps below must then be run also.</p> 
 
   </dd> 
 
   <!-- going down --> 
   <dt>If the previous ready state was <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> or more,
   and the new ready state is <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code> or
   less</dt> 
 
   <dd> 
 
    <p class="note">A <code title="event-media-waiting"><a href="#event-media-waiting">waiting</a></code> DOM
    event <a href="#fire-waiting-when-waiting">can be fired</a>,
    depending on the current state of playback.</p> 
 
   </dd> 
 
   <!-- going up to future --> 
   <dt>If the previous ready state was <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code> or
   less, and the new ready state is <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code></dt> 
 
   <dd> 
 
    <p>The user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a
    simple event</a> named <code title="event-media-canplay"><a href="#event-media-canplay">canplay</a></code>.</p> 
 
    <p>If the element is <a href="#potentially-playing">potentially playing</a>, the user
    agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
    event</a> named <code title="event-media-playing"><a href="#event-media-playing">playing</a></code>.</p> 
 
   </dd> 
 
   <!-- going up to enough --> 
   <dt>If the new ready state is <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code></dt> 
 
   <dd> 
 
    <p>If the previous ready state was <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code> or
    less, the user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire
    a simple event</a> named <code title="event-media-canplay"><a href="#event-media-canplay">canplay</a></code>, and, if the element is also
    <a href="#potentially-playing">potentially playing</a>, <a href="webappapis.html#queue-a-task">queue a task</a> to
    <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-playing"><a href="#event-media-playing">playing</a></code>.</p> 
 
    <p>If the <a href="#autoplaying-flag">autoplaying flag</a> is true, and the <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute is true, and the
    <a href="#media-element">media element</a> has an <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code> attribute specified,
    and the <a href="#media-element">media element</a> is in a <code><a href="infrastructure.html#document">Document</a></code> 
    whose <a href="browsers.html#browsing-context">browsing context</a> did not have the
    <a href="the-iframe-element.html#sandboxed-automatic-features-browsing-context-flag">sandboxed automatic features browsing context flag</a> 
    set when the <code><a href="infrastructure.html#document">Document</a></code> was created, then the user
    agent may also set the <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute to false,
    <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> 
    named <code title="event-media-play"><a href="#event-media-play">play</a></code>, and <a href="webappapis.html#queue-a-task">queue
    a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-playing"><a href="#event-media-playing">playing</a></code>.</p> 
 
    <p class="note">User agents are not required to autoplay, and it
    is suggested that user agents honor user preferences on the
    matter. Authors are urged to use the <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code> attribute rather than
    using script to force the video to play, so as to allow the user
    to override the behavior if so desired.</p> 
 
    <p>In any case, the user agent must finally <a href="webappapis.html#queue-a-task">queue a
    task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-canplaythrough"><a href="#event-media-canplaythrough">canplaythrough</a></code>.</p> 
 
   </dd> 
 
  </dl></div> 
 
  <p class="note">It is possible for the ready state of a media
  element to jump between these states discontinuously. For example,
  the state of a media element can jump straight from <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> to <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code> without
  passing through the <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code> and
  <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> 
  states.</p> 
 
  <div class="impl"> 
 
  <p>The <dfn id="dom-media-readystate" title="dom-media-readyState"><code>readyState</code></dfn> IDL
  attribute must, on getting, return the value described above that
  describes the current ready state of the <a href="#media-element">media
  element</a>.</p> 
 
  </div> 
 
  <p>The <dfn id="attr-media-autoplay" title="attr-media-autoplay"><code>autoplay</code></dfn> 
  attribute is a <a href="common-microsyntaxes.html#boolean-attribute">boolean attribute</a>. When present, the
  user agent <span class="impl">(as described in the algorithm
  described herein)</span> will automatically begin playback of the
  <a href="#media-resource">media resource</a> as soon as it can do so without
  stopping.</p> 
 
  <p class="note">Authors are urged to use the <code title="attr-media-autoplay"><a href="#attr-media-autoplay">autoplay</a></code> attribute rather than
  using script to trigger automatic playback, as this allows the user
  to override the automatic playback when it is not desired, e.g. when
  using a screen reader. Authors are also encouraged to consider not
  using the automatic playback behavior at all, and instead to let the
  user agent wait for the user to start playback explicitly.</p> 
 
  <div class="impl"> 
 
  <p>The <dfn id="dom-media-autoplay" title="dom-media-autoplay"><code>autoplay</code></dfn> 
  IDL attribute must <a href="urls.html#reflect">reflect</a> the content attribute of the
  same name.</p> 
 
  </div> 
 
 
<!--v2CUERANGE
  <h5>Cue ranges</h5>
 
  <dl class="domintro">
 
   <dt><var title="">media</var> . <code title="dom-media-addCueRange">addCueRange</code>(<var title="">className</var>, <var title="">id</var>, <var title="">start</var>, <var title="">end</var>, <var title="">pauseOnExit</var>, <var title="">enterCallback</var>, <var title="">exitCallback</var>)</dt>
 
   <dd>
 
    <p>Registers a range of time, given in seconds, and a pair of
    callbacks, the first of which will be invoked when the
    <span>current playback position</span> enters the range, and the
    second of which will be invoked when it exits the range. The
    callbacks are invoked with the given ID as their argument.</p>
 
    <p>In addition, if the <var title="">pauseOnExit</var> argument is
    true, then playback will pause when it reaches the end of the
    range.</p>
 
   </dd>
 
   <dt><var title="">media</var> . <code title="dom-media-removeCueRange">removeCueRange</code>(<var title="">className</var>)</dt>
 
   <dd>
 
    <p>Removes all the ranges that were registered with the given
    class name.</p>
 
   </dd>
 
  </dl>
 
  <div class="impl">
 
  <p><span title="media element">Media elements</span> have a set of
  <dfn title="cue range">cue ranges</dfn>. Each cue range is made up
  of the following information:</p>
 
  <dl>
 
   <dt>A class name</dt>
   <dd>A group of related ranges can be given the same class name so
   that they can all be removed at the same time.</dd>
 
   <dt>An identifier</dt>
   <dd>A string can be assigned to each cue range for identification
   by script. The string need not be unique and can contain any
   value.</dd>
 
   <dt>A start time</dt>
   <dt>An end time</dt>
   <dd>The actual time range, using the same timeline as the
   <span>media resource</span> itself.</dd>
 
   <dt>A "pause" boolean</dt>
   <dd>A flag indicating whether to pause playback on exit.</dd>
 
   <dt>An "enter" callback</dt>
   <dd>A callback that is called when the <span>current playback
   position</span> enters the range.</dd>
 
   <dt>An "exit" callback</dt>
   <dd>A callback that is called when the <span>current playback
   position</span> exits the range.</dd>
 
   <dt>An "active" boolean</dt>
   <dd>A flag indicating whether the range is active or not.</dd>
 
  </dl>
 
  <p>The <dfn title="dom-media-addCueRange"><code>addCueRange(<var
  title="">className</var>, <var title="">id</var>, <var
  title="">start</var>, <var title="">end</var>, <var
  title="">pauseOnExit</var>, <var title="">enterCallback</var>, <var
  title="">exitCallback</var>)</code></dfn> method must, when called,
  add a <span>cue range</span> to the <span>media element</span>, that
  cue range having the class name <var title="">className</var>, the
  identifier <var title="">id</var>, the start time <var
  title="">start</var> (in seconds), the end time <var
  title="">end</var> (in seconds), the "pause" boolean with the same
  value as <var title="">pauseOnExit</var>, the "enter" callback <var
  title="">enterCallback</var>, the "exit" callback <var
  title="">exitCallback</var>, and an "active" boolean that is true if
  the <span>current playback position</span> is equal to or greater
  than the start time and less than the end time, and false
  otherwise.</p>
 
  <p>The <dfn
  title="dom-media-removeCueRanges"><code>removeCueRanges(<var
  title="">className</var>)</code></dfn> method must, when called,
  remove all the <span title="cue range">cue ranges</span> of the
  <span>media element</span> which have the class name <var
  title="">className</var>.</p>
 
  </div>
--> 
 
 
  <h5 id="playing-the-media-resource"><span class="secno">4.8.9.8 </span>Playing the media resource</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code></dt> 
 
   <dd> 
 
    <p>Returns true if playback is paused; false otherwise.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-ended"><a href="#dom-media-ended">ended</a></code></dt> 
 
   <dd> 
 
    <p>Returns true if playback has reached the end of the <a href="#media-resource">media resource</a>.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code> [ = <var title="">value</var> ]</dt> 
 
   <dd> 
 
    <p>Returns the default rate of playback, for when the user is not
    fast-forwarding or reversing through the <a href="#media-resource">media
    resource</a>.</p> 
 
    <p>Can be set, to change the default rate of playback.</p> 
 
    <p>The default rate has no direct effect on playback, but if the
    user switches to a fast-forward mode, when they return to the
    normal playback mode, it is expected that the rate of playback
    will be returned to the default rate of playback.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> [ = <var title="">value</var> ]</dt> 
 
   <dd> 
 
    <p>Returns the current rate playback, where 1.0 is normal speed.</p> 
 
    <p>Can be set, to change the rate of playback.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-played"><a href="#dom-media-played">played</a></code></dt> 
 
   <dd> 
 
    <p>Returns a <code><a href="#timeranges">TimeRanges</a></code> object that represents the
    ranges of the <a href="#media-resource">media resource</a> that the user agent has
    played.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-play"><a href="#dom-media-play">play</a></code>()</dt> 
 
   <dd> 
 
    <p>Sets the <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute
    to false, loading the <a href="#media-resource">media resource</a> and beginning
    playback if necessary. If the playback had ended, will restart it
    from the start.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-pause"><a href="#dom-media-pause">pause</a></code>()</dt> 
 
   <dd> 
 
    <p>Sets the <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute
    to true, loading the <a href="#media-resource">media resource</a> if necessary.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-media-paused" title="dom-media-paused"><code>paused</code></dfn> 
  attribute represents whether the <a href="#media-element">media element</a> is
  paused or not. The attribute must initially be true.</p> 
 
  <p>A <a href="#media-element">media element</a> is said to be <dfn id="potentially-playing">potentially
  playing</dfn> when its <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> 
  attribute is false, the <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute is either
  <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> or
  <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code>,
  the element has not <a href="#ended-playback">ended playback</a>, playback has not
  <a href="#stopped-due-to-errors">stopped due to errors</a>, and the element has not
  <a href="#paused-for-user-interaction">paused for user interaction</a>.</p> 
 
  <p>A <a href="#media-element">media element</a> is said to have <dfn id="ended-playback">ended
  playback</dfn> when the element's <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute is <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> or greater, and
  either the <a href="#current-playback-position">current playback position</a> is the end of the
  <a href="#media-resource">media resource</a> and the <a href="#direction-of-playback">direction of
  playback</a> is forwards and the <a href="#media-element">media element</a> does
  not have a <code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code> attribute
  specified, or the <a href="#current-playback-position">current playback position</a> is the
  <a href="#earliest-possible-position">earliest possible position</a> and the <a href="#direction-of-playback">direction of
  playback</a> is backwards.</p> 
 
  <p>The <dfn id="dom-media-ended" title="dom-media-ended"><code>ended</code></dfn> 
  attribute must return true if the <a href="#media-element">media element</a> has
  <a href="#ended-playback">ended playback</a> and the <a href="#direction-of-playback">direction of
  playback</a> is forwards, and false otherwise.</p> 
 
  <p>A <a href="#media-element">media element</a> is said to have <dfn id="stopped-due-to-errors">stopped due to
  errors</dfn> when the element's <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute is <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> or greater, and
  the user agent <a href="#non-fatal-media-error">encounters a
  non-fatal error</a> during the processing of the <a href="#media-data">media
  data</a>, and due to that error, is not able to play the content
  at the <a href="#current-playback-position">current playback position</a>.</p> 
 
  <p>A <a href="#media-element">media element</a> is said to have <dfn id="paused-for-user-interaction">paused for user
  interaction</dfn> when its <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute is false, the <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute is either
  <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> or
  <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code> and
  the user agent has reached a point in the <a href="#media-resource">media
  resource</a> where the user has to make a selection for the
  resource to continue.</p> 
 
  <p>It is possible for a <a href="#media-element">media element</a> to have both
  <a href="#ended-playback">ended playback</a> and <a href="#paused-for-user-interaction">paused for user
  interaction</a> at the same time.</p> 
 
  <p>When a <a href="#media-element">media element</a> that is <a href="#potentially-playing">potentially
  playing</a> stops playing because it has <a href="#paused-for-user-interaction">paused for user
  interaction</a>, the user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to
  <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the element.</p> 
 
  <p id="fire-waiting-when-waiting">When a <a href="#media-element">media element</a> 
  that is <a href="#potentially-playing">potentially playing</a> stops playing because its
  <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute
  changes to a value lower than <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code>, without
  the element having <a href="#ended-playback">ended playback</a>, or playback having
  <a href="#stopped-due-to-errors">stopped due to errors</a>, or playback having <a href="#paused-for-user-interaction">paused
  for user interaction</a>, or the <a href="#dom-media-seek" title="dom-media-seek">seeking algorithm</a> being invoked, the
  user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
  event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> 
  at the element, and <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
  event</a> named <code title="event-media-waiting"><a href="#event-media-waiting">waiting</a></code> at
  the element.</p> 
 
  <p>When the <a href="#current-playback-position">current playback position</a> reaches the end
  of the <a href="#media-resource">media resource</a> when the <a href="#direction-of-playback">direction of
  playback</a> is forwards, then the user agent must follow these
  steps:</p> 
 
  <ol><li><p>If the <a href="#media-element">media element</a> has a <code title="attr-media-loop"><a href="#attr-media-loop">loop</a></code> attribute specified, then <a href="#dom-media-seek" title="dom-media-seek">seek</a> to the <a href="#earliest-possible-position">earliest possible
   position</a> of the <a href="#media-resource">media resource</a> and abort these
   steps.</li> <!-- v2/v3: We should fire a 'looping' event here
   to explain why this immediately fires a 'playing' event, otherwise
   the 'playing' event that fires from the readyState going from
   HAVE_CURRENT_DATA back to HAVE_FUTURE_DATA will seem inexplicable
   (since the normally matching 'ended' given below event doesn't fire
   in the loop case). --> 
 
   <li><p>Stop playback.<p class="note">The <code title="dom-media-ended"><a href="#dom-media-ended">ended</a></code> attribute becomes
   true.</li> 
 
   <li><p>The user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire
   a simple event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the element.</li> 
 
   <li><p>The user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire
   a simple event</a> named <code title="event-media-ended"><a href="#event-media-ended">ended</a></code> 
   at the element.</li> 
 
  </ol><p>When the <a href="#current-playback-position">current playback position</a> reaches the
  <a href="#earliest-possible-position">earliest possible position</a> of the <a href="#media-resource">media
  resource</a> when the <a href="#direction-of-playback">direction of playback</a> is
  backwards, then the user agent must follow these steps:</p> 
 
  <ol><li><p>Stop playback.</li> 
 
   <li><p>The user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire
   a simple event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the element.</li> 
 
  </ol><p>The <dfn id="dom-media-defaultplaybackrate" title="dom-media-defaultPlaybackRate"><code>defaultPlaybackRate</code></dfn> 
  attribute gives the desired speed at which the <a href="#media-resource">media
  resource</a> is to play, as a multiple of its intrinsic
  speed. The attribute is mutable: on getting it must return the last
  value it was set to, or 1.0 if it hasn't yet been set; on setting
  the attribute must be set to the new value.</p> 
 
  <p>The <dfn id="dom-media-playbackrate" title="dom-media-playbackRate"><code>playbackRate</code></dfn> 
  attribute gives the speed at which the <a href="#media-resource">media resource</a> 
  plays, as a multiple of its intrinsic speed. If it is not equal to
  the <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code>,
  then the implication is that the user is using a feature such as
  fast forward or slow motion playback. The attribute is mutable: on
  getting it must return the last value it was set to, or 1.0 if it
  hasn't yet been set; on setting the attribute must be set to the new
  value, and the playback must change speed (if the element is
  <a href="#potentially-playing">potentially playing</a>).</p> 
 
  <p>If the <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> 
  is positive or zero, then the <dfn id="direction-of-playback">direction of playback</dfn> is
  forwards. Otherwise, it is backwards.</p> 
 
  <p>The "play" function in a user agent's interface must set the
  <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> attribute
  to the value of the <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code> 
  attribute before invoking the <code title="dom-media-play"><a href="#dom-media-play">play()</a></code> method's steps. Features such
  as fast-forward or rewind must be implemented by only changing the
  <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> 
  attribute.</p> 
 
  <p id="rateUpdate">When the <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code> or
  <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> attributes
  change value (either by being set by script or by being changed
  directly by the user agent, e.g. in response to user control) the
  user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
  event</a> named <code title="event-media-ratechange"><a href="#event-media-ratechange">ratechange</a></code> 
  at the <a href="#media-element">media element</a>.</p> 
 
  <p>The <dfn id="dom-media-played" title="dom-media-played"><code>played</code></dfn> 
  attribute must return a new static <a href="#normalized-timeranges-object">normalized
  <code>TimeRanges</code> object</a> that represents the ranges of
  the <a href="#media-resource">media resource</a>, if any, that the user agent has so
  far rendered, at the time the attribute is evaluated.</p> 
 
  <hr><p>When the <dfn id="dom-media-play" title="dom-media-play"><code>play()</code></dfn> 
  method on a <a href="#media-element">media element</a> is invoked, the user agent
  must run the following steps.</p> 
 
  <ol><li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute has
   the value <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code>, invoke the
   <a href="#media-element">media element</a>'s <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a>.</li> 
 
   <li> 
 
    <p>If the <a href="#ended-playback" title="ended playback">playback has ended</a> 
    and the <a href="#direction-of-playback">direction of playback</a> is forwards, <a href="#dom-media-seek" title="dom-media-seek">seek</a> to the <a href="#earliest-possible-position">earliest possible
    position</a> of the <a href="#media-resource">media resource</a>.</p> 
 
    <p class="note">This <a href="#seekUpdate">will cause</a> the user
    agent to <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
    event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the <a href="#media-element">media
    element</a>.</p> <!-- if we're already playing at this point,
    it might also fire 'waiting' --> 
 
   </li> 
 
   <li> 
 
    <p>If the <a href="#media-element">media element</a>'s <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute is true, run
    the following substeps:</p> 
 
    <ol><li><p>Change the value of <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> to false.</li> 
 
     <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> 
     named <code title="event-media-play"><a href="#event-media-play">play</a></code> at the element.</li> 
 
     <li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute has the
     value <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>,
     <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code>, or
     <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code>,
     <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> 
     named <code title="event-media-waiting"><a href="#event-media-waiting">waiting</a></code> at the
     element.</li> 
 
     <li><p>Otherwise, the <a href="#media-element">media element</a>'s <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> attribute has the
     value <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> or
     <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code>;
     <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> 
     named <code title="event-media-playing"><a href="#event-media-playing">playing</a></code> at the
     element.</li> 
 
    </ol></li> 
 
   <li><p>Set the <a href="#media-element">media element</a>'s <a href="#autoplaying-flag">autoplaying
   flag</a> to false.</li> 
 
  </ol><hr><p>When the <dfn id="dom-media-pause" title="dom-media-pause"><code>pause()</code></dfn> 
  method is invoked, the user agent must run the following steps:</p> 
 
  <ol><li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute has
   the value <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code>, invoke the
   <a href="#media-element">media element</a>'s <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection
   algorithm</a>.</li> 
 
   <li><p>Set the <a href="#media-element">media element</a>'s <a href="#autoplaying-flag">autoplaying
   flag</a> to false.</li> 
 
   <li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> attribute is false, run the
   following steps:</p> 
 
    <ol><li><p>Change the value of <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> to true.</li> 
 
     <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
     event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the
     element.</li> 
 
     <li><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
     event</a> named <code title="event-media-pause"><a href="#event-media-pause">pause</a></code> 
     at the element.</li> 
 
    </ol></li> 
 
  </ol><hr><p id="media-playback">When a <a href="#media-element">media element</a> is
  <a href="#potentially-playing">potentially playing</a> and its <code><a href="infrastructure.html#document">Document</a></code> is a
  <a href="browsers.html#fully-active">fully active</a> <code><a href="infrastructure.html#document">Document</a></code>, its <a href="#current-playback-position">current
  playback position</a> must increase monotonically at <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> units of media
  time per unit time of wall clock time.</p> 
 
  <p class="note">This specification doesn't define how the user agent
  achieves the appropriate playback rate &mdash; depending on the
  protocol and media available, it is plausible that the user agent
  could negotiate with the server to have the server provide the media
  data at the appropriate rate, so that (except for the period between
  when the rate is changed and when the server updates the stream's
  playback rate) the client doesn't actually have to drop or
  interpolate any frames.</p> 
 
  <p>When the <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> 
  is negative (playback is backwards), any corresponding audio must be
  muted. When the <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> is so low or so
  high that the user agent cannot play audio usefully, the
  corresponding audio must also be muted. If the <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> is not 1.0, the
  user agent may apply pitch adjustments to the audio as necessary to
  render it faithfully.</p> 
 
  <p>The <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> can
  be 0.0, in which case the <a href="#current-playback-position">current playback position</a> 
  doesn't move, despite playback not being paused (<code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> doesn't become true, and the
  <code title="event-media-pause"><a href="#event-media-pause">pause</a></code> event doesn't fire).</p> 
 
  <p><a href="#media-element" title="media element">Media elements</a> that are
  <a href="#potentially-playing">potentially playing</a> while not <a href="infrastructure.html#in-a-document">in a
  <code>Document</code></a> must not play any video, but should
  play any audio component. Media elements must not stop playing just
  because all references to them have been removed; only once a media
  element to which no references exist has reached a point where no
  further audio remains to be played for that element (e.g. because
  the element is paused, or because the end of the clip has been
  reached, or because its <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> is 0.0) may the
  element be garbage collected.</p> 
 
  <hr><p>When the <a href="#current-playback-position">current playback position</a> of a <a href="#media-element">media
  element</a> changes (e.g. due to playback or seeking), the user
  agent must run the following steps. If the <a href="#current-playback-position">current playback
  position</a> changes while the steps are running, then the user
  agent must wait for the steps to complete, and then must immediately
  rerun the steps. (These steps are thus run as often as possible or
  needed &mdash; if one iteration takes a long time, this can cause
  certain ranges to be skipped over as the user agent rushes ahead to
  "catch up".)</p> 
 
  <ol><!--v2CUERANGE
   <li><p>Let <var title="">current ranges</var> be an ordered list of
   <span title="cue range">cue ranges</span>, initialized to contain
   all the <span title="cue range">cue ranges</span> of the
   <span>media element</span> whose start times are less than or equal
   to the <span>current playback position</span> and whose end times
   are greater than the <span>current playback position</span>, in the
   order they were added to the element.</p></li>
 
   <li><p>Let <var title="">other ranges</var> be an ordered list of
   <span title="cue range">cue ranges</span>, initialized to contain
   all the <span title="cue range">cue ranges</span> of the
   <span>media element</span> that are not present in <var
   title="">current ranges</var>, in the order they were added to the
   element.</p></li>
--><li><p>If the time was reached through the usual monotonic increase
   of the current playback position during normal playback, and if the
   user agent has not fired a <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> event at the
   element in the past 15 to 250ms and is not still running event
   handlers for such an event, then the user agent must <a href="webappapis.html#queue-a-task">queue a
   task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the
   element. (In the other cases, such as explicit seeks, relevant
   events get fired as part of the overall process of changing the
   current playback position.)</p> 
 
   <p class="note">The event thus is not to be fired faster than about
   66Hz or slower than 4Hz (assuming the event handlers don't take
   longer than 250ms to run). User agents are encouraged to vary the
   frequency of the event based on the system load and the average
   cost of processing the event each time, so that the UI updates are
   not any more frequent than the user agent can comfortably handle
   while decoding the video.</li> 
 
<!--v2CUERANGE [beware - - nested comments]
   <li><p>If none of the <span title="cue range">cue ranges</span> in
   <var title="">current ranges</var> have their "active" boolean set
   to "false" (inactive) and none of the <span title="cue range">cue
   ranges</span> in <var title="">other ranges</var> have their
   "active" boolean set to "true" (active), then abort these
   steps.</p></li>
 
   <li><p>If the time was reached through the usual monotonic increase
   of the current playback position during normal playback, and there
   are <span title="cue range">cue ranges</span> in <var
   title="">other ranges</var> that have both their "active" boolean
   and their "pause" boolean set to "true", then immediately act as if
   the element's <code title="dom-media-pause">pause()</code> method
   had been invoked. <!- - pause() can in theory call load(), but never
   can it do so as part of this invokation, since we wouldn't be in
   this algorithm if the media element was empty. So, no need to couch
   all this in a task. - -> (In the other cases, such as explicit
   seeks, playback is not paused by exiting a cue range, even if that
   cue range has its "pause" boolean set to "true".)</p></li>
 
   <li><p>For each non-null "exit" callback of the <span
   title="cue range">cue ranges</span> in <var title="">other
   ranges</var> that have their "active" boolean set to "true"
   (active), in list order, <span>queue a task</span> that invokes the
   callback, passing the cue range's identifier as the callback's only
   argument.</p></li>
 
   <li><p>For each non-null "enter" callback of the <span title="cue
   range">cue ranges</span> in <var title="">current ranges</var> that
   have their "active" boolean set to "false" (inactive), in list
   order, <span>queue a task</span> that invokes the callback, passing
   the cue range's identifier as the callback's only
   argument.</p></li>
 
   <li><p>Set the "active" boolean of all the <span title="cue
   range">cue ranges</span> in the <var title="">current ranges</var>
   list to "true" (active), and the "active" boolean of all the <span
   title="cue range">cue ranges</span> in the <var title="">other
   ranges</var> list to "false" (inactive).</p></li>
--> 
  </ol><p>When a <a href="#media-element">media element</a> is <a href="infrastructure.html#remove-an-element-from-a-document" title="remove an
  element from a document">removed from a
  <code>Document</code></a>, if the <a href="#media-element">media element</a>'s
  <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> attribute
  has a value other than <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code> then the user
  agent must act as if the <code title="dom-media-pause"><a href="#dom-media-pause">pause()</a></code> method had been invoked.</p> 
 
  <p class="note">If the <a href="#media-element">media element</a>'s
  <code><a href="infrastructure.html#document">Document</a></code> stops being a <a href="browsers.html#fully-active">fully active</a> 
  document, then the playback will <a href="#media-playback">stop</a> 
  until the document is active again.</p> 
 
  </div> 
 
 
 
  <h5 id="seeking"><span class="secno">4.8.9.9 </span>Seeking</h5> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code></dt> 
 
   <dd> 
 
    <p>Returns true if the user agent is currently seeking.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-seekable"><a href="#dom-media-seekable">seekable</a></code></dt> 
 
   <dd> 
 
    <p>Returns a <code><a href="#timeranges">TimeRanges</a></code> object that represents the
    ranges of the <a href="#media-resource">media resource</a> to which it is possible
    for the user agent to seek.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-media-seeking" title="dom-media-seeking"><code>seeking</code></dfn> 
  attribute must initially have the value false.</p> 
 
  <p>When the user agent is required to <dfn id="dom-media-seek" title="dom-media-seek">seek</dfn> to a particular <var title="">new
  playback position</var> in the <a href="#media-resource">media resource</a>, it means
  that the user agent must run the following steps. This algorithm
  interacts closely with the <a href="webappapis.html#event-loop">event loop</a> mechanism; in
  particular, it has a <a href="webappapis.html#synchronous-section">synchronous
  section</a> (which is triggered as part of the <a href="webappapis.html#event-loop">event
  loop</a> algorithm). Steps in that section are marked with
  &#8987;.</p> 
 
  <ol><li><p>If the <a href="#media-element">media element</a>'s <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> is <code title="dom-media-HAVE_NOTHING"><a href="#dom-media-have_nothing">HAVE_NOTHING</a></code>, then raise an
   <code><a href="urls.html#invalid_state_err">INVALID_STATE_ERR</a></code> exception (if the seek was in
   response to a DOM method call or setting of an IDL attribute), and
   abort these steps.</li> 
 
   <li><p>If the element's <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> IDL attribute is true,
   then another instance of this algorithm is already running. Abort
   that other instance of the algorithm without waiting for the step
   that it is running to complete.</li> 
 
   <li><p>Set the <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> IDL
   attribute to true.</li> 
 
   <li id="seekUpdate"><p><a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a
   simple event</a> named <code title="event-media-timeupdate"><a href="#event-media-timeupdate">timeupdate</a></code> at the
   element.</li> 
 
   <li><p>If the seek was in response to a DOM method call or setting
   of an IDL attribute, then continue the script. The remainder of
   these steps must be run asynchronously. With the exception of the
   steps marked with &#8987;, they could be aborted at any time by
   another instance of this algorithm being invoked.</li> 
 
   <li><p>If the <var title="">new playback position</var> is later
   than the end of the <a href="#media-resource">media resource</a>, then let it be the
   end of the <a href="#media-resource">media resource</a> instead.</li> 
 
   <li><p>If the <var title="">new playback position</var> is less
   than the <a href="#earliest-possible-position">earliest possible position</a>, let it be that
   position instead.</li> 
 
   <li><p>If the (possibly now changed) <var title="">new playback
   position</var> is not in one of the ranges given in the <code title="dom-media-seekable"><a href="#dom-media-seekable">seekable</a></code> attribute, then let it
   be the position in one of the ranges given in the <code title="dom-media-seekable"><a href="#dom-media-seekable">seekable</a></code> attribute that is the
   nearest to the <var title="">new playback position</var>. If two
   positions both satisfy that constraint (i.e. the <var title="">new
   playback position</var> is exactly in the middle between two ranges
   in the <code title="dom-media-seekable"><a href="#dom-media-seekable">seekable</a></code> attribute)
   then use the position that is closest to the <a href="#current-playback-position">current playback
   position</a>. If there are no ranges given in the <code title="dom-media-seekable"><a href="#dom-media-seekable">seekable</a></code> attribute then set the
   <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> IDL attribute to
   false and abort these steps.</li> 
 
   <li><p>Set the <a href="#current-playback-position">current playback position</a> to the given
   <var title="">new playback position</var>.</li> 
 
   <li><p>If the <a href="#media-element">media element</a> was <a href="#potentially-playing">potentially
   playing</a> immediately before it started seeking, but seeking
   caused its <code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> 
   attribute to change to a value lower than <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code>, then
   <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named
   <code title="event-media-waiting"><a href="#event-media-waiting">waiting</a></code> at the
   element.</li> 
 
   <li><p>If, when it reaches this step, the user agent has still not
   established whether or not the <a href="#media-data">media data</a> for the <var title="">new playback position</var> is available, and, if it is,
   decoded enough data to play back that position, then <a href="webappapis.html#queue-a-task">queue a
   task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple event</a> named <code title="event-media-seeking"><a href="#event-media-seeking">seeking</a></code> at the element.</li> 
 
   <li><p>Wait until it has established whether or not the <a href="#media-data">media
   data</a> for the <var title="">new playback position</var> is
   available, and, if it is, until it has decoded enough data to play
   back that position.</li> 
 
   <li><p><a href="webappapis.html#await-a-stable-state">Await a stable state</a>. The <a href="webappapis.html#synchronous-section">synchronous
   section</a> consists of all the remaining steps of this
   algorithm. (Steps in the <a href="webappapis.html#synchronous-section">synchronous section</a> are
   marked with &#8987;.)</li> 
 
   <li><p>&#8987; Set the <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> IDL attribute to
   false.</li> 
 
   <li><p>&#8987; <a href="webappapis.html#queue-a-task">Queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
   event</a> named <code title="event-media-seeked"><a href="#event-media-seeked">seeked</a></code> 
   at the element.</li> 
 
  </ol><p>The <dfn id="dom-media-seekable" title="dom-media-seekable"><code>seekable</code></dfn> 
  attribute must return a new static <a href="#normalized-timeranges-object">normalized
  <code>TimeRanges</code> object</a> that represents the ranges of
  the <a href="#media-resource">media resource</a>, if any, that the user agent is able
  to seek to, at the time the attribute is evaluated.</p> 
 
  <p class="note">If the user agent can seek to anywhere in the
  <a href="#media-resource">media resource</a>, e.g. because it a simple movie file and
  the user agent and the server support HTTP Range requests, then the
  attribute would return an object with one range, whose start is the
  time of the first frame (typically zero), and whose end is the same
  as the time of the first frame plus the <code title="dom-media-duration"><a href="#dom-media-duration">duration</a></code> attribute's value (which
  would equal the time of the last frame).</p> 
 
  <p class="note">The range might be continuously changing, e.g. if
  the user agent is buffering a sliding window on an infinite
  stream. This is the behavior seen with DVRs viewing live TV, for
  instance.</p> 
 
  <p><a href="#media-resource" title="media resource">Media resources</a> might be
  internally scripted or interactive. Thus, a <a href="#media-element">media
  element</a> could play in a non-linear fashion. If this happens,
  the user agent must act as if the algorithm for <a href="#dom-media-seek" title="dom-media-seek">seeking</a> was used whenever the
  <a href="#current-playback-position">current playback position</a> changes in a discontinuous
  fashion (so that the relevant events fire).</p> 
 
  </div> 
 
 
  <h5 id="user-interface"><span class="secno">4.8.9.10 </span>User interface</h5> 
 
  <p>The <dfn id="attr-media-controls" title="attr-media-controls"><code>controls</code></dfn> 
  attribute is a <a href="common-microsyntaxes.html#boolean-attribute">boolean attribute</a>. If present, it
  indicates that the author has not provided a scripted controller and
  would like the user agent to provide its own set of controls.</p> 
 
  <div class="impl"> 
 
  <p>If the attribute is present, or if <a href="webappapis.html#concept-n-noscript" title="concept-n-noscript">scripting is disabled</a> for the
  <a href="#media-element">media element</a>, then the user agent should <dfn id="expose-a-user-interface-to-the-user">expose a
  user interface to the user</dfn>. This user interface should include
  features to begin playback, pause playback, seek to an arbitrary
  position in the content (if the content supports arbitrary seeking),
  change the volume, change the display of closed captions or embedded
  sign-language tracks, select different audio tracks or turn on audio
  descriptions, and show the media content in manners more suitable to
  the user (e.g. full-screen video or in an independent resizable
  window). Other controls may also be made available.</p> 
 
  <p>Even when the attribute is absent, however, user agents may
  provide controls to affect playback of the media resource
  (e.g. play, pause, seeking, and volume controls), but such features
  should not interfere with the page's normal rendering. For example,
  such features could be exposed in the <a href="#media-element">media element</a>'s
  context menu.</p> 
 
  <p>Where possible (specifically, for starting, stopping, pausing,
  and unpausing playback, for muting or changing the volume of the
  audio, and for seeking), user interface features exposed by the user
  agent must be implemented in terms of the DOM API described above,
  so that, e.g., all the same events fire.</p> 
 
  <p>The <dfn id="dom-media-controls" title="dom-media-controls"><code>controls</code></dfn> 
  IDL attribute must <a href="urls.html#reflect">reflect</a> the content attribute of the
  same name.</p> 
 
  <hr></div> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-media-volume"><a href="#dom-media-volume">volume</a></code> [ = <var title="">value</var> ]</dt> 
 
   <dd> 
 
    <p>Returns the current playback volume, as a number in the range
    0.0 to 1.0, where 0.0 is the quietest and 1.0 the loudest.</p> 
 
    <p>Can be set, to change the volume.</p> 
 
    <p>Throws an <code><a href="urls.html#index_size_err">INDEX_SIZE_ERR</a></code> if the new value is not
    in the range 0.0 .. 1.0.</p> 
 
   </dd> 
 
   <dt><var title="">media</var> . <code title="dom-media-muted"><a href="#dom-media-muted">muted</a></code> [ = <var title="">value</var> ]</dt> 
 
   <dd> 
 
    <p>Returns true if audio is muted, overriding the <code title="dom-media-volume"><a href="#dom-media-volume">volume</a></code> attribute, and false if the
    <code title="dom-media-volume"><a href="#dom-media-volume">volume</a></code> attribute is being
    honored.</p> 
 
    <p>Can be set, to change whether the audio is muted or not.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-media-volume" title="dom-media-volume"><code>volume</code></dfn> 
  attribute must return the playback volume of any audio portions of
  the <a href="#media-element">media element</a>, in the range 0.0 (silent) to 1.0
  (loudest). Initially, the volume must be 1.0, but user agents may
  remember the last set value across sessions, on a per-site basis or
  otherwise, so the volume may start at other values. On setting, if
  the new value is in the range 0.0 to 1.0 inclusive, the attribute
  must be set to the new value and the playback volume must be
  correspondingly adjusted as soon as possible after setting the
  attribute, with 0.0 being silent, and 1.0 being the loudest setting,
  values in between increasing in loudness. The range need not be
  linear. The loudest setting may be lower than the system's loudest
  possible setting; for example the user could have set a maximum
  volume. If the new value is outside the range 0.0 to 1.0 inclusive,
  then, on setting, an <code><a href="urls.html#index_size_err">INDEX_SIZE_ERR</a></code> exception must be
  raised instead.</p> 
 
  <p>The <dfn id="dom-media-muted" title="dom-media-muted"><code>muted</code></dfn> 
  attribute must return true if the audio channels are muted and false
  otherwise. Initially, the audio channels should not be muted
  (false), but user agents may remember the last set value across
  sessions, on a per-site basis or otherwise, so the muted state may
  start as muted (true). On setting, the attribute must be set to the
  new value; if the new value is true, audio playback for this
  <a href="#media-resource">media resource</a> must then be muted, and if false, audio
  playback must then be enabled.</p> 
 
  <p>Whenever either the <code title="dom-media-muted"><a href="#dom-media-muted">muted</a></code> or
  <code title="dom-media-volume"><a href="#dom-media-volume">volume</a></code> attributes are changed,
  the user agent must <a href="webappapis.html#queue-a-task">queue a task</a> to <a href="webappapis.html#fire-a-simple-event">fire a simple
  event</a> named <code title="event-media-volumechange"><a href="#event-media-volumechange">volumechange</a></code> at the <a href="#media-element">media
  element</a>.</p> 
 
  </div> 
 
 
 
 
  <h5 id="time-ranges"><span class="secno">4.8.9.11 </span>Time ranges</h5> 
 
  <p>Objects implementing the <code><a href="#timeranges">TimeRanges</a></code> interface
  represent a list of ranges (periods) of time.</p> 
 
  <pre class="idl">interface <dfn id="timeranges">TimeRanges</dfn> {
  readonly attribute unsigned long <a href="#dom-timeranges-length" title="dom-TimeRanges-length">length</a>;
  float <a href="#dom-timeranges-start" title="dom-TimeRanges-start">start</a>(in unsigned long index);
  float <a href="#dom-timeranges-end" title="dom-TimeRanges-end">end</a>(in unsigned long index);
};</pre> 
 
  <dl class="domintro"><dt><var title="">media</var> . <code title="dom-TimeRanges-length"><a href="#dom-timeranges-length">length</a></code></dt> 
 
   <dd> 
 
    <p>Returns the number of ranges in the object.</p> 
 
   </dd> 
 
   <dt><var title="">time</var> = <var title="">media</var> . <code title="dom-TimeRanges-start"><a href="#dom-timeranges-start">start</a></code>(<var title="">index</var>)</dt> 
 
   <dd> 
 
    <p>Returns the time for the start of the range with the given index.</p> 
 
    <p>Throws an <code><a href="urls.html#index_size_err">INDEX_SIZE_ERR</a></code> if the index is out of range.</p> 
 
   </dd> 
 
   <dt><var title="">time</var> = <var title="">media</var> . <code title="dom-TimeRanges-end"><a href="#dom-timeranges-end">end</a></code>(<var title="">index</var>)</dt> 
 
   <dd> 
 
    <p>Returns the time for the end of the range with the given index.</p> 
 
    <p>Throws an <code><a href="urls.html#index_size_err">INDEX_SIZE_ERR</a></code> if the index is out of range.</p> 
 
   </dd> 
 
  </dl><div class="impl"> 
 
  <p>The <dfn id="dom-timeranges-length" title="dom-TimeRanges-length"><code>length</code></dfn> 
  IDL attribute must return the number of ranges represented by the object.</p> 
 
  <p>The <dfn id="dom-timeranges-start" title="dom-TimeRanges-start"><code>start(<var title="">index</var>)</code></dfn> method must return the position
  of the start of the <var title="">index</var>th range represented by
  the object, in seconds measured from the start of the timeline that
  the object covers.</p> 
 
  <p>The <dfn id="dom-timeranges-end" title="dom-TimeRanges-end"><code>end(<var title="">index</var>)</code></dfn> method must return the position
  of the end of the <var title="">index</var>th range represented by
  the object, in seconds measured from the start of the timeline that
  the object covers.</p> 
 
  <p>These methods must raise <code><a href="urls.html#index_size_err">INDEX_SIZE_ERR</a></code> exceptions
  if called with an <var title="">index</var> argument greater than or
  equal to the number of ranges represented by the object.</p> 
 
  <p>When a <code><a href="#timeranges">TimeRanges</a></code> object is said to be a
  <dfn id="normalized-timeranges-object">normalized <code>TimeRanges</code> object</dfn>, the ranges it
  represents must obey the following criteria:</p> 
 
  <ul><li>The start of a range must be greater than the end of all
   earlier ranges.</li> 
 
   <li>The start of a range must be less than the end of that same
   range.</li> 
 
  </ul><p>In other words, the ranges in such an object are ordered, don't
  overlap, aren't empty, and don't touch (adjacent ranges are folded
  into one bigger range).</p> 
 
  <p>The timelines used by the objects returned by the <code title="dom-media-buffered"><a href="#dom-media-buffered">buffered</a></code>, <code title="dom-media-seekable"><a href="#dom-media-seekable">seekable</a></code> and <code title="dom-media-played"><a href="#dom-media-played">played</a></code> IDL attributes of <a href="#media-element" title="media element">media elements</a> must be the same as that
  element's <a href="#media-resource">media resource</a>'s timeline.</p> 
 
  </div> 
 
 
  <h5 id="mediaevents"><span class="secno">4.8.9.12 </span>Event summary</h5> 
 
  <p><i>This section is non-normative.</i></p> 
 
  <p>The following events fire on <a href="#media-element" title="media element">media
  elements</a> as part of the processing model described above:</p> 
 
  <table><thead><tr><th>Event name
     <th>Interface
     <th>Dispatched when...
     <th>Preconditions
 
   <tbody><tr><td><dfn id="event-media-loadstart" title="event-media-loadstart"><code>loadstart</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent begins looking for <a href="#media-data">media data</a>, as part of the <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection algorithm</a>.
     <td><code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> equals <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code> 
    <tr><td><dfn id="event-media-progress" title="event-media-progress"><code>progress</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent is fetching <a href="#media-data">media data</a>.
     <td><code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> equals <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code> 
    <tr><td><dfn id="event-media-suspend" title="event-media-suspend"><code>suspend</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent is intentionally not currently fetching <a href="#media-data">media data</a>, but does not have the entire <a href="#media-resource">media resource</a> downloaded.
     <td><code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> equals <code title="dom-media-NETWORK_IDLE"><a href="#dom-media-network_idle">NETWORK_IDLE</a></code> 
    <tr><td><dfn id="event-media-abort" title="event-media-abort"><code>abort</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent stops fetching the <a href="#media-data">media data</a> before it is completely downloaded, but not due to an error.
     <td><code title="dom-media-error"><a href="#dom-media-error">error</a></code> is an object with the code <code title="dom-MediaError-MEDIA_ERR_ABORTED"><a href="#dom-mediaerror-media_err_aborted">MEDIA_ERR_ABORTED</a></code>.
         <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> equals either <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code> or <code title="dom-media-NETWORK_IDLE"><a href="#dom-media-network_idle">NETWORK_IDLE</a></code>, depending on when the download was aborted.
    <tr><td><dfn id="event-media-error" title="event-media-error"><code>error</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>An error occurs while fetching the <a href="#media-data">media data</a>.
     <td><code title="dom-media-error"><a href="#dom-media-error">error</a></code> is an object with the code <code title="dom-MediaError-MEDIA_ERR_NETWORK"><a href="#dom-mediaerror-media_err_network">MEDIA_ERR_NETWORK</a></code> or higher.
         <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> equals either <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code> or <code title="dom-media-NETWORK_IDLE"><a href="#dom-media-network_idle">NETWORK_IDLE</a></code>, depending on when the download was aborted.
    <tr><td><dfn id="event-media-emptied" title="event-media-emptied"><code>emptied</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>A <a href="#media-element">media element</a> whose <code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> was previously not in the <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code> state has just switched to that state (either because of a fatal error during load that's about to be reported, or because the <code title="dom-media-load"><a href="#dom-media-load">load()</a></code> method was invoked while the <a href="#concept-media-load-algorithm" title="concept-media-load-algorithm">resource selection algorithm</a> was already running).
     <td><code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> is <code title="dom-media-NETWORK_EMPTY"><a href="#dom-media-network_empty">NETWORK_EMPTY</a></code>; all the IDL attributes are in their initial states.
    <tr><td><dfn id="event-media-stalled" title="event-media-stalled"><code>stalled</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent is trying to fetch <a href="#media-data">media data</a>, but data is unexpectedly not forthcoming.
     <td><code title="dom-media-networkState"><a href="#dom-media-networkstate">networkState</a></code> is <code title="dom-media-NETWORK_LOADING"><a href="#dom-media-network_loading">NETWORK_LOADING</a></code>.
 
   <tbody><tr><td><dfn id="event-media-play" title="event-media-play"><code>play</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Playback has begun. Fired after the <code title="dom-media-play"><a href="#dom-media-play">play()</a></code> method has returned.
     <td><code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> is newly false.
    <tr><td><dfn id="event-media-pause" title="event-media-pause"><code>pause</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Playback has been paused. Fired after the <code title="dom-media-pause"><a href="#dom-media-pause">pause</a></code> method has returned.
     <td><code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> is newly true.
 
   <tbody><tr><td><dfn id="event-media-loadedmetadata" title="event-media-loadedmetadata"><code>loadedmetadata</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent has just determined the duration and dimensions of the <a href="#media-resource">media resource</a>.
     <td><code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> is newly equal to <code title="dom-media-HAVE_METADATA"><a href="#dom-media-have_metadata">HAVE_METADATA</a></code> or greater for the first time.
    <tr><td><dfn id="event-media-loadeddata" title="event-media-loadeddata"><code>loadeddata</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent can render the <a href="#media-data">media data</a> at the <a href="#current-playback-position">current playback position</a> for the first time.
     <td><code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> newly increased to <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code> or greater for the first time.
    <tr><td><dfn id="event-media-waiting" title="event-media-waiting"><code>waiting</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Playback has stopped because the next frame is not available, but the user agent expects that frame to become available in due course.
     <td><code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> is newly equal to or less than <code title="dom-media-HAVE_CURRENT_DATA"><a href="#dom-media-have_current_data">HAVE_CURRENT_DATA</a></code>, and <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> is false. Either <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> is true, or the <a href="#current-playback-position">current playback position</a> is not contained in any of the ranges in <code title="dom-media-buffered"><a href="#dom-media-buffered">buffered</a></code>. It is possible for playback to stop for two other reasons without <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> being false, but those two reasons do not fire this event: maybe <a href="#ended-playback" title="ended playback">playback ended</a>, or playback <a href="#stopped-due-to-errors">stopped due to errors</a>.
    <tr><td><dfn id="event-media-playing" title="event-media-playing"><code>playing</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Playback has started.
     <td><code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> is newly equal to or greater than <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code>, <code title="dom-media-paused"><a href="#dom-media-paused">paused</a></code> is false, <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> is false, or the <a href="#current-playback-position">current playback position</a> is contained in one of the ranges in <code title="dom-media-buffered"><a href="#dom-media-buffered">buffered</a></code>.
    <tr><td><dfn id="event-media-canplay" title="event-media-canplay"><code>canplay</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent can resume playback of the <a href="#media-data">media data</a>, but estimates that if playback were to be started now, the <a href="#media-resource">media resource</a> could not be rendered at the current playback rate up to its end without having to stop for further buffering of content.
     <td><code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> newly increased to <code title="dom-media-HAVE_FUTURE_DATA"><a href="#dom-media-have_future_data">HAVE_FUTURE_DATA</a></code> or greater.
    <tr><td><dfn id="event-media-canplaythrough" title="event-media-canplaythrough"><code>canplaythrough</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The user agent estimates that if playback were to be started now, the <a href="#media-resource">media resource</a> could be rendered at the current playback rate all the way to its end without having to stop for further buffering.
     <td><code title="dom-media-readyState"><a href="#dom-media-readystate">readyState</a></code> is newly equal to <code title="dom-media-HAVE_ENOUGH_DATA"><a href="#dom-media-have_enough_data">HAVE_ENOUGH_DATA</a></code>.
 
   <tbody><tr><td><dfn id="event-media-seeking" title="event-media-seeking"><code>seeking</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> IDL attribute changed to true and the seek operation is taking long enough that the user agent has time to fire the event.
     <td> 
    <tr><td><dfn id="event-media-seeked" title="event-media-seeked"><code>seeked</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The <code title="dom-media-seeking"><a href="#dom-media-seeking">seeking</a></code> IDL attribute changed to false.
     <td> 
    <tr><td><dfn id="event-media-timeupdate" title="event-media-timeupdate"><code>timeupdate</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The <a href="#current-playback-position">current playback position</a> changed as part of normal playback or in an especially interesting way, for example discontinuously.
     <td> 
    <tr><td><dfn id="event-media-ended" title="event-media-ended"><code>ended</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Playback has stopped because the end of the <a href="#media-resource">media resource</a> was reached.
     <td><code title="dom-media-currentTime"><a href="#dom-media-currenttime">currentTime</a></code> equals the end of the <a href="#media-resource">media resource</a>; <code title="dom-media-ended"><a href="#dom-media-ended">ended</a></code> is true.
 
   <tbody><tr><td><dfn id="event-media-ratechange" title="event-media-ratechange"><code>ratechange</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Either the <code title="dom-media-defaultPlaybackRate"><a href="#dom-media-defaultplaybackrate">defaultPlaybackRate</a></code> or the <code title="dom-media-playbackRate"><a href="#dom-media-playbackrate">playbackRate</a></code> attribute has just been updated.
     <td> 
    <tr><td><dfn id="event-media-durationchange" title="event-media-durationchange"><code>durationchange</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>The <code title="dom-media-duration"><a href="#dom-media-duration">duration</a></code> attribute has just been updated.
     <td> 
    <tr><td><dfn id="event-media-volumechange" title="event-media-volumechange"><code>volumechange</code></dfn> 
     <td><code><a href="infrastructure.html#event">Event</a></code> 
     <td>Either the <code title="dom-media-volume"><a href="#dom-media-volume">volume</a></code> attribute or the <code title="dom-media-muted"><a href="#dom-media-muted">muted</a></code> attribute has changed. Fired after the relevant attribute's setter has returned.
     <td> 
  </table><div class="impl"> 
 
  <h5 id="security-and-privacy-considerations"><span class="secno">4.8.9.13 </span>Security and privacy considerations</h5> 
 
  <p>The main security and privacy implications of the
  <code><a href="#video">video</a></code> and <code><a href="#audio">audio</a></code> elements come from the
  ability to embed media cross-origin. There are two directions that
  threats can flow: from hostile content to a victim page, and from a
  hostile page to victim content.</p> 
 
  <hr><p>If a victim page embeds hostile content, the threat is that the
  content might contain scripted code that attempts to interact with
  the <code><a href="infrastructure.html#document">Document</a></code> that embeds the content. To avoid this,
  user agents must ensure that there is no access from the content to
  the embedding page. In the case of media content that uses DOM
  concepts, the embedded content must be treated as if it was in its
  own unrelated <a href="browsers.html#top-level-browsing-context">top-level browsing context</a>.</p> 
 
  <p class="example">For instance, if an SVG animation was embedded in
  a <code><a href="#video">video</a></code> element, the user agent would not give it
  access to the DOM of the outer page. From the perspective of scripts
  in the SVG resource, the SVG file would appear to be in a lone
  top-level browsing context with no parent.</p> 
 
  <hr><p>If a hostile page embeds victim content, the threat is that the
  embedding page could obtain information from the content that it
  would not otherwise have access to. The API does expose some
  information: the existence of the media, its type, its duration, its
  size, and the performance characteristics of its host. Such
  information is already potentially problematic, but in practice the
  same information can more or less be obtained using the
  <code><a href="embedded-content-1.html#the-img-element">img</a></code> element, and so it has been deemed acceptable.</p> 
 
  <p>However, significantly more sensitive information could be
  obtained if the user agent further exposes metadata within the
  content such as subtitles or chapter titles. This version of the API
  does not expose such information. Future extensions to this API will
  likely reuse a mechanism such as CORS to check that the embedded
  content's site has opted in to exposing such information. <a href="references.html#refsCORS">[CORS]</a></p> <!-- v2 --> 
 
  <p class="example">An attacker could trick a user running within a
  corporate network into visiting a site that attempts to load a video
  from a previously leaked location on the corporation's intranet. If
  such a video included confidential plans for a new product, then
  being able to read the subtitles would present a confidentiality
  breach.</p> 
 
  </div> 
 
 
  