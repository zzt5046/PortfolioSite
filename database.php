<?php

//connect to DB
$mysqli = NEW MySQLi("localhost", "root", "ziggymysql23", "test1");

//query
$resultSet = $mysqli->query("SELECT * FROM table1");

echo "<table>";
 while ($row = mysqli_fetch_assoc($resultSet)) {
 $num  = $row['id'];
 $word = $row['word'];
 echo "<tr><td>".$num."</td><td>".$word."</td></tr>";
 }
 echo "</table>";

?>