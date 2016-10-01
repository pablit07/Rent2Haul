var oXmlHttp = zXmlHttp.createRequest();

function getFckContent(instance) {
      var oEditor = FCKeditorAPI.GetInstance(instance);
      return oEditor.GetXHTML(true);
}

function setFckContent(instance,content) {
      var oEditor = FCKeditorAPI.GetInstance(instance);
	  oEditor.SetHTML(content);
}

function deleteSelectedValidation(){
	var flag = false;
	var len = $$('frm').elements.length;
	for(var i=0; i<len; i++){
		if(($$('frm').elements[i].name=='chkArr[]') && ($$('frm').elements[i].checked==true))
			flag = true;
			
	}
	if(flag == true){
		return confirm("Are You Sure to Delete All Selected Record(s)?");
	}else{
		alert("Please Select Atlest One Record");
		return false;
	}
}

function allCheckUncheck(){
	var count = document.forms[0].elements.length;
	if(document.forms[0].checkAll.checked)	{
		for(var i=0;i<count;i++){
			if(document.forms[0].elements[i].type=="checkbox")
				document.forms[0].elements[i].checked = true;
		}
	} else {
		for(var i=0;i<count;i++){
			if(document.forms[0].elements[i].type=="checkbox")
				document.forms[0].elements[i].checked = false;
		}
	}
}
//=====================LOGIN & PASSWORD VALIDATION===============================================
function adminLoginValidation(msgDivId){
	if(isWhitespace($$('admin_login_id').value))
	{
		alert("Please Enter Login ID");
		$$('admin_login_id').focus();
		return false;
	}
	if(isWhitespace($$('admin_password').value))
	{
		alert("Please Enter Password");
		$$('admin_password').focus();
		return false;
	}
	_showstatus(true);

   var url = "adminOperations.php";
	var qryString = location.search;
	url += (qryString != "") ? qryString : "";
	//alert(url);
	var params = "action=adminLogin&admin_login_id="+$$('admin_login_id').value+"&admin_password="+$$('admin_password').value;
	oXmlHttp.open("POST", url, true);
	$$(msgDivId).innerHTML = "";
	oXmlHttp.onreadystatechange = function () {
		if (oXmlHttp.readyState == 4) {
			if (oXmlHttp.status == 200) {
				var res_str = oXmlHttp.responseText;
				var res_array = res_str.split('||');
				if(res_array[0]=='Fail'){
					$$(msgDivId).innerHTML = res_array[1];
					_showstatus(false);
				}else{
					location.href = res_array[1];
				}
			} else {
				alert("An error occurred: " + oXmlHttp.statusText); //statusText is not always accurate
			}
		}            
	};
	oXmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXmlHttp.setRequestHeader("Content-length", params.length);
	oXmlHttp.setRequestHeader("Connection", "close");
	oXmlHttp.send(params);
	return false;
}

function changePasswordValidation(msgDivId){
	
	if(isWhitespace($$('admin_password_old').value))
	{
		alert('Please Enter Old Password');
		$$('admin_password_old').focus();
		return false;
	}
	if(isWhitespace($$('admin_password_new').value))
	{
		alert('Please Enter New Password');
		$$('admin_password_new').focus();
		return false;
	}
	if(isWhitespace($$('admin_password_retype').value))
	{
		alert('Please Retype New Password');
		$$('admin_password_retype').focus();
		return false;
	}
	if($$('admin_password_new').value != $$('admin_password_retype').value)
	{
		alert('Password Mismatch');
		$$('admin_password_retype').focus();
		return false;
	}
	
	_showstatus(true);
	var url = "adminOperations.php";
	var qryString = location.search;
	url += (qryString != "") ? qryString : "";
	var params = "action=changePassword&admin_password_old="+$$('admin_password_old').value+"&admin_password_new="+$$('admin_password_new').value+"&admin_password_retype="+$$('admin_password_retype').value;
	oXmlHttp.open("POST", url, true);
	$$(msgDivId).innerHTML = "";
	oXmlHttp.onreadystatechange = function () {
		if (oXmlHttp.readyState == 4) {
			if (oXmlHttp.status == 200) {
				var res_str = oXmlHttp.responseText;
				$$(msgDivId).innerHTML = res_str;
				_showstatus(false);
			} else {
				alert("An error occurred: " + oXmlHttp.statusText); //statusText is not always accurate
			}
		}            
	};
	oXmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oXmlHttp.setRequestHeader("Content-length", params.length);
	oXmlHttp.setRequestHeader("Connection", "close");
	oXmlHttp.send(params);
	return false;
}
//====================================================================================================
///////////////sh showing loading statusbar on active
  function checkEmail(myEml)
	{
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myEml))
		{
			return true;
		}
		return false;
	}
  function stop_keypress_char(evt)
{
	evt = (evt) ? evt : ((window.event) ? event : null);
	if (evt) {
		var elem = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
		if (elem) {
			var charCode = (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
			if ((charCode < 32 ) || (charCode > 47 && charCode < 58) || (charCode==46)) {
				return true;
			} else {
				alert("Please enter  numerics  only");
				return false;
			}
		}
	} 
}
  function _showstatus(on){
    if(on){
      window.defaultStatus = 'Please Wait Loading...';
      showstatus();
    }else{
      window.defaultStatus = '';
      closestatus();
    }
    
    return true;
  }
  //statusbar functions
  //---------------------------------------------------------------------
  var verticalpos="frombottom" //enter "fromtop" or "frombottom"
  var startX =30;var startY=30;
  
  function _createstatusbar(){
    //statusbar div
    var uiStatus = document.createElement("div");
        uiStatus.setAttribute("style","visibility:hidden;position:absolute;width:400px;left:200px;top:0px;font:normal 9px Tahoma;background:#ffffca;padding:4px;color:#330000;border:1px #999 solid;z-index:100;");
        uiStatus.setAttribute("id","uiStatus");       
    var statusText = document.createTextNode("Please Wait Loading...");
        uiStatus.appendChild(statusText);
    	
        window.document.documentElement.appendChild(uiStatus);
		animateTxt();
      
  }
  var counterAni=1;
  var aniTxt="Please Wait Loading...";
  function animateTxt()
  {		
	  document.getElementById("uiStatus").innerHTML=aniTxt.substr(0,counterAni++);
	  //alert(document.getElementById("uiStatus").style.visibility);
	  if(counterAni>aniTxt.length) counterAni=1;
	  setTimeout("animateTxt()",30);
  }
  
  function iecompattest(){
  return ((document.compatMode && document.compatMode!="BackCompat") ? document.documentElement : document.body);
  }
  
  function closestatus(){
    document.getElementById("uiStatus").style.visibility="hidden";
  }
  
  function showstatus(){
  	if(!document.getElementById("uiStatus")) _createstatusbar();
    
    barheight=document.getElementById("uiStatus").offsetHeight;
  	var ns = (navigator.appName.indexOf("Netscape") != -1) || window.opera;
  	var d = document;
  	function ml(id){
  		var el=d.getElementById(id);
  		el.style.visibility="visible";
  		if(d.layers)el.style=el;
  		el.sP=function(x,y){this.style.left=x+"px";this.style.top=y+"px";};
  		el.x = startX;
  		if (verticalpos=="fromtop")
  		el.y = startY;
  		else{
  		el.y = ns ? pageYOffset + innerHeight : iecompattest().scrollTop + iecompattest().clientHeight;
  		el.y -= startY;
  		}
  		return el;
  	}
  	window.stayTopLeft=function(){
  		if (verticalpos=="fromtop"){
  		var pY = ns ? pageYOffset : iecompattest().scrollTop;
  		ftlObj.y += (pY + startY - ftlObj.y)/8;
  		}
  		else{
  		var pY = ns ? pageYOffset + innerHeight - barheight: iecompattest().scrollTop + iecompattest().clientHeight - barheight;
  		ftlObj.y += (pY - startY - ftlObj.y)/8;
  		}
  		ftlObj.sP(ftlObj.x, ftlObj.y);
  		setTimeout("stayTopLeft()", 10);
  	}
  	ftlObj = ml("uiStatus");
  	stayTopLeft();
  }
  //end statusbar functions
///////////////sh end showing loading statusbar on active