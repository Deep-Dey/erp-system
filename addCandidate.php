<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Pannel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="./img/favicon.png" rel="icon" type="image/png" />
</head>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
}
?>

<body>
    <?php
    include("header.php");
    ?>
    <div class="login-form">
        <form action="addCandidate.php" method="post">
            <h2 class="text-center">Add Candidate</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Name" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="phone (must be 10 digit)" required="required" pattern="[0-9]{10}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="addcandidate">Add</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
include('./connection/dbconnection.php');
if (isset($_POST['addcandidate'])) {
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "select email from candidate where email='" . $email . "'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if ($row  > 0) {
?>
        <script>
            alert('Email already exist');
            window.location = "addCandidate.php";
        </script>
        <?php
    } else {
        $query = "insert into candidate values ('','$userName','$email','$phone')";
        if (mysqli_query($conn, $query)) {
        ?>
            <script>
                alert('You Added  new Candidate');
                window.location = "admin.php";
            </script>
<?php
        }
    }
}
?>