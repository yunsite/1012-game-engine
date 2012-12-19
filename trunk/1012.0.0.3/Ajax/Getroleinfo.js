var xmlHttprole
var nam
function Showroleinfo(name)
{ 
xmlHttprole=GetXmlHttpObject()
if (xmlHttprole==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/Getroleinfo.php"
url=url+"?name="+name
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttprole.onreadystatechange=stateChangedrole 
xmlHttprole.open("GET",url,true)
xmlHttprole.send(null)
nam=name
}

function stateChangedrole() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttprole.readyState==4 || xmlHttprole.readyState=="complete")
 { 

 document.getElementById("Roledata").innerHTML=xmlHttprole.responseText 
 } 
}

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