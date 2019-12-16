<?php
require_once('common.php');

// idの最大値を取得（=問題数）
$data = getDB1('select max(id) as maxid from Question');

// 出題する問題を決定
$i = rand(1, $data['maxid']);

// 問題文を取得
$data = getDB1('select question from Question where id=?', [$i]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>QuizGame Question</title>
</head>
<body>
    <h1>Question</h1>
	<?= $data['question'] ?>

	<form action="result.php">
		<input type="hidden" name="qid" value="<?= $i ?>">
		<input type="text" id="text-answer" name="answer">

		<button id="btn-answer">回答</button>
	</form>

<script>
document.querySelector("#btn-answer").addEventListener("click", (e)=>{
	let answer = document.querySelector("#text-answer");

	if ( answer.value == "" ){
		alert("入力してください");
		answer.focus();
		answer.style.backgroundColor = "Pink";
		e.preventDefault();
	}
	else{
		document.querySelector("#btn-answer").innerHTML = "...送信中";
	}	
});
</script>
</body>
</html>
