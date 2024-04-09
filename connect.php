
<?php 
	session_start(); 
	$otp=$_SESSION["OTP"]; 
	if(isset($_SESSION["logged-in"])){ 
		header("Location:ammy.html"); 
	} 
	$username="sign up"; 
	$login_btn="Login"; 
	if(isset($_SESSION["username"])){ 
		$username=$_SESSION["username"]; 
		$login_btn="Logout"; 
	} 
	if($_SERVER["REQUEST_METHOD"]=="POST"){ 
		$con=mysqli_connect('localhost','root','','test');

		if(!$con) 
			echo ("failed to connect to database"); 
		$username1=$_POST['username']; 
		$prefix="_"; 
		$username=$prefix.$username1; 

		$username = $_POST['username'];
		$password=$_POST['password']; 
		$email1=$_POST['email']; 
		$fullname = $_POST['fullname'];
		$gender = $_POST['gender'];

		
		$phone = $_POST['phone'];

		$email=strval($email1);  
			if(strlen($password)<8){ 
				echo( 
	"<script>alert('password length must be atleast 8')</script>"); 
			} 
			else{ 
				$query="insert into register(fullname, username, gender, email, password, phone)
						values ($fullname, $username, $gender, $email, $password, $phone)";

				$sql = "SELECT username, password FROM register"; 
				$result = $con->query($sql); 
				$username_already_exist=false; 
				$email_already_exist=false; 

				// Checking if user already exist 
				if(($result->num_rows)> 0){ 
					while($row = $result->fetch_assoc()) { 

						// echo "<br> id: " . $row["id"] . 
							" - username= " . $row["username"] . 
							" password= " . $row["password"] . "<br>"; 

						if($row["username"]==$username){	 
							$username_already_exist=true; 
							break; 
						} 
						if($row["email"]==$email){	 
							$email_already_exist=true; 
							break; 
						} 
					} 
				} 

				// echo($ok); 
				if($username_already_exist==false){ 

					// This is my hosting mail 
					$from ="support@libraryatcoer.tk"; 
					$to=$email; 
					$subject="verify-account-otp"; 

					// Generating otp with php rand variable 
					$otp=rand(100000,999999); 

					$message="Dear user,\n
					Your OTP for verification of MediCare account is\n\n"
					
					.strval($otp)
					
					."\n\nMediCare Team"; 


					$headers="From:" .$from; 
					if(mail($to,$subject,$message,$headers)){ 
						$_SESSION["username"]=$username; 
						$_SESSION["OTP"]=$otp; 
						$_SESSION["email"]=$email; 
						$_SESSION["password"]=$password; 
						$_SESSION["registration-going-on"]="1"; 
						header("Location: verify-otp.php"); 
					} 
					else
						echo("mail send failed"); 
				} 
				else{ 
					echo( 
			"<script>alert('username already taken')</script>"); 
				} 
			} 
		} 
	


$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];

    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {



		$resultGet = mysqli_query($conn, "SELECT * FROM register where username='$username'");
		$rows = mysqli_num_rows($resultGet);
		
		if ($rows > 0) {
			echo '<script>
alert("Username already registered");
window.location.href="register.html";
</script>';
exit;
			
		}

		$encodePassword=password_hash($_REQUEST['password'], PASSWORD_BCRYPT);



		$stmt = $conn->prepare("insert into register(fullname, username, gender, email, password, phone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fullname, $username, $gender, $email, $encodePassword, $phone);

		


		$execval = $stmt->execute();
	
	
		echo $execval;
	 
 
		echo '<script>
		alert("Register Successfully");
		window.location.href="login.html	";
		</script>';
		

      exit;
	

		$stmt->close();
		$conn->close();
	}
	
    ?>
	