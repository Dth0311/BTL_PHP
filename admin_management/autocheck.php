<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "btl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM ds_xettuyen";
$result = $conn -> query($sql);

$Diem = $_POST["Diem"];
// $Diem = 37;
echo $Diem;
$XT_A = array();
$XT_B = array();
$XT_C = array();
$tinhTrang ="";
$lop = "";
while($row = $result -> fetch_assoc()) {
    $SBD = $row['SBD'];
    // echo $SBD;
    if($row["TongDiem"] >= $Diem){
        $tinhTrang = "Đã đỗ";
    } else {
        $tinhTrang = "Trượt";
    }
    $sql_l = "UPDATE ds_xettuyen SET `TrangThai` = '$tinhTrang', `Lop` = '$lop' WHERE `SBD` = '$SBD'";
    
    if ($conn->query($sql_l) === TRUE) {
        // echo "New record created successfully <br>";
    } else {
        // echo "Error: " . $sql_l . "<br>" . $conn->error;
    }
    if( $tinhTrang == "Đã đỗ") {
        //    echo $row['Khoi'];
            if ($row['Khoi'] == "A") {
                // echo $row['TongDiem'];
                // echo "</br>" .$row['id']. "</br>" ;
                $XT_A[" ".$row['SBD']] = $row['TongDiem'];
                // array_push($XT_A, $row['TongDiem']);
            }
            if ($row['Khoi'] == "B") {
                // echo $row['TongDiem'];
                // echo "</br>" .$row['id']. "</br>" ;
                $XT_B[" ".$row['SBD']] = $row['TongDiem'];
                // array_push($XT_A, $row['TongDiem']);
            }
            if ($row['Khoi'] == "C") {
                // echo $row['TongDiem'];
                // echo "</br>" .$row['id']. "</br>" ;
                $XT_C[" ".$row['SBD']] = $row['TongDiem'];
                // array_push($XT_A, $row['TongDiem']);
            }
        }
}
$SL_lopA = $_POST["A"];
$SL_lopB = $_POST["B"];
$SL_lopC = $_POST["C"];



// while($row = $result -> fetch_assoc()){
    
   
// }
arsort($XT_A);
print_r ($XT_A);
echo "</br>";
arsort($XT_B);
print_r ($XT_B);
echo "</br>";
arsort($XT_C);
print_r ($XT_C);
echo "</br>";
$SL_A = 15;
$SL_A = 15;
$SL_A = 15;
// $first_10_elements = array_slice($HSK_A, 0, 3);
// $second_10_elements = array_slice($HSK_A, 4, count($HSK_A));
$HSK_A = array();
$HSK_B = array();
$HSK_C = array();
// $newArray = array_slice($XT_A, 0, 15);
// Lấy lần lượt các đoạn 5 phần tử của mảng gốc và cho vào mảng rỗng
for ($i = 0; $i < count($XT_A); $i += 15) {
    $HSK_A[] = array_slice($XT_A, $i, 15);
}
for ($i = 0; $i < count($XT_B); $i += 15) {
    $HSK_B[] = array_slice($XT_B, $i, 15);
}
for ($i = 0; $i < count($XT_C); $i += 15) {
    $HSK_C[] = array_slice($XT_C, $i, 15);
}

// print_r(array_keys($newArray[1])[1]);
    // print_r($HSK_A);
    print_r($XT_A);
    // print_r($XT_C);
    // print_r(count( $HSK_A[0]));
    // print_r(count( $HSK_A[1]));
    // print_r( array_keys($HSK_A[2])[1]);
    // print_r(count( $XT_A));

for ($j=0; $j < count($XT_A); $j++) { 
    // print_r($newArray[$j]);
    for ($i = 0; $i < count(array_keys($HSK_A[$j])); $i++) {
        if (count(array_keys($HSK_A[$j])) == 15) {
            echo count(array_keys($HSK_A[$j])) . "</br>";
            # code...
            $key = array_keys($HSK_A[$j])[$i];
            // $value = $newArray[$key];
            $lop = "10A" .($j+1);
            // echo $lop;
            // echo $key . ': ' . $value . '<br>';
            $sql = "SELECT * FROM ds_xettuyen";
            $result = $conn->query($sql);
            $check =  $key;
            // echo $check. "</br>"; 
            while($row = $result->fetch_assoc()) {
                // echo  $check;
                if ($row["SBD"] == $check) {
                    // echo $sbd . '</br>';
                    // echo $lop. '</br>';
                    $sql_l = "UPDATE ds_xettuyen SET lop = '$lop' WHERE SBD=$check";
                    if ($conn->query($sql_l) === TRUE) {
                        // echo "New record created successfully <br>";
                    } else {
                        // echo "Error: " . $sql_l . "<br>" . $conn->error;
                    }
                }
            }
        } else {
            $key = array_keys($HSK_A[$j])[$i];
            $sql = "SELECT * FROM ds_xettuyen";
            $result = $conn->query($sql);
            $check =  $key;
            // echo $check. "</br>"; 
            while($row = $result->fetch_assoc()) {
                // echo  $check;
                if ($row["SBD"] == $check) {
                    
                    // echo $sbd . '</br>';
                    // echo $lop. '</br>';
                    $sql_l = "UPDATE ds_xettuyen SET `TrangThai` = 'Trượt', `Lop` = '' WHERE SBD=$check";
                    if ($conn->query($sql_l) === TRUE) {
                        // echo "New record created successfully <br>";
                    } else {
                        // echo "Error: " . $sql_l . "<br>" . $conn->error;
                    }
                }
            }
        }
    }
}
for ($j=0; $j < count($XT_B); $j++) { 
    // print_r($newArray[$j]);
    for ($i = 0; $i < count(array_keys($HSK_B[$j])); $i++) {
        if (count(array_keys($HSK_B[$j])) == 15) {
            # code...
            $key = array_keys($HSK_B[$j])[$i];
            // $value = $newArray[$key];
            $lop = "10B" .($j+1);
            // echo $lop;
            // echo $key . ': ' . $value . '<br>';
            $sql = "SELECT * FROM ds_xettuyen";
            $result = $conn->query($sql);
            $check =  $key;
            // echo $check. "</br>"; 
            while($row = $result->fetch_assoc()) {
                // echo  $check;
                if ($row["SBD"] == $check) {

                // $sbd =$row["SBD"];
                // echo $sbd . '</br>';
                // echo $lop. '</br>';
                $sql_l = "UPDATE ds_xettuyen SET lop = '$lop' WHERE SBD=$check";
                if ($conn->query($sql_l) === TRUE) {
                    // echo "New record created successfully <br>";
                } else {
                    // echo "Error: " . $sql_l . "<br>" . $conn->error;
                }
                }
            }
        } else {
            $key = array_keys($HSK_B[$j])[$i];
            $sql = "SELECT * FROM ds_xettuyen";
            $result = $conn->query($sql);
            $check =  $key;
            // echo $check. "</br>"; 
            while($row = $result->fetch_assoc()) {
                // echo  $check;
                if ($row["SBD"] == $check) {
                    
                    // echo $sbd . '</br>';
                    // echo $lop. '</br>';
                    $sql_l = "UPDATE ds_xettuyen SET `TrangThai` = 'Trượt', `Lop` = ' ' WHERE SBD=$check";
                    if ($conn->query($sql_l) === TRUE) {
                        // echo "New record created successfully <br>";
                    } else {
                        // echo "Error: " . $sql_l . "<br>" . $conn->error;
                    }
                }
            }
        }
    }
}
for ($j=0; $j < count($XT_C); $j++) { 
    // print_r($newArray[$j]);
    for ($i = 0; $i < count(array_keys($HSK_C[$j])); $i++) {
        if (count(array_keys($HSK_C[$j])) == 15) {
            # code...
            $key = array_keys($HSK_C[$j])[$i];
            // $value = $newArray[$key];
            $lop = "10C" .($j+1);
            $t = "";
            // echo $lop;
            // echo $key . ': ' . $value . '<br>';
            $sql = "SELECT * FROM ds_xettuyen";
            $result = $conn->query($sql);
            $check =  $key;
            // echo $check. "</br>"; 
            while($row = $result->fetch_assoc()) {
                // echo  $check;
                if ($row["SBD"] == $check) {

                $sbd =$row["SBD"];
                // echo $sbd . '</br>';
                // echo $lop. '</br>';
                $sql_l = "UPDATE ds_xettuyen SET lop = '$lop' WHERE SBD=$check";
                if ($conn->query($sql_l) === TRUE) {
                    // echo "New record created successfully <br>";
                } else {
                    // echo "Error: " . $sql_l . "<br>" . $conn->error;
                }
                }
            }
        }else {
            $key = array_keys($HSK_C[$j])[$i];
            $sql = "SELECT * FROM ds_xettuyen";
            $result = $conn->query($sql);
            $check =  $key;

            // echo $check. "</br>"; 
            while($row = $result->fetch_assoc()) {
                // echo  $check;
                if ($row["SBD"] == $check) {
                
                    
                    $sbd =$row["SBD"];
                    echo $sbd . '</br>';
                    // echo $lop. '</br>';
                    $sql_l = "UPDATE `ds_xettuyen` SET `TrangThai`='Trượt',`Lop`='' WHERE `SBD` = $check";
                    if ($conn->query($sql_l) === TRUE) {
                        // echo "New record created successfully <br>";
                    } else {
                        // echo "Error: " . $sql_l . "<br>" . $conn->error;
                    }
                }
            }
        }
        
    }
}
$conn->close();
header("location:basic-table.php");
?>