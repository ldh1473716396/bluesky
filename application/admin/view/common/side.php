<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
<div class="layui-side-scroll">

<a class="layui-logo" href="{:url('admin/index/index')}">蓝天救援队后台</a>

<ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
	
	<li class="layui-nav-item">
	<a lay-href="{:url('admin/admin/listadmin')}">
	<i class="layui-icon layui-icon-friends"></i>
	<cite>管理员</cite>
	</a>
	</li>

	<li class="layui-nav-item">
	<a lay-href="{:url('admin/team/listteam')}">
	<i class="layui-icon layui-icon-group"></i>
	<cite>队员</cite>
	</a>
	</li>

	<li class="layui-nav-item">
	<a lay-href="{:url('admin/sheet/listsheet')}">
	<i class="layui-icon layui-icon-more"></i>
	<cite>工作表</cite>
	</a>
	</li>

	<li class="layui-nav-item">
	<a href="javascript:;">
	<i class="layui-icon layui-icon-file"></i>
	<cite>事件</cite>
	</a>
	<dl class="layui-nav-child">
	<dd><a lay-href="{:url('admin/event/listevent')}">事件列表</a></dd>
	<dd><a lay-href="{:url('admin/event_conf/pageconf')}">事件配置</a></dd>
	</dl>
	</li>
	
</ul>



</div>
</div>