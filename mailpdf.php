<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';

include("./connection/dbconnection.php");
session_start();
$invoiceId = $_SESSION['invoice'];
$candidateMail = $_SESSION['candidate'];
$enrollmentId = $_SESSION['enrollment'];
$amount = $_SESSION['amount'];
$date = $_SESSION['date'];
$reason = $_SESSION['reason'];

$mpdf = new \Mpdf\Mpdf();

$data = '';
$data .= '<h1>Invoice</h1>';
$data .= '<p><strong>Invoice Id: </strong>' . $invoiceId . '</p>';
$data .= '<p><strong>Candidate Email: </strong>' . $candidateMail . '</p>';
$data .= '<p><strong>Enrollment Id: </strong>' . $enrollmentId . '</p>';
$data .= '<p><strong>Amount: </strong>' . $amount . '</p>';
$data .= '<p><strong>Date: </strong>' . $date . '</p>';
$data .= '<p><strong>Reason: </strong>' . $reason . '</p>';

$mpdf->WriteHTML($data);
// $mpdf->Output('invoice.pdf', 'D');   //To download the PDF
$pdf = $mpdf->Output('', 'S');

$mail = new PHPMailer();

try {
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "smtp.deep98@gmail.com";
    $mail->Password   = "Babu1998";

    $mail->IsHTML(true);
    $mail->AddAddress($candidateMail, "");
    $mail->SetFrom("smtp.deep98@gmail.com", "Admin");

    $mail->addStringAttachment($pdf, 'invoice.pdf');

    $mail->Subject = "Invoice for Course Enrollment";
    $content = "<b>Please download the invoice of your Course</b><br>" . $data;

    $mail->MsgHTML($content);
    $mail->Send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<script>

    document.querySelector('body').innerHTML = " ";
    window.location = "index.php";

</script>