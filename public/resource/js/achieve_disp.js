
const all_castle_url = "http://localhost/castle_achieve/public/castle_data";
var g_map;

function init(){
  var map = L.map("map");
  map.setView([38.033333, 138.366667], 6);

  L.tileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
    }
  ).addTo(map);
  g_map = map;
  get_all_castle();
  //DBからとってきて100こマーカーつける
  //L.marker([36.4036111, 138.2444444], "上田城").addTo(map);

}

//DBから城一覧を取得してマップにプロットする
function get_all_castle(){
  $.ajax({
    type: "GET",
    url: all_castle_url,
    cacha: false
  })
  .done(function(get_result){
    get_result["all"].forEach(function(data){
      plot_castle_marker(data);
    });

  })
  .fail(function(){
    console.log("AJAX失敗");
  });
}

//各白情報から地図にプロット
function plot_castle_marker(catsle_data){
  if(catsle_data.name == "大阪城"){
    L.marker([catsle_data.latitude, catsle_data.longitude],
      {
        title: catsle_data.name,
        icon: L.divIcon({className: "already"})
      }
    ).addTo(g_map);
  }else{
    L.marker([catsle_data.latitude, catsle_data.longitude],
      {
        title: catsle_data.name,
        icon: L.divIcon({className: "yet"})
      }
    ).addTo(g_map);
  }
}

(window.onload=init());
