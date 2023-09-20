<?php
session_start();

require_once('connect.php');

$data = $conn->prepare("SELECT * FROM booking ORDER BY daybooking ASC");
$data->execute();
$result = $data->fetchAll();
echo json_encode($result);
