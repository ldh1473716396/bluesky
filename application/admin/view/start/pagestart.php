
<!-- 出队名单 -->
<div class="layui-card">
<div class="layui-card-header">
出队名单&nbsp;&nbsp;
<a class="layui-btn layui-btn-sm" href="{:url('admin/start/addstart',['event_id'=>$read.id])}">填写</a>

<a class="layui-btn layui-btn-normal layui-btn-sm" href="{:url('admin/start/editstart',['event_id'=>$read.id])}">编辑</a>

<a class="layui-btn layui-btn-danger layui-btn-sm" href="{:url('admin/start/del',['event_id'=>$read.id])}" onClick="return confirm('确认删除吗？')">删除</a>
</div>
<div class="layui-card-body layui-text">
{if $start}

<table class="layui-table">
<tbody>
	<tr><td>不参与队员：</td><td>{$start.no_team_id}</td></tr>
	{volist name='start_conf' id='conf'}
	<tr>
		<td>{$conf.start_conf_key}：</td>
		<td>
			<?php if (isset($start['start_content'][$conf['id']])): ?>
			{$start['start_content'][$conf['id']]}
			<?php endif; ?>
		</td>
	{/volist}
	<tr><td>填写时间：</td><td>{$start.create_time|date="Y-m-d H:i:s"}</td></tr>
	<tr><td>编辑时间：</td><td>{$start.update_time|date="Y-m-d H:i:s"}</td></tr>
</tbody>
</table>

{else}
<p>暂无内容</p>
{/if}
</div>
</div>