<?php
session_start();
error_reporting(0);
require_once("connect.php");

if (isset($_POST['booking'])) {
    $topic = $_POST['topic'];
    $details = $_POST['details'];
    $meetingroom = $_POST['meetingroom'];
    $daybooking = $_POST['daybooking'];
    $timebooking = $_POST['timebooking'];
    $firstname = $_SESSION['user_firstname'];
    $division = $_SESSION['user_division'];
    $user_id = $_SESSION['user_login'];

    if (empty($topic)) {
        $_SESSION["error"] = "กรุณาใส่ชื่อเรื่อง!";
        header("location: booking.php");
    } else if (empty($details)) {
        $_SESSION["error"] = "กรุณารายละเอียดอื่นๆ!";
        header("location: booking.php");
    } else if (empty($meetingroom)) {
        $_SESSION["error"] = "กรุณาห้องประชุม!";
        header("location: booking.php");
    } else if (empty($daybooking)) {
        $_SESSION["error"] = "กรุณาเลือกวันที่!";
        header("location: booking.php");
    } else if (empty($timebooking)) {
        $_SESSION["error"] = "กรุณาเลือกเวลา!";
        header("location: booking.php");
    } else {
        try {
            $check_query = "SELECT * FROM booking WHERE daybooking = :daybooking AND timebooking = :timebooking AND meetingroom = :meetingroom";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bindParam(":daybooking", $daybooking);
            $check_stmt->bindParam(":timebooking", $timebooking);
            $check_stmt->bindParam(":meetingroom", $meetingroom);
            $check_stmt->execute();
            $check_result = $check_stmt->fetch(PDO::FETCH_ASSOC);

            if ($check_result) {
                $_SESSION['warning'] = "มีคนจองไปแล้ว";
                header("location: booking.php");
            } else {
                $insert_query = "INSERT INTO booking(topic, details, meetingroom, daybooking, timebooking, user_firstname, user_division, user_id) 
                                     VALUES(:topic, :details, :meetingroom, :daybooking, :timebooking, :user_firstname, :user_division, :user_login)";
                $insert_stmt = $conn->prepare($insert_query);
                $insert_stmt->bindParam(":topic", $topic);
                $insert_stmt->bindParam(":details", $details);
                $insert_stmt->bindParam(":meetingroom", $meetingroom);
                $insert_stmt->bindParam(":daybooking", $daybooking);
                $insert_stmt->bindParam(":timebooking", $timebooking);
                $insert_stmt->bindParam(":user_firstname", $firstname);
                $insert_stmt->bindParam(":user_division", $division);
                $insert_stmt->bindParam(":user_login", $user_id);
                $insert_stmt->execute();

                $sToken = "1DGYdlRT99qVK2Gt9TfF5fufAgqRK2q4gxVVmcZnvdQ";
                $sMessage = "แจ้งเตือนการจองห้องประชุม!\r\n";
                $sMessage .= "หัวข้อการประชุม: " . $topic . " \r\n";
                $sMessage .= "ห้องประชุมชั้นที่: " . $meetingroom . " \r\n";
                $sMessage .= "วันที่ - เวลา: " . $daybooking . " " . $timebooking . "\r\n";
                $sMessage .= "รายละเอียด: " . $details . " \r\n";
                $sMessage .= "ผู้จอง: " . $firstname . " \r\n";

                $chOne = curl_init();
                curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($chOne, CURLOPT_POST, 1);
                curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
                $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
                curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($chOne);

                $_SESSION['success'] = "จองเรียบร้อยแล้ว";
                header("location: index_user.php");
            }
        } catch (PDOException $e) {
            $_SESSION["error"] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล!";
            header("location: booking.php");
        }
    }
}
