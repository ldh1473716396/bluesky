
<!-- 管理员填表 -->
{volist name='admin_sheet' id='sheet'}

<div class="layui-card">
<div class="layui-card-header">
{$sheet.sheet_name}&nbsp;&nbsp;
<a class="layui-btn layui-btn-sm" href="{:url('admin/admin_record/addrecord',['event_id'=>$read.id,'sheet_id'=>$sheet.id])}">填写</a>

<a class="layui-btn layui-btn-normal layui-btn-sm" href="{:url('admin/admin_record/editrecord',['event_id'=>$read.id,'sheet_id'=>$sheet.id])}">编辑</a>

<a class="layui-btn layui-btn-danger layui-btn-sm" href="{:url('admin/admin_record/del',['event_id'=>$read.id,'sheet_id'=>$sheet.id])}" onClick="return confirm('确认删除吗？')">删除</a>
</div>

<div class="layui-card-body layui-text">

	{if $sheet.admin_record}

	<table class="layui-table">
	<tbody>
		<tr>
			<td>管理员：</td>
			<td>{$sheet['admin_record']['admin_name']}</td>
		</tr>
		<?php foreach ($sheet['sheet_conf'] as $k_conf => $v_conf): ?>
		<tr>
			<td>{$v_conf['sheet_conf_name']}：</td>
			<td>
			{if isset($sheet['admin_record']['admin_content'][$v_conf['id']])}

				{if strstr($sheet['admin_record']['admin_content'][$v_conf['id']], 'base64')}
					<img src="{$sheet['admin_record']['admin_content'][$v_conf['id']]}" width="50">
				{else}
					{$sheet['admin_record']['admin_content'][$v_conf['id']]}
				{/if}

			{/if}
			</td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td>填写时间：</td>
			<td>{$sheet['admin_record']['create_time']}</td>
		</tr>
		<tr>
			<td>编辑时间：</td>
			<td>{$sheet['admin_record']['update_time']}</td>
		</tr>
	</tbody>
	</table>

	{else}
	<p>暂无内容</p>
	{/if}

</div>
</div>

{/volist}