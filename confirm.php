<?php

$conn = new mysqli('localhost', 'root','', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else 
$sql = "SELECT email FROM register"; 
    $result = $conn->query($sql); 

$to_email = $result ->fetch_assoc()['email']; 
$subject = "CONFIRMATION : MediCare Registration";

$body = "Dear  User,


WELCOME to MediCare, where your health is qour priority.

We're thrilled to inform you that you are Successfully registered to MediCare.

Book Your Appointment....
Lab Test Easily with Us...

Donate Us for Provide better  Healthcare Facilities in our Country..
https://ammyasl2003.github.io/Medi-Care/donate.html

Best Regards,

MediCare 
A TECH
Ammy Singh
";

$headers = "From: sender email";


if (mail($to_email, $subject, $body, $headers)) {
 ?>
 <script>window.location.replace("ammy.html"); </script>


<?php


} else {
    echo "Email sending failed...";
}
?>
