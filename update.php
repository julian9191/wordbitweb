<?php

$idword = $_GET["idwords"];
$repeat = $_GET["repeat"];

require_once("conexion.php");

// Some Query
$sql = "UPDATE words SET used = now() WHERE idwords = '".$idword."';";
if($repeat==1){
	$sql = "UPDATE words SET isrepeat = 1 WHERE idwords = '".$idword."';";
}


echo $sql;

mysqli_query($con, $sql);
mysqli_close ($con);


?>