var xmlHttpallskill
function Showallskill()
{ 
xmlHttpallskill=GetXmlHttpObject()
if (xmlHttpallskill==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/GetAllSkill.php"
url=url+"?sid="+Math.random()
//document.write(url);
xmlHttpallskill.onreadystatechange=stateChangedallskill 
xmlHttpallskill.open("GET",url,true)
xmlHttpallskill.send(null)
}

function stateChangedallskill() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpallskill.readyState==4 || xmlHttpallskill.readyState=="complete")
 { 

 document.getElementById("SkilltreeInterface").innerHTML=xmlHttpallskill.responseText 
 } 
}

