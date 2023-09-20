<?php
session_start();
require_once('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>สมัครสมาชิก - Cyber crime investigation bureau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="scss/bootstrap/bootstrap.css">
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - Cyber crime investigation bureau</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

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
    require_once("nav.php");
    ?>

    <div id="content" class="p-4 p-md-5 pt-5">
        <main class="form-signin">
            <form action="function_register.php" method="POST">
                <h1 class="h3 mb-3 fw-normal text-center">สมัครสมาชิก</h1>

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
                    <input type="text" name="firstname" class="form-control" placeholder="Enter your firstname">
                    <label for="firstname">ชื่อ</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="lastname" class="form-control" placeholder="Enter your lastname">
                    <label for="lastname">นามสกุล</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="division" class="form-control" placeholder="Enter your division">
                    <label for="division">หน่วย</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="line_id" class="form-control" placeholder="Enter your line ID">
                    <label for="line_id">ไลน์</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="email" name="email" class="form-control" placeholder="name@example.com">
                    <label for="email">อีเมล์</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Enter your Password">
                    <label for="password">รหัสผ่าน</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="password" name="c_password" class="form-control" placeholder="Enter your Confirm Password">
                    <label for="confirm password">ยืนยันรหัสผ่าน</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="signup" type="submit">สมัครสมาชิก</button>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>