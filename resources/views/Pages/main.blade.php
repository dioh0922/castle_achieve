<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>実績表示</title>

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>s
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container bg-warning">
			<div class="page-header">
				<h1>100名城実績ページ</h1>
			</div>
			<input type="button" class="btn btn-danger" onclick="location.href='http://dioh000.s1007.xrea.com/index.html'" value="Webアプリメインへ">
			<input type="button" class="btn btn-primary" onclick="location.href='{{action('PagesController@castle_record')}}'"value="実績記録へ">
			<input type="button" class="btn btn-success" onclick="location.href='{{action('PagesController@achieve')}}'"value="地図表示">
			<br>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th><div class="text-center">城名</div></th>
							<th><div class="text-center">城スタンプ</div></th>
							<?php
							/*
							<th>100名城スタンプ</th>
							*/
							?>
						</tr>
					</thead>

					<tbody>

						@foreach($achieve_list as $data)
							@if($data->famus_exsist)
								<tr>
									<td><div class="text-center">{{$data->castle_name}}</div></td>
									<td><div class="text-center"><img src="{{asset($data->img_path)}}"></div></td>
									<?php
									/*
									<td><img src="{{asset($data->famus_img_path)}}"></td>
									*/
									?>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
