<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);




if($_SERVER['REQUEST_METHOD'] == "POST")
{	
	$id = $_SESSION['user_id'];
	
	
	$survey_id = random_num(20);
	$_SESSION['survey_id'] = $survey_id;
	$sql_survey = "INSERT INTO  survey (survey_id, user_id)
	VALUES ('$survey_id', '$id')";
		

	if (mysqli_query($con, $sql_survey)) 
	  {
		 echo "New Details Entry inserted successfully !";
		 header("Location: 1_houding.php");
		 
						
		 
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
<meta charset="utf-8">
    <title>connection</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Javascript -->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/FLEX.css" rel="stylesheet">
</head>
 <!-- Navbar Start -->
 <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="index.html" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <span class="text-primary">Onderzoekend vermogen </span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav font-weight-bold mx-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Hoofdpagina</a> 
                        <a href="progress.php" class="nav-item nav-link">Progress</a>
                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                              Onderzoekend Voortgang
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="houding.php">Onderzoekende houding</a>
                              <a class="dropdown-item" href="vakleer.php">Onderzoek in het vak(leer)gebied</a>
                              <a class="dropdown-item" href="fenomeen.php">Fenomeen Onderzoek</a>
                              <a class="dropdown-item" href="vaardigheden.php">Onderzoeksvaardigheden</a>
                              <a class="dropdown-item" href="praktijk.php">Toepassen in praktijk</a>
                              <a class="dropdown-item" href="handelen.php">Onderzoekend handelen</a>
                            </div>
                          </li>
                          <i class="fa mt-3"><h5>welkom</h5><h5>
                            <?php 
                            $id = $_SESSION['user_id'];
                            $sql = "SELECT * FROM users where user_id='$id';";
                                $result = mysqli_query($con, $sql);
                                $resultaatCheck = mysqli_num_rows($result);

                                if ($resultaatCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo $row['user_name'];
                                    }
                                } ?>
                                
                            </h5></i>
                            <li class="nav-item dropdown">
                            <a class="fa fa-user nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                              
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="logout.php">logout</a>
                            </div>
                          </li>
 
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
	
	<div class="container-lg bg-primary w-100 h-75 p-4 ">
	<div class="text-white">
	<h2>ONDERZOEKEND VERMOGEN TEST</h2>
		<p class="h5 text-white">Wat zijn mijn sterke punten? Vergelijk jezelf</p>
		<p class="h5 text-white">Het duurt 15-20 minuten om deze test te voltooien</p>
		<h2 text-white >Instructions</h2>
			<p class="h5 text-white">Hieronder vind u 50 vragen. Geef aan in hoeverre u denkt dat deze uitspraken op u van toepassing zijn. Zorg ervoor dat je beschrijft hoe je bent in plaats van hoe je wilt zijn.</p>
			<h4>Voor elke stelling zijn er 5 mogelijke antwoorden waaruit u kunt kiezen:</h4>

			<p class="h5 text-white">- - deze verklaring is helemaal niet van toepassing op mij / nooit van toepassing op mij</p>
			<p class="h5 text-white">- deze uitspraak is enigszins / soms van toepassing op mij</p>
			<p class="h5 text-white">-/+ deze uitspraak is redelijk van toepassing op mij / regelmatig van toepassing op mij</p>
			<p class="h5 text-white">+ deze stelling is zeker van toepassing op mij / vaak van toepassing op mij</p>
			<p class="h5 text-white">++ deze uitspraak geldt volledig / altijd voor mij</p>
			<h4>Denk niet te lang na over de uitspraken; er zijn geen goede of foute antwoorden.</h4>
</div>
<body bgcolor="#32e692">
	<div align="center">
		<!--<h1>Details Entry Form</h1>-->
	</div>
<form action="survey_name.php" method="post">
	<table border="1" align="center">
	
	<td><input class="favorite styled"
       type="submit"
       value="Next page" name="save"></td>
	</table>
</div>
</form>
</body>
</html>