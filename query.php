<?php
include("./include/common.php");
if(!isset($_GET['qq'])) {
	header("Location: http://".$_SERVER['SERVER_NAME']);
}else{
	$qq=$_GET['qq'];
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
    <title><?php echo $sitename;?>-<?php echo $qq;?></title>
	<meta name="keywords" content="<?php echo $qq;?>,<?php echo $keywords?>"/>
	<meta name="description" content="<?php echo $description?>"/>
    <!-- Bootstrap -->
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
$str = "123456789abcd";
$bj .= $str[mt_rand(0, strlen($str)-1)];
?>
<body background="./images/bj/bj-<?php echo $bj;?>.jpg">
<div class="container">    <div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
          <li role="presentation" class="active"><a href="./">查询</a></li>
          <li role="presentation"><a href="http://wpa.qq.com/msgrd?v=3&uin=2146881762&site=qq&menu=yes" target="_blank">举报骗子</a></li>
        </ul>
        <h3 class="text-muted" align="left"><font color="#8968CD">网络骗子查询</font></h3>
     </div><hr>
	 <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">公告栏</h3></div>
		<ul class="list-group">
		<li class="list-group-item">网络骗子多，套路深，交易需小心</li>
		<li class="list-group-item">黑名单等级分为1、2、3，1-低、2-中、3-高</li>
		<li class="list-group-item">白菜QQ 2146881762 举报请提供有效证据！</li>
		</ul>
      </div>
	 <h3 class="form-signin-heading">输入QQ查询</h3>
	 <form action="./" class="form-sign" method="post">
	 <input type="text" class="form-control" name="qq" placeholder="输入QQ" value=""><br>
	 <input type="submit" class="btn btn-primary btn-block" value="点击查询"><br/>
	 <p style="text-align:left">
<?php
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
		<label><font color="red">请停止任何交易！</font></label>';
?>
<br><label>分享结果：</label>
<input type="text" style="width:350px;" class="shareUrl" onclick="this.select()" value="http://<?php echo $_SERVER['SERVER_NAME'];?>/qq-<?php echo $qq;?>.html">
<?php
	}else{
		echo '<label><font color="green">该QQ尚未被录入，但不能代表此QQ是绝对安全！！</font></label>';
	}
}
$DB->close();
?>
	 </p><hr><div class="container-fluid">
  <a href="http://wpa.qq.com/msgrd?v=3&uin=2146881762&site=qq&menu=yes" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-erase"></span> 举报</a>
  <a href="./siteadmin/" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-user"></span> 管理</a>
</div>
<p style="text-align:center">
<br><label>友情链接：</label><a href="http://c.zandec.top/" target="_blank">白菜博客 </a><label>|</label> <a href="http://9hu.win/" target="_blank">白菜秒赞 </a>
<br>&copy; Powered by <a href="http://c.zandec.top/" target="_blank">白菜</a>
</p></div>
</body>
</html>