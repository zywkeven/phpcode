<script>
function c(css)
{
    menu.className=css;
}
    function link(act,txt)
    {
     document.write("<div class=link onMouseOver=this.className='overlink' onmouseout=this.className='link' style='padding-left:16;padding-top:1;padding-bottom:1' onclick=\'window.location=\'"+act+">"+txt+"</div>")
     }
    function showmenu()
    {
        var rightedge=document.body.clientWidth-event.clientX-100
        var bottomedge=document.body.clientHeight-event.clientY-25
        
        if(rightedge<menu.offsetWidth)
        menu.style.left=document.body.scrollLeft+event.clientX-menu.offsetWidth
        else
        menu.style.left=document.body.scrollLeft+event.clientX 
        if(bottomedge<menu.offsetHeight)
        menu.style.top=document.body.scrollTop+event.clientY-menu.offsetHeight
        else
        menu.style.top=document.body.scrollTop+event.clientY
        menu.style.visibility="visible"
        return false
    }
        function hidemenu()
        {
            menu.style.visibility="hidden"
        }
        function pop(win)
        {
            window.open(win,",")
        }
</script>
<div id=menu class=up style=text-align:left;position:absolute;visibility:hidden;width=125px;z-index:200;background=red>
<script>
link('pop("www")','menu1');
link('pop("www")','menu2');     
link('pop("www")','menu3'); 
</script></div>
<script>
if(document.all&&window.print)
{
    document.oncontextmenu=showmenu
    document.body.onclick=hidemenu
}
</script>
    

            