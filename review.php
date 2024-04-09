<?php
$review = $_POST['review'];
$Name = $_POST['name'];

$city = $_POST['city'];
	$email = $_POST['email'];
	



    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {


		$query = "insert into review(review,Name,city,email) VALUES ('$review','$Name','$city','$email')";
	$result= mysqli_query($conn, $query);
	
	
	
			header("Location: /Medi-care/ammy.html");
	
		mysqli_close($conn);
	}
    ?>