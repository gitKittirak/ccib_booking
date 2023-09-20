<?php
session_start();
require_once('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>การจองของฉัน - Cyber crime investigation bureau</title>
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
    require_once("navadmin.php");
    ?>
    <?php
    $user_id = $_SESSION['admin_login'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <h1 class="h3 mb-3 fw-normal text-center">ดูการประชุมทั้งหมด</h1>
        <table id="table" data-toggle="table" data-url="table_booking_admin.php">
            <thead>
                <tr>
                    <th data-field="booking_id">ID</th>
                    <th data-field="topic">หัวข้อการประชุม</th>
                    <th data-field="details">รายละเอียด</th>
                    <th data-field="meetingroom">ชั้นที่</th>
                    <th data-field="daybooking">จองวันที่</th>
                    <th data-field="timebooking">ช่วงเวลา</th>
                    <th data-field="user_firstname">ชื่อ</th>
                    <th data-field="user_division">หน่อย</th>
                    <th data-field="id" data-formatter="cancalbutton">ยกเลิกการจอง</th>
                </tr>
            </thead>
        </table>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function cancalbutton(value, row, index) {
            return '<button class="btn btn-danger" onclick="deletebookinguser(' + row.booking_id + ')">ยกเลิกการจอง</button>';
        }

        function deletebookinguser(booking_id) {
            $.post("cancal-booking.php", {
                    booking_id: booking_id
                })
                .done(function(data) {
                    alert("ยกเลิกการจองสำเร็จ!");
                    location.reload();
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                });
        }
    </script>
</body>

</html>