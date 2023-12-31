<?php

$servername = "database";
$username = "root";
$password = "tiger";
$database = "system_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set PDO Error mode to exception
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection success";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
date_default_timezone_set('Asia/Bangkok');
