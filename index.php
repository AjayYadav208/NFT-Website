<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $Username = $_POST['name'];
    $Email = $_POST['Email'];
    $Password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $phone = $_POST['phone'];
    $dt = $_POST['dt'];
    $sql = "INSERT INTO `nft`.`nft` (`name`, `Email`, `password`, `con_password`, `phone`,  `dt`) VALUES ('$Username', '$Email', '$Password', '$con_password', '$phone',  current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup page.css">
	<title>Signup Page</title>
</head>
<body>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
       <div class="container">
			<h2>JOIN US</h2>
			<form action="index.php" method="post">
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Enter Email" name="email" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<label for="confirm_password"><b>Confirm Password</b></label>
			<input type="password" placeholder="Confirm Password" name="confirm_password" required>

			<label for="phone"><b>Phone</b></label>
			<input type="phone" placeholder="Enter Phone no." name="phone" required>

			<button type="submit">signup</button>
			<div class="incont">
				<p>already have a account -></p>
				<a class="patient-login" href="#">login</a>
			</div>
			</form>
		</div>
    <script src="index.js"></script>
    
</body>
</html>
