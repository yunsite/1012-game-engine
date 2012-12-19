var xmlHttpskill
var nam
function Showskills(name)
{ 
xmlHttpskill=GetXmlHttpObject()
if (xmlHttpskill==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/GetSkills.php"
url=url+"?name="+name
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttpskill.onreadystatechange=stateChangedskill 
xmlHttpskill.open("GET",url,true)
xmlHttpskill.send(null)
nam=name
}

function stateChangedskill() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpskill.readyState==4 || xmlHttpskill.readyState=="complete")
 { 

 document.getElementById("Skills").innerHTML=xmlHttpskill.responseText 

 
SHH();
SH();

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