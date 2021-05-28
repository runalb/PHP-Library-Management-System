<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue book</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="vender/css/all.css">
</head>
<body>
    <?php
        if($_SESSION["userid"] === ""){
          echo $_SESSION['userid'];
          echo "login";
          header("Location: index.php ");
        }
      ?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <a class="navbar-brand my-0 mr-md-auto" href="dashboard.php">
            <img src="images/simplelogo-dark.svg" alt="logo" width="130" height="30" alt="Logo" loading="lazy">
        </a>
        
        <button class="btn btn-outline logout-btn" onclick="location.href='user-logout.php'">Logout</button>
      </div>

      <div class="container h-100">
        <div class="row align-items-center h-100" >
            
          <div class="col-8 mx-auto">  
            <div class="shadow-lg bg-white mt-4 p-4">                
          <?php
		
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
		
		$bookid = filter_input(INPUT_GET,'bookid');
		$usn = filter_input(INPUT_GET,'studentid');
		$rdate = filter_input(INPUT_GET,'date');
		
		$sql1 = "SELECT * FROM issue_database WHERE usn='$usn'";
        $res = $conn->query($sql1);

		if ($res->num_rows > 0) {
		
        $sql1 = "SELECT date FROM issue_database WHERE usn='$usn' AND book_id='$bookid'";
        $res = $conn->query($sql1);
        
        if($res->num_rows > 0 ){
            $row = mysqli_fetch_array($res);
            $ldate = $row['date'];
            
            $x=date_create($ldate);
            $t=date_create($rdate);
            $dat=date_diff($x,$t);
            $aa= $dat->format("%a");
            $aaa= $dat->format("%R");
            
            
            $_SESSION["bookid"] = $bookid;
            $_SESSION["usn"] = $usn;
            
            
            if($aaa=='+')
            {
                echo "<h3 class='text-center m-4'>Fine : Rs ".$aa."</h3><form action='book-returned.php'><button class='btn btn-block login-btn' type='submit'>pay</button></form><form action='dashboard.php'><button class='btn btn-block bg-light mt-2' type='submit'>Cancel</button></form>";
            }
            else{
                
                $sql = "DELETE FROM issue_database WHERE usn='$usn' AND book_id='$bookid'";
                if ($conn->query($sql) === TRUE) {
                    $sql2 = "UPDATE book_database SET qty=qty+1 WHERE book_id='$bookid'";
                    $resul = $conn->query($sql2);
                    echo "<h3 class='text-center m-4'>Book Returned successfully</h3><form action='dashboard.php'><button class='btn btn-block login-btn' type='submit'>OK</button></form>";
                } else {
                    //echo "Error deleting record: " . $conn->error;
                }
            }
        }else{
			echo "<h3 class='text-center m-4'>Invalid Infomation... Try Again with Valid Information.</h3><form action='dashboard.php'><button class='btn btn-block login-btn' type='submit'>OK</button></form>";
        }
		
		}
		else
		{
			echo "<h3 class='text-center m-4'>No book for Return</h3><form action='dashboard.php'><button class='btn btn-block login-btn' type='submit'>OK</button></form>";
		}
		
		
		$conn->close();
		
		?>
             </div>   
          </div>
        </div>
          
      </div>
      
</body>
</html>