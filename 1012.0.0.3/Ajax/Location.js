﻿function Showlocation(lo)
{

switch(lo){
	case 1:
		allhide()
		alllocationnone();
		document.getElementById("L1").style.display='none';
		document.getElementById("L1H").style.display='inline'; 

		break;
	case 2:
		allhide()
		alllocationnone();
		document.getElementById("L2").style.display='none'; 
		document.getElementById("L2H").style.display='inline'; 

		break;
	case 3:
		allhide()
		alllocationnone();
		document.getElementById("L3").style.display='none'; 
		document.getElementById("L3H").style.display='inline'; 
		break;
	case 4:
		allhide()
		alllocationnone();
		document.getElementById("L4").style.display='none'; 
		document.getElementById("L4H").style.display='inline'; 
		break;
	case 5:
		allhide()
		alllocationnone();
		document.getElementById("L5").style.display='none'; 
		document.getElementById("L5H").style.display='inline'; 
		break;
	case 6:
		allhide()
		alllocationnone();
		document.getElementById("L6").style.display='none'; 
		document.getElementById("L6H").style.display='inline'; 
		break;
	case 7:
		allhide()
		alllocationnone();
		document.getElementById("L7").style.display='none'; 
		document.getElementById("L7H").style.display='inline'; 
		break;
	case 8:
		allhide()
		alllocationnone();
		document.getElementById("L8").style.display='none'; 
		document.getElementById("L8H").style.display='inline'; 
		break;
	case 9:
		allhide()
		alllocationnone();
		document.getElementById("L9").style.display='none'; 
		document.getElementById("L9H").style.display='inline'; 
		break;
	case 10:
		allhide()
		alllocationnone();
		document.getElementById("L10").style.display='none'; 
		document.getElementById("L10H").style.display='inline'; 
		break;
	case 11:
		allhide()
		alllocationnone();
		document.getElementById("L11").style.display='none'; 
		document.getElementById("L11H").style.display='inline'; 
		break;
	case 12:
		allhide()
		alllocationnone();
		document.getElementById("L12").style.display='none'; 
		document.getElementById("L12H").style.display='inline'; 
		break;
	case 13:
		allhide()
		alllocationnone();
		document.getElementById("L13").style.display='none'; 
		document.getElementById("L13H").style.display='inline'; 
		break;
	case 14:
		allhide()
		alllocationnone();
		document.getElementById("L14").style.display='none'; 
		document.getElementById("L14H").style.display='inline'; 
		break;
	default:
		allhide()
		alllocationnone();
	}
}

function alllocationnone()
{
	document.getElementById("L1").style.display='inline'; 
	document.getElementById("L2").style.display='inline'; 
	document.getElementById("L3").style.display='inline'; 
	document.getElementById("L4").style.display='inline'; 
	document.getElementById("L5").style.display='inline'; 
	document.getElementById("L6").style.display='inline'; 
	document.getElementById("L7").style.display='inline'; 
	document.getElementById("L8").style.display='inline'; 
	document.getElementById("L9").style.display='inline'; 
	document.getElementById("L10").style.display='inline'; 
	document.getElementById("L11").style.display='inline'; 
	document.getElementById("L12").style.display='inline'; 
	document.getElementById("L13").style.display='inline'; 
	document.getElementById("L14").style.display='inline'; 

}

function allhide()
{
	document.getElementById("L1H").style.display='none'; 
	document.getElementById("L2H").style.display='none'; 
	document.getElementById("L3H").style.display='none'; 
	document.getElementById("L4H").style.display='none'; 
	document.getElementById("L5H").style.display='none'; 
	document.getElementById("L6H").style.display='none'; 
	document.getElementById("L7H").style.display='none'; 
	document.getElementById("L8H").style.display='none'; 
	document.getElementById("L9H").style.display='none'; 
	document.getElementById("L10H").style.display='none'; 
	document.getElementById("L11H").style.display='none'; 
	document.getElementById("L12H").style.display='none'; 
	document.getElementById("L13H").style.display='none'; 
	document.getElementById("L14H").style.display='none'; 

}


function locationchange(lo)
{
xmlHttplocation=GetXmlHttpObject()
if (xmlHttplocation==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/Location.php"
url=url+"?locationid="+lo
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttplocation.onreadystatechange=stateChangedlocation 
xmlHttplocation.open("GET",url,true)
xmlHttplocation.send(null)

}

function stateChangedlocation() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttplocation.readyState==4 || xmlHttplocation.readyState=="complete")
 { 
	 var newlocation;
	 newlocation= xmlHttplocation.responseText;
	 newlocation=trim(newlocation);
	 locationvalue=newlocation-0;
	 if(locationvalue>0)
		Showlocation(locationvalue);
 } 
}

function trim(str){ //删除左右两端的空格
　　     return str.replace(/(^\s*)|(\s*$)/g, "");
　　 }
function ltrim(str){ //删除左边的空格
　　     return str.replace(/(^\s*)/g,"");
　　 }
function rtrim(str){ //删除右边的空格
　　     return str.replace(/(\s*$)/g,"");
　　 }



