<title>実績表示</title>
<h1>100名城実績ページ</h1>
<a href="{{action('PagesController@castle_record')}}">実績記録へ</a><br>
<a href="{{action('PagesController@achive')}}">実績表示へ</a><br>
<p>以下にページ遷移</p>
<br>
<p>その後に実績のリスト</p>
<div id="result_area">
  @foreach($sqlResult as $val)
    {{ $val->discription_target."：".$val->target_summary}}<br>
  @endforeach
</div>
