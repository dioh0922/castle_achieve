<title>追記用ページ</title>

<h1>実績ページ表示</h1>
<a href="{{action('PagesController@index')}}">メインへ</a><br>

<div>
  実績と画像のリスト表示<br>
  ・城名とスタンプを一覧にしていく
</div>

@if($is_image)
  <figure>
    <img src="{{asset('profile_images/test.png')}}">
    <figcaption>アップ画像(public配下のファイル)</figcaption>
  </figure>
@endif

@if(!$is_image)
  {{$is_image}} <h1>ないとき</h1>
@endif
