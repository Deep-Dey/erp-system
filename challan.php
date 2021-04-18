<?php
include("./connection/dbconnection.php");
session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
}

$candidateMail = $_SESSION['candidate'];
$enrollmentId = $_POST['enrollment'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$reason = $_POST['reason'];

unset($_SESSION['candidate']);

$invoiceId = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';
$invoiceId = str_shuffle($invoiceId);
$invoiceId = substr($invoiceId, 0, 10);

if ($candidateMail == '') {
    header('location:selectCandidate.php');
}

$query = "select id from invoice where candidate_email='" . $candidateMail . "' and enrollment_id='" . $enrollmentId . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

if ($row  > 0) {
?>
    <script>
        alert('You already generate invoice for the enrollment Id');
        window.location = "selectCandidate.php";
    </script>
    <?php
} else {
    $query = "insert into invoice values ('$invoiceId','$candidateMail', '$enrollmentId', '$amount', '$date', '$reason')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['invoice'] = $invoiceId;
        $_SESSION['candidate'] = $candidateMail;
        $_SESSION['enrollment'] = $enrollmentId;
        $_SESSION['amount'] = $amount;
        $_SESSION['date'] = $date;
        $_SESSION['reason'] = $reason;

    ?>
        <script>
            alert('Invoice Generated Successfully');
            window.location = "mailpdf.php";
        </script>
<?php
    }
}
?>