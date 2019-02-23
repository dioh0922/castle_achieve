<title>追記用ページ</title>

<h1>追記ページ表示</h1>

<p>・スタンプの写真をアップロードできる</p>
<p>・行ったところをマークする</p>
<p>　－城名も入力するか、選択できるようにするか</p>

<p>画像アップテスト</p>
<form method="post" action="{{ route( 'Pages.upload' ) }}" enctype="multipart/form-data">
  {{csrf_field()}}
  <input type="file" name="photo"><br>
  城名<input type="text" name="name"><br>
  日時<input type="date" name="date"><br>
  <input type="submit">
</form>

@if($errors->any())
  <div class="alt_denger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

@if(session("success"))
  <div class="alt_success">
    {{session("success")}}
  </div>
@endif

@if($is_image)
  <figure>
    <img src="{{asset('profile_images/test.png')}}">
    <figcaption>アップ画像(public配下のファイル)</figcaption>
  </figure>
@endif

@if(!$is_image)
  {{$is_image}} <h1>ないとき</h1>
@endif
