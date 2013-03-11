<?php /* Smarty version Smarty-3.1.8, created on 2012-12-18 16:48:20
         compiled from "./Smarty/templates\1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2611550d02dd442a857-27306215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76864ff34daa653f4cb09e12ceda8481b61aeb9f' => 
    array (
      0 => './Smarty/templates\\1.tpl',
      1 => 1355761461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2611550d02dd442a857-27306215',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'Attitude' => 0,
    'LastTime' => 0,
    'Readytime' => 0,
    'Color3' => 0,
    'GameTitle' => 0,
    'gamemode' => 0,
    'User' => 0,
    'Color6' => 0,
    'Color1' => 0,
    'Color2' => 0,
    'Color5' => 0,
    'Announcement' => 0,
    'Color4' => 0,
    'Tx' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50d02dd44e2b93_50045725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50d02dd44e2b93_50045725')) {function content_50d02dd44e2b93_50045725($_smarty_tpl) {?>﻿<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_tmp1), 0);?>

<link rel="stylesheet" type="text/css" href="./JsCss/style_1.css" />
<script type="text/javascript" src="Chat/Chat.js"></script>
<script type="text/javascript" src="Ajax/PlayerAttend.js"></script>
<script>
var begin;
function go()
{
　　
　	Showplayer(<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)
	Showchat('','',<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)　　
}

</script>

<script type="text/javascript">
function startTime()
{
var Nowstamp = (Date.parse(new Date()))/1000; 
var Betweenstamp=Nowstamp-<?php echo $_smarty_tpl->tpl_vars['LastTime']->value;?>

var stamp=<?php echo $_smarty_tpl->tpl_vars['Readytime']->value;?>
-Betweenstamp

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

<body style="background-color:rgb(48,10,36);color:#ffffff;" onload="startTime()">
<?php echo $_smarty_tpl->getSubTemplate ("bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>go()</script>
<div style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color3']->value;?>
;" class="IndexInfo">
<br />
<h2>欢迎来到<?php echo $_smarty_tpl->tpl_vars['GameTitle']->value;?>
的世界</h2>

<p>本次，您出生在魔法阵营。</p>

<p>目标：击败侵犯领土的怪物，夺回家园</p>

<p>注意：此时退出或消极游戏将受到惩罚</p>

<?php if ($_smarty_tpl->tpl_vars['gamemode']->value==1){?>
<p>在这里你可以与你的战友商量战术</p>

<p>祝游戏愉快</p>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['gamemode']->value==2){?>
<p>游戏已经开始，请尽快加入</p>

<p>祝游戏愉快</p>
<?php }?>


</div>
<frame>
<form method="post" id="chatform" onsubmit="Showchat(<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
,this.value,<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)">
<input type="text" class="field" name="s" id="chat" placeholder="聊天" />
</form>

<div id="Chatdata" style="width:21.9%;height:40%; overflow-y:auto;background-color:<?php echo $_smarty_tpl->tpl_vars['Color6']->value;?>
;">

</div>

</frame>
<div id="Playerattendinfo" >

</div>
<div id="Playerattend" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
;">

</div>
<div id="stamp" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color2']->value;?>
;">
<p><b>这里应该会显示时间</b></p>
</div>

<div id="Announcement" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color5']->value;?>
;">
<p><?php echo $_smarty_tpl->tpl_vars['Announcement']->value;?>
</p>
</div>

<div id="Start" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color4']->value;?>
;">
<br /><br />
<img  src="Image/Sheep.gif" alt="开始游戏" />
<br />开始游戏&nbsp
</div>


<div id="Tx">
<img src="<?php echo $_smarty_tpl->tpl_vars['Tx']->value;?>
"  alt="头像"  />
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>