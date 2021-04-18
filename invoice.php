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
    include("./connection/dbconnection.php");

    $candidateMail = $_POST['candidate'];
    $_SESSION['candidate'] = $candidateMail;
    if ($candidateMail == '') {
        header('location:selectCandidate.php');
    }
    ?>
    <div class="login-form">
        <form action="challan.php" method="post">
            <h2 class="text-center">Invoice</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="candidate" value="<?php echo "$candidateMail" ?>" required disabled>
            </div>
            <div class="form-group">
                <label for="enrollment">Select Enrollment</label>
                <select class="form-control" id="enrollment" name="enrollment" required>
                    <?php
                    $query = "select * from enrollment where candidate_email = '" . $candidateMail . "'";
                    $result = mysqli_query($conn, $query);

                    while ($row = $result->fetch_assoc()) {
                        $enrollId = $row['id'];
                        echo "<option value='$enrollId'>$enrollId</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="amount" placeholder="Enter Amount" required>
            </div>
            <div class="form-group">
                <label for="date">Enter a Date</label>
                <input class="form-control" type="date" id="date" name="date" required="required">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="reason" rows="2" placeholder="Enter Reason"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="assign">Create Invoice</button>
            </div>
        </form>
    </div>

</body>

</html>