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

// 正解か判定
if( $data['answer'] == $answer ){
	echo "正解！";
}
else{
	echo "残念！";
}