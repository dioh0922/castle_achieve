<title>実績表示</title>
<h1>100名城実績ページ</h1>
<a href="{{action('PagesController@castle_record')}}">実績記録へ</a><br>
<a href="{{action('PagesController@achieve')}}">実績表示へ</a><br>
<div>
  実績と画像のリスト表示<br>
  ・城名とスタンプを一覧にしていく
</div>

@foreach($achieve_list as $data)
  @if($data->img_exist)
    {{$data->castle_name}}
    <img src="{{asset($data->img_path)}}">
    <br>
  @endif
@endforeach
