
var map;

function init(){
  map = L.map("map");
  map.setView([37.44 ,138.366667], 6);

  L.tileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
    }
  ).addTo(map);

  get_all_castle();
}

//DBから城一覧を取得してマップにプロットする
function get_all_castle(){
  $.ajax({
    type: "GET",
    url: "./castle_data",
    cacha: false
  })
  .done(function(get_result){

    //行った城をマークする
    get_result["already"].forEach(function(data){
      L.marker([data.latitude, data.longitude],
        {
          title: data.name,
          icon: L.divIcon({className: "already"})
        }
      ).addTo(map);
    });

    //行っていない名城は別のマークを付ける
    get_result["yet"].forEach(function(data){
      L.marker([data.latitude, data.longitude],
        {
          title: data.name,
          icon: L.divIcon({className: "yet"})
        }
      ).addTo(map);
    });

  })
  .fail(function(){
    console.log("AJAX失敗");
  });
}

(window.onload=init());
