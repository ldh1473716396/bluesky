
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/log_conf/pageconf')}">记录表配置</a>
	  <a><cite>记录表配置编辑</cite></a>
	</span>
	</div>
	</div>

	<div class="layui-card">
	<div class="layui-card-header">记录表配置编辑</div>
	<div class="layui-card-body layui-text">

	<form class="layui-form" action="{:url('admin/log_conf/edit',array('id'=>$edit.id))}" method="post">
	
	<div class="layui-form-item">
	<label class="layui-form-label">配置类型</label>
	<div class="layui-input-inline">
	<select name="log_conf_type" lay-filter="conf_type" id="conf_type">
	<option value="1" {if $edit.log_conf_type == '1'} selected {/if}>输入框</option>
	<option value="2" {if $edit.log_conf_type == '2'} selected {/if}>文本框</option>
	<option value="3" {if $edit.log_conf_type == '3'} selected {/if}>单选框</option>
	<option value="4" {if $edit.log_conf_type == '4'} selected {/if}>复选框</option>
	<option value="5" {if $edit.log_conf_type == '5'} selected {/if}>下拉菜单</option>
	<option value="6" {if $edit.log_conf_type == '6'} selected {/if}>图片文件</option>
	<option value="7" {if $edit.log_conf_type == '7'} selected {/if}>地图定位</option>
	</select>
	</div>
	</div>
	
	<div class="layui-form-item">
	<label class="layui-form-label">配置名称</label>
	<div class="layui-input-inline">
	<input type="text" name="log_conf_key" value="{$edit.log_conf_key}" class="layui-input" required>
	</div>
	</div>
	
	{if $edit.log_conf_type == '1' || $edit.log_conf_type == '2'}
	<div class="layui-form-item layui-form-text" id="values" style="display: none">
	<label class="layui-form-label">配置可选值</label>
	<div class="layui-input-block">
	<textarea type="text" class="layui-textarea" rows="3" name="log_conf_value" placeholder="请用“ / ”符号隔开，禁止填入“ | ”，“ * ”，“ - ” 等符号。">{$edit.log_conf_value}</textarea>
	</div>
	</div>
	{/if}

	{if $edit.log_conf_type == '3' || $edit.log_conf_type == '4' || $edit.log_conf_type == '5'}
	<div class="layui-form-item layui-form-text" id="values">
	<label class="layui-form-label">配置可选值</label>
	<div class="layui-input-block">
	<textarea type="text" class="layui-textarea" rows="3" name="log_conf_value" placeholder="请用“ / ”符号隔开，禁止填入“ | ”，“ * ”，“ - ” 等符号。">{$edit.log_conf_value}</textarea>
	</div>
	</div>
	{/if}
	
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