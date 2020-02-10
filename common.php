<?php

function getDB1(){
　　$q = isset($_GET['q'])? $_GET['q']:null;
　　
　　$dsn  = 'mysql:dbname=teamQuizdb;host=localhost';   
	$user = 'senpai';
	$pw   = 'indocurry';　
	
	$sql = 'select * from shiritori where word like ?';
  　$test = mb_substr("$q", -1);
  　$q   = $test . '%';
  　
  　$dbh = new PDO($dsn, $user, $pw);  // DBへ接続
  　$sth = $dbh->prepare($sql);        // 実行の準備
  　$sth->execute([$q]); 
  　
    $tmp = $sth->fetch(PDO::FETCH_ASSOC);  // 1レコード取得
	return($tmp);
}
?>

