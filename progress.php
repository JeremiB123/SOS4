<?php 
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

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
                        <a href="index.php" class="nav-item nav-link active">Hoofdpagina</a> 
                        <a href="progress.php" class="nav-item nav-link ">Progress</a>
                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                              Onderzoekend Voortgang
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="survey_name.php">Onderzoekende houding</a>
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


    <!-- Header Start -->
    <div class="container bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3 d-flex justify-content-center">
            <div class="col-lg-6 text-center text-lg-left ">
                <h1 class="text-white mb-4 mt-5 mt-lg-0">Totale Progress</h1>
                <div>
                <canvas id="myChart"></canvas>
                
                </div>
                <div class="progress">
                 <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 50%" aria-valuenow="value" aria-valuemin="0" aria-valuemax="275"></div>
                 
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
    'Toepassing onderzoek',
    'Onderzoekend handelen'
  ],
  datasets: [{
    label: 'Jaar1',
    
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

</div>
</body>

</html>