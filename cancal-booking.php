<?php
require_once("connect.php");

if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    $stmt = $conn->prepare("DELETE FROM booking WHERE booking_id = :booking_id");
    $stmt->bindParam(":booking_id", $booking_id);
    $stmt->execute();
}
