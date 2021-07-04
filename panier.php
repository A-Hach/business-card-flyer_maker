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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>UI</title>
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
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Panier</h3>
        </div>
        <div class="panel-body">
          <div class="row">
                
          </div>
          <br>
          <table class="table table-striped table-hover" id="panier">
                <tr>
                  <th>Title of commande</th>
                  <th>quantity</th>
                  <th>Total price</th>
                  <th style="display: none">Id</th>

                  <th></th>
                </tr>
                
                <?php
       require_once('connect.php');
      $query = "SELECT * FROM panierdetailes where Idcom='".$_SESSION['compte']."'";
      $r = @mysqli_query($dbc, $query);
      while($row=mysqli_fetch_array($r)){
        echo '<tr>        <form action="" enctype="multipart/form-data" method="post" >

        <td>'.$row['2'].' '.$row['1'].'</td>
        <td>'.$row['3'].'</td>
        <td>'.$row['9'].'Dhs</td>
        <th style="display: none">'.$row['10'].'</th>

        <td> <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
        </td></form>
        
      </tr>';
          
   }
    ?><?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modifier']))
    {
        modifier();
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['supprimer']))
    {
        supprimer();
    }
    function supprimer(){
        require_once('connect.php');
                       
        $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
        $sql = "DELETE FROM panierdetailes where idtem=".$_COOKIE['panier']."";
    
                       mysqli_query($dbc, $sql);
                        header('Location: panier.php');
                        ob_end_flush();
       }
   function modifier(){
    require_once('connect.php');
                   
    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $sql = "UPDATE panierdetailes SET Quantite=".$_POST['quantite']."  where idtem=".$_COOKIE['panier']."";

                   mysqli_query($dbc, $sql);
                    header('Location: panier.php');
                    ob_end_flush();
   }
   ?>
     <?php
                 
                 
                 require_once('connect.php');
                 $query = "SELECT SUM(prix)FROM panierdetailes where Idcom='".$_SESSION['compte']."'";
                 $r = @mysqli_query($dbc, $query);
                    $row = mysqli_fetch_row($r);
                    
                
                echo'    <tr> <form action="" enctype="multipart/form-data" method="post" >
                <td></td>
                <td><h3>Total:</h3></td>
                <td>'.$row['0'].' DHs</td>
                <td> <button type="submit" name="confirmer" class="btn btn-success">Confirmer la commande</button</td>
                </form>
              </tr>';
                 
                    
        ?><?php
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['confirmer'])){
            confirmer();
         }
         function confirmer(){
            $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $sql = "INSERT INTO commande VALUES (null,".$_SESSION['compte'].",'" . date("D M d, Y G:i") . "','NonConfirmer')";
            
                                   mysqli_query($dbc, $sql);
                                   $query4 = "SELECT * FROM Commande where IdUser='".$_SESSION['compte']."' ORDER BY IdUser LIMIT 1";
                 $r4 = @mysqli_query($dbc, $query4);
                    $row4 = mysqli_fetch_row($r4);
                    $command=$row4['0'];
                    $_SESSION['command']=$command;
                                   $query1 = "SELECT * FROM panierdetailes where Idcom='".$_SESSION['compte']."'";
                                    $r = @mysqli_query($dbc, $query1);
                                   while($row=mysqli_fetch_array($r)){
                                    $sql3 = "INSERT INTO detcommande VALUES (".$command.",'".$row['1']."','".$row['2']."',".$row['3'].",'".$row['4']."','".$row['5']."','".$row['6']."','".$row['7']."','".$row['8']."',".$row['9'].",".$row['10'].")";
            
                                    mysqli_query($dbc, $sql3);
                            
                                     }
    
        $sql5 = "DELETE FROM panierdetailes where Idcom='".$_SESSION['compte']."'";
    
                       mysqli_query($dbc, $sql5);
                        header('Location: livasion.php');
                       ob_end_flush();
            }
            
        ?>
              </table>
          
              
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
    var id="a";
    var table = document.getElementById("panier");
    if (table != null) {
        for (var i = 0; i < table.rows.length; i++) {
            for (var j = 0; j < table.rows[i].cells.length; j++)
            table.rows[i].onclick = function () {
                tableText(this.cells[3]);
            };
        }
    }

    function tableText(tableCell) {
        id=tableCell.innerHTML;
        document.cookie="panier="+id;
    }
</script>






</body>


</html>