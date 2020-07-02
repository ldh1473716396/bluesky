
<!-- 出队名单 -->
<h4>出队名单</h4>
{if $start['start_content']}	
	{volist name='start_conf' id='conf'}
	<p>{$conf.start_conf_key}：
	<?php if (isset($start['start_content'][$conf['id']])): ?>
	{$start['start_content'][$conf['id']]}
	<?php endif; ?>
	</p>
	{/volist}
	<p>时间：{$start.update_time|date="Y-m-d H:i:s"}</p>
{else}
<p>暂无内容</p>
{/if}