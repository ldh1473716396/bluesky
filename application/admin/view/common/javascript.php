
<script src="{:url('/static/layuiadmin/layui/layui.js')}"></script>
<script>
layui.config({
base: '{:url('/static/layuiadmin/')}' //静态资源所在路径
}).extend({
index: 'lib/index' //主入口模块
}).use('index');
</script>

<script>
//Demo
layui.use('form', function(){
  var form = layui.form;
  
    //监听提交
    form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
    });
    });

    layui.use(['element', 'form', 'jquery'], function () {
    //加载element、form、jquery模块
    var form = layui.form  //获取form模块
    , element = layui.element
    , $ = layui.$;
    form.on('select(conf_type)', function (data) {
    //使用layui的form.on绑定select选中事件
    if (data.value == 3 || data.value == 4 || data.value == 5) {
    $("#values").show();
    }else {
    $("#values").hide();
    } 
    });
});
</script>

