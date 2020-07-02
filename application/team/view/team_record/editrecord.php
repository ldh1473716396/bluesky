{extend name="index/index"}
{block name="content"}

<div style="text-align: center; margin-top: 55px; margin-bottom: 50px;">
	<h1>{$sheet.sheet_name}编辑</h1>
	<h4>事件：{$event.event_title}</h4>
	<h5><span style="color: #FF5722;">（禁止填入“ | ”，“ * ”，“ - ” 等符号）</span><h5>
</div>
		
<div class="container" style="margin-bottom: 100px;">
<form action="{:url('team/team_record/edit',array('id'=>$edit.id))}" enctype="multipart/form-data" method="post">

{volist name="conf" id="data"}
<div class="form-group">
<label>{$data.sheet_conf_name}：</label>
	
	<!--1输入框-->
	{if $data.sheet_conf_type == 1}
	<input type="text" class="form-control" name="team_content[{$data.id}]" value="{if isset($edit['team_content'][$data.id])}{$edit['team_content'][$data.id]}{/if}" required>
	{/if}

	<!--2文本框-->
	{if $data.sheet_conf_type == 2}
	<textarea type="text" class="form-control" name="team_content[{$data.id}]" rows="3" required>{if isset($edit['team_content'][$data.id])}{$edit['team_content'][$data.id]}{/if}</textarea>
	{/if}

	<!--3单选框-->
	{if $data.sheet_conf_type == 3}
	<?php foreach($data['sheet_conf_values'] as $k3 => $v3): ?>
		<div class="form-check form-check-inline">
		<input class="form-check-input" type="radio" id="{$data.id}[{$v3}]" name="team_content[{$data.id}]"  value="{$v3}" required {if isset($edit['team_content'][$data.id]) && $edit['team_content'][$data.id]==$v3} checked {/if}>
		<label class="form-check-label" for="{$data.id}[{$v3}]">{$v3}</label>
		</div>
	<?php endforeach; ?>
	{/if}

	<!--4复选框-->
	{if $data.sheet_conf_type == 4}
	<?php foreach($data['sheet_conf_values'] as $k4 => $v4): ?>
		<div class="form-check form-check-inline">
		<input class="form-check-input" type="checkbox" id="{$v4}" name="team_content[{$data.id}][{$v4}]" value="{$v4}" {if isset($edit['team_content'][$data.id]) && $edit['team_content'][$data.id]==$v4} checked {/if}>
		<label class="form-check-label" for="{$v4}">{$v4}</label>
		</div>
	<?php endforeach; ?>
	{/if}

	<!--5下拉菜单-->
	{if $data.sheet_conf_type == 5}
		<select class="form-control" name="team_content[{$data.id}]">
		<?php foreach($data['sheet_conf_values'] as $k5 => $v5): ?>
		<option {if isset($edit['team_content'][$data.id]) && $edit['team_content'][$data.id]==$v5} selected {/if}>{$v5}</option>
		<?php endforeach; ?>
		</select>
	{/if}

	<!--6图片文件-->
	{if $data.sheet_conf_type == 6}
	<input type="hidden" class="form-control" name="team_content[{$data.id}]" value="" id="base64">
	<input type="file" class="form-control-file" id="image" name="image">
	<br>
		{if isset($edit['team_content'][$data.id])}
		<p>原图：<img src="{$edit['team_content'][$data.id]}" width="100"></p>
		{/if}
	{/if}
	
	<!--7地图定位-->
	{if $data.sheet_conf_type == 7}
	<div>
		<input type="text" class="form-control" name="team_content[{$data.id}]" id="address" required>
		<br>
		<div id="allmap"></div>
	</div>	
	{/if}	

</div>
{/volist}

	<button type="submit" class="btn btn-primary">提交</button>	      		

</form>
</div>


<!-- 引入图片定位js文件 -->
{include file="common/pap"}

{/block}

