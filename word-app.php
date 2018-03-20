<?php

require_once("conexion.php");

// Some Query
$sql 	= 'SELECT * FROM words order by used, idwords limit 1;';
$query 	= mysqli_query($con, $sql);
$palabras = [];
$i=0;
while ($row = mysqli_fetch_array($query))
{
	$palabras['idwords'] = $row['idwords'];
	$palabras['english'] = $row['english'];
	$palabras['pronunciation'] = $row['pronunciation'];
	$palabras['sentence'] = $row['sentence'];
	$palabras['spanish'] = $row['spanish'];
	$palabras['used'] = $row['used'];
	$palabras['group_id'] = $row['group_id'];
	$palabras['created'] = $row['created'];
	$palabras['modified'] = $row['modified'];
	$palabras['isrepeat'] = $row['isrepeat'];
	
}

header('Content-Type: application/javascript');
echo $_GET['callback'].'('.json_encode($palabras).')' ;
mysqli_close ($con);


?>