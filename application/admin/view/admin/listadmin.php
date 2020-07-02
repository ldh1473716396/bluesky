
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">
<div class="layui-card">
<div class="layui-card-header">管理员列表</div>
<div class="layui-card-body layui-text">
	
	<a href="{:url('admin/admin/addadmin')}" class="layui-btn layui-btn-sm">	
	<i class="layui-icon layui-icon-add-circle"></i>
		添加
	</a>

	<div class="layui-table-body">
	<table class="layui-table">
	<thead>
	<tr>
		<th>ID</th>
		<th>管理员</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	</thead>
	
	<tbody>
	{volist name="list" id="data"}
		<tr>
		<td class="layui-table-cell">{$data.id}</td>
		<td class="layui-table-cell">{$data.admin_name}</td>
		<td class="layui-table-cell">{$data.update_time|date="Y-m-d H:i:s"}</td>
			
		<td class="layui-table-cell">
		{if $data.id !== 1}
			<a href="{:url('admin/admin/editadmin_name',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
			<i class="layui-icon layui-icon-edit"></i>
			名称编辑
			</a>

			<a href="{:url('admin/admin/editadmin_password',array('id'=>$data.id))}" class="layui-btn layui-btn-warm layui-btn-sm">
			<i class="layui-icon layui-icon-password"></i>
			密码修改
			</a>

			<a href="{:url('admin/admin/del',array('id'=>$data.id))}" class="layui-btn layui-btn-danger layui-btn-sm" onClick="return confirm('确认删除吗')">
			<i class="layui-icon layui-icon-delete"></i>
			删除
			</a>
		{/if}
		</td>
		</tr>
	{/volist}
	</tbody>
	</table>
	</div>
	

</div>     
</div>
</div>

<!-- 引入js文件 -->
{include file="common/javascript"}