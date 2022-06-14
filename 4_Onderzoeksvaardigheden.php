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
   $vraag7 = $_POST['vraag7'];
   $vraag8 = $_POST['vraag8'];
	 $vraag9 = $_POST['vraag9'];
   $text = $_POST['text'];
   
   
   if($vraag1 or $vraag2 or $vraag3 or $vraag4 or $vraag5 or $vraag6 > 0){
	 $sql_query = "INSERT INTO onderzoeksvaardigheden (answer_id, survey_id, vraag1, vraag2, vraag3, vraag4, vraag5, vraag6, vraag7, vraag8, vraag9, beschrijving)
	 VALUES ('','$survey_id','$vraag1', '$vraag2', '$vraag3', '$vraag4', '$vraag5', '$vraag6','$vraag7','$vraag8','$vraag9', '$text')";

	 if (mysqli_query($con, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
    header("Location: 5_Toepassen.php");
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
    <form action="4_Onderzoeksvaardigheden.php" method="post">
    <div class="progress">
  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    <div class="container-lg bg-primary ">
      
        <div class="align-items-center px-3">
        
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
      <td>kan een probleemanalyse uitvoeren / kernprobleem formuleren</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag1" value="1" type="radio"></div>
                      <div class="b"><input name="vraag1" value="2" type="radio"></div>
                      <div class="b"><input name="vraag1" value="3" type="radio"></div>
                      <div class="b"><input name="vraag1" value="4" type="radio"></div>
                      <div class="b"><input name="vraag1" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>gebruikt relevante theorie en kan keuzes verantwoorden</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag2" value="1" type="radio"></div>
                      <div class="b"><input name="vraag2" value="2" type="radio"></div>
                      <div class="b"><input name="vraag2" value="3" type="radio"></div>
                      <div class="b"><input name="vraag2" value="4" type="radio"></div>
                      <div class="b"><input name="vraag2" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>kan een passende onderzoeksvraag en eventuele ontwerpeisen opstellen</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag3" value="1" type="radio"></div>
                      <div class="b"><input name="vraag3" value="2" type="radio"></div>
                      <div class="b"><input name="vraag3" value="3" type="radio"></div>
                      <div class="b"><input name="vraag3" value="4" type="radio"></div>
                      <div class="b"><input name="vraag3" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>kan een onderzoeksmethode kiezen die aansluit bij de vraag</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag4" value="1" type="radio"></div>
                      <div class="b"><input name="vraag4" value="2" type="radio"></div>
                      <div class="b"><input name="vraag4" value="3" type="radio"></div>
                      <div class="b"><input name="vraag4" value="4" type="radio"></div>
                      <div class="b"><input name="vraag4" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>kan een probleemanalyse uitvoeren / kernprobleem formuleren</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag5" value="1" type="radio"></div>
                      <div class="b"><input name="vraag5" value="2" type="radio"></div>
                      <div class="b"><input name="vraag5" value="3" type="radio"></div>
                      <div class="b"><input name="vraag5" value="4" type="radio"></div>
                      <div class="b"><input name="vraag5" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>gebruikt relevante theorie en kan keuzes verantwoorden</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag6" value="1" type="radio"></div>
                      <div class="b"><input name="vraag6" value="2" type="radio"></div>
                      <div class="b"><input name="vraag6" value="3" type="radio"></div>
                      <div class="b"><input name="vraag6" value="4" type="radio"></div>
                      <div class="b"><input name="vraag6" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>kan een passende onderzoeksvraag en eventuele ontwerpeisen opstellen</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag7" value="1" type="radio"></div>
                      <div class="b"><input name="vraag7" value="2" type="radio"></div>
                      <div class="b"><input name="vraag7" value="3" type="radio"></div>
                      <div class="b"><input name="vraag7" value="4" type="radio"></div>
                      <div class="b"><input name="vraag7" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>kan een onderzoeksmethode kiezen die aansluit bij de vraag</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag8" value="1" type="radio"></div>
                      <div class="b"><input name="vraag8" value="2" type="radio"></div>
                      <div class="b"><input name="vraag8" value="3" type="radio"></div>
                      <div class="b"><input name="vraag8" value="4" type="radio"></div>
                      <div class="b"><input name="vraag8" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>kan een onderzoeksmethode kiezen die aansluit bij de vraag</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag9" value="1" type="radio"></div>
                      <div class="b"><input name="vraag9" value="2" type="radio"></div>
                      <div class="b"><input name="vraag9" value="3" type="radio"></div>
                      <div class="b"><input name="vraag9" value="4" type="radio"></div>
                      <div class="b"><input name="vraag9" value="5" type="radio"></div></td>
      
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

                
			
		
               


</form>
                <!-- Card -->
                    <!-- FORM FROM https://mdbootstrap.com/docs/standard/extended/bootstrap-survey-form/ -->

    </div>
    
</div>

</body>

</html>