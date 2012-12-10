{config_load file="test.conf" section="setup"}
{include file="header.tpl" title={$title}}
<link rel="stylesheet" type="text/css" href="./JsCss/style_{$Attitude}.css" />
<script type="text/javascript" src="Chat/Chat.js"></script>
<script type="text/javascript" src="Ajax/Getroleinfo.js"></script>
<script type="text/javascript" src="Ajax/Getresinfo.js"></script>
<script type="text/javascript" src="Ajax/Getinformation.js"></script>
<script>
function go()
{
　　	Showinfo({$Attitude})
	Showchat('','',{$Attitude})　　
	Showroleinfo('{$User}')
	Showresinfo('{$User}')
	
}

</script>


</head>
{if {$Attitude}}
<body style="background-color:rgb(48,10,36);color:#ffffff;" >
{else}
<body style="background-color:rgb(237,115,66);color:#000000;">
{/if}
{include file="bar.tpl"}
<script>go()</script>

<form method="post" id="chatform" onsubmit="Showchat({$User},this.value,{$Attitude})">
<input type="text" class="field" name="s" onsubmit="Showchat({$User},this.value,{$Attitude})" id="chat" placeholder="聊天" />

</form>

<div id="Chatdata" style="width:300px;height:265px; overflow-y:auto;">

</div>

<div id="Roledata" class="Role">
这里应该显示人物信息
</div>

<div id="Resdata" >
这里应该显示物品信息
</div>

<div id="Status" >
<p>这里应该显示系统信息</p>
</div>

<div id="Map" >
<p>这里应该显示地图信息</p>
</div>

<div id="Option">
<p>这里会显示选项</p>
</div>

<div id="Tx">
<img src="{$Tx}"  alt="头像"  />
</div>

{include file="footer.tpl"}