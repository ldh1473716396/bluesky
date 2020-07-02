

<!-- 记录表 -->
<div class="layui-card">
<div class="layui-card-header">记录表</div>
<div class="layui-card-body layui-text">	
	
<?php if (count($log)!==0): ?>
<div class="layui-table-body">
<table class="layui-table">
<thead>
<tr>

<th>时间</th>
<th>队员名称</th>
{volist name="log_conf" id="conf"}
<th>{$conf.log_conf_key}</th>
{/volist}

</tr>
</thead>

<tbody>
<?php foreach($log as $k => $v): ?>
<tr>
<td class="layui-table-cell">{$v.update_time|date="Y-m-d H:i:s"}</td>
<td class="layui-table-cell">{$v.team_name}</td>

<?php foreach($log_conf as $k1 => $v1): ?>
<?php if (!isset($v['log_content'][$v1['id']])): ?>
	<td></td>
<?php elseif (strstr($v['log_content'][$v1['id']], 'base64')): ?>
	<td><img src="{$v['log_content'][$v1['id']]}" width="50"></td>
<?php else: ?>
	<td>{$v['log_content'][$v1['id']]}</td>	
<?php endif ?>	
<?php endforeach; ?>

</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php else: ?>
<p>暂时没有队员填写记录表。</p>
<?php endif ?>

</div>
</div>
