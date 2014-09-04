var xmlHttp;
function GetXmlHttpObject()
{
	var xmlHttp=null;
	 try
	 {
	 // Firefox, Opera 8.0+, Safari
	 xmlHttp=new XMLHttpRequest();
	 }
	 catch (e)
	 {
	 // Internet Explorer
		  try
		  {
		  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e)
		  {
		  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	 }
	return xmlHttp;
}
/***********************************************************************************
-->Redirecting  and Submitting forms thru ajax
*************************************************************************************/
function RedirectPage(actionstr,pid)
{ 
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
	 return
	} 
		
	var url;
		//addproducts param values list specification
		if(actionstr == "addproducts"){
			var pname = document.getElementById('pname').value;
			var price = document.getElementById('price').value;
			var qnty = document.getElementById('qnty').value;
			//input validation 
			if(!parseInt(qnty)){
				alert('Invalid Input...!');
				return false;
			}
			var values="pname="+pname+"&price="+price+"&qnty="+qnty+"&pid="+pid+"&action="+actionstr;
		}

		//delproducts param values list specification
		else if(actionstr == "delproducts"){
			var values="pid="+pid+"&action="+actionstr;
		}
		//update products param values list specification
		else if(actionstr == "updateproducts"){
			//input validation
			var uqnty = document.getElementById(pid).value;
			if(!parseInt(uqnty)){
				alert('Invalid Input...!');
			return false;
			}
			var values="pid="+pid+"&action="+actionstr+"&qnty="+uqnty;
		}else{
			var values="action="+actionstr;
		}
		//url to redirect the page 
		url="products.php";
		if((actionstr == "addproducts") ){
			//to get alert message after submission of products
			//Note: if want to display the result in doc instead of alert just call getstateChanged() function 
			xmlHttp.onreadystatechange=alertstateChanged;
		}
		if((actionstr == "updateproducts") || (actionstr == "showcart") || (actionstr == "delproducts")){
			xmlHttp.onreadystatechange=getstateChanged;
		}
		xmlHttp.open("POST",url,true);

	//Send the proper header information along with the request
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", values.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(values);
	
}
/************************************************************************************
-->formstateChanged method showing alert messages
*************************************************************************************/
function alertstateChanged() 
{ 
	 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		alert(xmlHttp.responseText);
	 } 
}
/************************************************************************************
-->formstateChanged method for showing cart
*************************************************************************************/
function getstateChanged() 
{ 
	 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	 { 
		document.getElementById('btm_content').innerHTML=xmlHttp.responseText;
	 } 
}
