<?php
session_start();

require_once('connect.php');
if (isset($_POST['edit_user'])) {
    $user_id = $_SESSION['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $division = $_POST['division'];
    $email = $_POST['email'];
    $line = $_POST['line_id'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "อีเมลไม่ถูกต้อง!";
        header("location: edituser_admin.php");
    }

    // Get user with the same line_id
    $check_line = $conn->prepare("SELECT * FROM users WHERE line_id = :line_id AND user_id != :user_id");
    $check_line->bindParam(":line_id", $line);
    $check_line->bindParam(":user_id", $user_id);
    $check_line->execute();
    $row = $check_line->fetch(PDO::FETCH_ASSOC);

    // Check if line_id is already in use by another user
    if ($row) {
        $_SESSION['warning'] = "ไอดีไลน์ถูกใช้ไปแล้ว";
        header("location: edituser_admin.php");
        exit();
    }

    // Update user information
    $stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, division = :division, email = :email, line_id = :line_id WHERE user_id = :user_id");
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":division", $division);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":line_id", $line);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $_SESSION['success'] = "แก้ไขเรียบร้อยแล้ว";
    header("location: viewuser.php");
    exit();
}
