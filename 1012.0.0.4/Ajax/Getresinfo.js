var xmlHttpres
var nam
function Showresinfo(name)
{ 
xmlHttpres=GetXmlHttpObject()
if (xmlHttpres==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/Getresinfo.php"
url=url+"?name="+name
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttpres.onreadystatechange=stateChangedres 
xmlHttpres.open("GET",url,true)
xmlHttpres.send(null)
nam=name
}

function stateChangedres() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpres.readyState==4 || xmlHttpres.readyState=="complete")
 { 

	document.getElementById("Resdata").innerHTML=xmlHttpres.responseText;
	DeHeHH();
	DeArHH();
	DeShHH();
	TranHH();
	TrHH();
	AHH();
	WHH();
	Bag1H();
	Bag2H();
	Bag3H();
	Bag4H();
	Bag5H();

	Bag1HH();
	Bag2HH();
	Bag3HH();
	Bag4HH();
	Bag5HH();
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