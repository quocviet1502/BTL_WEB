<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["Ho"];
    $last_name = $_POST["Ten"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $date = $_POST["date"];
    $gioitinh = $_POST["gioitinh"];
    $tinh = $_POST["customer_tinh"];
    $huyen = $_POST["customer_huyen"];
    $xa = $_POST["customer_xa"];
    $phone = $_POST["Dienthoai"];
    $diachi = $_POST["diachi"];
    $angree = isset($_POST['angree']) ? 1 : 0;

    require_once("database/dtb.php");
    $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $errors[] = "Email already exists";
    } 
    if (empty($errors)) {
        $sql = "INSERT INTO tbl_users (first_name, last_name, email, date, gioitinh, tinh, 	huyen, xa, 	phone, diachi, angree) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
         $stmt = mysqli_stmt_init($conn);
         $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
         if($prepareStmt){
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"sssssssssss",$first_name, $last_name, $email, $date, $gioitinh, $tinh, $huyen, $xa, $phone, $diachi, $angree);
            mysqli_stmt_execute($stmt);
         } else {
            die("Something went wrong");
        }
    }
    exit();
}
?>

