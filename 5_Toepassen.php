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
   $vraag10 = $_POST['vraag10'];
   $text = $_POST['text'];
   
   
   if($vraag1 and $vraag2 and $vraag3 and $vraag4 and $vraag5 and $vraag6 and $vraag7 and $vraag8 and $vraag9 and $vraag10 > 0){
	 $sql_query = "INSERT INTO toepassen (answer_id, survey_id, vraag1, vraag2, vraag3, vraag4, vraag5, vraag6, vraag7, vraag8, vraag9, vraag10, beschrijving)
	 VALUES ('','$survey_id','$vraag1', '$vraag2', '$vraag3', '$vraag4', '$vraag5', '$vraag6','$vraag7','$vraag8','$vraag9','$vraag10', '$text')";

	 if (mysqli_query($con, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
    header("Location: 6_Onderzoekend.php");
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
                        <a href="" class="nav-item nav-link active">DOE DE TEST</a>
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


    <!-- Header Start -->
    <form action="5_Toepassen.php" method="post">
    <div class="progress">
  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 64%" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    <div class="container-lg bg-primary ">
      
        <div class="align-items-center px-3">
        
        <table class="table text-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Vragen</th>
      <th scope="col"><div class="a">
                  <div class="b"><p class="text-white">--</p></div>
                  <div class="b"><p class="text-white">-</p></div>
                  <div class="b"><p class="text-white">-/+</p></div>
                  <div class="b"><p class="text-white">+</p></div>
                  <div class="b"><p class="text-white">++</p></div>
                  </div></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Is bekend met resultaten uit eerder onderzoek</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag1" value="1" type="radio"></div>
                      <div class="b"><input name="vraag1" value="2" type="radio"></div>
                      <div class="b"><input name="vraag1" value="3" type="radio"></div>
                      <div class="b"><input name="vraag1" value="4" type="radio"></div>
                      <div class="b"><input name="vraag1" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Past resultaten uit eerder onderzoek en nieuwe ontwikkelingen toe</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag2" value="1" type="radio"></div>
                      <div class="b"><input name="vraag2" value="2" type="radio"></div>
                      <div class="b"><input name="vraag2" value="3" type="radio"></div>
                      <div class="b"><input name="vraag2" value="4" type="radio"></div>
                      <div class="b"><input name="vraag2" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Herhaalt bestaand onderzoek en/of zet nieuw onderzoek op</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag3" value="1" type="radio"></div>
                      <div class="b"><input name="vraag3" value="2" type="radio"></div>
                      <div class="b"><input name="vraag3" value="3" type="radio"></div>
                      <div class="b"><input name="vraag3" value="4" type="radio"></div>
                      <div class="b"><input name="vraag3" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Maakt gebruik van bestaande onderzoeksinstrumenten</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag4" value="1" type="radio"></div>
                      <div class="b"><input name="vraag4" value="2" type="radio"></div>
                      <div class="b"><input name="vraag4" value="3" type="radio"></div>
                      <div class="b"><input name="vraag4" value="4" type="radio"></div>
                      <div class="b"><input name="vraag4" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Ontwerpt een interventie op basis van bestaand onderzoek</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag5" value="1" type="radio"></div>
                      <div class="b"><input name="vraag5" value="2" type="radio"></div>
                      <div class="b"><input name="vraag5" value="3" type="radio"></div>
                      <div class="b"><input name="vraag5" value="4" type="radio"></div>
                      <div class="b"><input name="vraag5" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Raadpleegt een expert naar aanleiding van een praktijkvraag</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag6" value="1" type="radio"></div>
                      <div class="b"><input name="vraag6" value="2" type="radio"></div>
                      <div class="b"><input name="vraag6" value="3" type="radio"></div>
                      <div class="b"><input name="vraag6" value="4" type="radio"></div>
                      <div class="b"><input name="vraag6" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Analyseert protocollen en vertaalt deze naar de eigen praktijk</td>
      <td><fieldset class="optGroup">
                      <div class="b"><input name="vraag7" value="1" type="radio"></div>
                      <div class="b"><input name="vraag7" value="2" type="radio"></div>
                      <div class="b"><input name="vraag7" value="3" type="radio"></div>
                      <div class="b"><input name="vraag7" value="4" type="radio"></div>
                      <div class="b"><input name="vraag7" value="5" type="radio"></div></td></td>
      
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>Dediscussieert onderwijskundig onderzoek</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag8" value="1" type="radio"></div>
                      <div class="b"><input name="vraag8" value="2" type="radio"></div>
                      <div class="b"><input name="vraag8" value="3" type="radio"></div>
                      <div class="b"><input name="vraag8" value="4" type="radio"></div>
                      <div class="b"><input name="vraag8" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">9</th>
      <td>Creëert onderwijskundige varianten op basis van bestaande ideeën</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag9" value="1" type="radio"></div>
                      <div class="b"><input name="vraag9" value="2" type="radio"></div>
                      <div class="b"><input name="vraag9" value="3" type="radio"></div>
                      <div class="b"><input name="vraag9" value="4" type="radio"></div>
                      <div class="b"><input name="vraag9" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">10</th>
      <td>Test prototypes op bruikbaarheid in de eigen praktijk</td>
      <td ><fieldset class="optGroup">
                      <div class="b"><input name="vraag10" value="1" type="radio"></div>
                      <div class="b"><input name="vraag10" value="2" type="radio"></div>
                      <div class="b"><input name="vraag10" value="3" type="radio"></div>
                      <div class="b"><input name="vraag10" value="4" type="radio"></div>
                      <div class="b"><input name="vraag10" value="5" type="radio"></div></td>
      
    </tr>
    <tr>
      <th scope="row">TEXT</th>
      <td><div class="input-group">
  <textarea class="form-control" aria-label="With textarea" name="text" placeholder="Vul hier waarom je dit niveau hebt gehaald"></textarea>
</div></td>
      <td><input class="favorite styled"
       type="submit"
       value="Next page" name="save"></td></td> 
    
  </tbody>
</table>

                
			
		
               


</form>
                <!-- Card -->
                    <!-- FORM FROM https://mdbootstrap.com/docs/standard/extended/bootstrap-survey-form/ -->

    </div>
    
</div>

</body>

</html>