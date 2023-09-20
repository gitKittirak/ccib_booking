<?php 
    session_start();
    error_reporting(0);
    require_once("connect.php");

    if (isset($_POST['booking'])) {
        $topic = $_POST['topic'];
        $division = $_POST['division'];
        $details = $_POST['details'];
        $daybooking = $_POST['daybooking'];
        $timebooking = $_POST['timebooking'];
        $urole = 'user';

        if (empty($topic)) {
            $_SESSION["error"] = "กรุณาใส่ชื่อเรื่อง!";
            header("location: booking.php");
        } else if (empty($division)) {
            $_SESSION["error"] = "กรุณากรอกหน่วย!";
            header("location: booking.php");
        }else if (empty($details)) {
            $_SESSION["error"] = "กรุณารายละเอียดอื่นๆ!";
            header("location: booking.php");
        } else if (empty($daybooking)) {
            $_SESSION["error"] = "กรุณาเลือกวันที่!";
            header("location: booking.php");
        } else if (empty($timebooking)) {
            $_SESSION["error"] = "กรุณาเลือกเวลา!";
            header("location: booking.php");
        } else {
            try {

                // $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                // $check_email->bindParam(":email", $email);
                // $check_email->execute();
                // $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['daybooking'] == $daybooking) {
                    $_SESSION['warning'] = "มีคนจองไปแล้ว";
                    header("location: booking.php");
                }else if (!isset($_SESSION['error'])) {
                    // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO booking(topic, division, details, daybooking, timebooking) VALUES(:topic, :division, :details, :daybooking, :timebooking)");
                    $stmt->bindParam(":topic", $topic);
                    $stmt->bindParam(":division", $division);
                    $stmt->bindParam(":details", $details);
                    $stmt->bindParam(":daybooking", $daybooking);
                    $stmt->bindParam(":timebooking", $timebooking);
                    $stmt->execute();

                    // 1DGYdlRT99qVK2Gt9TfF5fufAgqRK2q4gxVVmcZnvdQ

                    $sToken = "1DGYdlRT99qVK2Gt9TfF5fufAgqRK2q4gxVVmcZnvdQ";
                    $sMessage = "แจ้งเตือนการจองห้องประชุม!\r\n";
                    $sMessage .= "วันที่ - เวลา: " . $daybooking . " " . $timebooking . "\r\n";
                    $sMessage .= "หัวข้อการประชุม: " . $topic . " \r\n";
                    $sMessage .= "รายละเอียด: " . $details . " \r\n";

                    $chOne = curl_init(); 
                    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt( $chOne, CURLOPT_POST, 1);
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
                    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                    $result = curl_exec( $chOne ); 

                    // Result error 
                    // if(curl_error($chOne)) 
                    // { 
                    //     echo 'error:' . curl_error($chOne); 
                    // } 
                    // else { 
                    //     $result_ = json_decode($result, true); 
                    //     echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                    // } 
                    // curl_close( $chOne );

                    $_SESSION['success'] = "จองเรียบร้อยแล้ว";
                    header("location: booking.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด โปรดลองใหม่อีกครั้ง";
                    header("location: booking.php");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>