<?php 
session_start();
include("connection.php");
include("functions.php");
$id = $_SESSION['user_id'];
$user_data = check_login($con);

$sql = "SELECT * FROM users where user_id='$id';";



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
    
    <div class=" bg-light position-relative shadow">
        <div class="container-xl">
        <nav class=" navbar navbar-expand-lg bg-light navbar-light py-0 ">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 40px;">
                <span class="text-primary">Onderzoekend vermogen </span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse " id="navbarCollapse">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarCollapse">
                    <div class="navbar-nav font-weight-bold ">
                        <a href="index.php" class="nav-item nav-link active">Hoofdpagina</a> 
                        <a href="progress.php" class="nav-item nav-link ">Progress</a>
                        <a href="survey_name.php" class="nav-item nav-link ">DOE DE TEST</a>
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
    <div class="container bg-primary ">
        <div class="row align-items-center ">
            <div class="col-lg-6 text-center text-lg-left">
            <h3 class="text-white">Onderzoekend vermogen</h3>
            <br>
                <p class="text-white">Bekwaamheid onderzoekend vermogen wil zeggen dat de leraar de bekwaamheid toont om praktijkonderzoek te doen en te gebruiken ter verbetering van de eigen beroepspraktijk door de integratie van een onderzoekende houding, kennis over het fenomeen onderzoek, onderzoekend handelen, onderzoeksvaardigheden, het kunnen toepassen van onderzoeksresultaten in de praktijk en kennis over onderzoek in het vakgebied.
De zes aspecten van onderzoekend vermogen zijn in de praktijk onlosmakelijk met elkaar verbonden en verweven. Om het onderzoekend vermogen te trainen en de ontwikkeling in kaart te brengen is het echter functioneel om de verschillende aspecten afzonderlijk te benaderen.</p>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
            <img src="img/index.png" width="450" height="500" />
                            </div>
                  <p></p>
                  <p></p>
                  <p></p>
            </div>
        </div>
    </div>

                           
</body>
</html>