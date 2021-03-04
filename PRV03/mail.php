<?php


$name = $_POST['name'];
$email= $_POST['email'];
$title= $_POST['title'];
$message= $_POST['message'];
$to = "learnhub7@gmail.com";
$subject = "Mail From Online Ticket Reservation";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n  Subject = " . $subject . "\r\n Message =" . $message;
$headers = "From: noreply@otr.com" . "\r\n" .
"CC: r.bux@rgu.ac.uk";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");







?>