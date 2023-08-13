<?php
include("./include/common.php");
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title><?php echo $sitename;?>-GameOn</title>
	<meta name="keywords" content="<?php echo $keywords;?>"/>
	<meta name="description" content="<?php echo $description;?>"/>
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	body{
		margin: 0 auto;
		text-align: center;
	}
	.container {
	  max-width: 580px;
	  padding: 15px;
	  margin: 0 auto;
	}
	</style>
</head>
<?php
$sum=$DB->count("SELECT count(*) from black_list WHERE 1");
$str = "123456789abcd";
$bj .= $str[mt_rand(0, strlen($str)-1)];
$webb = '【本站域名】：'.$_SERVER['SERVER_NAME']
?>
<body background="./images/bj/bj-<?php echo $bj;?>.jpg">
<div class="container">    <div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
          <li role="presentation" class="active"><a href="./">查询</a></li>
          <li role="presentation"><a href="http://wpa.qq.com/msgrd?v=3&uin=407413685&site=qq&menu=yes" target="_blank">举报骗子</a></li>
        </ul>
        <h3 class="text-muted" align="left"><font color="#8968CD"><?php echo $sitename?></font></h3>
     </div><hr>
	 <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">公告栏</h3></div>
		<ul class="list-group">
	
		<li class="list-group-item">一旦被收录资料，骗子无处可逃！欢迎小伙伴来举报！举报需要提供有效证据</li>
		<li class="list-group-item"><span style="color: rgb(1, 170, 237);"><span style="border-width: initial;"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=407413685&amp;site=qq&amp;menu=yes" target="_blank" style="color: rgb(1, 170, 237); text-decoration-line: none;"><img border="0" src="2.png" alt="QQ" title="QQ" style="display: inline-block; vertical-align: middle; border: none;"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=407413685&amp;site=qq&amp;menu=yes" target="_blank" style="color: rgb(1, 170, 237); text-decoration-line: none;"><strong>举报请点我</strong></a></a></span></span>或者发详细资料送邮件至----407413685@qq.com</li>
		 <li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b>后台统计：</b> 已收录:<?=$sum?>个黑名单用户<span style="color: rgb(0, 134, 139);"><?=$webb?></li>
		
<li class="list-group-item">请务必保证发送资料的真实性！不会放过骗子也不会冤枉好人-请务必做个诚信人！ </li>
</p><p></p><b><a class="btn btn-block btn-danger" data-toggle="collapse" data-parent="#accordion2" href="#faq1" aria-expanded="false">关于骗子举报成功秘籍</a></b><div id="faq1" class="accordion-body collapse" style="height: 0px;" aria-expanded="false"><h5>举报请把有效资料整理好，可以通过快速QQ联系，或者通过电子邮件方式联系。晚上通常我是0点才睡，所以举报申请，我都会及时处理的<p></p></h5></div><p></p>
</marquee></a>
<p class="bg-primary" style="background-color:#FF9900;padding: 3px;"><img border="0" width="32" src="1.gif" />如果是被他人恶意举报，QQ被恶意收录，请联系解除</p
<ul class="list-group">
  <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?=$date?></li>
		</ul>
      </div>
	 <h3 class="form-signin-heading">输入【QQ-QQ群-手机号】查询</h3>
	 <form action="" class="form-sign" method="post">
	 <input type="text" class="form-control" name="qq" placeholder="请输入查询【QQ-QQ群-手机号】" value=""><br>
	 <input type="submit" class="btn btn-primary btn-block" value="点击查询"><br/>
	 <p style="text-align:left">
<?php
if($qq=$_POST['qq']) {
	$qq=$_POST['qq'];
	$row=$DB->get_row("SELECT * FROM black_list WHERE qq='$qq' limit 1");
	echo '<label>查询QQ：'.$qq.'</label><br>';
	if($row) {
		echo '
		<label>黑名单等级：</label>
		<font color="blue">'.$row['level'].'级</font><br>
		<label>黑名单时间：</label>
		<font color="blue">'.$row['date'].'</font><br>
		<label>黑名单原因：</label>
		<font color="blue">'.$row['note'].'</font><br>
		<label><font color="red">请停止任何交易！等级越高危险系数越高！</font></label>';
?>
<br><label>分享结果：</label>
<input type="text" style="width:350px;" class="shareUrl" onclick="this.select()" value="http://<?php echo $_SERVER['SERVER_NAME'];?>/qq-<?php echo $qq;?>.html">
<?php
	}else{
		echo '<label><font color="green">该联系方式尚未被录入！但是我们不能保证交易绝对安全</font></label>';
	}
}
$DB->close();
?>
	 </p><hr><div class="container-fluid">
  <a href="http://wpa.qq.com/msgrd?v=3&uin=407413685&site=qq&menu=yes" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-erase"></span> 举报</a>
</div>
<p style="text-align:center">
<br><label>友情链接：</label><a href="http://www.baidu.com" target="_blank">GameOn </a><label>|</label> <a href="http://www.baidu.com" target="_blank">日韩欧美游戏资讯 </a>
<br>&copy; Powered by <a href="http://www.baidu.com" target="_blank">Game</a>
</p></div>
</body>
</html>