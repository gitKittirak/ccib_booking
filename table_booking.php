<?php
require_once('connect.php');


$data = $conn->prepare("SELECT * FROM booking ORDER BY daybooking ASC");
$data->execute();
$result = $data->fetchAll();
echo json_encode($result);




// $start_date = date('Y-m-d', strtotime('monday this week'));
// $end_date = date('Y-m-d', strtotime('sunday this week'));

// $sql = "SELECT * FROM booking WHERE daybooking BETWEEN :start_date AND :end_date ORDER BY daybooking ASC";
// $stmt = $conn->prepare($sql);
// $stmt->bindParam(':start_date', $start_date);
// $stmt->bindParam(':end_date', $end_date);
// $stmt->execute();
// $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($rows);



// <?php
// try {
//     require_once('connect.php');

//     $start_date = date('Y-m-d', strtotime('monday this week'));
//     $end_date = date('Y-m-d', strtotime('sunday this week'));

//     $sql = "SELECT * FROM booking WHERE daybooking BETWEEN :start_date AND :end_date ORDER BY daybooking ASC";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':start_date', $start_date);
//     $stmt->bindParam(':end_date', $end_date);
//     $stmt->execute();
    
//     // Check for errors in the SQL query
//     if (!$stmt) {
//         throw new Exception("SQL Error: " . $conn->errorInfo()[2]);
//     }

//     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     echo json_encode($rows);
// } catch (Exception $e) {
//     echo "Error: " . $e->getMessage();
// }
