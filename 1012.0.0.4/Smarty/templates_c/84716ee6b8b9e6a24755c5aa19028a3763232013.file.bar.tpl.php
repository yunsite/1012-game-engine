<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 22:33:51
         compiled from "./Smarty/templates/bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64732134450fea34f6360d4-13463554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84716ee6b8b9e6a24755c5aa19028a3763232013' => 
    array (
      0 => './Smarty/templates/bar.tpl',
      1 => 1355066396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64732134450fea34f6360d4-13463554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'op1' => 0,
    'op2' => 0,
    'op3' => 0,
    'op4' => 0,
    'op5' => 0,
    'op6' => 0,
    'op7' => 0,
    'op8' => 0,
    'Authority' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50fea34f653c70_16375001',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fea34f653c70_16375001')) {function content_50fea34f653c70_16375001($_smarty_tpl) {?>﻿<nav id="bar" role="navigation">
	<div class="menu"><ul><li class="current_page_item"><a href="index.php" title="首页">首页</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="introduction.php" title="简介"><?php echo $_smarty_tpl->tpl_vars['op1']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Tutorial.php" title="教程"><?php echo $_smarty_tpl->tpl_vars['op2']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Account.php" title="账户"><?php echo $_smarty_tpl->tpl_vars['op3']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="History.php" title="历史"><?php echo $_smarty_tpl->tpl_vars['op4']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Help.php" title="帮助"><?php echo $_smarty_tpl->tpl_vars['op5']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="Wiki.php" title="百科"><?php echo $_smarty_tpl->tpl_vars['op6']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="BBS.php" title="论坛"><?php echo $_smarty_tpl->tpl_vars['op7']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<div class="menu"><ul><li class="current_page_item"><a href="About.php" title="关于"><?php echo $_smarty_tpl->tpl_vars['op8']->value;?>
</a></li><li class="page_item page-item-2"></li></ul></div>
	<?php if ($_smarty_tpl->tpl_vars['Authority']->value){?>
	<div class="menu"><ul><li class="current_page_item"><a href="Admin.php" title="后台">后台</a></li><li class="page_item page-item-2"></li></ul></div>
	<?php }?>
</nav>

<?php }} ?>