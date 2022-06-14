<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);


if(isset($_POST['save']))
{	
	
	 $answer_body = $_POST['answer_body'];
	 
	
	 $sql_query = "INSERT INTO survey_answers (answer_body)
	 VALUES ('$answer_body')";

	 if (mysqli_query($con, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($con);
	 }
	 mysqli_close($con);
}
?>



<html>
<head>
	<title>
		A Sample Tutorial for database connection.
	</title>
</head>
<body bgcolor="#32e692">
	<div align="center">
		<!--<h1>Details Entry Form</h1>-->
	</div>
<form action="dataform.php" method="post">
	<table border="1" align="center">
		
		<tr>
			<td>
			<label>Gender</label></td>
			<td><input type="radio" name="answer_body" value="1">1
			<input type="radio" name="answer_body" value="2">2
            <input type="radio" name="answer_body" value="3">3
            <input type="radio" name="answer_body" value="4">4
            <input type="radio" name="answer_body" value="5">5
			
		</tr>
		<tr>
			<td colspan="2" align="center" ><input type="submit" name="save" value="Submit" style="font-size:20px"></td>
		</tr>
	</table>
</form>
</body>
</html>