
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>蓝天救援队后台登录</title>

  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- 引入css文件 -->
  {include file="common/css"}

</head>
<body>

  <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

    <div class="layadmin-user-login-main">

      <div class="layadmin-user-login-box layadmin-user-login-header">
        <h2>蓝天救援队后台登录</h2>
      </div>

      <div class="layadmin-user-login-box layadmin-user-login-body layui-form">

      <form action="{:url('admin/login/login_check')}" method="post">
        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
          <input type="text" name="admin_name" placeholder="名称" class="layui-input">
        </div>

        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
          <input type="password" name="admin_password" placeholder="密码" class="layui-input">
        </div>

        <div class="layui-form-item">
          <button type="submit" class="layui-btn layui-btn-fluid">登 入</button>
        </div>
      </form>
        
      </div>
    </div>    
  </div>

  <!-- 引入js文件 -->
  {include file="common/javascript"}

</body>
</html>