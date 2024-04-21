
<?php

$username = $_POST['username'];
$password = $_POST['password'];


$conn = new mysqli('localhost', 'root','', 'test');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {

    $stmt=$conn->prepare("SELECT * FROM register where username= ?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){

        $data=$stmt_result->fetch_assoc();
        if($data['password']===$password)
        {  

        echo '<script>
        alert("LOG IN Successfully");
        window.location.href="/Medi-care/ammy.html";
        </script>';
    }

/*
    $resultGet = mysqli_query($conn, "SELECT * FROM register where username='$username'");
  $rows = mysqli_num_rows($resultGet);
  $datas = mysqli_fetch_assoc($resultGet);

  if ($rows > 0) {
    


        if (password_verify($password, $datas['password'])) {

            echo '<script>
            alert("LOG IN Successfully");
            window.location.href="/Medi-care/ammy.html";
            </script>';

         exit;
        
    } 
    */

    else {
      
        echo '<script>
alert("Login Successfully");
window.location.href="ammy.html";
</script>';

       }

    }
    else {
      
        echo '<script>
alert("Invalid User or Password");
window.location.href="login.html";
</script>';
    }
}

mysqli_close( $conn );

?>