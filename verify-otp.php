<!DOCTYPE html> 
<html lang="en"> 
	<?php 
		session_start(); 
	
		// Retrieving otp with session variable 
		$otp=$_SESSION["OTP"]; 
	?> 

<head> 
	<style>
		h3{
			font-size: 2rem;
			color: navy;
			font-family: 'Courier New', Courier, monospace;
		}
		input{
			width: 20%;
			font-size: 1.5rem;
			
		}
		button{
			
			margin-top: 3%;
			font-size: 1.5rem;
			background-color: skyblue;
			border-width: 3px;
			font-family: 'Courier New', Courier, monospace;
		}
		button:hover{
			background-color: violet;
		}
		</style>
	<meta charset="UTF-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content= 
		"width=device-width, initial-scale=1.0"> 
	<title>Document</title> 
	<link rel="stylesheet" type="text/css"
		href="css/style.css" media="screen" /> 

	<!-- Adding bootstrap --> 
	<link rel="stylesheet"
		integrity= 
"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous"> 

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity= 
"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"> 
	</script> 
	
	<script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity= 
"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"> 
	</script> 
	
	<script src= 
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity= 
"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"> 
	</script> 
	
	<div class="nav-bar"> 
		<div class="title"> 
			<center><h3><br>Welcome to MediCare</h3>
			<p>OTP successfully sent to your Email...</p> 
		</div> 
	</div> 
</head> 

<body> <center>
	<form class="form-login"> 
		<div class="form-group"> 
			<input type="text" class="form-control"
				name="otp" id="OTP"
				aria-describedby="emailHelp"
				placeholder="Enter OTP" required> 
		</div> 

		<button type="button"
			class="btn btn-primary btn-lg"
			id="verify-otp"> 
			Verify otp 
		</button> 
	</form> 

	<script> 
		$("#resend-otp").click(function () { 
			window.location.replace("resend-otp.php"); 
		}); 
		$("#verify-otp").click(function () { 

			// window.location.replace("index.php"); 
			var otp1 = document.getElementById("OTP").value; 

			// alert(otp1); 
			var otp2 = ("<?php echo($otp)?>"); 
			
			// alert(otp2); 
			if (otp1 == otp2) { 
				alert("Logged Successfully");
				window.location.replace("confirm.php"); 
				
				
			} 
			else { 
				alert("otp not matches") 
			} 
		}); 

	</script> 


</body> 

</html>
