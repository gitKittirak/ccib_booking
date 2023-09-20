<?php
session_start();
require_once('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>จองห้องประชุม - Cyber crime investigation bureau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="scss/bootstrap/bootstrap.css">
    <style>
        .form-signin {
            width: 100%;
            max-width: 360px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
    </style>
</head>

<body>

    <?php
    require_once("navuser.php");
    ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <main class="form-signin">
            <form action="function_booking.php" method="POST">
                <h1 class="h3 mb-3 fw-normal text-center">จองห้องประชุม</h1><br>

                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['warning'])) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                        ?>
                    </div>
                <?php } ?>

                <div class="mb-2 form-floating">
                    <input type="text" name="topic" class="form-control" placeholder="Enter your topic">
                    <label for="topic">หัวข้อการประชุม</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="details" class="form-control" placeholder="Enter your detail">
                    <label for="details">รายละเอียดเพิ่มเติม (พอสังเขป)</label>
                    <div id="details" class="form-text">" ex.ประชุม 9:00-12:00น. Meeting ID: "</div>
                </div>
                <div class="mb-2 form-floating">
                    <select id="meetingroom" name=meetingroom class="form-select">
                        <option selected></option>
                        <!-- <option value="ชั้น01">ชั้น01</option>
                        <option value="ชั้น02">ชั้น02</option>
                        <option value="ชั้น03">ชั้น03</option>
                        <option value="ชั้น04">ชั้น04</option>
                        <option value="ชั้น05">ชั้น05</option>
                        <option value="ชั้น06">ชั้น06</option>
                        <option value="ชั้น07">ชั้น07</option>
                        <option value="ชั้น08">ชั้น08</option>
                        <option value="ชั้น09">ชั้น09</option>
                        <option value="ชั้น10">ชั้น10</option>
                        <option value="ชั้น11">ชั้น11</option>
                        <option value="ชั้น12">ชั้น12</option>
                        <option value="ชั้น13">ชั้น13</option>
                        <option value="ชั้น14">ชั้น14</option>
                        <option value="ชั้น15">ชั้น15</option>
                        <option value="ชั้น16">ชั้น16</option>
                        <option value="ชั้น17">ชั้น17</option>
                        <option value="ชั้น18">ชั้น18</option> -->
                        <option value="ชั้น19">ชั้น19</option>
                        <!-- <option value="ชั้น20">ชั้น20</option> -->
                    </select>
                    <label for="meetingroom">เลือกห้องประชุม</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="date" name="daybooking" class="form-control" placeholder="date">
                    <label for="date">วันที่</label>
                </div>
                <div class="mb-2 form-floating">
                    <select id="timebooking" name=timebooking class="form-select">
                        <option selected></option>
                        <option value="ช่วงเช้า">ช่วงเช้า</option>
                        <option value="ช่วงบ่าย">ช่วงบ่าย</option>
                        <option value="ทั้งวัน">ทั้งวัน</option>
                    </select>
                    <label for="timebooking">เลือกช่วงเวลา</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="booking" type="submit">ยืนยันการจอง</button>
            </form>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>