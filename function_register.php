<?php 
    session_start();
    error_reporting(0);
    require_once("connect.php");

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $division = $_POST['division'];
        $line = $_POST['line_id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($firstname)) {
            $_SESSION["error"] = "กรุณากรอกชื่อ!";
            header("location: register.php");
        } else if (empty($lastname)) {
            $_SESSION["error"] = "กรุณากรอกนามสกุล!";
            header("location: register.php");
        } else if (empty($division)) {
            $_SESSION["error"] = "กรุณาหน่วย!";
            header("location: register.php");
        }else if (empty($line)) {
            $_SESSION["error"] = "กรุณากรอกไลน์ไอดี!";
            header("location: register.php");
        } else if (empty($email)) {
            $_SESSION["error"] = "กรุณากรอกอีเมล!";
            header("location: register.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "อีเมลไม่ถูกต้อง!";
            header("location: register.php");
        } else if (empty($password)) {
            $_SESSION["error"] = "กรุณากรอกรหัสผ่าน!";
            header("location: register.php");
        } else if (strlen($password) > 20 || strlen($password) < 5) {
            $_SESSION["error"] = "รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร!";
            header("location: register.php");
        } else if (empty($c_password)) {
            $_SESSION["error"] = "กรุณายืนยันรหัสผ่าน!";
            header("location: register.php");
        } else if ($password != $c_password) {
            $_SESSION["error"] = "รหัสผ่านไม่ตรงกัน!";
            header("location: register.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว";
                    header("location: login.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, division, line_id, email, password, urole) VALUES(:firstname, :lastname, :division, :line_id, :email, :password, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":division", $division);
                    $stmt->bindParam(":line_id", $line);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();

                    // 1DGYdlRT99qVK2Gt9TfF5fufAgqRK2q4gxVVmcZnvdQ

                    $sToken = "1DGYdlRT99qVK2Gt9TfF5fufAgqRK2q4gxVVmcZnvdQ";
                    $sMessage = "แจ้งเตือนการสมัครสมาชิก!\r\n";
                    $sMessage .= $firstname . " " . $lastname . " ได้ทำการสมัครสมาชิก!\r\n";
                    $sMessage .= "Full Name: " . $firstname . " " . $lastname . " \r\n";
                    $sMessage .= "Email: " . $email . " \r\n";
                    $sMessage .= "Line ID: " . $line . " \r\n";

                    $chOne = curl_init(); 
                    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt( $chOne, CURLOPT_POST, 1);
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                    curl_setopt( $chOne, CURLOPT_HTTPHEADER, $headers); 
                    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                    $result = curl_exec( $chOne ); 

                    //Result error 
                    // if(curl_error($chOne)) 
                    // { 
                    //     echo 'error:' . curl_error($chOne); 
                    // } 
                    // else { 
                    //     $result_ = json_decode($result, true); 
                    //     echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                    // } 
                    // curl_close( $chOne );

                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว";
                    header("location: login.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด โปรดลองใหม่อีกครั้ง";
                    header("location: register.php");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>