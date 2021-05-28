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

                echo '
                    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                        <a class="navbar-brand my-0 mr-md-auto" href="dashboard.php">
                            <img src="images/simplelogo-dark.svg" alt="logo" width="130" height="30" alt="Logo" loading="lazy">
                        </a>
                        <button class="btn btn-outline logout-btn" onclick="location.href="user-logout.php" ">Login</button>
                    </div>

                    <div class="container h-100">
                        <div class="row align-items-center h-100" >
                            <div class="col-8 mx-auto">
                                <div class="mt-4">
                                    <div class="text-center p-3">
                                        <h3 class="theme-color">Invalid Id or Password!!!</h3>
                                    </div>
                                </div>
                                <h6 class="text-center">Enter valid Id and Password</h6>
                                <div class="col-4 mx-auto">
                                    <div class="mt-4">
                                        <div class="col">
                                            <form action="index.php">
                                                <button type="submit" class="btn action-btn btn-block ">Try again</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
        
            }
        }
		
		?>
</body>
</html>