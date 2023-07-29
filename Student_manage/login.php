<?php 
session_start();
require_once "connect.php";
$acc = $_POST["idHs"];
$pass = $_POST["password"];
// echo $acc;
// echo $pass;

$sql = "SELECT * FROM dang_nhap_hs";

$result = $conn->query($sql);

if (isset($_POST["login"])) {

  # code...
  while($row = $result->fetch_assoc()) {
      if($row["idHs"] == $acc && $row["password"] == $pass) {
        $_SESSION['idHs']=$row["idHs"];
          $err = "";
          header("location: profile.php");
      } else {
         $err = "Tài khoản hoặc mật khẩu không đúng xin mời nhập lại !";
      }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
      .divider:after,
      .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
      }
      .h-custom {
      height: calc(100% - 73px);
      }
      @media (max-width: 450px) {
      .h-custom {
      height: 100%;
      }
      }
  </style>
</head>
<body>
  <form action="" method="post">
  <section class="vh-100">
  <div class="container-fluid h-custom">
     <div>
    <!-- Copyright -->
    <img src="IMG/header.jpg" alt="" style = "width:100%; height:150px;">
    <!-- Copyright -->
    </div style = " width:100px;height:100px;float:right;">

    <a href="AdminPhp/index.php" style = "float:right; margin-top: 10px;">Tài khoản giáo viên</a>
    <img src="IMG/user.png" alt="" style = "width:20px;height:20px;float:right;margin-top: 10px;">
  
    
    <div class="row d-flex justify-content-center align-items-center h-100" >

      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-4 me-3">Cổng thông tin học sinh</p>
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="idHs" id="form3Example3" class="form-control form-control-lg"placeholder="Nhập tên đăng nhập" />
            <label class="form-label" for="form3Example3">Tên đăng nhập</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Nhập mật khẩu" />
            <label class="form-label" for="form3Example4">Mật khẩu</label>
          </div>
            <div class="mb-4" style="color:red"><?php echo $err ?></div>
            <button name="login" type="submit" class="btn btn-primary btn-lg"style="padding-left: 2.5rem; padding-right: 2.5rem;margin-left:100px">Đăng nhập</button>
      </div>
    </div>
  </div>
 
</section>

  </form>
  
</body>
</html>