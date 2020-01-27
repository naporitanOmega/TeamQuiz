/**
 * しりとりDB
 */

/*----------------------------*/
/* DB作成                      */
/*----------------------------*/
CREATE DATABASE IF NOT EXISTS teamQuizdb;
USE teamQuizdb;

/*----------------------------*/
/* テーブルを作成               */
/*----------------------------*/
/*-- video --*/
CREATE TABLE IF NOT EXISTS shiritori(
	`id`    varchar(16),     /* ID */
	`word`  varchar(32),    /* 単語 */
	`used`  boolean   /* 使用済か？*/
)
ENGINE=InnoDB   /* MySQLのエンジンを指定 */
CHARSET=utf8;   /* 文字コード */

/*-- 念の為テーブルの中身をすべて削除する --*/
TRUNCATE TABLE shiritori;
