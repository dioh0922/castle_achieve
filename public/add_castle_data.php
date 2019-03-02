<?php

  mb_language("ja");
  mb_internal_encoding("UTF-8");

  $castle_json = file_get_contents("castle_database.json");
  $arr = json_decode($castle_json);
  foreach ($arr as $iter) {
    // code...
    $query = sprintf("INSERT INTO `castle_database` (`No`, `name`, `latitude`, `longitude`) VALUES(\"%s\",\"%s\",\"%s\",\"%s\");",
    $iter->No,
    $iter->名称,
    $iter->北緯,
    $iter->東経
    );

    //$result = db_connect($query);
    $url = "localhost";
    $user = "dioh09";
    $pass = "youjojomhp09";
    $db = "movie_database";

    $mysqli = new mysqli($url, $user, $pass, $db);
    if($mysqli->connect_error){
      print $mysqli->connect_error;
      exit();
    }else{
      $mysqli->set_charset("utf8");
    }

    $query_result = $mysqli->query($query);

    $close_result = $mysqli->close();
    if($close_result){
      //print "closeした";
    }else{
      print $mysqli->connect_error;
    }
  }

  print($query);

 ?>
