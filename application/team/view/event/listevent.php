{extend name="index/index"}
{block name="content"}

{if count($list)!==0 }
	<div style="text-align: center; margin-top: 55px; margin-bottom: 50px;">
		<h1>事件查看</h1>
	</div>

	<div class="container">
	{volist name="list" id="data"}
	<div class="media">				
	<div class="media-body">
	<a href="{:url('team/event/readevent',array('id'=>$data.id))}" style="color:#000;">
	<h3>
	{$data.event_title}
	<span style="color: red;  float: right;">
	{if $data.event_state == 0 }
	开始
	{/if}
	{if $data.event_state == 1 }
	结束
	{/if}
	</span>
	</h3>	
	<p style="text-align: right">{$data.update_time|date="Y-m-d H:i:s"}</p>
	</a>
	<hr>
	</div>
	</div>
	{/volist}	
	</div>

{else}
	<div style="text-align: center; margin-top: 55px; margin-bottom: 50px;">
		<h1>暂无事件</h1>
	</div>
{/if}
{/block}
