<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
    <title>追記用ページ</title>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <link rel="stylesheet" href="resource/css/achieve.css"/>
    <script type="text/javascript" src="resource/js/jquery-1.12.1.min.js"></script>
  </head>

  <body onload="init()">
    <h1>実績ページ表示</h1>
    <a href="{{action('PagesController@index')}}">メインへ</a><br>

    <div>
      地図等で達成度を表示するページにする(予定)<br>
      Google Map APIとか
    </div>
    <div id="map" style="width:100%;height:100%;"></div>
    <script src="resource/js/achieve_disp.js"></script>
  </body>
</html>
