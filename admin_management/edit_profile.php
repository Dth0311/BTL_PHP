<?php 
require_once 'conn.php';

    // if ($conn->connect_error) {
    // echo "false";}
    // else {
    //     echo "true";
    // }
    $idGV = $_POST["idGV"];
    $ten = $_POST["ten"];
    echo $ten;
    $diachi = $_POST["diachi"];
    $ngaysinh = $_POST["ngaysinh"];
    $gioitinh = $_POST["gioitinh"];
    $cccd = $_POST["cccd"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    $idmon = $_POST["idmon"];

    // echo  $ten;
    // echo $id;
    // if(isset($_POST["submit"])){
        $sql = "UPDATE `giaovien` SET `idMonHoc`='$idmon',`HoTen`='$ten',`NgaySinh`='$ngaysinh',`GioiTinh`='$gioitinh',`CCCD`='$cccd',`SDT`='$sdt',`Email`='$email',`DiaChi`='$diachi' WHERE `idGV` = '$idGV'";
    
        if ($conn->query($sql) === TRUE) {
            $thongbao = "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
        $conn->close();
        header("location:list_profile.php");
    // }
?>