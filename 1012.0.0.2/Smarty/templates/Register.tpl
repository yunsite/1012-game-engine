{config_load file="test.conf" section="setup"}
{include file="header.tpl" title={$title}}
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

{include file="footer.tpl"}