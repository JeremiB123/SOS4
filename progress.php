<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

error_reporting(0);
 

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
</head>

<body>
     <!-- Navbar Start -->
     <div class=" bg-light position-relative shadow">
        <div class="container-xl">
        <nav class=" navbar navbar-expand-lg bg-light navbar-light py-0 ">
            <a href="#" class="navbar-brand font-weight-bold text-secondary" style="font-size: 40px;">
                <span class="text-primary">Onderzoekend vermogen</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse " id="navbarCollapse">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarCollapse">
                    <div class="navbar-nav font-weight-bold ">
                        <a href="index.php" class="nav-item nav-link">Hoofdpagina</a> 
                        <a href="progress.php" class="nav-item nav-link active ">Progress</a>
                        <a href="survey_name.php" class="nav-item nav-link">DOE DE TEST</a>
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
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-xl bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3 d-flex justify-content-center">
            <div class="col-lg-6 text-center text-lg-left ">
                <h1 class="text-white mb-4 mt-5 mt-lg-0 text-center">Totale Progress</h1>
                <div>
                <canvas id="myChart"></canvas>
                </div>

         </div>
        </div>

<script>
const data = {
  labels: [
    'Onderzoekende houding',
    'Onderzoek in het vak(leer)gebied',
    'Fenomeen onderzoek',
    'Onderzoeksvaardigheden',
    'Toepassing onderzoeksresultaten',
    'Onderzoekend handelen'
  ],
  datasets: [{
    label: '<?php 
    $id = $_SESSION['user_id'];
    $sql = "SELECT survey_data FROM survey where user_id='$id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_fetch_array($result);
    echo $resultaatCheck[0];
    ?>
    ',
    
    data: [<?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT ((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6) / 6) as test  FROM survey_answers where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>
    ,
    <?php 

    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT ((vraag1 + vraag2 + vraag3 + vraag4) /4)  as test  FROM onderzoekvak where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>
    , 
    <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT ((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6) / 6)  as test  FROM fenomeen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>
    , 
    <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT ((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9) / 9) as test  FROM onderzoeksvaardigheden where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>
    , 
    <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT ((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9 +vraag10) / 10) as test  FROM onderzoekend where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>
    , <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT ((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9 +vraag10) / 10) as test  FROM toepassen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    } 
    
    ?>
    ],
    
    fill: true,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  },
  

]
  
};
const config = {
  type: 'radar',
  data: data,
  options: {
    scale: {
    ticks: {
            max: 5,
            min: 0,
            stepSize: 0.5
    }
}
  },
}


</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<h3 class="text-white text-center">Onderzoekende houding</h3>
<div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6) / 6) * 20) as test  FROM survey_answers where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="container my-5">
  <div class="row">
    <div class="col">
    <h1 class="text-white text-center"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6) / 6) * 20) as test  FROM survey_answers where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%</h1>
    <h3 class="text-white ">Niveau afstudeerfase is 85% nodig</h3>
    </div>
    <div class="col">
        <h5 class ="text-white"> onderbouwing behaalde niveau</h5>
    <p class ="text-white"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT beschrijving  FROM survey_answers where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['beschrijving'];
        }
    }      
    
    ?> </p>
    </div>
  </div>
</div>


<h3 class="text-white text-center">Kennis over onderzoek in het vak(leer)gebied</h3>
<div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php 

$survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4) /4) * 20)  as test  FROM onderzoekvak where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }

?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="container my-5">
  <div class="row">
    <div class="col">
    <h1 class="text-white text-center"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4) /4) * 20)  as test  FROM onderzoekvak where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    
    ?>%</h1>
    <h3 class="text-white ">Niveau afstudeerfase is 85% nodig</h3>
    </div>
    <div class="col">
        <h5 class ="text-white"> onderbouwing behaalde niveau</h5>
    <p class ="text-white"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT beschrijving  FROM onderzoekvak where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['beschrijving'];
        }
    }      
    
    ?> </p>
    </div>
  </div>
</div>

<h3 class="text-white text-center">Kennis over het fenomeen onderzoek</h3>
<div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6) / 6) * 20)  as test  FROM fenomeen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="container my-5">
  <div class="row">
    <div class="col">
    <h1 class="text-white text-center"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6) / 6) * 20)  as test  FROM fenomeen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%</h1>
    <h3 class="text-white ">Niveau afstudeerfase is 85% nodig</h3>
    </div>
    <div class="col">
        <h5 class ="text-white"> onderbouwing behaalde niveau</h5>
    <p class ="text-white"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT beschrijving  FROM fenomeen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['beschrijving'];
        }
    }      
    
    ?> </p>
    </div>
  </div>
</div>
<h3 class="text-white text-center">Onderzoeksvaardigheden</h3>
<div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9) / 9) * 20) as test  FROM onderzoeksvaardigheden where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="container my-5">
  <div class="row">
    <div class="col">
    <h1 class="text-white text-center"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9) / 9) * 20) as test  FROM onderzoeksvaardigheden where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%</h1>
    <h3 class="text-white ">Niveau afstudeerfase is 85% nodig</h3>
    </div>
    <div class="col">
        <h5 class ="text-white"> onderbouwing behaalde niveau</h5>
    <p class ="text-white"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT beschrijving  FROM onderzoeksvaardigheden where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['beschrijving'];
        }
    }      
    
    ?> </p>
    </div>
  </div>
</div>
<h3 class="text-white text-center">Toepassing onderzoeksresultaten in praktijk</h3>
<div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9 +vraag10) / 10) * 20) as test  FROM onderzoekend where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="container my-5">
  <div class="row">
    <div class="col">
    <h1 class="text-white text-center"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9 +vraag10) / 10) * 20) as test  FROM onderzoekend where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    }
    
    ?>%</h1>
    <h3 class="text-white ">Niveau afstudeerfase is 85% nodig</h3>
    </div>
    <div class="col">
        <h5 class ="text-white"> onderbouwing behaalde niveau</h5>
    <p class ="text-white"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT beschrijving  FROM onderzoekend where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['beschrijving'];
        }
    }      
    
    ?> </p>
    </div>
  </div>
</div>
<h3 class="text-white text-center">Onderzoekend handelen</h3>
<div class="progress">
  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9 +vraag10) / 10) * 20) as test  FROM toepassen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    } 
    
    ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="container my-5">
  <div class="row">
    <div class="col">
    <h1 class="text-white text-center"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT (((vraag1 + vraag2 + vraag3 + vraag4 + vraag5 +vraag6 + vraag7 + vraag8 + vraag9 +vraag10) / 10) * 20) as test  FROM toepassen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['test'];
        }
    }      
    else{
        echo "0";
    } 
    
    ?>%</h1>
    <h3 class="text-white ">Niveau afstudeerfase is 85% nodig</h3>
    </div>
    <div class="col">
        <h5 class ="text-white"> onderbouwing behaalde niveau</h5>
    <p class ="text-white"><?php 
    $survey_id = $_SESSION['survey_id'];
    $sql = "SELECT beschrijving  FROM toepassen where survey_id='$survey_id';";

    $result = mysqli_query($con, $sql);
    $resultaatCheck = mysqli_num_rows($result);

    if ($resultaatCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['beschrijving'];
        }
    }      
    
    ?> </p>
    </div>
  </div>
</div>

<div ><button  class="favorite styled" onClick="window.print()">Print this page
</button></div>



</div>
</body>

</html>