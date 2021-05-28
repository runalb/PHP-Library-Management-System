<!DOCTYPE html>
<html lang="en">
<?php
// Start the session
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS librarydb";
		if ($conn->query($sql) === TRUE) {
			//echo "Database created successfully";
			
		
		
		$conn->close();
		}
		?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-lg-6 background">
                <nav class="navbar">
                    <a class="navbar-brand" href="dashboard.php">
                        <img src="images/simplelogo.svg" alt="logo" width="140" height="50" alt="" loading="lazy">
                    </a>
                </nav>
            </div>
            <div class="col-6 col-lg-6 ">
                <div class="container h-100">
                    <div class="row align-items-center h-100" >
                        <div class="col-8 mx-auto">
                            <h3 class="login-header pb-2">Login</h3>
                            <form action="user-login.php" method="get">
                                <div class="form-group">
                                <label for="loginUsername">Username</label>
                                <input type="text" name="userid" class="form-control" id="loginUsername" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group pb-2">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="userpass" class="form-control" id="loginPassword">
                                </div>
                                <button type="submit" class="btn login-btn btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>