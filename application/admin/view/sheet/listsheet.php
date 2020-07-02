
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">
<div class="layui-card">
<div class="layui-card-header">工作表列表</div>
<div class="layui-card-body layui-text">

	<a href="{:url('admin/sheet/addsheet')}" class="layui-btn layui-btn-sm">
	<i class="layui-icon layui-icon-add-circle"></i>
		添加
	</a>

	<form action="{:url('admin/sheet/sort')}" method="post">
	<div class="layui-table-body">
	<table class="layui-table">
	<thead>
	<tr>
		<th>ID</th>
		<th>
			<button type="submit" class="layui-btn layui-btn-xs"><i class="layui-icon layui-icon-triangle-d"></i>排序</button>
		</th>
		<th>名称</th>
		<th>备注</th>
		<th>填写人身份</th>
		<th>是否启用</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	</thead>

	<tbody>

		<tr>
		<td class="layui-table-cell">0</td>
		<td class="layui-table-cell">0</td>
		<td class="layui-table-cell">备勤名单</td>
		<td class="layui-table-cell">备勤名单</td>
		<td class="layui-table-cell">队员</td>
		<td class="layui-table-cell">是</td>
		<td class="layui-table-cell">2020-06-06 00:00:00</td>
		<td class="layui-table-cell">
			<a class="layui-btn layui-btn-sm" href="{:url('admin/ready_conf/pageconf')}"><i class="layui-icon layui-icon-set-sm"></i>配置</a>
		</td>
		</tr>

		<tr>
		<td class="layui-table-cell">0</td>
		<td class="layui-table-cell">0</td>
		<td class="layui-table-cell">出队名单</td>
		<td class="layui-table-cell">出队名单</td>
		<td class="layui-table-cell">管理员</td>
		<td class="layui-table-cell">是</td>
		<td class="layui-table-cell">2020-06-06 00:00:00</td>
		<td class="layui-table-cell">
			<a class="layui-btn layui-btn-sm" href="{:url('admin/start_conf/pageconf')}"><i class="layui-icon layui-icon-set-sm"></i>配置</a>
		</td>
		</tr>

		<tr>
		<td class="layui-table-cell">0</td>
		<td class="layui-table-cell">0</td>
		<td class="layui-table-cell">记录表</td>
		<td class="layui-table-cell">记录表</td>
		<td class="layui-table-cell">队员</td>
		<td class="layui-table-cell">是</td>
		<td class="layui-table-cell">2020-06-06 00:00:00</td>
		<td class="layui-table-cell">
			<a class="layui-btn layui-btn-sm" href="{:url('admin/log_conf/pageconf')}"><i class="layui-icon layui-icon-set-sm"></i>配置</a>
		</td>
		</tr>

	{volist name="list" id="data"}

		<tr>
		<td class="layui-table-cell">{$data.id}</td>
		<td class="layui-table-cell">
			<input type="text" name="{$data.id}" value="{$data.sheet_sort}" style="text-align:center; width: 40px;">
		</td>
		<td class="layui-table-cell">{$data.sheet_name}</td>
		<td class="layui-table-cell">{$data.sheet_notes}</td>
		<td class="layui-table-cell">
			{if $data.sheet_role == 1}队员{/if}
			{if $data.sheet_role == 2}管理员{/if}
		</td>
		<td class="layui-table-cell">
			{if $data.sheet_enable == 1}是{/if}
			{if $data.sheet_enable == 0}否{/if}
		</td>
		<td class="layui-table-cell">{$data.update_time|date="Y-m-d H:i:s"}</td>
		<td class="layui-table-cell">
			<a class="layui-btn layui-btn-sm" href="{:url('admin/sheet_conf/pageconf',array('sheet_id'=>$data.id))}"><i class="layui-icon layui-icon-set-sm"></i>配置</a>

			<a class="layui-btn layui-btn-normal layui-btn-sm" href="{:url('admin/sheet/editsheet',array('id'=>$data.id))}"><i class="layui-icon layui-icon-edit"></i>编辑</a>

			<a class="layui-btn layui-btn-danger layui-btn-sm" href="{:url('admin/sheet/del',array('id'=>$data.id))}" onClick="return confirm('确认删除吗？')"><i class="layui-icon layui-icon-delete"></i>删除</a>
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
