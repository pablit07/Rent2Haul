// JavaScript Document


function redirect_href(pageName)
{
	location.href = pageName;
	return location.href;
	
}

function $$(id)
{
	return document.getElementById(id);
}

function validate_email(input_val)
{
	if(($(input_val).value.indexOf(".") > 2) && ($(input_val).value.indexOf("@") > 0)){
		return true;
	} else {
		alert("Please Enter a Valid Email Address");
		$(input_val).focus();
		return false;
	}
}

function isUrl(s) {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
}
/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) {

	var at="@"
	var dot="."
	var lat=str.indexOf(at)
	var lstr=str.length
	var ldot=str.indexOf(dot)
	if (str.indexOf(at)==-1){
	   alert("Invalid E-mail ID")
	   return false
	}
	
	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
	   alert("Invalid E-mail ID")
	   return false
	}
	
	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		alert("Invalid E-mail ID")
		return false
	}
	
	 if (str.indexOf(at,(lat+1))!=-1){
		alert("Invalid E-mail ID")
		return false
	 }
	
	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		alert("Invalid E-mail ID")
		return false
	 }
	
	 if (str.indexOf(dot,(lat+2))==-1){
		alert("Invalid E-mail ID")
		return false
	 }
	
	 if (str.indexOf(" ")!=-1){
		alert("Invalid E-mail ID")
		return false
	 }
	
	 return true					
}
//Javascript Resize to Inner Browser Dimensions
function GetInnerSize () {
	var x,y;
	if (self.innerHeight) // all except Explorer
	{
		x = self.innerWidth;
		y = self.innerHeight;
	}
	else if (document.documentElement && document.documentElement.clientHeight)
		// Explorer 6 Strict Mode
	{
		x = document.documentElement.clientWidth;
		y = document.documentElement.clientHeight;
	}
	else if (document.body) // other Explorers
	{
		x = document.body.clientWidth;
		y = document.body.clientHeight;
	}
	return [x,y];
}

function ResizeToInner (w, h, x, y) {
	// make sure we have a final x/y value
	// pick one or the other windows value, not both
	if (x==undefined) x = window.screenLeft || window.screenX;
	if (y==undefined) y = window.screenTop || window.screenY;
	// for now, move the window to the top left
	// then resize to the maximum viewable dimension possible
	window.moveTo(0,0);
	window.resizeTo(screen.availWidth,screen.availHeight);
	// now that we have set the browser to it's biggest possible size
	// get the inner dimensions.  the offset is the difference.
	var inner = GetInnerSize();
	var ox = screen.availWidth-inner[0];
	var oy = screen.availHeight-inner[1];
	// now that we have an offset value, size the browser
	// and position it
	window.resizeTo(w+ox, h+oy);
	window.moveTo(x,y);
}
// end resize

function setHiddenValue(req_field,req_val)
{
	$(req_field).value = req_val;
}

/// user defined trim ///
String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}
function setReqPage(page_name)
{
	window.location = page_name;
}
function replaceButtonText(buttonId, text)
{
  if (document.getElementById)
  {
    var button=document.getElementById(buttonId);
    if (button)
    {
      if (button.childNodes[0])
      {
        button.childNodes[0].nodeValue=text;
      }
      else if (button.value)
      {
        button.value=text;
      }
      else //if (button.innerHTML)
      {
        button.innerHTML=text;
      }
    }
  }
}
function so_clearInnerHTML(obj) {
	// perform a shallow clone on obj
	nObj = obj.cloneNode(false);
	// insert the cloned object into the DOM before the original one
	obj.parentNode.insertBefore(nObj,obj);
	// remove the original object
	obj.parentNode.removeChild(obj);
}
function getAjaxData(reqVar,id,pageUrl,responseArea,qryStr){	
	if ((id == null) || (id == "")) return;
	if(!oXmlHttpAjax) var oXmlHttpAjax = zXmlHttp.createRequest();
	function $(argument){ return document.getElementById(argument)};
	
	var myRegExp = /&/;
	var strFlag = (typeof(qryStr)!= "undefined") ? true : false;
	var matchPost = (strFlag!=false) ? qryStr.search(myRegExp) : "blankFound";
	var qryStrFlag = (matchPost!="blankFound") && (matchPost!=-1) ? true : false;
	
	var url = pageUrl + "?" + reqVar + "=" + escape(id) ;
	url += ((!qryStrFlag)&&(strFlag==true)) ? ("&" + qryStr) : ((qryStrFlag)&&(strFlag==true)) ? qryStr : "" ;
//	alert(url);return;
	oXmlHttpAjax.open("GET", url, true);
	
	oXmlHttpAjax.onreadystatechange = function () {
		if (oXmlHttpAjax.readyState == 4) {
			if (oXmlHttpAjax.status == 200) {
//				if(oXmlHttpAjax.responseText == 1)
				if($(responseArea).style.display = "none") 
					$(responseArea).style.display = "";
				$(responseArea).innerHTML = oXmlHttpAjax.responseText;
			} else {
				$(responseArea).innerHTML = "An error occurred: " + oXmlHttpAjax.statusText; //statusText is not always accurate
			}
		}            
	};
	oXmlHttpAjax.send(null);
}


function isNumberKey(evt){
	 var charCode = (evt.which) ? evt.which : event.keyCode
	 if (charCode > 31 && (charCode < 48 || charCode > 57)){
	    alert ('Please Enter Number Only') ;
		return false;
	 }else
	 return true;
  }