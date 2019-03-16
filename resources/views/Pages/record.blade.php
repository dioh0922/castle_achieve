<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登録用ページ</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
      body{
        background-color: #eecccc;
      }
    </style>
  </head>

  <body>
    <div class="container ">
      <h1>追記ページ表示</h1>

      <p>・行ったところをマークする</p>
      <p>　－城名も入力するか、選択できるようにするか</p>


      <input type="button" class="btn btn-primary" onclick="location.href='{{action('PagesController@index')}}'"value="一覧表示へ">

      <form method="post" action="{{ route( 'Pages.upload' ) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <br>
        <div class="form-group">
          <label for="stamp_img">100名城スタンプ画像</label>
          <input type="file" name="photo" id="stamp_img">
        </div>
        <div class="form-group">
          <label for="castle_name">城名</label>
          <select name="name" id="castle_name">
            @foreach($list_data as $data)
              <option value="{{$data->name}}">{{$data->name}}</option>
            @endforeach
          </select>
        </div>
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

    </div>
  </body>
</html>
