
<!-- 引入css文件 -->
{include file="common/css"}



<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/team/listteam')}">队员列表</a>
	  <a><cite>队员添加</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">队员添加</div>
<div class="layui-card-body layui-text">
		
<form action="{:url('admin/team/add')}" method="post">
	
	<div class="layui-form">
		<div class="layui-form-item">
		<label class="layui-form-label">队员名称</label>
		<div class="layui-input-inline">
		<input type="text" name="team_name" class="layui-input" required>
		</div>
		</div>

		<div class="layui-form-item">
		<label class="layui-form-label">队员密码</label>
		<div class="layui-input-inline">
		<input type="password" name="team_password" class="layui-input" required>
		</div>
		</div>

		<div class="layui-form-item">
		<div class="layui-input-block">
		<button type="submit" class="layui-btn">确认提交</button>
		</div>
		</div>
	</div>      		

</form>

</div>     
</div>
</div>

<!-- 引入js文件 -->
{include file="common/javascript"}
