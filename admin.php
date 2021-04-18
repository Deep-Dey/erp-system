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
    <div class="d-flex flex-column  justify-content-center align-items-center">
        <div class="p-2">
            <img src="./img/image_erp.png" alt="" class="rounded-circle" style="width: 250px; margin-top: 10px;">
        </div>
        <div class="p-2">
            <h1>Interview Assignment at Websoft Techs</h1>
        </div>
        <div class="p-2">
            <h2>Welcome to the Admin Section</h2>
        </div>
        <div class="p-2"><a class="btn btn-primary" href="addCandidate.php">Add new Candidate</a></div>
    </div>

</body>

</html>