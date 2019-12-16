<?php
require_once('../common.php');

$answer = $_GET['answer'];
$qid    = $_GET['qid'];

$data = getDB1('select answer from Question where id=?', [$qid]);

$param = [
	'result' => ($data['answer'] == $answer)
];

echo json_encode($param);

