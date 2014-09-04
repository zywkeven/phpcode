
<!--************************************* 实例代码开始 *************************************-->
<style type="text/css">
a.button {
background: transparent url('button1.gif') no-repeat scroll top right;
color: #444;
display: block;
float: left;
font: normal 12px arial, sans-serif;
height: 24px;
margin-right: 6px;
padding-right: 18px; /* sliding doors padding */
text-decoration: none;
}
a.button span {
background: transparent url('button2.gif') no-repeat;
display: block;
line-height: 14px;
padding: 5px 0 5px 18px;
}
a.button:active {
background-position: bottom right;
color: #000;
outline: none; /* hide dotted outline in Firefox */
}
a.button:active span {
background-position: bottom left;
padding: 6px 0 4px 18px; /* push text down 1px */
}
</style>
<br class="clear" />
<a class="button" href="#" onclick="this.blur(); return false;"><span>提交</span></a>
<a class="button" href="#" onclick="this.blur(); return false;"><span>重置</span></a>
