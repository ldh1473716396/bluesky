
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">
<div class="layui-card">
<div class="layui-card-header">事件列表</div>
<div class="layui-card-body layui-text">

	<a href="{:url('admin/event/addevent')}" class="layui-btn layui-btn-sm">
	<i class="layui-icon layui-icon-add-circle"></i>
		添加
	</a>		
	
	<form action="{:url('admin/event/state')}" method="post">
	<div class="layui-table-body">
	<table class="layui-table">
	<thead>
	<tr>
		<th>ID</th>
		<th>标题</th>
		<th>
		状态
		<button type="submit" class="layui-btn layui-btn-xs"><i class="layui-icon layui-icon-triangle-d"></i>更新</button>
		</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	</thead>

	<tbody>
	{volist name="list" id="data"}
		<tr>
		<td class="layui-table-cell">{$data.id}</td>
		<td class="layui-table-cell"><a href="{:url('admin/event/readevent',array('id'=>$data.id))}">{$data.event_title}</a></td>

		<td class="layui-table-cell">
			<select name="{$data.id}">
	        <option value="0" {if $data.event_state == 0} selected {/if}>开始</option>
	        <option value="1" {if $data.event_state == 1} selected {/if}>结束</option>
	      	</select>
		</td>

		<td class="layui-table-cell">{$data.update_time|date="Y-m-d H:i:s"}</td>

		<td class="layui-table-cell">
			<a class="layui-btn layui-btn-normal layui-btn-sm" href="{:url('admin/event/editevent',array('id'=>$data.id))}"><i class="layui-icon layui-icon-edit"></i>编辑</a>

			<a class="layui-btn layui-btn-danger layui-btn-sm" href="{:url('admin/event/del',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')"><i class="layui-icon layui-icon-delete"></i>删除</a>
		</td>
		</tr>
	{/volist}
	</tbody>
	</table>
	</div>
	</form>

</div>
</div>
</div>


<!-- 引入js文件 -->
{include file="common/javascript"}
