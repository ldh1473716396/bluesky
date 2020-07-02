
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<!-- 面包屑 -->
	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/event/listevent')}">事件列表</a>
	  <a><cite>事件详情</cite></a>
	</span>
	</div>
	</div>
	
	<!-- 事件详情 -->
	<div class="layui-card">
	<div class="layui-card-header">事件详情</div>
	<div class="layui-card-body layui-text">
	<p>标题：{$read.event_title}</p>

	{if $read['event_content']}

		<table class="layui-table">
		<tbody>
			{volist name='event_conf' id='conf'}
			<tr>

				<td>{$conf.event_conf_key}：</td>

				<td><?php if (isset($read['event_content'][$conf['id']])): ?>
				{$read['event_content'][$conf['id']]}
				<?php endif; ?></td>
			</tr>
			{/volist}

			<tr>
				<td>事件添加时间：</td>
				<td>{$read.create_time|date="Y-m-d H:i:s"}</td>
			</tr>
			<tr>
				<td>事件编辑时间：</td>
				<td>{$read.update_time|date="Y-m-d H:i:s"}</td>
			</tr>
		</tbody>
		</table>
	
	{else}
	<p>暂时未编辑</p>
	{/if}
	
	</div>
	</div>

	<!-- 管理员填表 -->
	{include file="admin_record/pagerecord"}
	
	<!-- 备勤名单 -->
	{include file="ready/listready"}
	
	<!-- 出队名单 -->
	{include file="start/pagestart"}

	<!-- 记录表 -->
	{include file="log/listlog"}

	<!-- 队员填表记录列表 -->
	{include file="team_record/listrecord"}

</div>

<!-- 引入js文件 -->
{include file="common/javascript"}
