<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "gulpenerturnclub");

$connect=mysqli_connect("localhost","root","","gulpenerturnclub") or die(mysqli_error($connect))

?>