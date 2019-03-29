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
				background-color: #eeeeff;
			}
    </style>
  </head>

  <body>
    <div class="container">
      <h1>認証ページ</h1>

      <input type="button" class="btn btn-primary" onclick="location.href='{{action('PagesController@index')}}'"value="一覧表示へ">

      <form method="post" action="{{ route( 'Pages.login_check' ) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <br>
        <div class="form-group">
          <label for="login_id">ユーザID</label>
          <input type="text" name="login_id">
        </div>

        <div class="form-group">
          <label for="login_pass">パスワード</label>
          <input type="password" name="login_pass">
        </div>

        <input type="submit" class="btn btn-danger">
      </form>

      @if(session("login_failed"))
        <div class="alt_success">
          <h3>{{session("login_failed")}}</h3>
        </div>
      @endif

    </div>
  </body>
</html>
