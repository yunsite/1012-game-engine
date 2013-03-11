var xmlHttpsearch
var nam
function Showsearch(name)
{ 
xmlHttpsearch=GetXmlHttpObject()
if (xmlHttpsearch==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/Search.php"
url=url+"?name="+name
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttpsearch.onreadystatechange=stateChangedsearch 
xmlHttpsearch.open("GET",url,true)
xmlHttpsearch.send(null)
nam=name
}

function stateChangedsearch() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpsearch.readyState==4 || xmlHttpsearch.readyState=="complete")
 { 

	document.getElementById("SearchInterface").innerHTML=xmlHttpsearch.responseText;
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
