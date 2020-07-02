
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/event/readevent',['id'=>$event.id])}">事件详情</a>
	  <a><cite>出队名单编辑</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">
出队名单编辑
<span style="color: #FF5722;">（禁止填入“ | ”，“ * ”，“ - ” 等符号）</span>
</div>

<div class="layui-card-body layui-text">
<form class="layui-form" action="{:url('admin/start/edit',['event_id'=>$event.id])}" method="post">

		<div class="layui-form-item">
		<label class="layui-form-label">不参与队员</label>
		<div class="layui-input-block">
		<?php foreach ($ready as $k1 => $v1):?>
		<input type="checkbox" name="no_team_id[{$k1}]" value="{$v1['team_id']}" title="{$v1['team_name']}"
		{if is_array($edit['no_team_id'])} 
		<?php foreach ($edit['no_team_id'] as $k_id => $v_id): ?>
			<?php if ($v_id == $v1['team_id']): ?>
				checked
			<?php endif; ?>
		<?php endforeach; ?>{/if}>
		<?php endforeach; ?>
		</div>
		</div>

	{volist name="conf" id="data"}

		{if $data.start_conf_type == 0}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
			<?php foreach ($ready as $k2 => $v2):?>
			<input type="checkbox" name="start_content[{$data.id}][{$v2['team_id']}]" value="{$v2['team_id']}" title="{$v2['team_name']}"
			{if is_array($edit['start_content'])}
				<?php if (isset($edit['start_content'][$data['id']])): ?>
				<?php foreach ($edit['start_content'][$data['id']] as $k_content => $v_content): ?>
					<?php if ($v_content == $v2['team_id']): ?>
						checked
					<?php endif; ?>
				<?php endforeach; ?>{/if}>
				<?php endif; ?>
			<?php endforeach;?>
		</div>
		</div>
		{/if}
	
		{if $data.start_conf_type == 1}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<input type="text" name="start_content[{$data.id}]" value="{if isset($edit['start_content'][$data.id])}{$edit['start_content'][$data.id]}{/if}" class="layui-input" required>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 2}
		<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<textarea type="text" name="start_content[{$data.id}]" class="layui-textarea" required>{if isset($edit['start_content'][$data.id])}{$edit['start_content'][$data.id]}{/if}</textarea>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 3}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<?php foreach ($data['start_conf_value'] as $k3 => $v3):?>
		<input type="radio" name="start_content[{$data.id}]" value="{$v3}" title="{$v3}" required>
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 4}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<?php foreach ($data['start_conf_value'] as $k4 => $v4):?>
		<input type="checkbox" name="start_content[{$data.id}][{$v4}]" value="{$v4}" title="{$v4}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 5}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-inline">
		<select name="start_content[{$data.id}]">
		<?php foreach ($data['start_conf_value'] as $k5 => $v5):?>
		<option>{$v5}</option>
		<?php endforeach;?>
		</select>
		</div>
		</div>
		{/if}
	
	{/volist}

	<div class="layui-form-item">
	<div class="layui-input-block">
	<button type="submit" class="layui-btn">确认提交</button>
	</div>
	</div>	      		

</form>
</div>

</div>
</div>

<!-- 引入js文件 -->
{include file="common/javascript"}