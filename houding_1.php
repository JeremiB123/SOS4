<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);



 

  
  

if(isset($_POST['save']))
{	
	$random_survey = rand(10,10000);
	 $vraag1 = $_POST['vraag1'];
   $vraag2 = $_POST['vraag2'];
	 $vraag3 = $_POST['vraag3'];
   $vraag4 = $_POST['vraag4'];
   $vraag5 = $_POST['vraag5'];
	 $vraag6 = $_POST['vraag6'];
   
   
  
	 $sql_query = "INSERT INTO survey_answers (answer_id, survey_id, vraag1, vraag2, vraag3, vraag4, vraag5, vraag6)
	 VALUES ('','49395','$vraag1', '$vraag2', '$vraag3', '$vraag4', '$vraag5', '$vraag6')";

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
    <meta charset="utf-8">
    <title>Onderzoekend vermogen</title>
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

<body>
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
                              <a class="dropdown-item" href="1_houding.php">Onderzoekende houding</a>
                              <a class="dropdown-item" href="vakleer.php">Onderzoek in het vak(leer)gebied</a>
                              <a class="dropdown-item" href="fenomeen.php">Fenomeen Onderzoek</a>
                              <a class="dropdown-item" href="vaardigheden.php">Onderzoeksvaardigheden</a>
                              <a class="dropdown-item" href="praktijk.php">Toepassen in praktijk</a>
                              <a class="dropdown-item" href="handelen.php">Onderzoekend handelen</a>
                            </div>
                          </li>
                        <i class="fa fa-user"></i>
 
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <form action="houding.php" method="post">
    <div class="container-fluid bg-primary">
      <hr class="style1">
        <div class="row align-items-center px-3">
          
                <!-- FLEXBOX-->
                <section class="main">
                <section class="container1">
                  <div class="a"></div>
                  <div class="a"><p class="text-white" >Toont een nieuwsgierige houding door open te staan voor nieuwe indrukken en oprechte belangstelling voor de (onderwijs)wereld</p></div>
                  
                  <div class="a"><p class="text-white">Toont een kritische houding door het bevragen van de praktijk</div>
                  <div class="a"><p class="text-white">Wil opgedane kennis en ervaring delen met peers, collega’s, belangstellenden en belanghebbenden en in interdisciplinaire teams</p></div>
                  <div class="a"><p class="text-white">Neemt meerdere perspectieven in vanuit verschillende belanghebbenden en kan/wil eigen veronderstellingen opzij zetten</p></div>
                  <div class="a"><p class="text-white">Wil resultaat bereiken door te willen begrijpen, ambitie te tonen, te kunnen focussen en samen te werken</p></div>
                  <div class="a"><p class="text-white">Wil vernieuwen en verbeteren en toont hierbij creativiteit</p></div>
                </section>                  
                <section class="container1">
                  <div class="a">
                  <div class="b"><p class="text-white">--</p></div>
                  <div class="b"><p class="text-white">-</p></div>
                  <div class="b"><p class="text-white">-/+</p></div>
                  <div class="b"><p class="text-white">+</p></div>
                  <div class="b"><p class="text-white">++</p></div>
                  </div>
                  <div class="a">
                    <fieldset class="optGroup">
                      <div class="b"><input name="vraag1" value="1" type="radio"></div>
                      <div class="b"><input name="vraag1" value="2" type="radio"></div>
                      <div class="b"><input name="vraag1" value="3" type="radio"></div>
                      <div class="b"><input name="vraag1" value="4" type="radio"></div>
                      <div class="b"><input name="vraag1" value="5" type="radio"></div>
                  </div>
                  <div class="a">
                    <fieldset class="optGroup">
                      <div class="b"><input name="vraag2"  value="1" type="radio"></div>
                      <div class="b"><input name="vraag2"  value="2" type="radio"></div>
                      <div class="b"><input name="vraag2"  value="3" type="radio"></div>
                      <div class="b"><input name="vraag2" value="4" type="radio"></div>
                      <div class="b"><input name="vraag2"  value="5" type="radio"></div>
                  </div>
                  <div class="a">
                    <fieldset class="optGroup">
                      <div class="b"><input type="radio" name="vraag3" value="1"></div>
                      <div class="b"><input type="radio" name="vraag3" value="2"></div>
                      <div class="b"><input type="radio" name="vraag3" value="3"></div>
                      <div class="b"><input type="radio" name="vraag3" value="4"></div>
                      <div class="b"><input type="radio" name="vraag3" value="5"></div>
                  </div>
                  <div class="a">
                    <fieldset class="optGroup">
                      <div class="b"><input name="vraag4"  value="1" type="radio"></div>
                      <div class="b"><input name="vraag4"  value="2" type="radio"></div>
                      <div class="b"><input name="vraag4"  value="3" type="radio"></div>
                      <div class="b"><input name="vraag4"  value="4" type="radio"></div>
                      <div class="b"><input name="vraag4"  value="5" type="radio"></div>
                  </div>
                  <div class="a">
                    <fieldset class="optGroup">
                      <div class="b"><input name="vraag5"  value="1" type="radio"></div>
                      <div class="b"><input name="vraag5"  value="2" type="radio"></div>
                      <div class="b"><input name="vraag5"  value="3" type="radio"></div>
                      <div class="b"><input name="vraag5"  value="4" type="radio"></div>
                      <div class="b"><input name="vraag5" value="5" type="radio"></div>
                  </div>
                  <div class="a">
                    <fieldset class="optGroup">
                      <div class="b"><input name="vraag6"  value="1" type="radio"></div>
                      <div class="b"><input name="vraag6"  value="2" type="radio"></div>
                      <div class="b"><input name="vraag6"  value="3" type="radio"></div>
                      <div class="b"><input name="vraag6"  value="4" type="radio"></div>
                      <div class="b"><input name="vraag6"  value="5" type="radio"></div>
                  </div>
                  <tr>
			<td colspan="2" align="center" ><input type="submit" name="save" value="Submit" style="font-size:20px"></td>
		</tr>
                </section>
              </section>
</form>
                <!-- Card -->
                    <!-- FORM FROM https://mdbootstrap.com/docs/standard/extended/bootstrap-survey-form/ -->

    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Vorige</a></li>
        <li class="page-item"><a class="page-link" href="vakleer.html">Volgende</a></li>
      </ul>
    </nav>
    <div class="foot"></div>
</div>

</body>

</html>