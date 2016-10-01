//--> Function For Calling Ajax All Function
// PageName 	-> The page name or url that needs to be executed.
// AjaxDivName	-> The div id where the result needs to be displayed.
// Fields   	-> The Fields that need to post on the executing page.
// Method   	-> The method GET/POST by which the data need to post to the executing page.
// FuncName 	-> The name of the function that needs to call for executing the page.
function MainAjax(PageName, AjaxDivName, Fields, Method, FuncName)
{
	//--> Ajax Variables
	var objAjax = false;
	var AjaxDivName;
	var Fields = null;
	var Method = 'GET';
	var FuncName = 'DisplayAjaxResult';
	//document.getElementById(AjaxDivName).innerHTML = "<img src='images/loading.gif' border='0'>";
	
	//--> Initializing The Global Ajax Object
	objAjax = InitializeAjax();

	if(objAjax)
	{
		if(Method == 'GET')
		{
			objAjax.onreadystatechange = eval(FuncName);
			objAjax.open('GET', PageName, true);
			objAjax.send(Fields);
		}
		else
		{
			objAjax.onreadystatechange = eval(FuncName);
			objAjax.open('POST', PageName, true);
			objAjax.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
			objAjax.send(Fields);
		}
	}
	else
	{
		alert('Your Browser Does Not Support HTTP Request');
		return;
	}
	
	//--> Function For Initializing Ajax
	function InitializeAjax()
	{
		//--> Creating New Object For Ajax 
		var objAjax = new Object();
		if(window.XMLHttpRequest) 
		{	
			//--> Branch For Native XMLHttpRequest Object
			try 
			{
				objAjax = new XMLHttpRequest();
			} 
			catch(e) 
			{
				objAjax = false;
			}
		}
		else if(window.ActiveXObject) 
		{	
			//--> Branch For IE/Windows ActiveX version
			try 
			{
				objAjax = new ActiveXObject("Msxml2.XMLHTTP");
			} 
			catch(e) 
			{
				try 
				{
					objAjax = new ActiveXObject("Microsoft.XMLHTTP");
				} 
				catch(e) 
				{
					objAjax = false;
				}
			}
		}
		
		return objAjax;
	}

	//--> Function For Displaying Ajax Result Based On Div Name
	function DisplayAjaxResult()
	{
		if (objAjax.readyState == 4)
		{
			if(AjaxDivName)
			{
				document.getElementById(AjaxDivName).innerHTML = objAjax.responseText;
			}
			else
			{
				if(objAjax.responseText != '')
					alert(objAjax.responseText);
				else
					alert('Page Error: Not Getting Any Response From Server');
			}
		}
	}
}

