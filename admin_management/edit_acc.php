<?php 
require_once 'conn.php';

    // if ($conn->connect_error) {
    // echo "false";}
    // else {
    //     echo "true";
    // }
    $pass = $_POST["pass"];
    $idGV = $_POST["idGV"];
    echo $pass . "</br>";
    echo $idGV;

    // echo  $ten;
    // echo $id;
    // if(isset($_POST["submit"])){
        $sql = "UPDATE `accountgv` SET `password`= '$pass' WHERE `id_gv`= '$idGV'";
    
        if ($conn->query($sql) === TRUE) {
            $thongbao = "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
        $conn->close();
        header("location:blank.php");
    // }
?>