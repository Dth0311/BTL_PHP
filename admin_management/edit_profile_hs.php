<?php 
require_once 'conn.php';

    // if ($conn->connect_error) {
    // echo "false";}
    // else {
    //     echo "true";
    // }
    $idHS = $_POST["idHS"];
    $ten = $_POST["ten"];
    echo $ten;
    $diachi = $_POST["diachi"];
    $ngaysinh = $_POST["ngaysinh"];
    $gioitinh = $_POST["gioitinh"];
    $cccd = $_POST["cccd"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    
    // echo  $ten;
    // echo $id;
    // if(isset($_POST["submit"])){
        $sql = "UPDATE `hocsinh` SET `HoTen`='$ten',`NgaySinh`=' $ngaysinh',`CCCD`='$cccd',`SDT`='$sdt',`Email`='$email',`DiaChi`=' $diachi' WHERE `idHs`='$idHS'";
    
        if ($conn->query($sql) === TRUE) {
            $thongbao = "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
        $conn->close();
        header("location:students.php");
    // }
?>