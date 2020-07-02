<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>蓝天救援队登录</title>
	
	<link rel="stylesheet" type="text/css"	href="{:url('static/bootstrap/bootstrap.min.css')}">
			    
</head>

<body>

	<script type="text/javascript" charset="utf-8" src="{:url('/static/bootstrap/bootstrap.min.js')}"></script>

	<div class="col-lg-4 offset-lg-4" style="margin-top: 150px; padding: 100px;">
		<div class="border border-success" style="padding: 50px;">
			<h1><div style="text-align: center;">蓝天救援队登录</div></h1>
			<form action="{:url('team/team/_signin')}" method="post">
				<div class="form-group">
				<label>名称：</label>
				<input type="text" class="form-control" name="team_name" required>
				</div>

				<div class="form-group">
				<label>密码：</label>
				<input type="password" class="form-control" name="team_password" required>
				</div>
				
				<button type="submit" class="btn btn-success btn-lg btn-block">登陆</button>
			</form>
		</div>		
	</div>		
	
</body>
</html>
