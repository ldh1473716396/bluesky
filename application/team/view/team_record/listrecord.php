
<!-- 队员填表 -->
<h4>{$sheet.sheet_name}</h4>
<br>
<div><a class="btn btn-outline-primary btn-sm" href="{:url('team/team_record/addrecord',array('event_id'=>$read.id,'sheet_id'=>$sheet.id))}">填写</a></div>
<br>

<?php if (count($sheet['team_record'])!==0): ?>
	<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">名称</th>
				{volist name="$sheet['sheet_conf']" id="conf"}
				<th scope="col">{$conf.sheet_conf_name}</th>
				{/volist}
				<th scope="col">时间</th>
				<th scope="col">操作</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($sheet['team_record'] as $k => $v): ?>
			<tr>
				<td>{$v['team_name']}</td>
				<?php foreach($sheet['sheet_conf'] as $k1 => $v1): ?>
				<?php if (!isset($v['team_content'][$v1['id']])): ?>
					<td></td>
				<?php elseif (strstr($v['team_content'][$v1['id']], 'base64')): ?>
					<td><img src="{$v['team_content'][$v1['id']]}" width="50"></td>
				<?php else: ?>
					<td>{$v['team_content'][$v1['id']]}</td>	
				<?php endif ?>	
				<?php endforeach; ?>

				<td>{$v['update_time']}</td>

				<td>
				{if $v.team_id == session('team_id')}
					<a class="btn btn-outline-success btn-sm" href="{:url('team/team_record/editrecord',array('id'=>$v.id,'event_id'=>$read.id,'sheet_id'=>$sheet.id))}">
					编辑
					</a>
					<a class="btn btn-outline-danger btn-sm" href="{:url('team/team_record/del',array('id'=>$v.id,'event_id'=>$read.id))}" onClick="return confirm('确认删除吗？')">
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