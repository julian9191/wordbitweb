<?php

$con = @mysqli_connect('localhost', 'root', '', 'wordbitweb');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

// Some Query
$sql 	= 'SELECT w.* FROM words w where w.idwords <= (SELECT w2.idwords FROM words w2 order by w2.used, w2.idwords limit 1) order by w.used;';
$query 	= mysqli_query($con, $sql);
$palabras = [];
$i=0;
while ($row = mysqli_fetch_array($query))
{
	$palabras[$i]['idwords'] = $row['idwords'];
	$palabras[$i]['english'] = $row['english'];
	$palabras[$i]['pronunciation'] = $row['pronunciation'];
	$palabras[$i]['sentence'] = $row['sentence'];
	$palabras[$i]['spanish'] = $row['spanish'];
	$palabras[$i]['used'] = $row['used'];
	$palabras[$i]['group_id'] = $row['group_id'];
	$palabras[$i]['created'] = $row['created'];
	$palabras[$i]['modified'] = $row['modified'];
	$palabras[$i]['isrepeat'] = $row['isrepeat'];
	$i++;
}

echo $_GET['callback'].'('.json_encode($palabras).')' ;
mysqli_close ($con);


?>