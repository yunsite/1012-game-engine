<?php /* Smarty version Smarty-3.1.8, created on 2012-12-06 13:52:56
         compiled from "./Smarty/templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:663350c032446201e9-19100058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edd9efde59f539ea007f21c25df767a214d97c28' => 
    array (
      0 => './Smarty/templates\\login.tpl',
      1 => 1354773158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '663350c032446201e9-19100058',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50c03244688ee2_36834851',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c03244688ee2_36834851')) {function content_50c03244688ee2_36834851($_smarty_tpl) {?>﻿<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_tmp1), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page" class="hfeed">
<header id="branding" role="banner">
	<hgroup>
		<h1 style="font-family: seigetsuRegular" id="site-title"><a>世界第一总督大人</a></h1>
		<h2 id="site-description">Merlin君的魔术工房</h2>
	</hgroup>
<br />
<form align="center" action="../checklg.php" method="post">
用户名
<input type="text" name="user" maxlength="10" />
<br />
<br />
密码&nbsp&nbsp
<input type="password" name="password" maxlength="10" />
<br />
<br />

<button type="submit" class="button" >提交&nbsp&nbsp</button>
<button type="button" class="button" ><a href="index.php">返回&nbsp&nbsp</a></button>

</form>
<br />
<br />
<br />
<br />
</div>












<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>