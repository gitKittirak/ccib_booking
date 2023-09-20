<?php
session_start();
require_once('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>แก้ไขข้อมูลส่วนตัว - Cyber crime investigation bureau</title>
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
            <form action="function_edituser.php" method="POST">
                <h1 class="h3 mb-3 fw-normal text-center">แก้ไขข้อมูลส่วนตัว</h1><br>

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
                <?php
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
                $stmt->bindParam(":user_id", $user_id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="mb-2 form-floating">
                    <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname']; ?>" placeholder="Enter your firstname">
                    <label for="firstname">ชื่อ</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname']; ?>" placeholder="Enter your lastname">
                    <label for="lastname">นามสกุล</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="division" class="form-control" value="<?php echo $row['division']; ?>" placeholder="Enter your division">
                    <label for="division">หน่วย</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="line_id" class="form-control" value="<?php echo $row['line_id']; ?>" placeholder="Enter your line ID">
                    <label for="line_id">ไลน์</label>
                </div>
                <div class="mb-2 form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Enter your Password">
                    <label for="password">รหัสผ่าน</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="edit_user" type="submit">ยืนยัน</button>
            </form>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>