var reg1
var att
function Showplayer(atti)
{ 
reg1=GetXmlHttpObject1()
if (reg1==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 
att=atti
var url1="Ajax/PlayerAttend.php"
url1=url1+"?att="+atti
url1=url1+"&sid="+Math.random()
//document.write(url);

reg1.onreadystatechange=stateChanged1 

reg1.open("GET",url1,true)
reg1.send(null)

}

function stateChanged1() 
{ 
 //document.write(xmlHttp2.readyState); 

 if (reg1.readyState==4 || reg1.readyState=="complete")
 { 
 //document.write(xmlHttp2.responseText)
 document.getElementById("Playerattend").innerHTML=reg1.responseText 
 setTimeout("Showplayer(att)",3000);
 } 
}

function GetXmlHttpObject1()
{
var reg=null;

try
 {
 // Firefox, Opera 8.0+, Safari
 reg=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  reg=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  reg=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return reg;
}