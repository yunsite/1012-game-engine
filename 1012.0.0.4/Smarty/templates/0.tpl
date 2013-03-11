{config_load file="test.conf" section="setup"}
{include file="header.tpl" title={$title}}
<link rel="stylesheet" type="text/css" href="./JsCss/style_0.css" />
<script type="text/javascript" src="Chat/Chat.js"></script>
<script type="text/javascript" src="Ajax/PlayerAttend.js"></script>
<script>
var begin;
function go()
{
　　
　	Showplayer({$Attitude})
	Showchat('','',{$Attitude})　　
}

</script>

<script type="text/javascript">
function startTime()
{
var Nowstamp = (Date.parse(new Date()))/1000; 
var Betweenstamp=Nowstamp-{$LastTime}
var stamp={$Readytime}-Betweenstamp

var m=Math.floor(stamp/60)
var s=stamp%60
if(stamp<=0)
{
	m=0
	s=0
}
document.getElementById('stamp').innerHTML="<br /><br /><br />距离游戏开始还有<br />"+m+":"+s
if(m>0||s>0)
	{
	t=setTimeout('startTime()',500)
	}

}

</script>


<script type="text/javascript">
  
  
function scrollWindow()
{
    scroll(0, 100000);
    setTimeout('scrollWindow()', 1000);
}
  
window.onload = function() { scrollWindow(); } 
  
</script>

</head>

<body style="background-color:rgb(48,10,36);color:#000000;" onload="startTime()">
{include file="bar.tpl"}
<script>go()</script>
<img style="width:50px;height:50px;position: absolute;
top:16.3%;left:6%;" src="Image/logo3_50.png" alt="LOGO" />
<div class="IndexInfo" style="background-color:{$Color3};">
<br />
<h2>欢迎来到{$GameTitle}的世界</h2>

<p>本次，您出生在科学阵营。</p>

<p>目标：击败侵犯领土的怪物，夺回家园</p>

<p>注意：此时退出或消极游戏将受到惩罚</p>

{if $gamemode==1}
<p>在这里你可以与你的战友商量战术</p>

<p>祝游戏愉快</p>

{/if}
{if $gamemode==2}
<p>游戏已经开始，请尽快加入</p>

<p>祝游戏愉快</p>
{/if}


</div>
<frame>
<form method="post" id="chatform" onsubmit="Showchat({$User},this.value,{$Attitude})">
<input type="text" class="field" name="s" id="chat" placeholder="聊天" />
</form>

<div id="Chatdata" style="width:21.9%;height:40%; overflow-y:auto;background-color:{$Color6}">

</div>
</frame>
<div id="Playerattend" style="background-color:{$Color1};">

</div>
<div id="stamp" style="background-color:{$Color2};">
</div>

</div>
<div id="Announcement" style="background-color:{$Color5};">
<p>{$Announcement}</p>
</div>

<div id="Start" style="background-color:{$Color4};">
<br /><br />
<a href="Main.php">
<img  src="Image/Sheep.gif" alt="开始游戏" />
</a>
<br />开始游戏&nbsp
</div>

<div id="Tx">
<img src="{$Tx}"  alt="头像"  />
</div>

{include file="footer.tpl"}
