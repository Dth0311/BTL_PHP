<?php
$id = $_GET["id"];
echo $id;
require_once "conn.php";
$sql_d = "DELETE FROM `dang_nhap_hs` WHERE `idHs` = '$id'";
$conn -> query($sql_d);
header("location: blank.php");
?>