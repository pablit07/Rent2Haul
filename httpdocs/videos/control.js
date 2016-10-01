function writeHTMLas1(){
document.write("<object id=\"FlashID\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"280\" height=\"370\">");
document.write("  <param name=\"movie\" value=\"..\/videos\/1.swf\" \/>");
document.write("  <param name=\"quality\" value=\"high\" \/>");
document.write("  <param name=\"wmode\" value=\"transparent\" \/>");
document.write("  <param name=\"swfversion\" value=\"6.0.65.0\" \/>");
document.write("  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->");
document.write("  <param name=\"expressinstall\" value=\"Scripts\/expressInstall.swf\" \/>");
document.write("  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->");
document.write("  <!--[if !IE]>-->");
document.write("  <object type=\"application\/x-shockwave-flash\" data=\"..\/videos\/1.swf\" width=\"280\" height=\"370\">");
document.write("    <!--<![endif]-->");
document.write("    <param name=\"quality\" value=\"high\" \/>");
document.write("    <param name=\"wmode\" value=\"transparent\" \/>");
document.write("    <param name=\"swfversion\" value=\"6.0.65.0\" \/>");
document.write("    <param name=\"expressinstall\" value=\"Scripts\/expressInstall.swf\" \/>");
document.write("    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->");
document.write("<div style=\"position:fixed;bottom:0px;right:0px;z-index:10000000\">");
document.write("<a href=\"..\/videos\/ivideo.mp4\"><img src=\"..\/videos\/ivideo.png\" border=\"0\" \/><\/a>");
document.write("    <\/div>");
document.write("    <!--[if !IE]>-->");
document.write("  <\/object>");
document.write("  <!--<![endif]-->");
document.write("<\/object>");
document.write("<script type=\"text\/javascript\">");
document.write("<!--");
document.write("swfobject.registerObject(\"FlashID\");");
document.write("\/\/-->");
document.write("<\/script>");
}

function writeHTMLas2(){
document.write("<object id=\"FlashID\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"280\" height=\"370\">");
document.write("  <param name=\"movie\" value=\"..\/videos\/2.swf\" \/>");
document.write("  <param name=\"quality\" value=\"high\" \/>");
document.write("  <param name=\"wmode\" value=\"transparent\" \/>");
document.write("  <param name=\"swfversion\" value=\"6.0.65.0\" \/>");
document.write("  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->");
document.write("  <param name=\"expressinstall\" value=\"Scripts\/expressInstall.swf\" \/>");
document.write("  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->");
document.write("  <!--[if !IE]>-->");
document.write("  <object type=\"application\/x-shockwave-flash\" data=\"..\/videos\/2.swf\" width=\"280\" height=\"370\">");
document.write("    <!--<![endif]-->");
document.write("    <param name=\"quality\" value=\"high\" \/>");
document.write("    <param name=\"wmode\" value=\"transparent\" \/>");
document.write("    <param name=\"swfversion\" value=\"6.0.65.0\" \/>");
document.write("    <param name=\"expressinstall\" value=\"Scripts\/expressInstall.swf\" \/>");
document.write("    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->");
document.write("<div style=\"position:fixed;bottom:0px;right:0px;z-index:10000000\">");
document.write("<a href=\"..\/videos\/ivideo.mp4\"><img src=\"..\/videos\/ivideo.png\" border=\"0\" \/><\/a>");
document.write("    <\/div>");
document.write("    <!--[if !IE]>-->");
document.write("  <\/object>");
document.write("  <!--<![endif]-->");
document.write("<\/object>");
document.write("<script type=\"text\/javascript\">");
document.write("<!--");
document.write("swfobject.registerObject(\"FlashID\");");
document.write("\/\/-->");
document.write("<\/script>");

}


DaysToLive = 365;

function GetCookie(name) {

var cookiecontent = '0';

if(document.cookie.length > 0) {
	
	var cookiename = name + '=';
	var cookiebegin = document.cookie.indexOf(cookiename);
	
	var cookieend = 0;
	
	if(cookiebegin > -1) {
		
		cookiebegin += cookiename.length;
		
		cookieend = document.cookie.indexOf(";",cookiebegin);
		if(cookieend < cookiebegin) { cookieend = document.cookie.length; }
		
		cookiecontent = document.cookie.substring(cookiebegin,cookieend);
	}
}

var value = parseInt(cookiecontent) + 1;

PutCookie(name,value);

return value;
}

function PutCookie(n,v) {

var exp = '';

if(DaysToLive > 0) {
	var now = new Date();
	then = now.getTime() + (DaysToLive * 24 * 60 * 60 * 1000);
	now.setTime(then);
	exp = '; expires=' +
	now.toGMTString();
}

document.cookie = n + "=" + v + '; path=/' + exp;
}