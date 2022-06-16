<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		
		$password = $_POST['password'];


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="css/loginsignup.css">

</head>
<body>
<!-- partial:index.partial.html -->
<img src="img/NHL.jpg" width="150" height="100" />
<section class='login' id='login'>
  <div class='head'>
  <h1 class='company'>Onderzoekend vermogen</h1>
  </div>
  <div class='form'>
  
  <form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Inschrijven</div><br>
			<input class="text" type="text" name="user_name"><br><br>
			<input class="password" type="password" name="password"><br><br>

			<input id="button" class="btn-login" type="submit" value="Signup">
            <a href="login.php" class='forgot'>Inloggen</a>
            <br><br>

		</form>
  </div>
</section>
<!-- partial -->

</body>
</html>
