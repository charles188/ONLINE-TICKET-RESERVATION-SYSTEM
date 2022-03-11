<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=600, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 600px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
   setTimeout(function(){
   	docprint.close()
   },750)
}
</script>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div style="width: 510px; margin-top: 50px; margin-left: 300px; border: 3px double #CCCCCC; padding:5px 10px;"/>

<h1><a><img src="assets/images/logo2.png" style="width: 200px; margin-left: 0px; padding:5px 10px;"/></a></h1>
<br>You have successefuly reserved the seat</br>
<br><br>
<div id="print_content" style="width: 500px;">
<strong>Ticket Reservation Details</strong><br><br>
<?php
include('db.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysqli_query($conn,"SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysqli_fetch_array($result))
	{
		echo 'Transaction Number: '.$row['transactionum'].'<br>';
		echo '<br>';
		echo 'Name: '.$row['fname'].' '.$row['lname'].'<br>';
		echo 'Address: '.$row['address'].'<br>';
		echo 'Contact: '.$row['contact'].'<br>';
		echo 'Payable: £'.$row['payable'].'<br>';
	}
$results = mysqli_query($conn,"SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysqli_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo 'Route and Type of Bus: ';
		$resulta = mysqli_query($conn,"SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysqli_fetch_array($resulta))
			{
			echo $rowa['route'].'     :'.$rowa['type'];
			echo '<br>';
			$time=$rowa['time'];
			}
		echo 'Time of Departure: '.$time. '<br>';
		echo '<br>';
		echo 'Seat Number: '.$setnum.'<br>';
		echo 'Date Of Travel: '.$rows['date'].'<br>';
		
	}
?>
		<br>Please print and present this details before boarding the bus</br>
</div>

<div style="margin-left: 270px; padding: 20px; margin-top: 10px";>

<a href="javascript:Clickheretoprint()" class="w3-btn w3-black">PRINT</a>
<a href="index.php" class="w3-btn w3-black">HOME</a>

</div>
</body>
</html>
