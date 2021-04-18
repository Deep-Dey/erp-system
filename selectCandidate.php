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
    <script src="./js/app.js"></script>
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
    include("./connection/dbconnection.php")
    ?>
    <div class="login-form">
        <form action="invoice.php" method="post">
            <h2 class="text-center">Assign Courses</h2>
            <div class="form-group">
                <label for="candidate">Select Candidate</label>
                <select class="form-control" id="candidate" name="candidate">
                    <?php
                    $query = "select * from candidate";
                    $result = mysqli_query($conn, $query);

                    while ($row = $result->fetch_assoc()) {
                        $candidateEmail = $row['email'];
                        echo "<option value='$candidateEmail'>$candidateEmail</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="submit">Goto Invoice &#8594;</button>
            </div>
        </form>
    </div>
</body>

</html>

