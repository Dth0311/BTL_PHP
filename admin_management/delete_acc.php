<?php
$id = $_GET["id"];
echo $id;
require_once "conn.php";
$sql_d = "DELETE FROM `accountgv` WHERE `id_gv` = '$id'";
$conn -> query($sql_d);
header("location: blank.php");
?>