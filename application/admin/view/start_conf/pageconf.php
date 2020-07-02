
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/sheet/listsheet')}">工作表</a>
	  <a><cite>出队名单配置</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">出队名单配置</div>

<div class="layui-card-body layui-text">

	<div>
	<a href="{:url('admin/start_conf/addconf')}" class="layui-btn layui-btn-sm">
	<i class="layui-icon layui-icon-add-circle"></i>
		添加
	</a>
	</div>

	<br>

	<form class="layui-form" action="{:url('admin/start_conf/sort')}" method="post">

		<div>
			<button type="submit" class="layui-btn layui-btn-sm">
				<i class="layui-icon layui-icon-down"></i>
				更新排序
			</button>
		</div>

		<br>

		<div class="layui-form-item">
		<label class="layui-form-label">不参与队员</label>
		<div class="layui-input-block">
		<input type="checkbox" name="checkbox" title="根据事件的备勤名单显示队员名称" checked>
		</div>
		</div>

		<hr>

		{volist name="conf" id="data"}

		<div>
			<input type="text" name="{$data.id}" value="{$data.start_conf_sort}" style="text-align:center; width: 40px; margin-right: 10px;">

			<a href="{:url('admin/start_conf/editconf',array('id'=>$data.id))}" class="layui-btn layui-btn-normal layui-btn-sm">
				编辑
			</a>

			<a href="{:url('admin/start_conf/del',array('id'=>$data.id))}" class="layui-btn layui-btn-danger layui-btn-sm">
				删除
			</a>
		</div>

		<br>
		
		{if $data.start_conf_type == 0}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<input type="checkbox" name="checkbox" title="根据事件的备勤名单显示队员名称" checked>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 1}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<input type="text" class="layui-input">
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 2}
		<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<textarea type="text" class="layui-textarea"></textarea>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 3}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<?php foreach ($data['start_conf_value'] as $k3 => $v3):?>
		<input type="radio" name="radio" title="{$v3}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 4}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-block">
		<?php foreach ($data['start_conf_value'] as $k4 => $v4):?>
		<input type="checkbox" name="checkbox" title="{$v4}">
		<?php endforeach;?>
		</div>
		</div>
		{/if}

		{if $data.start_conf_type == 5}
		<div class="layui-form-item">
		<label class="layui-form-label">{$data.start_conf_key}</label>
		<div class="layui-input-inline">
		<select>
		<?php foreach ($data['start_conf_value'] as $k5 => $v5):?>
		<option>{$v5}</option>
		<?php endforeach;?>
		</select>
		</div>
		</div>
		{/if}
		
		<hr>

		{/volist}
	</form> 		


</div>
</div>
</div>


<!-- 引入js文件 -->
{include file="common/javascript"}


