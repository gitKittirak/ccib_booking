<?php
require_once('connect.php');

$role = 'user'; // replace with the desired role

$sql = "SELECT * FROM users WHERE urole = :role";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':role', $role, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
