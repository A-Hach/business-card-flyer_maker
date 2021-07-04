<?php
        session_start();
        ob_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>UI</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       
        <link rel="stylesheet" href ="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script>
    document.cookie = "pricep=0";
</script>
    </head>

<body onload="Prix()">

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
    <div class="section-1">
        <div class="container text-center">
        <?php
                 
                 $nom=$_GET['name'];
                 $type=$_GET['type'];
                 $prix=0;
                 require_once('connect.php');
                 $query = "SELECT Prixuni,img,descrip FROM produit where Categorie='".$type."' and Nom='".$nom."'";
                 $r = @mysqli_query($dbc, $query);
                    $row = mysqli_fetch_row($r);
                    $prix=$row['0'];
            echo '<h1 class="heading-1">PAPIER > '.$nom.'</h1>';
            
            
        echo'</div>
    <div class="row justify-content-center text-center">
        <div class="col-md-4">
            <div class="card">';
                echo'<img src="stock/'.$row['1'].'" alt="Image1" class="card-img-top">
                <div class="card-body">
                    
                    <p class="card-text">
                    '.$row['2'].' </p>
                       
                          
                </div>
            </div>';?>
             
            
        </div>
        <form action="" enctype="multipart/form-data" method="post"style="width: min-content" >

        <div class="card border-4 mb-4" id="price_calculator">
            <div class="card-header bg-transparent border-bottom mb-0 pl-0 pt-0 pb-2">
                <h4 class="card-title m-0 ">Calculateur de prix</h4></div>
            <div class="card-body p-0">
                <div class="price_calculator">
                    <input type="hidden" name="prod_baseprice" id="prod_baseprice" value="1149">
                    <input type="hidden" name="prod_optionprice" id="prod_optionprice" value="0">
                    <form name="pricecalulate" id="pricecalulate" method="POST" action="/ajaxfunctions.php" onsubmit="return false;" autocomplete="off" novalidate="novalidate">
                        <input type="hidden" name="calcaction" id="calcaction" value="icalc">
                        <input type="hidden" name="calc_inititialization" id="calc_inititialization" value="front">
                        <input type="hidden" name="prdid" id="prdid" value="97">
                        <div class="div_calculator border-top-0 ld-over  kitnormalcalc" id="normalcalc">
                            
                            <div id="prductqty" class="form-group calcrow align-items-center  kit_prductqty ">
                                <div class="">
                                    <label for="prdqty" class="">Quantité </label>
                                </div>
                                <div id="div_prductqty" class="">
                                    <div class="dropdown bootstrap-select kit_prdqty show-tick rightalign" style="width: 100%;">
                                        <select id="prdqty" name="quantite" onchange="Prix()" name="prdqty" class="selectpicker kit_prdqty show-tick rightalign" data-width="100%" data-show-subtext="true" data-style="btn-dropdown" tabindex="-98">
                                            <option value="100" selected="selected">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            <option value="1500">1500</option>
                                            <option value="2000" >2000</option>
                                            <option value="2500">2500</option>
                                            <option value="3000">3000</option>
                                            <option value="4000">4000</option>
                                            <option value="5000">5000</option>
                                            <option value="7500">7500</option>
                                            <option value="10000">10000</option>
                                            <option value="15000">15000</option>
                                            <option value="20000">20000</option>
                                            <option value="25000">25000</option>
                                            <option value="30000">30000</option>
                                            <option value="40000">40000</option>
                                            <option value="50000">50000</option>
                                            <option value="75000">75000</option>
                                            <option value="100000">100000</option>
                                        </select>
                                      
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                           
                               
                                
                                <div id="productpricetotal" class="d-flex flex-wrap justify-content-end text-primary content-box floating-price" style="position: sticky;"><span class="content-small-box-lable pr-2 hide_price_label">Total HT :</span><span class="content-small-box-content float-right rightalign" id="disp_product_price"> <label id="prix"><?php echo $prix ?></label> DH</span>
                                    <input type="hidden" class="hidden_total_price" value="">
                                    <input type="hidden" name="txttotprice" id="txttotprice" value="179" class="1">
                                    <input type="hidden" name="vendor_price" value="0">
                                    <input type="hidden" name="vendor_color_price" value="">
                                    <input type="hidden" name="product_weight" id="product_weight" value="5">
                                </div>
                            <div class="text-right w-100" id="custom_size_unit_price"></div>
                            <div class="ld ld-ring ld-spin ld-ring-large"></div>
                        </div>
                        
                </div>
            </div>
        </div>
        <button class="btn menu-right-btn border" name="hardcore"  type="submit">Cree votre fichier à zero
    </button> </form>
    <?php
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hardcore'])){
        hardcore();
     }
     function hardcore(){
        if(isset($_SESSION['compte']))
        {
            if($_SESSION['compte']=='0'){
                header('Location: connexion.php');
                ob_end_flush();
            }
            else{
          
        
        // $dbc will contain a resource link to the database
        // @ keeps the error from showing in the browser
        $id=rand(0,1000000);
        $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        OR die('Could not connect to MySQL: ' .
        mysqli_connect_error());
                $sql = "INSERT INTO clienttemplate VALUES (".$id.",".$_SESSION['compte'].",'null','null','null')";
        
                               mysqli_query($dbc, $sql);
                                $sql1 = "INSERT INTO PanierDetailes VALUES (".$_SESSION['compte'].",'".$_GET['name']."','".$_GET['type']."' , ".$_POST['quantite'].",'".$_GET['name']."','null','null','null','null',".$_COOKIE['prix'].",".$id.")";
                                mysqli_query($dbc, $sql1);
                                $_SESSION['template']=$id;
                               if($_GET['name']=='CD'){
                                header('Location: designp.php?a=500&b=500&c=500');
                                ob_end_flush();
                                }
                                else{
                                header('Location: designp.php?a=520&b=360&c=0');
                                ob_end_flush();
                                }
                                
            }
        }
        else{
            header('Location: connexion.php');
            ob_end_flush();
        }
     }
    ?>
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
    var taille=0,quantite=0,papier=0,impression=0,pelliculage=0,coin=0,p1=parseFloat(document.getElementById("prix").innerHTML),p=0;
function Prix(){
    //alert(p1);
     p=p1;
     quantite=document.getElementById("prdqty").selectedIndex+1;
    
   
    
    document.cookie="prixs="+p
    p+=quantite;
    document.getElementById("prix").innerHTML=p;
    document.cookie="prix="+document.getElementById("prix").innerHTML;
}
</script>






</body>


</html>