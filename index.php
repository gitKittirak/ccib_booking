<!doctype html>
<html lang="en">

<head>
    <title>Cyber crime investigation bureau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="scss/bootstrap/bootstrap.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">เมนู</span>
                </button>
            </div>
            <h1><a href="index.php" class="logo">Cyber crime investigation bureau</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active"><a href="index.php"><span class="fa fa-home mr-3"></span> หน้าหลัก</a></li>
                <li><a href="login.php"><span class="fa fa-user mr-3"></span> ลงชื่อเข้าใช้</a></li>
                <li><a href="register.php"><span class="fa fa-sticky-note mr-3"></span> สมัครสมาชิก</a></li>
            </ul>
        </nav>
        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4 text-center">สถานะการจองห้องประชุม</h2>
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