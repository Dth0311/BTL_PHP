<?php
$host = "localhost";
$username = "root";
$password = "12345678";
$dbname = "btl";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// if ($conn->connect_error) {
//    echo "false";}
// else {
//     echo "true";
// }

// $sql = "SELECT * FROM dang_nhap_hs";
// $result = $conn->query($sql);
// while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["account"]. "  " . $row["password"]. " " .$row["id_subject"]."<br>";
//   }