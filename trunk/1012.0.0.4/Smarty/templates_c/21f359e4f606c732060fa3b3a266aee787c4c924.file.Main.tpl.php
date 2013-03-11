<?php /* Smarty version Smarty-3.1.8, created on 2013-03-06 14:23:39
         compiled from "./Smarty/templates/Main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184904325950fea4b680b319-67764625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f359e4f606c732060fa3b3a266aee787c4c924' => 
    array (
      0 => './Smarty/templates/Main.tpl',
      1 => 1362551002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184904325950fea4b680b319-67764625',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50fea4b68adc04_08232717',
  'variables' => 
  array (
    'title' => 0,
    'Attitude' => 0,
    'Color1' => 0,
    'User' => 0,
    'Location' => 0,
    'Color6' => 0,
    'Color4' => 0,
    'Color5' => 0,
    'Color3' => 0,
    'Color2' => 0,
    'Tx' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fea4b68adc04_08232717')) {function content_50fea4b68adc04_08232717($_smarty_tpl) {?>﻿<?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_tmp1), 0);?>

<link rel="stylesheet" type="text/css" href="./JsCss/style_<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
.css" />
<script type="text/javascript" src="Chat/Chat.js"></script>
<script type="text/javascript" src="Ajax/Getroleinfo.js"></script>
<script type="text/javascript" src="Ajax/Getresinfo.js"></script>
<script type="text/javascript" src="Ajax/Getinformation.js"></script>
<script type="text/javascript" src="Ajax/Res.js"></script>
<script type="text/javascript" src="Ajax/GetSkills.js"></script>
<script type="text/javascript" src="Ajax/Synthesis.js"></script>
<script type="text/javascript" src="Ajax/Location.js"></script>
<script type="text/javascript" src="./JsCss/jquery.blockUI.js"></script>

<script type="text/javascript">
$(function(){
$('#Synthesis').click(function(){   //给box_btn绑定一个鼠标点击的事件
        $.blockUI({   //当点击事件发生时调用弹出层
        message: $('#SynthesisInterface'),    //要弹出的元素box
        css: {    //弹出元素的CSS属性
	backgroundColor: '#000',  
	width:'681px',
	height:'446px',
	left:'25%', 
	top:'10%', 
        background: '#ffffff'
            }
        });
    $('.blockOverlay').attr('title','单击关闭').click($.unblockUI);    
    //$('#SynthesisSubmit').click($.unblockUI); 

    });
});
</script>
<script type="text/javascript">
$(function(){
$('#SkillTree').click(function(){   //给box_btn绑定一个鼠标点击的事件
        $.blockUI({   //当点击事件发生时调用弹出层
        message: $('#SkilltreeInterface'),    //要弹出的元素box
        css: {    //弹出元素的CSS属性
	backgroundColor: '#000',  
	width:'49.9%',
	height:'69.2%',
	left:'25%', 
	top:'10%', 
        background: '#ffffff'
            }
        });
    $('.blockOverlay').attr('title','单击关闭').click($.unblockUI);    
    });
});
</script>
<script type="text/javascript">
$(function(){
$('#Intelligence').click(function(){   //给box_btn绑定一个鼠标点击的事件
        $.blockUI({   //当点击事件发生时调用弹出层
        message: $('#IntelligenceInterface'),    //要弹出的元素box
        css: {    //弹出元素的CSS属性
	backgroundColor: '#000',  
	width:'49.9%',
	height:'69.2%',
	left:'25%', 
	top:'10%', 
        background: '#ffffff'
            }
        });
    $('.blockOverlay').attr('title','单击关闭').click($.unblockUI);    
    });
});
</script>
<script type="text/javascript">
$(function(){
$('#Search').click(function(){   //给box_btn绑定一个鼠标点击的事件
        $.blockUI({   //当点击事件发生时调用弹出层
        message: $('#SearchInterface'),    //要弹出的元素box
        css: {    //弹出元素的CSS属性
	backgroundColor: '#000',  
	width:'49.9%',
	height:'69.2%',
	left:'25%', 
	top:'10%', 
        background: '#ffffff'
            }
        });
    $('.blockOverlay').attr('title','单击关闭').click($.unblockUI);    
    });
});
</script>
<script>
function go()
{
　　	Showinfo(<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)
	Showchat('','',<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)　　
	
}

</script>
<script>
function Showequip()
{
	Bag1H();
	Bag2H();
	Bag3H();
	Bag4H();
	Bag5H();
	DeHeS();
	DeArS();
	DeShS();
	AS();
	WS();
	TranS();
	TrS();
	document.getElementById("Tab1").style.color='#fff' ;
	document.getElementById("Tab1").style.background="<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
";
	document.getElementById("Tab2").style.color='<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
' ;
	document.getElementById("Tab2").style.background="rgb(48,10,36)";
	document.getElementById("Tab3").style.color='<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
' ;
	document.getElementById("Tab3").style.background="rgb(48,10,36)";
	SH();

}
function Showbag()
{
	DeHeH();
	DeArH();
	DeShH();
	AH();
	WH();
	TranH();
	TrH();
	Bag1S();
	Bag2S();
	Bag3S();
	Bag4S();
	Bag5S();
	document.getElementById("Tab2").style.color='#fff' ;
	document.getElementById("Tab2").style.background="<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
";
	document.getElementById("Tab1").style.color='<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
' ;
	document.getElementById("Tab1").style.background="rgb(48,10,36)";
	document.getElementById("Tab3").style.color='<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
' ;
	document.getElementById("Tab3").style.background="rgb(48,10,36)";
	SH();

}

function Showskill()
{
	DeHeH();
	DeArH();
	DeShH();
	AH();
	WH();
	TranH();
	TrH();
	Bag1H();
	Bag2H();
	Bag3H();
	Bag4H();
	Bag5H();
	SS();
	document.getElementById("Tab1").style.color='<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
' ;
	document.getElementById("Tab1").style.background="rgb(48,10,36)";
	document.getElementById("Tab2").style.color='<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
' ;
	document.getElementById("Tab2").style.background="rgb(48,10,36)";
	document.getElementById("Tab3").style.color='#fff' ;
	document.getElementById("Tab3").style.background="<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
";



}
</script>



</head>
<body style="background-color:rgb(48,10,36);color:#ffffff;" onload="Showroleinfo('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
');Showresinfo('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
');Showskills('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
');Showsyn('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
');Showlocation(<?php echo $_smarty_tpl->tpl_vars['Location']->value;?>
);Movecd();Searchcd();" >
<?php echo $_smarty_tpl->getSubTemplate ("bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>go()</script>

<form method="post" id="chatform" onsubmit="Showchat(<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
,this.value,<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)">
<input type="text"  class="field" name="s" onsubmit="Showchat(<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
,this.value,<?php echo $_smarty_tpl->tpl_vars['Attitude']->value;?>
)" id="chat" placeholder="聊天" />

</form>

<div id="Chatdata" style="width:21.8%;height:41%; overflow-y:auto;background-color:<?php echo $_smarty_tpl->tpl_vars['Color6']->value;?>
">

</div>

<div id="Roledata"  style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color4']->value;?>
;">
</div>

<div id="Resdata"  style="overflow-y:visible;background-color:<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
">
</div>

<div id="Status" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color5']->value;?>
;">

</div>

<div id="Map" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color3']->value;?>
;">

<img id="Mapimage" src="Image/Map.gif"  alt="Map"/>

<img id="L1" src="Image/BW.gif" style="z-index:12;position: absolute;
left:0.6%;top:0.6%;
" onclick="locationchange(1);" alt="BW"/>
<img id="L1H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:6.6%;top:0.6%;
"  alt="BW"/>



<img id="L2" src="Image/BW.gif" style="z-index:12;position: absolute;
left:1.6%;top:36.6%;
" onclick="locationchange(2);" alt="BW"/>
<img id="L2H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:1.6%;top:29.6%;
"  alt="BW"/>



<img id="L3" src="Image/BW.gif" style="z-index:12;position: absolute;
left:6.6%;top:84.6%;
"onclick="locationchange(3);" alt="BW"/>
<img id="L3H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:6.6%;top:78.6%;
"  alt="BW"/>



<img id="L4" src="Image/BW.gif" style="z-index:12;position: absolute;
left:15%;top:36.6%;
"onclick="locationchange(4);" alt="BW"/>
<img id="L4H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:15%;top:29.6%;
"  alt="BW"/>



<img id="L5" src="Image/BW.gif" style="z-index:12;position: absolute;
left:24%;top:14.6%;
"onclick="locationchange(5);" alt="BW"/>
<img id="L5H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:24%;top:4.6%;
"  alt="BW"/>



<img id="L6" src="Image/BW.gif" style="z-index:12;position: absolute;
left:27%;top:68.6%;
"onclick="locationchange(6);" alt="BW"/>
<img id="L6H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:27%;top:61.6%;
" alt="BW"/>



<img id="L8" src="Image/BW.gif" style="z-index:12;position: absolute;
left:48%;top:69.6%;
"onclick="locationchange(8);" alt="BW"/>
<img id="L8H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:48%;top:61.6%;
"  alt="BW"/>




<img id="L7" src="Image/BW.gif" style="z-index:12;position: absolute;
left:48.3%;top:10.6%;
"onclick="locationchange(7);" alt="BW"/>
<img id="L7H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:48.3%;top:2.6%;
"  alt="BW"/>



<img id="L12" src="Image/BW.gif" style="z-index:12;position: absolute;
left:89.3%;top:0.6%;
"onclick="locationchange(12);" alt="BW"/>
<img id="L12H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:82.3%;top:0.6%;
"  alt="BW"/>



<img id="L11" src="Image/BW.gif" style="z-index:12;position: absolute;
left:89.3%;top:40.6%;
"onclick="locationchange(11);" alt="BW"/>
<img id="L11H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:89.3%;top:31.6%;
"  alt="BW"/>



<img id="L13" src="Image/BW.gif" style="z-index:12;position: absolute;
left:92.3%;top:70.6%;
"onclick="locationchange(13);" alt="BW"/>
<img id="L13H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:92.3%;top:63.6%;
"  alt="BW"/>




<img id="L14" src="Image/BW.gif" style="z-index:12;position: absolute;
left:75.3%;top:85.6%;
"onclick="locationchange(14);" alt="BW"/>
<img id="L14H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:75.3%;top:78.6%;
"  alt="BW"/>




<img id="L10" src="Image/BW.gif" style="z-index:12;position: absolute;
left:75.3%;top:40.6%;
"onclick="locationchange(10);" alt="BW"/>
<img id="L10H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:75.3%;top:31.6%;
"  alt="BW"/>



<img id="L9" src="Image/BW.gif" style="z-index:12;position: absolute;
left:64.3%;top:40.6%;
"onclick="locationchange(9);" alt="BW"/>
<img id="L9H" src="Image/Sheep.gif" style="z-index:12;position: absolute;
left:64.3%;top:31.6%;
"  alt="BW"/>

</div>

<div id="Option" style="background-color:<?php echo $_smarty_tpl->tpl_vars['Color2']->value;?>
;">

<div id="Synthesis"  onclick="Showsyn('<?php echo $_smarty_tpl->tpl_vars['User']->value;?>
');">道具合成</div>
<div id="Intelligence">己方情报</div>
<div id=""></div>
<div id="SkillTree">全技能树</div>

</div>

<div id="Skills" style="overflow-y:visible;background-color:<?php echo $_smarty_tpl->tpl_vars['Color1']->value;?>
;z-index:0;">

</div>


<div id="Tx">
<img src="<?php echo $_smarty_tpl->tpl_vars['Tx']->value;?>
"  alt="头像"  />
</div>


<div id="SynthesisInterface" style="display:none;">
</div>
<div id="SkilltreeInterface" style="display:none;">
</div>
<div id="IntelligenceInterface" style="display:none;">
</div>

<div id="Attribution" >
<?php if ($_smarty_tpl->tpl_vars['Attitude']->value){?>
<p>魔法阵营</p>
<?php }else{ ?>
<p>科学阵营</p>
<?php }?>
</div>

<div id="Movecd">
这里应该显示移动冷却时间
</div>
<div id="Searchcd">
这里应该显示探索冷却时间
</div>
<div id="Search">
<img src="Image/Search.gif" alt="探索">
</div>
<div id="SearchInterface" style="display:none;">
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>