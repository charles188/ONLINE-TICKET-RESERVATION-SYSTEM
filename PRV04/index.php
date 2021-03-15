<!-- Version: PROV003 -->
<!-- Date of coding: 27-02-2021 -->
<!-- Contributors -->

<!-- This script is written, designed and altered by:
BLACKSTOCK PAUL
RAHIM BUX
OLUWADARA OLASUNKANMI
CHRISTABEL IMHANGUELO
CHARLES ODUM
MUYIWA
for thier coure work : CMM004 Software Engineering Project
This project is opensource and doen not require any prior permission to edit, alter or implement.
 -->

<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Online Ticket Reservation </title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="icon" type="image/png" href="assets/images/favicon.png" />
<script type="text/javascript" src="assets/js/saslideshow.js"></script>
<script type="text/javascript" src="assets/js/slideshow.js"></script>
<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vallenato/vallenato.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="vallenato/vallenato.css" type="text/css" media="screen" charset="utf-8">

	
	<!--CSS-->	
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		

// following script is downloaded from opensource

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

// Project Logo

		</script> 
			<style>
				img.logo {
				top: 25px;
		    	left: 25px;
				}
			</style>

</head>
<body>
	<div id="wrapper">
	<div id="header">
    <h1><a href="index.php"><img src="assets/images/logo.png" class="logo" alt="OTR" /></a></h1>
        <ul id="mainnav">
			<li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="prices.html">Prices</a></li>
            <li><a href="team.html">Team</a></li>
            <li><a href="contact.html">Contact Us</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="rotator">

<!-- BOOK NOW			   -->
			  <div id="logo" style="left: 730px; height: auto; top: 133px; width: 260px; position: absolute; z-index:4;">
					
					<h2 class="accordion-header" style="height: 28px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(12, 54, 94);">BOOK NOW</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						<form action="selectset.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px; ">Select Route: 
						<select name="route" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						<?php
						include('db.php');
						$result = mysqli_query($conn,"SELECT * FROM route");
						while($row = mysqli_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'].'  :'.$row['type'].'  :'.date("h:i A",strtotime("2020-01-01 ".$row['time']));
								echo '</option>';
							}
						?>
						</select>
						</span><br>
						<span style="margin-right: 11px;">Date: 
						<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" value="" maxlength="10" readonly="readonly" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						</span><br>
						<span style="margin-right: 11px;">No. of Passenger: 
						<select name="qty" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						</select>
						</span><br><br>
						<input type="submit" id="submit" value="Next" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
<!-- ADMIN LOGIN					 -->
					<h2 class="accordion-header" style="height: 28px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(12, 94, 82);">Admin Login</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						<form action="login.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Username: <input type="text" name="username" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br>
						<span style="margin-right: 11px;">Password: <input type="password" name="password" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br><br>
						<input type="submit" id="submit" class="medium gray button" value="Login" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
				</div>
        	</div>
		 </div>
    </div>
</div>

</div>

<!-- FOOTER -->
<footer>
		<div id="footer">
			<div class="thefooter">
				
		<ul>
			<li class="active"><a href="#">Privacy</a></li>
			<li><a href="#">Policy</a></li>
			<li><a href="prices.html">Pricing</a></li>
			<li><a href="team.html">Team</a></li>
			<li><a href="contact.html">Contact</a></li>
			<li><a href="about.html">About</a></li>
		</ul>
		<p>© Team B 2021  |  Software Project Engineering</p>
		</div>
		
	</footer>
</body>
</html>
