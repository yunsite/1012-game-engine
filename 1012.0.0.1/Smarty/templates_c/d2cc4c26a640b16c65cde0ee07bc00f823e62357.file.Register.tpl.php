<?php /* Smarty version Smarty-3.1.8, created on 2012-12-06 18:27:54
         compiled from "./Smarty/templates\Register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:386650c06b526c9bd8-41164516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2cc4c26a640b16c65cde0ee07bc00f823e62357' => 
    array (
      0 => './Smarty/templates\\Register.tpl',
      1 => 1354789671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '386650c06b526c9bd8-41164516',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50c06b52712626_05564120',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c06b52712626_05564120')) {function content_50c06b52712626_05564120($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_tmp1), 0);?>

</head>
<body>

<form id="Register" align="center" action="CheckRegister.php" method="post">
<p>注册</p>
用户名
<input type="text" name="user" maxlength="20" />
<br />
<br />
密码&nbsp&nbsp
<input type="password" name="password" maxlength="15" />
<br />
<br />
邮箱&nbsp&nbsp
<input type="text" name="email" maxlength="30" />
<br />
<br />
二级密码&nbsp&nbsp
<input type="password" name="safe" maxlength="15" />
<br />
<br />


<button type="submit" class="button"  >提交&nbsp&nbsp</button>

</form>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>