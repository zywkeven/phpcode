function createElement(tagName,name,type,value)
{
	var element = null;
	try 
	{
		element = document.createElement('<'+tagName+' name="'+name+'" />');
		element.type = type;
		element.value = value;
	}
	catch (e)
	{
	}
	if (!element)
	{
		element = document.createElement(tagName);
		element.setAttribute("type",type);
		element.setAttribute("name",name);
		element.setAttribute("value",value);
   }
   return element;
} 动态创建元素


delelement.parentNode.removeChild(delelement);   