<?php


$con = @mysqli_connect('localhost', 'root', '', 'wordbitweb');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}

?>