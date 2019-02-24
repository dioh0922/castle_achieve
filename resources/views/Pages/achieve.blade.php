<title>追記用ページ</title>

<h1>実績ページ表示</h1>
<a href="{{action('PagesController@index')}}">メインへ</a><br>

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
