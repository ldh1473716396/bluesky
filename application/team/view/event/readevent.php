{extend name="index/index"}
{block name="content"}
		
<div class="container" style="margin-bottom: 100px; margin-top: 55px;">

	<!-- 事件详情 -->
	<h4>事件详情</h4>
	<div class="form-group">
		<label>标题：</label>
		<p>{$read.event_title}</p>
	</div>
	{if $read['event_content']}
		{volist name='event_conf' id='conf'}
		<label>{$conf.event_conf_key}：</label>
		<p>
		<?php if (isset($read['event_content'][$conf['id']])): ?>
			{$read['event_content'][$conf['id']]}
		<?php endif; ?>	
		</p>
		{/volist}
	{else}
	<p>该事件暂未编辑</p>
	{/if}
	<hr>
	<br>

	<!-- 管理员填表 -->
	{volist name='admin_sheet' id='sheet'}
		{include file="admin_record/pagerecord"}
	<hr>
	<br>
	{/volist}

	<!-- 备勤名单 -->
	{include file="ready/listready"}	
	<hr>
	<br>

	<!-- 出队名单 -->
	{include file="start/pagestart"}
	<hr>
	<br>

	<!-- 记录表 -->
	{include file="log/listlog"}
	<hr>
	<br>

	<!-- 队员填表 -->
	{volist name='team_sheet' id='sheet'}
		{include file="team_record/listrecord"}
	<hr>
	<br>
	{/volist}

</div>

{/block}
