
<!-- 备勤名单 -->
<div class="layui-card">
<div class="layui-card-header">备勤名单</div>
<div class="layui-card-body layui-text">	
	
<?php if (count($ready)!==0): ?>
<div class="layui-table-body">
<table class="layui-table">
<thead>
<tr>
<th>队员名称</th>
{volist name="ready_conf" id="conf"}
<th>{$conf.ready_conf_key}</th>
{/volist}
<th>状态</th>
<th>时间</th>
</tr>
</thead>

<tbody>
<?php foreach($ready as $k => $v): ?>
<tr>
<td class="layui-table-cell">{$v.team_name}</td>

<?php foreach($ready_conf as $k1 => $v1): ?>
<?php if (!isset($v['ready_content'][$v1['id']])): ?>
	<td></td>
<?php elseif (strstr($v['ready_content'][$v1['id']], 'base64')): ?>
	<td><img src="{$v['ready_content'][$v1['id']]}" width="50"></td>
<?php else: ?>
	<td>{$v['ready_content'][$v1['id']]}</td>	
<?php endif ?>	
<?php endforeach; ?>
<td class="layui-table-cell">
	{if $v.ready_state==0}待命{/if}
	{if $v.ready_state==1}出队{/if}
</td>
<td class="layui-table-cell">{$v.update_time|date="Y-m-d H:i:s"}</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php else: ?>
<p>暂时没有队员填写备勤名单。</p>
<?php endif ?>

</div>
</div>
