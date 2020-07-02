
<!-- 记录表 -->
<h4>记录表</h4>

{if $limit == 1}
<?php if ($read['event_state']==0): ?>
	<div>
	<a class="btn btn-outline-primary btn-sm" href="{:url('team/log/addlog',array('event_id'=>$read.id))}">
	填写
	</a>
	</div>
<?php endif; ?>

<?php if ($read['event_state']==1): ?>
	<p style="color: red">该事件已结束</p>
<?php endif; ?>

<br>

<?php if (count($log)!==0): ?>
	<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">时间</th>
				<th scope="col">名称</th>
				{volist name="log_conf" id="conf"}
				<th scope="col">{$conf.log_conf_key}</th>
				{/volist}
				
				<th scope="col">操作</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($log as $k => $v): ?>
			<tr>
				<td>{$v.update_time|date="Y-m-d H:i:s"}</td>
				<td>{$v.team_name}</td>

				<?php foreach($log_conf as $k1 => $v1): ?>
				<?php if (!isset($v['log_content'][$v1['id']])): ?>
					<td></td>
				<?php elseif (strstr($v['log_content'][$v1['id']], 'base64')): ?>
					<td><img src="{$v['log_content'][$v1['id']]}" width="50"></td>
				<?php else: ?>
					<td>{$v['log_content'][$v1['id']]}</td>	
				<?php endif ?>	
				<?php endforeach; ?>

				<td>
				{if $v.team_id == session('team_id')}
					<a class="btn btn-outline-success btn-sm" href="{:url('team/log/editlog',array('id'=>$v.id,'event_id'=>$v.event_id))}">
					编辑
					</a>
					<a class="btn btn-outline-danger btn-sm" href="{:url('team/log/del',array('id'=>$v.id,'event_id'=>$v.event_id))}" onClick="return confirm('确认删除吗？')">
					删除
					</a>
				{/if}
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
<?php endif ?>
{/if}
