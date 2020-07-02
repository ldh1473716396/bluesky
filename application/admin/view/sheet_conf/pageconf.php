
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/sheet/listsheet')}">工作表列表</a>
	  <a><cite>工作表配置</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">{$sheet.sheet_name}--配置</div>
<div class="layui-card-body layui-text">

	<div>	
		<a href="{:url('admin/sheet_conf/addconf',array('sheet_id'=>$sheet.id,'sheet_name'=>$sheet.sheet_name))}" class="layui-btn layui-btn-sm">
		<i class="layui-icon layui-icon-add-circle"></i>
			添加
		</a>
	</div>

	<br>

	{if count($confs) !== 0}
	<form class="layui-form" action="{:url('admin/sheet_conf/sort',array('sheet_id'=>$sheet.id))}" method="post">
	
		<div>
			<button type="submit" class="layui-btn layui-btn-sm">
				<i class="layui-icon layui-icon-down"></i>
				更新排序
			</button>
		</div>

	<hr>


		{volist name="confs" id="data"}

		<div>
		<input type="text" name="{$data.id}" value="{$data.sheet_conf_sort}" style="text-align:center; width: 40px; margin-right: 10px;">

		<a href="{:url('admin/sheet_conf/editconf',array('conf_id'=>$data.id,'sheet_name'=>$sheet.sheet_name))}" class="layui-btn layui-btn-normal layui-btn-sm">编辑</a>

		<a href="{:url('admin/sheet_conf/del',array('conf_id'=>$data.id,'sheet_id'=>$sheet.id))}" onClick="return confirm('确认删除吗？')" class="layui-btn layui-btn-danger layui-btn-sm">删除</a>
		</div>

		<br>
			
		{if $data.sheet_conf_type == 1}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-block">
		<input type="text" class="layui-input">
		</div>
		</div>
		{/if}

		{if $data.sheet_conf_type == 2}
		<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-block">
		<textarea type="text" class="layui-textarea"></textarea>
		</div>
		</div>
		{/if}

		{if $data.sheet_conf_type == 3}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-block">
		<?php foreach ($data['sheet_conf_values'] as $k3 => $v3):?>
		<input type="radio" name="radio" title="{$v3}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.sheet_conf_type == 4}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-block">
		<?php foreach ($data['sheet_conf_values'] as $k4 => $v4):?>
		<input type="checkbox" name="checkbox" title="{$v4}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.sheet_conf_type == 5}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-inline">
		<select>
		<?php foreach ($data['sheet_conf_values'] as $k5 => $v5):?>
		<option>{$v5}</option>
		<?php endforeach;?>
		</select>
		</div>
		</div>
		{/if}

		{if $data.sheet_conf_type == 6}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-block">
		<input type="file" class="layui-input">
		</div>
		</div>
		{/if}
		
		{if $data.sheet_conf_type == 7}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.sheet_conf_name}</label>
		<div class="layui-input-block">
		<input type="text" class="layui-input">
		</div>
		</div>	
		{/if}	

		<hr>
		{/volist}      		
</div>
	</form>
	{/if}
</div>

</div>
</div>
</div>

<!-- 引入js文件 -->
{include file="common/javascript"}

