<?php /* Smarty version Smarty-3.1.8, created on 2012-12-19 14:22:54
         compiled from "./Smarty/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:865850d15d3e20a384-87678087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1ff46dd068b9a1a3d27cf17a380edc21b290b98' => 
    array (
      0 => './Smarty/templates\\index.tpl',
      1 => 1355243429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '865850d15d3e20a384-87678087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'op1' => 0,
    'op2' => 0,
    'op3' => 0,
    'op4' => 0,
    'op5' => 0,
    'op6' => 0,
    'op7' => 0,
    'op8' => 0,
    'Authority' => 0,
    'LogOn' => 0,
    'gamemode' => 0,
    'User' => 0,
    'chapter' => 0,
    'loop' => 0,
    'time' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50d15d3e638bc5_51260767',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50d15d3e638bc5_51260767')) {function content_50d15d3e638bc5_51260767($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_tmp1), 0);?>

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
	<?php if ($_smarty_tpl->tpl_vars['LogOn']->value==1){?>
	<div id="access2" class="menu"><ul><li class="current_page_item"><a href="UnLogOn.php" title="退出" >退出</a></li><li class="page_item page-item-2"></li></ul></div>
	<?php }else{ ?>
	<div id="access2" class="menu"><ul><li class="current_page_item"><a href="Register.php" title="注册" >注册</a></li><li class="page_item page-item-2"></li></ul></div>
	<?php }?>
</nav>
<br />
<br />
<br />
<br />
<br />
<br />
<div class="IndexInfo">

<?php if ($_smarty_tpl->tpl_vars['gamemode']->value==2){?>
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
欢迎你，<?php echo $_smarty_tpl->tpl_vars['User']->value;?>

<br />
<br />
<?php }?>
现在是<?php echo $_smarty_tpl->tpl_vars['chapter']->value;?>

<br />
<br />
第<?php echo $_smarty_tpl->tpl_vars['loop']->value;?>
回
<br />
<br />
游戏已进行<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
分钟
<br />
<br />
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
<button type="button"  onclick="window.location.href='GameReady.php';">
开始游戏
</button>
<?php }else{ ?>
<button type="button" id="LogOn">
登陆
</button>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['gamemode']->value==0){?>
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
欢迎你，<?php echo $_smarty_tpl->tpl_vars['User']->value;?>

<br />
<br />
<?php }?>
游戏停止中，散散步喝杯水，满怀期待之心刷新页面，也许有效。
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['gamemode']->value==1){?>
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
欢迎你，<?php echo $_smarty_tpl->tpl_vars['User']->value;?>

<br />
<br />
<?php }?>
现在是<?php echo $_smarty_tpl->tpl_vars['chapter']->value;?>

<br />
<br />
第<?php echo $_smarty_tpl->tpl_vars['loop']->value;?>
回
<br />
<br />
游戏正在准备中
<br />
<br />
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
<button type="button" onclick="window.location.href='GameReady.php';">
开始游戏
</button>
<?php }else{ ?>
<button type="button" id="LogOn">
登陆
</button>
<?php }?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['gamemode']->value==3){?>
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
欢迎你，<?php echo $_smarty_tpl->tpl_vars['User']->value;?>

<br />
<br />
<?php }?>
现在是<?php echo $_smarty_tpl->tpl_vars['chapter']->value;?>

<br />
<br />
第<?php echo $_smarty_tpl->tpl_vars['loop']->value;?>
回
<br />
<br />
游戏已进行<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
分钟
<br />
<br />
<?php if ($_smarty_tpl->tpl_vars['LogOn']->value){?>
很抱歉，人数已满，也许正是你了解我们更多的机会。
<?php }else{ ?>
<button type="button" id="LogOn">
登陆
</button>
<?php }?>
<?php }?>

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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>