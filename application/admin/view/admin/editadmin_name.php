
<!-- 引入css文件 -->
{include file="common/css"}
<style>
.layui-form-label{
	width: 84px;
}
</style>

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/admin/listadmin')}">管理员列表</a>
	  <a><cite>管理员名称编辑</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">管理员名称编辑</div>
<div class="layui-card-body layui-text">
	
<form action="{:url('admin/admin/edit',array('id'=>$id))}" method="post">
	<div class="layui-form">
		<div class="layui-form-item">
		<label class="layui-form-label">管理员名称</label>
		<div class="layui-input-inline">
		<input type="text" name="admin_name" value="{$admin_name}" class="layui-input" required>
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
