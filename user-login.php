<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    
<?php
		$userid = filter_input(INPUT_GET,'userid');
		$userpass = filter_input(INPUT_GET,'userpass');
		
		if($userid=="user" && $userpass=="1234")
		{
            $_SESSION["userid"] = $userid;
            header("Location: dashboard.php");
			
		}else{
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname ="librarydb";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "SELECT * FROM admin_database WHERE user_id='$userid' AND user_password='$userpass'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION["userid"] = $userid;
                header("Location: dashboard.php");
                
            }else {
                echo "<div class='container-fluid'><div class='row align-items-center h-100' ><div class='col-3 mx-auto'><div class='mt-4' id='card'><p>Invalid Id or Password!!!</p><p>Try again with valid Id and Password</p><form action='index.php' method='get'><button class='btn login-btn' type='submit' id='done'>Done</button></form></div></div></div></div>";
            }
        }
		
		?>
</body>
</html>