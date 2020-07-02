
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/event/readevent',['id'=>$event.id])}">事件详情</a>
	  <a><cite>{$sheet.sheet_name}编辑</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">
{$sheet.sheet_name}（{$event.event_title}）填写
<span style="color: #FF5722;">（禁止填入“ | ”，“ * ”，“ - ” 等符号）</span>
</div>

<div class="layui-card-body layui-text">
<form class="layui-form" action="{:url('admin/admin_record/edit',['event_id'=>$event.id,'sheet_id'=>$sheet.id])}" method="post">

	{volist name="conf" id="conf"}
	
		{if $conf.sheet_conf_type == 1}
		<div class="layui-form-item">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-block">
		<input type="text" name="admin_content[{$conf.id}]" value="{if isset($edit['admin_content'][$conf.id])}{$edit['admin_content'][$conf.id]}{/if}" class="layui-input" required>
		</div>
		</div>
		{/if}

		{if $conf.sheet_conf_type == 2}
		<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-block">
		<textarea type="text" name="admin_content[{$conf.id}]" class="layui-textarea" required>{if isset($edit['admin_content'][$conf.id])}{$edit['admin_content'][$conf.id]}{/if}</textarea>
		</div>
		</div>
		{/if}

		{if $conf.sheet_conf_type == 3}
		<div class="layui-form-item">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-block">
		<?php foreach ($conf['sheet_conf_values'] as $k3 => $v3):?>
		<input type="radio" name="admin_content[{$conf.id}]" value="{$v3}" title="{$v3}" required {if isset($edit['admin_content'][$conf.id]) && $edit['admin_content'][$conf.id]==$v3} checked {/if}>
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $conf.sheet_conf_type == 4}
		<div class="layui-form-item">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-block">
		<?php foreach ($conf['sheet_conf_values'] as $k4 => $v4):?>
		<input type="checkbox" name="admin_content[{$conf.id}][{$v4}]" value="{$v4}" title="{$v4}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $conf.sheet_conf_type == 5}
		<div class="layui-form-item">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-inline">
		<select name="admin_content[{$conf.id}]">
		<?php foreach ($conf['sheet_conf_values'] as $k5 => $v5):?>
		<option {if isset($edit['admin_content'][$conf.id]) && $edit['admin_content'][$conf.id]==$v5} selected {/if}>{$v5}</option>
		<?php endforeach;?>
		</select>
		</div>
		</div>
		{/if}

		{if $conf.sheet_conf_type == 6}
		<div class="layui-form-item">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-block">
		<input type="hidden" class="form-control" name="admin_content[{$conf.id}]" value="" id="base64">
		<input class="layui-input" type="file" class="form-control-file" id="image" name="image" >
		<br>
		{if isset($edit['admin_content'][$conf.id])}
		<p>原图：<img src="{$edit['admin_content'][$conf.id]}" width="100"></p>
		{/if}
		</div>
		</div>
		{/if}
	
		{if $conf.sheet_conf_type == 7}
		<div class="layui-form-item">
		<label class="layui-form-label">{$conf.sheet_conf_name}</label>
		<div class="layui-input-block">
		<input class="layui-input" type="text" class="form-control" name="admin_content[{$conf.id}]" id="address" required >
		<br>
		<div id="allmap"></div>
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

<!-- 引入图片定位js文件 -->
{include file="common/pap"}