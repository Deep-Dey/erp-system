<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link href="./img/favicon.png" rel="icon" type="image/png" />
    <?php
    session_start();
    if (isset($_SESSION['id'])) {
        header('location:admin.php');
    }
    ?>
</head>

<body>
    <div class="login-form">
        <form action="index.php" method="post">
            <h2 class="text-center">Admin Login</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="userid" placeholder="Userid" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include('./connection/dbconnection.php');

if (isset($_POST['submit'])) {
    $userId = $_POST['userid'];
    $password = $_POST['password'];

    $query = "select id,password from admin where id='" . $userId . "' and password='" . $password . "'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if ($row  < 1) {
?>
        <script>
            alert('Username or Password not matched');
        </script>
    <?php

    } else {
        $row_value = mysqli_fetch_array($result);
        $_SESSION['id'] = $row_value['id'];
    ?>
        <script>
            alert('Login Successfull.');
            window.location = "admin.php";
        </script>
<?php
    }
}
?>