<?php
session_start();
if (!isset($_SESSION['admin_login'])) {
    header("location: login.php");
}
require_once('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Cyber crime investigation bureau</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="scss/bootstrap/bootstrap.css">
</head>

<body>
    <?php
    require_once("navadmin.php");
    ?>
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4 text-center">ข้อมูล User</h2>
        <table id="table" data-toggle="table" data-url="data_viewuser.php">
            <thead>
                <tr>
                    <th data-field="user_id">ID</th>
                    <th data-field="firstname">ชื่อ</th>
                    <th data-field="lastname">นามสกุล</th>
                    <th data-field="division">หน่วย</th>
                    <th data-field="email">อีเมล</th>
                    <th data-field="line_id">ไลน์ไอดี</th>
                    <th data-field="id" data-formatter="editbutton">แก้ไข</th>
                </tr>
            </thead>
        </table>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function editbutton(value, row, index) {
            return '<a class="btn btn-warning" href="edituser_admin.php?user_id=' + row.user_id + '">แก้ไข</a>';
        }

        function edituser(user_id) {
            $.post("edituser_admin.php", {
                    user_id: user_id
                })
                .done(function(data) {
                    // Handle successful response
                    console.log(data);
                    alert("Edit operation successful!");
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Handle error
                    console.log(textStatus, errorThrown);
                });
        }
    </script>
</body>

</html>