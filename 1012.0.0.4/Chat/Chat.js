﻿var xmlHttp
var at
function Showchat(name,str,atti)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Chat/GetChat.php"
url=url+"?q="+str
url=url+"&n="+name
url=url+"&a="+atti
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
at=atti
}

function stateChanged() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 

 document.getElementById("Chatdata").innerHTML=xmlHttp.responseText 
 setTimeout("Showchat('','',at)",2000);
 var div = document.getElementById('Chatdata');
 div.scrollTop = div.scrollHeight;
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