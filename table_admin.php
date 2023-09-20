<?php
require_once('connect.php');

$start_date = date('Y-m-d', strtotime('monday this week'));
$end_date = date('Y-m-d', strtotime('sunday this week'));

$sql = "SELECT * FROM booking WHERE daybooking BETWEEN :start_date AND :end_date";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':start_date', $start_date);
$stmt->bindParam(':end_date', $end_date);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
