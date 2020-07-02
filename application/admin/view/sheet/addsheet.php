
<!-- 引入css文件 -->
{include file="common/css"}

<div class="layui-fluid">

	<div class="layui-card">
	<div class="layui-card-header">
	<span class="layui-breadcrumb">
	  <a href="{:url('admin/sheet/listsheet')}">工作表列表</a>
	  <a><cite>工作表添加</cite></a>
	</span>
	</div>
	</div>

<div class="layui-card">
<div class="layui-card-header">工作表添加</div>

<div class="layui-card-body layui-text">
<form class="layui-form" action="{:url('admin/sheet/add')}" method="post">

	<div class="layui-form-item">
	<label class="layui-form-label">名称</label>
	<div class="layui-input-block">
	<input type="text" name="sheet_name" class="layui-input" required>
	</div>
	</div>

	<div class="layui-form-item">
	<label class="layui-form-label">备注</label>
	<div class="layui-input-block">
	<input type="text" name="sheet_notes" class="layui-input" required>
	</div>
	</div>

	<div class="layui-form-item">
	<label class="layui-form-label">填写人身份</label>
	<div class="layui-input-block">
	<input type="radio" name="sheet_role" value="1" title="队员" checked>
	<input type="radio" name="sheet_role" value="2" title="管理员">
	</div>
	</div>

	<div class="layui-form-item">
	<label class="layui-form-label">是否启用</label>
	<div class="layui-input-block">
	<input type="radio" name="sheet_enable" value="1" title="是" checked>
	<input type="radio" name="sheet_enable" value="0" title="否">
	</div>
	</div>

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
