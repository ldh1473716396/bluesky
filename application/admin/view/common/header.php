<!-- 头部区域 -->
<div class="layui-header">
	<ul class="layui-nav layui-layout-left">
		<li class="layui-nav-item layadmin-flexible" lay-unselect>
		<a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
		<i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
		</a>
		</li>
		<li class="layui-nav-item layui-hide-xs" lay-unselect>
		<a href="{:url('/')}" target="_blank" title="前台">
		前台<!-- <i class="layui-icon layui-icon-website"></i> -->
		</a>
		</li>
		<li class="layui-nav-item" lay-unselect>
		<a href="javascript:;" layadmin-event="refresh" title="刷新">
		<i class="layui-icon layui-icon-refresh-3"></i>
		</a>
		</li>
	</ul>

	<ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">

		<li class="layui-nav-item" lay-unselect>
		<a href="javascript:;">
		<cite>{$Request.session.admin_name}</cite>
		</a>
		<dl class="layui-nav-child">
		<dd><a href="{:url('admin/login/logout')}">退出登录</a></dd>
		</dl>
		</li>

		<li class="layui-nav-item layui-hide-xs" lay-unselect>
		<a href="javascript:;" layadmin-event="theme">
		<i class="layui-icon layui-icon-theme"></i>
		</a>
		</li>
		
	</ul>
</div>