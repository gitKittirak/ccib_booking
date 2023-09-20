<?php
session_start();
if (!isset($_SESSION['user_login'])) {
    header("location: login.php");
}
require_once('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>User - Cyber crime investigation bureau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="scss/bootstrap/bootstrap.css">
</head>

<body>
    <?php
    require_once("navuser.php");
    ?>
    <!-- <div class="px-4 py-5 my-5 text-center"> -->
    <div id="content" class="p-4 p-md-5 pt-5">

        <?php
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <h1 class="display-5 fw-bold text-center">ยินดีต้อนรับ, คุณ<?php echo $row['firstname'] ?></h1>
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4 text-center">ตารางห้องประชุมอาทิตย์นี้</h2>
            <table id="table" data-toggle="table" data-url="table_booking.php">
                <thead>
                    <tr>
                        <th data-field="booking_id">ID</th>
                        <th data-field="topic">หัวข้อการประชุม</th>
                        <th data-field="details">รายละเอียด</th>
                        <th data-field="meetingroom">ชั้นที่</th>
                        <th data-field="daybooking">จองวันที่</th>
                        <th data-field="timebooking">ช่วงเวลา</th>
                        <th data-field="user_firstname">ผู้จอง</th>
                        <th data-field="user_division">หน่วย</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>