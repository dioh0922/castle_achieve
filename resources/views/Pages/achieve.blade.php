<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script>
  function init(){
    var map = L.map("map");
    map.setView([38.033333, 138.366667], 6);

  L.tileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    	{
    		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
    	}
  ).addTo(map);
  }
</script>

<style>
  html, body{
    width: 100%;
    height: 100%;
  }
</style>

<title>追記用ページ</title>
<body onload="init()">
<h1>実績ページ表示</h1>
<a href="{{action('PagesController@index')}}">メインへ</a><br>

<div>
  地図等で達成度を表示するページにする(予定)<br>
  Google Map APIとか
</div>
  <div id="map" style="width:100%;height:100%;"></div>
</body>
</html>
