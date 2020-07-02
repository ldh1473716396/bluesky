
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">
<div class="layui-card">
<div class="layui-card-header">队员列表</div>
<div class="layui-card-body layui-text">

	<a href="{:url('admin/team/addteam')}" class="layui-btn layui-btn-sm">
	<i class="layui-icon layui-icon-add-circle"></i>
		添加
	</a>

	<div class="layui-table-body">
	<table class="layui-table">
	<thead>
	<tr>
		<th>ID</th>
		<th>队员名称</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	</thead>

	<tbody>
	{volist name="list" id="data"}
		<tr>
		<td class="layui-table-cell">{$data.id}</td>
		<td class="layui-table-cell">{$data.team_name}</td>
		<td class="layui-table-cell">{$data.update_time|date="Y-m-d H:i:s"}</td>
		<td class="layui-table-cell">
			<a href="{:url('admin/team/del',array('id'=>$data.id))}" class="layui-btn layui-btn-danger layui-btn-sm" onClick="return confirm('确认删除吗')"><i class="layui-icon layui-icon-delete"></i>删除</a>
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
