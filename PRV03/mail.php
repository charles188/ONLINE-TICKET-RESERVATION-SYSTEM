<?php
//get data from form  


if (isset($_POST['submit'])) {
$name = $_POST['name'];
$mailFrom= $_POST['email'];
$subject= $_POST['subject'];
$message= $_POST['message'];

$mailTo = "c.odum@rgu.ac.uk";
$headers = "From: ".$mailFrom;
$txt ="You have received an e-mail from ".$name.".\n\n".$message;



    mail($mailTo,$subject,$txt,$headers);

    //redirect
    header("Location: thankyou.html");

}




















/*
$name = $_POST['name'];
$email= $_POST['email'];
$title= $_POST['title'];
$message= $_POST['message'];
$to = "meetkingcharles@gmail.com";
$subject = "Mail From Online Ticket Reservation";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n  Subject = " . $subject . "\r\n Message =" . $message;
$headers = "From: noreply@otr.com" . "\r\n" .
"CC: r.bux@rgu.ac.uk";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");*/
?>