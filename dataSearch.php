<?php
#------------------------------------------------#
# 引数(クエリー)
#------------------------------------------------#
$q = isset($_GET['q'])? $_GET['q']:null;

#------------------------------------------------#
# DB
#------------------------------------------------#
$dsn  = 'mysql:dbname=teamQuizdb;host=localhost';   
$user = 'senpai';
$pw   = 'indocurry';
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <link href= "fon.css" rel= "stylesheet"type= "text/css" media= "all">

  <title>メイン画面</title>
</head>
<body>

<h1>しりとり入力</h1>
    <style>
        body{
            background-image: url(asset/background/result_background.jpg);
            background-size: cover;
            background-repeat: no-repeat;

            text-align: center;
            padding-top: 50px;
        }      
        #btn-next{
            width: 512px;
            height: 72px;
			font-size: 48px;
        }
       #big{ 
            font-size: 48px; 
            color:Blue;
       }
</style>

<form>
  <input type="text" name="q" value="<?= ($q !== null)?  $q:'' ?>">
  <button type="button" id="btn">決定</button>
</form>
<?php
// エラーを出力する


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
  $sql = 'select * from shiritori where word like ?';

  $test = mb_substr("$q", -1);

  $q   = $test . '%';

  //----------------------------
  // 検索実行
  //----------------------------
  $dbh = new PDO($dsn, $user, $pw);  // DBへ接続
  $sth = $dbh->prepare($sql);        // 実行の準備
  $sth->execute([$q]);               // 実行

  // 処理時間の計測終了＆表示
  //----------------------------
  // 取得したデータを表示する
  //----------------------------  
  echo '<ol>';

  while( true ){
    $tmp = $sth->fetch(PDO::FETCH_ASSOC);  // 1レコード取得
    if( $tmp === false){   
      echo '<p id="big">こけし</p>';
      //echo '<script>clearText();</script>';
      break;
    }
    else {
    echo '<p id="big">'.$tmp['word'].'</p>';
      break;
    }
  }
 echo '</ol>';
}
?>
<script>
function clearText(){
  //
}
  </script>
  
  <script>
    
    </script>
</body>
</html
