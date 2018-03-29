<?php 
require("database/connection.php");
if(isset($_SESSION['id'])){
		header("Location:admin.php");
	}
if(isset($_POST['LoginBtn'])){
		$email = $_POST['useremail'];
		$pass = $_POST['userpass'];
		$check = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$email' AND password = '$pass'");
		if(mysqli_num_rows($check)>0){
				$fetch = mysqli_fetch_array($check);
				$_SESSION['id'] = $fetch['id'];
				header("Location:admin.php");
			}
		else {
				echo "wrong username or password<br>Create account <a href='signup.php'>Click</a>";
			}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta name="viewport"  content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="login">
		<h1> Login </h1>
	<form method="post">
			<div class="fields">
					<h5>Name:</h5>
					<input type="text" class="textfield" name="useremail" required>
		    </div>
		    <div class="fields">
					<h5>Password:</h5>
					<input type="password" class="textfield" name="userpass" required>
		    </div>
		    <div class="loginbutton">
		    	<input type="submit"  name="LoginBtn" value="login">
		    </div>
	</form>
</div>
</body>
</html>