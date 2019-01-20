<?php

//connect to DB
$mysqli = NEW MySQLi("localhost", "root", "ziggymysql23", "test1");

//query
$resultSet = $mysqli->query("SELECT * FROM table1");

echo $resultSet->num_rows;

?>