<?php session_start();
ob_start();
if(isset($_SESSION['compte']))
{
    if($_SESSION['compte']=='0'){
        header('Location: connexion.php');
    }
}
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href ="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a href="#" class="navbar-brand ml-3">Vegasys:}<span style="color: #00e8e8;">Print</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"></div>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav  mr-auto">
            <li class="nav-item active">
                <a href="home.php" class="nav-link">Accueil</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Carte Visite</a>
                <ul>
                    <li> <a href="cartevisite.php?name=ECONOMIQUE&type=CV" class="nav-menu">ECONOMIQUE</a></li><br>
                    <li> <a href="cartevisite.php?name=STANDARD&type=CV" class="nav-menu">STANDARD</a></li><br>
                    <li> <a href="cartevisite.php?name=TRANCHE&type=CV" class="nav-menu">TRANCHE COLORÉE</a></li>
                </ul>
                
            </li>
            <li class="nav item">
                <a href="#" class="nav-link">Flyer</a><br><br>
                <ul>
                    <li> <a href="flyer.php?name=A6&type=F" class="nav-menu">A6</a></li><br>
                    <li> <a href="flyer.php?name=A5&type=F" class="nav-menu">A5</a></li><br>
                    <li> <a href="flyer.php?name=A4&type=F" class="nav-menu">A4</a></li>
                </ul>
                
            </li>
            <li class="nav item">
                <a href="#" class="nav-link">Papetrie</a>
                <ul>
                    <li> <a href="papertrie.php?type=P&name=STANDARD" class="nav-menu">STANDARD</a></li><br>
                    <li> <a href="papertrie.php?type=P&name=CD" class="nav-menu">CD</a></li>
                </ul>
                
            </li>
            <li class="nav item">
                <a href="contact.php" class="nav-link">Contact Us</a>
            </li>
            <li class="nav item">
                <a href="inscription.php" class="nav-link">Register</a>
            </li>
            
        </ul>
        <form class="form-intine my-2 my-lg-0"  method="post">
            <?php 
            if(!isset($_SESSION['compte']) ){
                echo '<button class="btn btn-outline-dark"  type="submit"><a href="connexion.php"> Connexion</a> 
            </button>';
            }
            else{
                echo '<button class="btn btn-outline-dark"  type="submit"> <i class="fa fa-male"></i>
                </button>';
                echo '<button class="btn btn-outline-dark" name="deconnecter"><a ><i class="fa fa-close"></i> 
                </button>';
                echo '<button class="btn btn-outline-dark" name="command"><a ><i class="fa fa-truck"></i> 
                </button>';
                echo'<button class="btn btn-outline-dark" name="panier" type="submit"><i class="fa fa-shopping-basket"></i> 
                </button> ';
            }
            ?>
        </form> 
        <?php
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deconnecter']))
         {
            deconnecter();
         }
         else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['panier']))
         {
            panier();
         }
         else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['command']))
         {
            command();
         }
        function deconnecter(){
            session_destroy();
            header('Location: connexion.php');
        }
        function panier(){
            header('Location: panier.php');
        }
        function command(){
            header('Location: command.php');
        }
        ?>


      


    </div>
    </nav>
</header>
<main>
    <div class="container-fluid p-0">
        <div class="site-content">
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-column">
                    <h1 class="site-title">Welcome to Vegasys Print</h1>
                    <p class="site-desc">
                        Vegasys Print, provides you with the most recent methods to guide and help you in the realization of all your printing projectsss </p>

                    <div class="d-flex flex-row">
                        <?php 
                        if(!isset($_SESSION['compte']))
                        {
                            echo '<input type="button" value="Connexion" class="btn site-btn1 px4 py-3 mr-4 btn-dark">';
                        }
                        ?>
                        <input type="button" value="Know Features" class="btn site-btn2 px4 py-3 mr-4 btn-light">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-1">
        <div class="container text-center">
            <h1 class="heading-1">PRODUCT </h1>
            <h1 class="heading-2">CATEGORIES</h1>
            <p class="para-1">Welcome to our product category</p>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="stock/pp2.jpg" alt="Image1" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">visit card</h4>
                        <p class="card-text">vegasys print offers you the possibility
                             of generating your business card online, 
                             is a small format document generally made
                              of card stock that is used for private purposes. </p>
                              <button class="btn menu-right-btn border"  type="submit"><a href="detailscartevisite.php"> More details >></a> 
                              </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="stock/fl2.jpg" alt="Image2" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Flyer & Brochure</h4>
                        <p class="card-text">vegasys offers you the possibility
                             of storing your flyer and brochure,
                              in particular communication media 
                              allowing to undertake an advertising action </p>
                              <button class="btn menu-right-btn border"  type="submit"><a href="detailsFlyer.html"> More details >></a> 
                              </button>
                    </div>
                </div>

                
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="stock/m2.jpg" alt="Image3" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Papetrie</h4>
                        <p class="card-text">Vegasysprint offers a selection of products 
                            to organize and work on: notes, text book, paper, copy or publish, 
                            add paper or save. Browse our different paper products in the stationery section
                             </p>
                             <button class="btn menu-right-btn border"  type="submit"><a href="detailspapetrie.php"> More details >></a> 
                             </button>
                             
                    </div>
                </div>
                
            </div>
        </div>

    </div>
    <div class="section-2">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column m-4 ">
                    <h1 class="heading-1">Like & Share Your Love</h1>
                    <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <input type="button" value="Show" class="btn btn-danger">

                </div>
            </div>
        </div>
    </div>
    <div class="section-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fa fa-question fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">24/7 Support</h3>
                            <p class="m-2">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                 the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fa fa-tree fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Marketing</h3>
                            <p class="m-2">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                 the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                            </p>
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fa fa-rocket fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Speed</h3>
                            <p class="m-2">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                 the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fa fa-user fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Authorized</h3>
                            <p class="m-2">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fa fa-search fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">SEO</h3>
                            <p class="m-2">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-row">
                        <i class="fa fa-cogs fa-3x m-2"></i>
                        <div class="d-flex flex-column">
                            <h3 class="m-2">Customize</h3>
                            <p class="m-2">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="section-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img src="stock/images.jpg" alt="Image-7" width="590">

                </div>
                <div class="col-md-5">
                    <h1 class="text-white">Didn't know where to start From</h1>
                    <a href="#">Join Us</a>
                    <p class="para-1">
                        We will help you understand all the stages to make a wonderful print
                    </p>
                </div>

            </div>
        </div>
    </div>
</main>



<footer>
    <div class="section-5 text-center">
        <h4 style="margin-top:5%;">Get Template Design From Vegasys print</h4>
        <h4 class="my-4">If you need any Help</h4>
        <div class="form-inline justify-content-center">
            <input type="text" name="Email" id="email" id="email" placeholder="Email" size="40" class="form-control px-4 py-2">
            <input type="button" value="Contact Us" class="btn btn-danger px-4 py-2">

        </div>



        <div class="social" style="margin:5%;">
            <div class="d-flex flex-row justify-content-center">
              <i class="fa fa-facebook-f m-2"></i>
              <i class="fa fa-twitter m-2"></i>
              <i class="fa fa-instagram m-2"></i>
              <i class="fa fa-youtube m-2"></i>

            </div>
        </div>

       <hr>
      
       <h4 style="color:#EF5651 ;text-align: center;">Contact</h4>
       <h6 style="color: black;text-align:center;">
        <div >
            <i class="fa fa-map-marker m-2"></i> N°5,résidence Ikram N°188<br> Lotissement Yasmine 1 <br>Marrakech,40000
        </div> 
    
    </h6>
    <h6 style="color: black;text-align:center;">
        <div >
            <i class="fa fa-phone m-2"></i>0661-692148
        </div> 
    
    </h6>
    <h6 style="color: black;text-align:center;">
        <div >
            <i class="fa fa-envelope m-2"></i>contact@vegasys.ma
        </div> 
    
    </h6>
       <h5 style="color: lightseagreen;">Copyright © 2020 vegasysprint Tous droits réservés. </h5>

    </div>
</footer>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

<script>
    window.sr =ScrollReveal({duraction:1000});
    sr.reveal('.sitee-content .d-flex');
    sr.reveal('.section-1 .card');
    sr.reveal('.section-2 .d-flex');
    sr.reveal('.section-3 .col-md-4');
    sr.reveal('.section-4 .col-md-7, .col-md-5');
    document.cookie = "pricecv=0";
    document.cookie = "pricef=0";
    document.cookie = "pricep=0";
</script>






</body>


</html>