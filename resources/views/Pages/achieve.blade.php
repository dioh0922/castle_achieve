<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>地図表示ページ</title>

    <link rel="stylesheet" href="resource/css/leaflet.css"/>
    <script src="resource/js/leaflet.js"></script>

    <script type="text/javascript" src="resource/js/jquery-1.12.1.min.js"></script>

  </head>

  <body onload="init()">
    <p>
      <input type="button" class="index_btn" onclick="location.href='{{action('PagesController@index')}}'"value="一覧表示へ">
    </p>
    <div id="map" style="width:100%;height:100%;"></div>
    <link rel="stylesheet" href="resource/css/achieve.css"/>
    <script src="resource/js/achieve_disp.js"></script>
  </body>
</html>
