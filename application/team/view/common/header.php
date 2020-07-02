
<nav class="navbar navbar-expand-lg navbar-light bg-info">
<div class="container">

  <a class="navbar-brand" href="{:url('/')}">蓝天救援队</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {$Request.session.team_name}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{:url('/')}">修改资料</a>
          <a class="dropdown-item" href="{:url('team/team/signout')}">退出登录</a>
        </div>
    </li>

    </ul>
  </div>

</div>
</nav>




  


 
