
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>蓝天救援队后台</title>

  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- 引入css文件 -->
	{include file="common/css"}
 
</head>

<body class="layui-layout-body">
  
	<div id="LAY_app">
	<div class="layui-layout layui-layout-admin">
			
		<!-- 头部区域 -->
		{include file="common/header"}
	  
		<!-- 侧边菜单 -->
		{include file="common/side"}

		<!-- 页面标签 -->
		{include file="common/tabs"}
	        
		<!-- 主体内容 -->
		<div class="layui-body" id="LAY_app_body">
		<div class="layadmin-tabsbody-item layui-show">
		{block name='content'}
			<div class="layui-fluid">
			<div class="layui-card">
				<div class="layui-card-header">首页</div>
				<div class="layui-card-body layui-text">欢迎来到蓝天救援队后台</div>     
			</div>
			</div>
		{/block}
		</div>
		</div>

		<!-- 辅助元素，一般用于移动设备下遮罩 -->
		<div class="layadmin-body-shade" layadmin-event="shade"></div>

	</div>
	</div>


	<!-- 引入js文件 -->
	{include file="common/javascript"}

</body>
</html>


