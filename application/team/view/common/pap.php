
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
		
<script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=48NBnXHU04VrN4nkkot7XLZDX0IwtcQL"></script>

<script type="text/javascript">

/*图片压缩转base64*/
var  cutImageBase64 = function(m_this,id,wid,quality) {
	let thats = this
	var file = m_this.target.files[0];
	var URL = window.URL || window.webkitURL;
	var blob = URL.createObjectURL(file);
	var base64;
	var img = new Image();
	img.src = blob;

	img.onload = function() {
		var that = this;
		//生成比例
		var w = that.width,
		h = that.height,
		scale = w / h;
		w = wid || w;
		h = w / scale;
		//生成canvas
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		canvas.setAttribute( "height", h);
		canvas.setAttribute("width", w);
		ctx.drawImage(that, 0, 0, w, h);
		// 生成base64            
		base64 = canvas.toDataURL('image/jpeg', quality || 0.8);
		console.log(base64)
		$("#base64").val(base64)
	};
}

function  uploadChange (ev) {
	let m_this=ev
	cutImageBase64(m_this,null,250,0.5);
}

$("#image").change(function(ev){
	uploadChange(ev)
})



/*百度地图定图*/
var map = new BMap.Map("allmap");
var point = new BMap.Point(116.331398,39.897445);
map.centerAndZoom(point,12);

map.enableScrollWheelZoom(true);
map.addControl(new BMap.NavigationControl());//平移缩放控件，左上角
map.addControl(new BMap.MapTypeControl());//地图类型，右上角
map.addControl(new BMap.GeolocationControl());//定位，左下角

var geolocation = new BMap.Geolocation();
geolocation.getCurrentPosition(function(r){
if(this.getStatus() == BMAP_STATUS_SUCCESS){
  
  var mk = new BMap.Marker(r.point);
  map.addOverlay(mk);
  map.panTo(r.point);
  /*document.getElementById('lng').value = r.point.lng;
  document.getElementById('lat').value = r.point.lat;*/

  //具体位置信息，根据经纬度逆地址解析
  //参数{extensions_town: true}启用乡镇级数据
  var myGeo = new BMap.Geocoder({extensions_town: true});   
  myGeo.getLocation(new BMap.Point(r.point.lng, r.point.lat), function(result){
    if (result){ 
		console.log(result)
		document.getElementById('address').value = result.surroundingPois[0].address;      
    }
  });
}
else {
  alert('failed'+this.getStatus());
}        
},{enableHighAccuracy: true})


</script>