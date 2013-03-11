var xmlHttpintelligence
function Showintelligence()
{ 
xmlHttpintelligence=GetXmlHttpObject()
if (xmlHttpintelligence==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/GetIntelligence.php"
url=url+"?sid="+Math.random()
//document.write(url);
xmlHttpintelligence.onreadystatechange=stateChangedintelligence 
xmlHttpintelligence.open("GET",url,true)
xmlHttpintelligence.send(null)
}

function stateChangedintelligence() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpintelligence.readyState==4 || xmlHttpintelligence.readyState=="complete")
 { 

 document.getElementById("IntelligenceInterface").innerHTML=xmlHttpintelligence.responseText 
 } 
}
