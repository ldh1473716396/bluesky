
<!-- 队员填表 -->
{volist name='team_sheet' id='sheet'}

<div class="layui-card">
<div class="layui-card-header">{$sheet.sheet_name}</div>
<div class="layui-card-body layui-text">

<?php if (count($sheet['team_record'])!==0): ?>
<div class="layui-table-body">
<table class="layui-table">
<thead>
<tr>
<th>队员名称</th>
{volist name="$sheet['sheet_conf']" id="conf"}
<th>{$conf.sheet_conf_name}</th>
{/volist}
<th>时间</th>
</tr>
</thead>

<tbody>
<?php foreach($sheet['team_record'] as $k => $v): ?>
<tr>
<td class="layui-table-cell">{$v.team_name}</td>

<?php foreach($sheet['sheet_conf'] as $k1 => $v1): ?>
<?php if (!isset($v['team_content'][$v1['id']])): ?>
	<td></td>
<?php elseif (strstr($v['team_content'][$v1['id']], 'base64')): ?>
	<td><img src="{$v['team_content'][$v1['id']]}" width="50"></td>
<?php else: ?>
	<td>{$v['team_content'][$v1['id']]}</td>	
<?php endif ?>	
<?php endforeach; ?>

<td class="layui-table-cell">{$v['update_time']}</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<?php else: ?>
<p>暂无内容</p>
<?php endif ?>

</div>
</div>

{/volist}