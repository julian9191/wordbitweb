<?php

$con = @mysqli_connect('localhost', 'root', '', 'wordbitweb');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

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

$sql 	= "UPDATE words SET isrepeat = 0 WHERE idwords = '".$palabras['idwords']."';";
$query 	= mysqli_query($con, $sql);

echo json_encode($palabras);
// Close connection
mysqli_close ($con);


?>