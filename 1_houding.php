<?php 
session_start();
include("connection.php");
include("functions.php");


$user_data = check_login($con);
		
			
error_reporting(0);
	

if(isset($_POST['save']))
{
  $survey_id = $_SESSION['survey_id'];

	$random_survey = rand(10,10000);
	 $vraag1 = $_POST['vraag1'];
   $vraag2 = $_POST['vraag2'];
	 $vraag3 = $_POST['vraag3'];
   $vraag4 = $_POST['vraag4'];
   $vraag5 = $_POST['vraag5'];
	 $vraag6 = $_POST['vraag6'];
   $text = $_POST['text'];
   
   
  if($vraag1 and $vraag2 and $vraag3 and $vraag4 and $vraag5 and $vraag6 > 0){
    
	 $sql_query = "INSERT INTO survey_answers (answer_id, survey_id, vraag1, vraag2, vraag3, vraag4, vraag5, vraag6, beschrijving)
	 VALUES ('','$survey_id','$vraag1', '$vraag2', '$vraag3', '$vraag4', '$vraag5', '$vraag6', '$text')";

	 if (mysqli_query($con, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
    header("Location: 2_Onderzoekvak.php");
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($con);
	 }
	 mysqli_close($con);
  }
  else 
  
echo '<script type="text/javascript">
       window.onload = function () { alert("vul alle vakjes in"); } 
</script>'; 

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
                              <a class="dropdown-item" href="houding.php">Onderzoekende houding</a>
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
    <form action="1_houding.php" method="post">
    <div class="progress">
  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    <div class="container-lg bg-primary">
      
        <div class="align-items-center">
        
        <table class="table text-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">vragen</th>
      <th scope="col">
                  <div class="b"><p class="text-white">--</p></div>
                  <div class="b"><p class="text-white">-</p></div>
                  <div class="b"><p class="text-white">-/+</p></div>
                  <div class="b"><p class="text-white">+</p></div>
                  <div class="b"><p class="text-white">++</p></div>
                 </th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>toont een nieuwsgierige houding door open te staan <br> voor nieuwe indrukken en oprechte belangstelling voor de (onderwijs)wereld</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag1" value="1" type="radio"></div>
                      <div class="b"><input name="vraag1" value="2" type="radio"></div>
                      <div class="b"><input name="vraag1" value="3" type="radio"></div>
                      <div class="b"><input name="vraag1" value="4" type="radio"></div>
                      <div class="b"><input name="vraag1" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>toont een kritische houding door het bevragen van de praktijk</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag2" value="1" type="radio"></div>
                      <div class="b"><input name="vraag2" value="2" type="radio"></div>
                      <div class="b"><input name="vraag2" value="3" type="radio"></div>
                      <div class="b"><input name="vraag2" value="4" type="radio"></div>
                      <div class="b"><input name="vraag2" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>wil opgedane kennis en ervaring delen met peers,<br> collega’s, belangstellenden en belanghebbenden en in interdisciplinaire teams</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag3" value="1" type="radio"></div>
                      <div class="b"><input name="vraag3" value="2" type="radio"></div>
                      <div class="b"><input name="vraag3" value="3" type="radio"></div>
                      <div class="b"><input name="vraag3" value="4" type="radio"></div>
                      <div class="b"><input name="vraag3" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>neemt meerdere perspectieven in vanuit verschillende belanghebbenden

en<br> kan/wil eigen veronderstellingen opzij zetten</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag4" value="1" type="radio"></div>
                      <div class="b"><input name="vraag4" value="2" type="radio"></div>
                      <div class="b"><input name="vraag4" value="3" type="radio"></div>
                      <div class="b"><input name="vraag4" value="4" type="radio"></div>
                      <div class="b"><input name="vraag4" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>wil resultaat bereiken door te willen begrijpen, ambitie te tonen,<br> te kunnen

focussen en samen te werken</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag5" value="1" type="radio"></div>
                      <div class="b"><input name="vraag5" value="2" type="radio"></div>
                      <div class="b"><input name="vraag5" value="3" type="radio"></div>
                      <div class="b"><input name="vraag5" value="4" type="radio"></div>
                      <div class="b"><input name="vraag5" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>wil vernieuwen en verbeteren en toont hierbij creativiteit</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag6" value="1" type="radio"></div>
                      <div class="b"><input name="vraag6" value="2" type="radio"></div>
                      <div class="b"><input name="vraag6" value="3" type="radio"></div>
                      <div class="b"><input name="vraag6" value="4" type="radio"></div>
                      <div class="b"><input name="vraag6" value="5" type="radio"></div></td></td> 
      
    </tr>
    <tr>
      <th scope="row">TEXT</th>
      <td><div class="input-group">
  <textarea class="form-control" aria-label="With textarea" name="text" placeholder="Vul hier waarom je dit niveau hebt gehaald"></textarea>
</div></td>
      <td><input class="favorite styled"
       type="submit"
       value="Next page" name="save"></td></td> 
       
    </tr>
    
  </tbody>
</table>
         
			
		




                <!-- Card -->
                    <!-- FORM FROM https://mdbootstrap.com/docs/standard/extended/bootstrap-survey-form/ -->

    </div>
   
</div>
    
</body>

        
</html>