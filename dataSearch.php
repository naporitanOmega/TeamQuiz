<?php
#------------------------------------------------#
# 引数(クエリー)
#------------------------------------------------#
$q = isset($_GET['q'])? $_GET['q']:null;

#------------------------------------------------#
# DB
#------------------------------------------------#
$dsn  = 'mysql:dbname=nico2db;host=localhost';   
$user = 'senpai';
$pw   = 'indocurry';
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>nico2</title>
</head>
<body>

<h1>ニコニコ検索</h1>

<form>
  <input type="text" name="q" value="<?= ($q !== null)?  $q:'' ?>">
  <button>検索</button>
</form>

<?php
#------------------------------------------------#
# 検索する
#------------------------------------------------#
if( $q !== null ){
  // 処理時間の計測開始
  $time_start = microtime(true);

  //----------------------------
  // SQL準備
  //----------------------------
  // FULL TEXT INDEX
  // $sql = 'select * from video where match(title) against(? IN BOOLEAN MODE)';

  // like
  $sql = 'select * from video where title like ?';
  $test = mb_substr("$q", -1);

  $q   = $test . '%';

  //----------------------------
  // 検索実行
  //----------------------------
  $dbh = new PDO($dsn, $user, $pw);  // DBへ接続
  $sth = $dbh->prepare($sql);        // 実行の準備
  $sth->execute([$q]);               // 実行

  // 処理時間の計測終了＆表示
  $time = microtime(true) - $time_start;
  echo "<h3>$time sec</h3>";

  //----------------------------
  // 取得したデータを表示する
  //----------------------------
  echo '<ol>';
  while( true ){
    $tmp = $sth->fetch(PDO::FETCH_ASSOC);  // 1レコード取得
    if( $tmp === false ){
      break;
    }

     // 表示
    printf('<li><a href="https://www.nicovideo.jp/watch/%s">%s</li>', $tmp['video_id'], $tmp['title']);
  }
  echo '</ol>';
}
?>
</body>
</html
