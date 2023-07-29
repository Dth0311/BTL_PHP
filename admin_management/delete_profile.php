<?php

$id = $_GET["id"];
echo $id;
require_once "conn.php";
$sql_d = "DELETE FROM `giaovien` WHERE `idGv` = '$id'";
$conn -> query($sql_d);
header("location: list_profile.php");
?>