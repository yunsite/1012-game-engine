var xmlHttpsyn;
var xmlHttpsynsubmit;
var nam;
var syn='';
var flag1=0;
var flag2=0;
var flag3=0;
var flag4=0;
var flag5=0;
function SynAdd1()
{
if(document.getElementById("Bag1syid").textContent!='0'&&flag1==0)
	{
add=document.getElementById("Bag1syid").textContent;
add+=',';
syn+=add;
document.getElementById("chain1").style.display='inline';
flag1=1;
	}
}
function SynAdd2()
{
if(document.getElementById("Bag2syid").textContent!='0'&&flag2==0)
	{
add=document.getElementById("Bag2syid").textContent;
add+=',';
syn+=add;
document.getElementById("chain2").style.display='inline';
flag2=1;
	}
}
function SynAdd3()
{
if(document.getElementById("Bag3syid").textContent!='0'&&flag3==0)
	{
add=document.getElementById("Bag3syid").textContent
add+=','
syn+=add;
document.getElementById("chain3").style.display='inline';
flag3=1;
	}
}
function SynAdd4()
{
if(document.getElementById("Bag4syid").textContent!='0'&&flag4==0)
	{
add=document.getElementById("Bag4syid").textContent
add+=','
syn+=add;
document.getElementById("chain4").style.display='inline';
flag4=1;
	}
}
function SynAdd5()
{
if(document.getElementById("Bag5syid").textContent!='0'&&flag5==0)
	{
add=document.getElementById("Bag5syid").textContent
add+=','
syn+=add;
document.getElementById("chain5").style.display='inline';
flag5=1;
	}
}


function SynClean()
{
syn='';
flag1=0;
flag2=0;
flag3=0;
flag4=0;
flag5=0;
}


function SynSubmit()
{
xmlHttpsynsubmit=GetXmlHttpObject()
if (xmlHttpsynsubmit==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 
async: false;
var url="Ajax/SynthesisSubmit.php"
url=url+"?m="+syn;
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttpsynsubmit.onreadystatechange=stateChangedsynsubmit 
xmlHttpsynsubmit.open("GET",url,true)
xmlHttpsynsubmit.send(null)

}
function stateChangedsynsubmit() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpsynsubmit.readyState==4 || xmlHttpsynsubmit.readyState=="complete")
 { 
	 	document.getElementById("SynthesisInterface").innerHTML=xmlHttpsynsubmit.responseText;
		SynClean();
		Showresinfo(nam);	
		Showbag();
 } 
}




function Showsyn(name)
{ 
xmlHttpsyn=GetXmlHttpObject()
if (xmlHttpsyn==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

var url="Ajax/Synthesis.php"
url=url+"?name="+name
url=url+"&sid="+Math.random()
//document.write(url);
xmlHttpsyn.onreadystatechange=stateChangedsyn 
xmlHttpsyn.open("GET",url,true)
xmlHttpsyn.send(null)
nam=name
}

function stateChangedsyn() 
{ 
 //document.write(xmlHttp.readyState); 
 //document.write(xmlHttp.readyState); 

 if (xmlHttpsyn.readyState==4 || xmlHttpsyn.readyState=="complete")
 { 

	document.getElementById("SynthesisInterface").innerHTML=xmlHttpsyn.responseText;
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


function allowDrop(ev)
{
ev.preventDefault();
}

function drag(ev)
{
ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
ev.preventDefault();
var data=ev.dataTransfer.getData("Text");
if(data=='Bag1Sy')
	{SynAdd1();}
if(data=='Bag2Sy')
	{SynAdd2();}
if(data=='Bag3Sy')
	{SynAdd3();}
if(data=='Bag4Sy')
	{SynAdd4();}
if(data=='Bag5Sy')
	{SynAdd5();}
document.getElementById(data).style.display='none';

}