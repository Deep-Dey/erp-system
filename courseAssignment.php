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
        <form action="courseAssignment.php" method="post">
            <h2 class="text-center">Assign Courses</h2>
            <div class="form-group">
                <label for="candidate">Select Candidate</label>
                <select class="form-control" id="candidate" name="candidate" required>
                    <?php
                    $query = "select * from candidate";
                    $result = mysqli_query($conn, $query);

                    while ($row = $result->fetch_assoc()) {
                        $candidateName = $row['email'];
                        echo "<option value='$candidateName'>$candidateName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="course">Select Course</label>
                <select class="form-control" id="course" name="course" required>
                    <?php
                    $query = "select * from course";
                    $result = mysqli_query($conn, $query);

                    while ($row = $result->fetch_assoc()) {
                        $courseName = $row['name'];
                        echo "<option value='$courseName'>$courseName</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="totalfees" placeholder="Total Fees" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="installment" placeholder="Installment Amount" required="required">
            </div>
            <div class="form-group">
                <label for="date">Date of Joining</label>
                <input class="form-control" type="date" id="date" name="date" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="assign">Assign</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['assign'])) {
    $candidateMail = $_POST['candidate'];
    $courseName = $_POST['course'];
    $totalFees = $_POST['totalfees'];
    $installmentAmount = $_POST['installment'];
    $date = $_POST['date'];

    $enrollmentId = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';
    $enrollmentId = str_shuffle($enrollmentId);
    $enrollmentId = substr($enrollmentId, 0, 10);

    $query = "select id from enrollment where 
                    candidate_email='" . $candidateMail . "' and course_name='" . $courseName . "' and date='" . $date . "'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if ($row  > 0) {
?>
        <script>
            alert('Candidate already enrolled for this course');
            window.location = "courseAssignment.php";
        </script>
        <?php
    } else {
        $query = "insert into enrollment values ('$enrollmentId', '$candidateMail','$courseName', '$totalFees', '$installmentAmount', '$date')";
        if (mysqli_query($conn, $query)) {
        ?>
            <script>
                alert('You successfully enrolled a candidate for a course');
                window.location = "admin.php";
            </script>
<?php
        }
    }
}
?>