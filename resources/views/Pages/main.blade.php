<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>実績表示</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="container bg-warning">
      <div class="page-header">
        <h1>100名城実績ページ</h1>
      </div>
      <input type="button" class="btn btn-primary" onclick="location.href='{{action('PagesController@castle_record')}}'"value="実績記録へ">
      <input type="button" class="btn btn-success" onclick="location.href='{{action('PagesController@achieve')}}'"value="地図表示">
      <br>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>城名</th>
              <th>スタンプ</th>
            </tr>
          </thead>

          <tbody>

              @foreach($achieve_list as $data)
                @if($data->img_exist)
                  <tr>
                    <td>{{$data->castle_name}}</td>
                    <td><img src="{{asset($data->img_path)}}"></td>
                  </tr>
                @endif
              @endforeach
          </tbody>
        </table>
      </div>
<!---
      単に12分割して表示する場合
      <div class="container-fluid">
        <div class="row">
        @foreach($achieve_list as $data)
          @if($data->img_exist)
          <div class="col-sm-3" style="background-color:pink;">
            {{$data->castle_name}}
          </div>
          <div class="col-sm-9" style="background-color:sky;">
            <img src="{{asset($data->img_path)}}">
            <br>
            <br>
          </div>
          @endif
        @endforeach
        </div>
      </div>
--->
    </div>
  </body>
</html>
