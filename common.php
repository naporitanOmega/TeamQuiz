<?php

function getDB1($sql, $param=[]){
	$dsn  = 'mysql:dbname=quizedb;host=localhost';
	$user = 'senpai';
	$pw   = 'indocurry';

	$dbh = new PDO($dsn, $user, $pw);
	$sth = $dbh->prepare($sql);
	$sth->execute($param);

	$buff = $sth->fetchAll(PDO::FETCH_ASSOC);
	return( $buff );
}

