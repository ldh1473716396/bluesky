
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/event/listevent')}">事件列表</a>
	  <a><cite>事件添加</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">
事件添加
<span style="color: #FF5722;">（禁止填入“ | ”，“ * ”，“ - ” 等符号）</span>
</div>

<div class="layui-card-body layui-text">
<form class="layui-form" action="{:url('admin/event/add')}" method="post">

	<div class="layui-form-item">
	<label class="layui-form-label">标题</label>
	<div class="layui-input-block">
	<input type="text" name="event_title" class="layui-input" required>
	</div>
	</div>

	{volist name="conf" id="data"}
	
		{if $data.event_conf_type == 1}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.event_conf_key}</label>
		<div class="layui-input-block">
		<input type="text" name="event_content[{$data.id}]" class="layui-input" >
		</div>
		</div>
		{/if}

		{if $data.event_conf_type == 2}
		<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">{$data.event_conf_key}</label>
		<div class="layui-input-block">
		<textarea type="text" name="event_content[{$data.id}]" class="layui-textarea" ></textarea>
		</div>
		</div>
		{/if}

		{if $data.event_conf_type == 3}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.event_conf_key}</label>
		<div class="layui-input-block">
		<?php foreach ($data['event_conf_value'] as $k3 => $v3):?>
		<input type="radio" name="event_content[{$data.id}]" value="{$v3}" title="{$v3}" required>
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.event_conf_type == 4}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.event_conf_key}</label>
		<div class="layui-input-block">
		<?php foreach ($data['event_conf_value'] as $k4 => $v4):?>
		<input type="checkbox" name="event_content[{$data.id}][{$v4}]" value="{$v4}" title="{$v4}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.event_conf_type == 5}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.event_conf_key}</label>
		<div class="layui-input-inline">
		<select name="event_content[{$data.id}]">
		<?php foreach ($data['event_conf_value'] as $k5 => $v5):?>
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
