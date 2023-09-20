<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_login'])) {
    header("location: login.php");
}

require_once('connect.php');

if (isset($_POST['edit_user'])) {
    $user_id = $_SESSION['user_login'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $division = $_POST['division'];
    $line = $_POST['line_id'];
    $password = $_POST['password'];

    // Get user with the same line_id
    $check_line = $conn->prepare("SELECT * FROM users WHERE line_id = :line_id AND user_id != :user_id");
    $check_line->bindParam(":line_id", $line);
    $check_line->bindParam(":user_id", $user_id);
    $check_line->execute();
    $row = $check_line->fetch(PDO::FETCH_ASSOC);

    // Get user's current password
    $get_user = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $get_user->bindParam(":user_id", $user_id);
    $get_user->execute();
    $user = $get_user->fetch(PDO::FETCH_ASSOC);

    // Verify current password
    if (!password_verify($password, $user['password'])) {
        $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง!";
        header("location: edit_user.php");
        exit();
    }

    // Check if line_id is already in use by another user
    if ($row) {
        $_SESSION['warning'] = "ไอดีไลน์ถูกใช้ไปแล้ว";
        header("location: edit_user.php");
        exit();
    }

    // Update user information
    $stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, division = :division, line_id = :line_id WHERE user_id = :user_id");
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":division", $division);
    $stmt->bindParam(":line_id", $line);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $_SESSION['success'] = "แก้ไขเรียบร้อยแล้ว";
    header("location: edit_user.php");
    exit();
}
