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

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <a class="navbar-brand my-0 mr-md-auto" href="dashboard.php">
            <img src="images/logo.svg" alt="logo" width="130" height="30" alt="Logo" loading="lazy">
        </a>
        
        <button class="btn btn-outline logout-btn" onclick="location.href='user-login.php'">Login</button>
    </div> 
      
      
    <div class="container h-100">
        <div class="row">

            <div class="col-12 col-lg-12 ">
                <div class="row align-items-center h-100" >
                    <div class="col-5 mx-auto">

                        
                        <!-- ADD HERE -->

                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>