<?php
require_once('common.php');

// 引数（クエリー）を受け取る
$qid    = isset($_GET['qid'])? $_GET['qid']:-1; 
$answer = $_GET['answer'];

// idの最大値を取得（=問題数）
$data = getDB1('select max(id) as maxid from Question');

// Validation
if($qid == -1 || !is_numeric($qid) || !((1<=$qid) && ($qid<=$data['maxid'])) ){
	echo 'error: $qid invalid';
	exit(1);
}

// 回答を取得
$data = getDB1('select answer from Question where id=?', [$qid]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>QuizGame Title</title>
    <style>
        body{
            background-image: url(asset/background/result_background.jpg);
            background-size: cover;
            background-repeat: no-repeat;

            text-align: center;
            padding-top: 50px;
        }
        #title{
            font-size: 48pt;
            color: Blue;
            background-color: rgba(255, 255, 255, 0.5);
		}
		#result{
            font-size: 96pt;
            color: Red;
            background-color: rgba(255, 255, 255, 0.5);
		}
        #btn-next{
            width: 512px;
            height: 72px;
			font-size: 48px;
        }
    </style>
</head>
<body>
	<audio src="asset/bgm/bgm_01.ogg" controls loop></audio> 
	<div id="title">何個残ってる？？？</div>
	<h1 id="result">
		<?=$qid?>個
	</h1>
	<form action="index.html">
	<button id="btn-next">タイトルに戻る</button>
	</form>
</body>
</html>
