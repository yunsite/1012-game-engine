{config_load file="test.conf" section="setup"}
{include file="header.tpl" title={$title}}
<link rel="stylesheet" type="text/css" href="./JsCss/style.css" />
<script type="text/javascript" src="./JsCss/jquery.blockUI.js"></script>
<script type="text/javascript">
$(function(){
$('#LogOn').click(function(){   //给box_btn绑定一个鼠标点击的事件
        $.blockUI({   //当点击事件发生时调用弹出层
        message: $('#LogOnBox'),    //要弹出的元素box
        css: {    //弹出元素的CSS属性
	backgroundColor: '#000', 
        width: '400px',
        background: '#ffffff'
            }
        });
    $('.blockOverlay').attr('title','单击关闭').click($.unblockUI); 
    });
});
</script>
</head>
<body>
<div id="page">
<header id="branding" role="banner">
	<hgroup>
		<h1 style="font-family: seigetsuRegular" id="site-title"><a>&nbsp&nbsp1012</a></h1>
		<h2 id="site-description">这是一个圈套</h2>	
	</hgroup>
	<img style="width:50px;height:50px;position: absolute;
top:16.3%;left:6%;" src="Image/logo3_50.png" alt="LOGO" />

<nav id="access" role="navigation">
	<div class="menu"><ul><li class="current_page_item"><a href="index.php" title="首页">首页</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="introduction.php" title="简介">{$op1}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Tutorial.php" title="教程">{$op2}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Account.php" title="账户">{$op3}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="History.php" title="历史">{$op4}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Help.php" title="帮助">{$op5}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Wiki.php" title="百科">{$op6}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="BBS.php" title="论坛">{$op7}</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="About.php" title="关于">{$op8}</a></li><li class="page_item page-item-2"></li></ul></div>
	{if $Authority}
	<div class="menu"><ul><li class="current_page_item"><a href="Admin.php" title="后台">后台</a></li><li class="page_item page-item-2"></li></ul></div>
	{/if}
	{if $LogOn==1}
	<div id="access2" class="menu"><ul><li class="current_page_item"><a href="UnLogOn.php" title="退出" >退出</a></li><li class="page_item page-item-2"></li></ul></div>
	{else}
	<div id="access2" class="menu"><ul><li class="current_page_item"><a href="Register.php" title="注册" >注册</a></li><li class="page_item page-item-2"></li></ul></div>
	{/if}
</nav>
<br />
<br />
<br />
<br />
<br />
<br />
<div class="IndexInfo">

{if $gamemode==2}
{if $LogOn}
欢迎你，{$User}
<br />
<br />
{/if}
现在是{$chapter}
<br />
<br />
第{$loop}回
<br />
<br />
游戏已进行{$time}分钟
<br />
<br />
{if $LogOn}
<button type="button"  onclick="window.location.href='GameReady.php';">
开始游戏
</button>
{else}
<button type="button" id="LogOn">
登陆
</button>
{/if}
{/if}

{if $gamemode==0}
{if $LogOn}
欢迎你，{$User}
<br />
<br />
{/if}
游戏停止中，散散步喝杯水，满怀期待之心刷新页面，也许有效。
{/if}

{if $gamemode==1}
{if $LogOn}
欢迎你，{$User}
<br />
<br />
{/if}
现在是{$chapter}
<br />
<br />
第{$loop}回
<br />
<br />
游戏正在准备中
<br />
<br />
{if $LogOn}
<button type="button" onclick="window.location.href='GameReady.php';">
开始游戏
</button>
{else}
<button type="button" id="LogOn">
登陆
</button>
{/if}
{/if}


{if $gamemode==3}
{if $LogOn}
欢迎你，{$User}
<br />
<br />
{/if}
现在是{$chapter}
<br />
<br />
第{$loop}回
<br />
<br />
游戏已进行{$time}分钟
<br />
<br />
{if $LogOn}
很抱歉，人数已满，也许正是你了解我们更多的机会。
{else}
<button type="button" id="LogOn">
登陆
</button>
{/if}
{/if}

</div>
<br />
<br />
</div>
<form id="LogOnBox" align="center" action="CheckLogOn.php" method="post">
<p>登陆</p>
用户名
<input type="text" name="user" maxlength="20" />
<br />
<br />
密码&nbsp&nbsp
<input type="password" name="password" maxlength="15" />
<br />
<br />

<button type="submit" class="button"  >提交&nbsp&nbsp</button>

</form>
{include file="footer.tpl"}