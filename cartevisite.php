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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
        <link rel="stylesheet" href ="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .card .border-0 .mb-4{
        border: solid;
        border-color: #EF5651;
    }
</style>
<script>
    document.cookie = "pricecv=0" 
    document.cookie = "pricecv=0";
</script>
    </head>

<body onload="Prix();">

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
            <h1 class="heading-1">Details </h1>
            <h1 class="heading-2">visit card</h1>
            
        </div>
    <div class="row justify-content-center   text-center">
        <div class="col-md-4">
        <div class="card">
            <?php
                 
                 $nom=$_GET['name'];
                 $type=$_GET['type'];
                 $prix=0;
                 require_once('connect.php');
                 $query = "SELECT Prixuni,img,descrip FROM produit where Categorie='".$type."' and Nom='".$nom."'";
                 $r = @mysqli_query($dbc, $query);
                    $row = mysqli_fetch_row($r);
                    $prix=$row['0'];
                
                echo '<img src="stock/'.$row['1'].'" alt="Image1" class="card-img-top">';
                echo'<div class="card-body">';
                    echo '<h4 class="card-title"> CARTE DE VISITE > '.$type.'</h4>';
                    echo'<p class="card-text">'.$row['2'].'</p>';
                echo'</div>';
            echo'</div>';
        echo'</div>';
                 
                    
        ?>

<form action="" enctype="multipart/form-data" method="post"style="width: min-content" >
        <!--hna-->
            <div class="card border-4 mb-4" id="price_calculator">
                <div class="card-header bg-transparent border-bottom mb-0 pl-0 pt-0 pb-2">
                    <h4 class="card-title m-0 ">Calculateur de prix</h4></div>
                <div class="card-body p-0" >
                    <div class="price_calculator">
                        <input type="hidden" name="prod_baseprice" id="prod_baseprice" value="149">
                        <input type="hidden" name="prod_optionprice" id="prod_optionprice" value="30">
                        <form name="pricecalulate" id="pricecalulate" method="POST" action="/ajaxfunctions.php" onsubmit="return false;" autocomplete="off" novalidate="novalidate">
                            <input type="hidden" name="calcaction" id="calcaction" value="icalc">
                            <input type="hidden" name="calc_inititialization" id="calc_inititialization" value="front">
                            <input type="hidden" name="prdid" id="prdid" value="398">
                            <div class="div_calculator border-top-0 ld-over  kitnormalcalc" id="normalcalc">
                                <div id="prductsize" class="form-group kit_prductsize calcrow mt-3 align-items-center  ">
                                    <div class="">
                                        <label for="prdsize" class="">Taille </label>
                                    </div>
                                    <div class="">
                                        <div class="dropdown bootstrap-select show-tick rightalign" style="width: 100%;">
                                            <select id="prdsize" onchange="Prix()" name="taille" class="selectpicker show-tick rightalign" data-style="btn-dropdown" data-width="100%" tabindex="-98">
                                                <option value="8.5" selected="selected">8.5 * 5.5 cm</option>
                                                <option value="9">9 * 5.5 cm</option>
                                                <option value="9.5">9.5 * 5.5 cm</option>
                                            </select>
                                           
                                            <div class="dropdown-menu " role="combobox">
                                                <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                    <ul class="dropdown-menu inner show"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="prductqty" class="form-group calcrow align-items-center  kit_prductqty ">
                                    <div class="">
                                        <label for="prdqty" class="">Quantité </label>
                                    </div>
                                    <div id="div_prductqty" class="">
                                        <div class="dropdown bootstrap-select kit_prdqty show-tick rightalign" style="width: 100%;">
                                            <select id="prdqty" onchange="Prix()"  name="quantite" class="selectpicker kit_prdqty show-tick rightalign" data-width="100%" data-show-subtext="true" data-style="btn-dropdown" tabindex="-98">
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            <option value="1500">1500</option>
                                            <option value="2000">2000</option>
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
                                </div>
                                <div id="additionaloptionid" class="kit_additionaloptionid ">
                                    <div class="option-group">
                                        <div class="page-section-header border-bottom mb-3 pb-2">
                                            <h4 class="card-title m-0"><a id="button3988" href="#collapse3988" class="group-collapse-button accordion-toggle " data-toggle="collapse" aria-expanded="true">Choisissez vos Options<i class="fal fa-caret-square-down float-right"></i></a></h4></div>
                                        <div id="collapse3988" class="collapse show ">
                                            <div class="row mb-3 narrow-gutter align-items-start">
                                                <div class="form-group calcrow align-items-center  mb-2  col-6 ">
                                                    <div class="col-12 px-0">
                                                        <label class="">Papier</label>
                                                    </div>
                                                    <div class="col-12 px-0">
                                                        <div class="dropdown bootstrap-select rightalign show-tick" style="width: 100%;">
                                                            <select name="papier" onchange="Prix()" id="aoptions[807]" class="selectpicker rightalign show-tick" data-width="100%" data-show-subtext="true" data-style="btn-dropdown " tabindex="-98">
                                                                <option selected="selected" data-content="" value="rigide">Rigide - 350 gr</option>
                                                            </select>
                                                           
                                                            <div class="dropdown-menu " role="combobox">
                                                                <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group calcrow align-items-center  mb-2  col-6 ">
                                                    <div class="col-12 px-0">
                                                        <label class="">Impression</label>
                                                    </div>
                                                    <div class="col-12 px-0">
                                                        <div class="dropdown bootstrap-select rightalign show-tick" style="width: 100%;">
                                                            <select name="impression" onchange="Prix()" id="aoptions[810]" class="selectpicker rightalign show-tick" data-width="100%" data-show-subtext="true" data-style="btn-dropdown " tabindex="-98">
                                                                <option data-content="" value="recto">Recto ( 1 face ) </option>
                                                                <option  data-content="" value="verso">Recto Verso</option>
                                                            </select>
                                                            
                                                            <div class="dropdown-menu " role="combobox">
                                                                <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="option-group">
                                        <div class="page-section-header border-bottom mb-3 pb-2">
                                            <h4 class="card-title m-0"><a id="button39833" href="#collapse39833" class="group-collapse-button accordion-toggle " data-toggle="collapse" aria-expanded="true">Options supplémentaire Carte Economique<i class="fal fa-caret-square-down float-right"></i></a></h4></div>
                                        <div id="collapse39833" class="collapse show ">
                                            <div class="row mb-3 narrow-gutter align-items-start">
                                                <div class="form-group calcrow align-items-center  mb-2  col-6 ">
                                                    <div class="col-12 px-0">
                                                        <label class="">Pélliculage</label><a href="javascript:void(0);" data-easein="fadeInDown" data-placement="bottom" data-toggle="popover" data-container="body" data-trigger="click" title="" id="opt809" data-original-title="Aide"><i class="fa fa-question-circle ml-2"></i></a>
                                                        <div class="d-none" id="opt809_content">
                                                            <div class="help_popup">
                                                                <p>Conseil : pour une meilleure protection&nbsp;de vos cartes de visite, il est préferable&nbsp;de choisir un pelliculage Mat ou Brillant.&nbsp;</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 px-0">
                                                        <div class="dropdown bootstrap-select rightalign show-tick" style="width: 100%;">
                                                            <select name="pelliculage" onchange="Prix()" id="aoptions[809]" class="selectpicker rightalign show-tick" data-width="100%" data-show-subtext="true" data-style="btn-dropdown " tabindex="-98">
                                                                <option selected="selected" data-content="" value="sans">Sans Pelliculage</option>
                                                                <option data-content="" value="matt">Pelliculage Matt</option>
                                                                <option data-content="" value="brillant">Pelliculage Brillant</option>
                                                            </select>
                                                           
                                                            <div class="dropdown-menu " role="combobox">
                                                                <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                                    <ul class="dropdown-menu inner show"></ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group calcrow  mb-2  col-6 ">
                                                    <div class="col-12 px-0">
                                                        <label class="">Type de coins</label><a href="javascript:void(0);" data-easein="fadeInDown" data-placement="bottom" data-toggle="popover" data-container="body" data-trigger="click" title="" id="opt808" data-original-title="Aide"><i class="fa fa-question-circle ml-2"></i></a>
                                                        <div class="d-none" id="opt808_content">
                                                            <div class="help_popup">
                                                                <p><strong>Astuce :&nbsp;</strong><u><em><br>
            Coins Arrondis</em></u> disponible sur papier supérieur à 300 gr</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 px-0">
                                                        <div class="custom-control custom-radio ">
                                                            <input type="radio" data-color="blue" onchange="Prix()" class="custom-control-input " data-default="1" data-id="1" id="1894" name="coin" checked="checked" value="Normal" data-customclass="   ">
                                                            <label class="custom-control-label" for="1894" data-original-title="Normal" data-toggle="tooltip">Normal</label>
                                                        </div>
                                                        <div class="custom-control custom-radio ">
                                                            <input type="radio" data-color="blue" onchange="Prix()" class="custom-control-input " data-default="0" data-id="2" id="1895" name="coin" value="Arrondis" data-customclass="   ">
                                                            <label class="custom-control-label" for="1895" data-original-title="Arrondis" data-toggle="tooltip">Arrondis</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                <div id="product_price_table" onclick="Prix()"></div>
                               
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
                            
                      
        <!---->
        
        
    </div>

</div>



        </div>
       
    </div>
    <center>
    
    <button class="btn menu-right-btn border" style="height:min-content ;width:min-content" name="upload" >
    <input type="file"  id="gallery-photo-add" name="gallery-photo-add[]" lang="es" multiple >
    Upload <input type="submit" name="normal"   value="confirmer"> 
    <div class="gallery" ></div>
    
    
    </button>
    <button class="btn menu-right-btn border" name="hardcore"  type="submit">Cree votre fichier à zero
    </button>
    <button class="btn menu-right-btn border" name="difficult"  type="submit">Utiliser nos designs modifiables
    </button> 
    <?php
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['normal']))
         {
            normal();
         }
         else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['difficult'])){
            difficult();
         }
         else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hardcore'])){
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
                                    $sql1 = "INSERT INTO PanierDetailes VALUES (".$_SESSION['compte'].",'".$_GET['name']."','".$_GET['type']."' , ".$_POST['quantite'].",'".$_POST['taille']."','".$_POST['papier']."','".$_POST['impression']."','".$_POST['coin']."','".$_POST['pelliculage']."',".$_COOKIE['prix'].",".$id.")";
                                    mysqli_query($dbc, $sql1);
                                    $_SESSION['template']=$id;
                                    header('Location: design(complex).php?h=400&w=690&a=3&b=5');
                                    ob_end_flush();
                }
            }
            else{
                header('Location: template.php?type=CV');
                ob_end_flush();
            }
         }
         function difficult(){
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
                                    $sql1 = "INSERT INTO PanierDetailes VALUES (".$_SESSION['compte'].",'".$_GET['name']."','".$_GET['type']."' , ".$_POST['quantite'].",'".$_POST['taille']."','".$_POST['papier']."','".$_POST['impression']."','".$_POST['coin']."','".$_POST['pelliculage']."',".$_COOKIE['prix'].",".$id.")";
                                    mysqli_query($dbc, $sql1);
                                    $_SESSION['template']=$id;
                                    header('Location: template.php?type=CV');
                                    ob_end_flush();
                }
            }
            else{
                header('Location: template.php?type=CV');
                ob_end_flush();
            }
         }
        function normal(){
            $img=array("","");
 
            $j = 0; //Variable for indexing uploaded image 
    
             //Declaring Path for uploaded images
            for ($i = 0; $i < count($_FILES['gallery-photo-add']['name']); $i++) {//loop to get individual element from the array
                $target_path = "uploads/";
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['gallery-photo-add']['name'][$i]));//explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable
                
                $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
                $img[$i]=$target_path;
                $j = $j + 1;//increment the number of uploaded images according to the files in array       
              
              
                    if (move_uploaded_file($_FILES['gallery-photo-add']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                    } else {//if file was not moved.
                    }
                 
            }
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
        $sql = "INSERT INTO clienttemplate VALUES (".$id.",".$_SESSION['compte'].",'".$img[0]."','".$img[1]."','null')";

                       mysqli_query($dbc, $sql);
                        $sql1 = "INSERT INTO PanierDetailes VALUES (".$_SESSION['compte'].",'".$_GET['name']."','".$_GET['type']."' , ".$_POST['quantite'].",'".$_POST['taille']."','".$_POST['papier']."','".$_POST['impression']."','".$_POST['coin']."','".$_POST['pelliculage']."',".$_COOKIE['prix'].",".$id.")";
                        mysqli_query($dbc, $sql1);
                        header('Location: panier.php');
                        ob_end_flush();
                    
    }
}
else{
    header('Location: connexion.php');
        ob_end_flush();

}
            
        }
        ?>
</center>
</div>

<style>
    .gallery img{
        height: 60px;
        width: 120px;
    }
</style>
<script>
        $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>

    
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



</form>

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
    if(document.getElementById("prdsize").value=="8.5"){
        taille=0;
    }
    else if(document.getElementById("prdsize").value=="9"){
        taille=1;
    }
    else if(document.getElementById("prdsize").value=="9.5"){
        taille=2;
    }
    quantite=document.getElementById("prdqty").selectedIndex+1;
    
    if(document.getElementById("aoptions[807]").value=="rigide")
    papier=0;
    if(document.getElementById("aoptions[810]").value=="recto"){
        impression=0;
        document.cookie = "side=1";
    }
    else if(document.getElementById("aoptions[810]").value=="verso"){
        impression=1;
        document.cookie = "side=2";
    }
    if(document.getElementById("aoptions[809]").value=="sans"){
        pelliculage=0;
    }
    else if(document.getElementById("aoptions[809]").value=="matt"){
        pelliculage=1;
    }
    else if(document.getElementById("aoptions[809]").value=="brillant"){
        pelliculage=2;
    }
    if(document.getElementById("1894").checked){
        coin=0;
    }
    else if(document.getElementById("1895").checked){
        coin=1;
    }
    p+=taille+papier+impression+pelliculage+coin;
    document.cookie="prixs="+p
    p*=quantite;
    document.getElementById("prix").innerHTML=p;
    document.cookie="prix="+document.getElementById("prix").innerHTML;
}
</script>






</body>


</html>