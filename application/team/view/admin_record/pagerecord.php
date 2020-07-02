
<!-- 管理员填表 -->
<h4>{$sheet.sheet_name}</h4>

{if $sheet.admin_record}

	<?php foreach ($sheet['sheet_conf'] as $k_conf => $v_conf): ?>
		<p>
		{$v_conf['sheet_conf_name']}：
		{if isset($sheet['admin_record']['admin_content'][$v_conf['id']])}

			{if strstr($sheet['admin_record']['admin_content'][$v_conf['id']], 'base64')}
				<img src="{$sheet['admin_record']['admin_content'][$v_conf['id']]}" width="50">
			{else}
				{$sheet['admin_record']['admin_content'][$v_conf['id']]}
			{/if}

		{/if}
		</p>
	<?php endforeach; ?>
	<p>填写时间：{$sheet['admin_record']['create_time']}</p>
	<p>编辑时间：{$sheet['admin_record']['update_time']}</p>
	
{else}
<p>暂无内容</p>
{/if}