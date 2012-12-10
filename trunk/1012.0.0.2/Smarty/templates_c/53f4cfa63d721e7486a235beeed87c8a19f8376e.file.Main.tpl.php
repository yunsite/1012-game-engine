<?php /* Smarty version Smarty-3.1.8, created on 2012-12-10 21:26:32
         compiled from "./Smarty/templates\Main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:484350c4b1b7e629f6-24587569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53f4cfa63d721e7486a235beeed87c8a19f8376e' => 
    array (
      0 => './Smarty/templates\\Main.tpl',
      1 => 1355145984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '484350c4b1b7e629f6-24587569',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50c4b1b7ed82a3_26822443',
  'variables' => 
  array (
    'title' => 0,
    'Attitude' => 0,
    'User' => 0,
    'Tx' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c4b1b7ed82a3_26822443')) {function content_50c4b1b7ed82a3_26822443($_smarty_tpl) {?>﻿<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_tmp1), 0);?>

<link rel="stylesheet" type="text/css" href="./JsCss/style_<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
.css" />
<script type="text/javascript" src="Chat/Chat.js"></script>
<script type="text/javascript" src="Ajax/Getroleinfo.js"></script>
<script type="text/javascript" src="Ajax/Getresinfo.js"></script>
<script type="text/javascript" src="Ajax/Getinformation.js"></script>
<script>
function go()
{
　　	Showinfo(<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)
	Showchat('','',<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)　　
	Showroleinfo('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
')
	Showresinfo('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
')
	
}

</script>


</head>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2){?>
<body style="background-color:rgb(48,10,36);color:#ffffff;" >
<?php }else{ ?>
<body style="background-color:rgb(237,115,66);color:#000000;">
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>go()</script>

<form method="post" id="chatform" onsubmit="Showchat(<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
,this.value,<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)">
<input type="text" class="field" name="s" onsubmit="Showchat(<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
,this.value,<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)" id="chat" placeholder="聊天" />

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
<img src="<?php echo $_smarty_tpl->tpl_vars['Tx']->value;?>
"  alt="头像"  />
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>