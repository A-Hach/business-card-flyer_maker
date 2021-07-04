<?php
                      require_once('../connect.php');
                       
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql = "DELETE FROM Commande where Statuss='done'";

mysqli_query($dbc, $sql);
session_start();
ob_start();
//if($_GET['Admin']!='Admin '){
  //header('Location: home.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminStrap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="users.php">Users</a></li>
            <li class="active"><a href="commands.php">Commands</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome,Admin</a></li>
            <li><a href="../home.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php
                   require_once('../connect.php');
                   $query = "SELECT count(Id) FROM Compte ";
                   $r = @mysqli_query($dbc, $query);
                      $row = mysqli_fetch_row($r);
                      $users=$row['0'];
                      require_once('../connect.php');
                   $query1 = "SELECT count(Id) FROM Commande ";
                   $r1 = @mysqli_query($dbc, $query1);
                      $row1 = mysqli_fetch_row($r1);
                      $cmd=$row1['0'];
                      ?>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashboard<small>Manage Your Site</small></h1>
          </div>
          
        </div>
      </div>
    </header>

    
   

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.html" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo $users; ?></span></a>
              <a href="commands.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Commands <span class="badge"><?php echo $cmd; ?></span></a>
            </div>

            <div class="well">
              <h4></h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                      
              </div>
            </div>
            <h4> </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    
            </div>
          </div>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Posts</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Posts...">
                      </div>
                </div>
                <br>
                <form action="" enctype="multipart/form-data" method="post" >
                <table class="table table-striped table-hover" >
                      <tr>
                        <th>Id Commande</th>
                        <th>Nom du Produit</th>
                        <th>Type du produit</th>
                        <th>Quantite</th>
                        <th>Taille</th>
                        <th>Papier</th>
                        <th>Impression</th>
                        <th>Coin</th>
                        <th>Pellicalage</th>
                        <th>Prix</th>
                        <th>Front</th>
                        <th>Back</th>
                        <th>Template</th>
                        <th></th>
                      </tr>
                      <?php
                      require_once('../connect.php');
                      
                      $query = "SELECT * FROM detcommande where idcommande=".$_GET['cmd']."  ";
                      $r = @mysqli_query($dbc, $query);
          
          
                          // mysqli_fetch_array will return a row of data from the query
                          // until no further data is available
                          
                          
                  while($row=mysqli_fetch_array($r)){
                      echo'<tr> 
                      <td>'.$row['0'].'</td>
                      <td>'.$row['1'].'</td>
                      <td>'.$row['2'].'</td>
                      <td>'.$row['3'].'</td>
                      <td>'.$row['4'].'</td>
                      <td>'.$row['5'].'</td>
                      <td>'.$row['6'].'</td>
                      <td>'.$row['7'].'</td>
                      <td>'.$row['8'].'</td>
                      <td>'.$row['9'].'</td>
                      
                      ';
                      $cmd=$row['10'];
                      $type=$row['2'];
                      
                      $query1 = "SELECT * FROM clienttemplate where Id='".$row['10']."'";
                      $r1 = @mysqli_query($dbc, $query1);
                         $row1 = mysqli_fetch_row($r1);
                         
                     if($type=='CV'){
                      echo'    
                      <td><img src="../'.$row1['2'].'" style="height:150px;width:300px;"></td>
                      <td><img src="../'.$row1['3'].'" style="height:150px;width:300px;" ></td>
                      <td><img src="../templates/'.$row1['4'].'" style="height:150px;width:300px;" ></td>';
                     }
                    
                     else if($type=='P'){
                      echo'    
                      <td><img src="../'.$row1['2'].'" style="height:300px;width:300px;border-radius:200px;"></td>
                      <td><img src="../'.$row1['3'].'" style="height:300px;width:300px;border-radius:200px;"></td>
                      <td><img src="../templates/'.$row1['4'].'" style="height:300px;width:300px;border-radius:200px;"></td>';
                     }
                     else {
                      echo'    
                      <td><img src="../'.$row1['2'].'" style="height:300px;width:150px;"></td>
                      <td><img src="../'.$row1['3'].'" style="height:300px;width:150px;"></td>
                      <td><img src="../templates/'.$row1['4'].'" style="height:300px;width:150px;"></td>';
                     }
                    }
                     echo'</table><button type="submit" name="Confirmer" class="btn btn-success">Confirmer</button>
                     <button type="submit" name="Finir" class="btn btn-dark">Finir</button>
                     </form>
                   </tr>';
                   $query2 = "SELECT * FROM livasion where Idcommande='".$_GET['cmd']."'";
                   $r2 = @mysqli_query($dbc, $query2);
                      $row2 = mysqli_fetch_row($r2);
                      
                  
                  echo ' <table class="table table-striped table-hover">
                  <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Zip</th>
                    <th>Nom Carte</th>
                    <th>N° du Carte</th>
                    <th>Mois exp</th>
                    <th>Anne exp</th>
                    <th>CVV</th>
                    
                    <th></th>
                  </tr>
                  <tr>
                    <td>'.$row2['1'].'</td>
                    <td>'.$row2['2'].'</td>
                    <td>'.$row2['3'].'</td>
                    <td>'.$row2['4'].'</td>
                    <td>'.$row2['5'].'</td>
                    <td>'.$row2['6'].'</td>
                    <td>'.$row2['7'].'</td>
                    <td>'.$row2['8'].'</td>
                    <td>'.$row2['9'].'</td>
                    <td>'.$row2['10'].'</td>
                    <td>'.$row2['11'].'</td>
                    <td>'.$row2['12'].'</th>
                    
                    
                  </tr>';
                      ?>
                      <?php 
                       if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Confirmer']))
                       {
                        Confirmer();
                        }
                        else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Finir']))
                        {
                          Finir();
                         }
                         function Finir(){
                   
                          $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                  
                          $sql = "UPDATE Commande SET Statuss='Finis' where Id=".$_COOKIE['cmd']."";
      
                                         mysqli_query($dbc, $sql);
                         }
                      function Confirmer(){
                         
                   
                        $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                
                        $sql = "UPDATE Commande SET Statuss='EnCours' where Id=".$_COOKIE['cmd']."";
    
                                       mysqli_query($dbc, $sql);
       }?>
                    
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2020</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <script>
     CKEDITOR.replace( 'editor1' );
     var id="a";
    var table = document.getElementById("cmd");
    if (table != null) {
        for (var i = 0; i < table.rows.length; i++) {
            for (var j = 0; j < table.rows[i].cells.length; j++)
            table.rows[i].onclick = function () {
                tableText(this.cells[0]);
            };
        }
    }

    function tableText(tableCell) {
        id=tableCell.innerHTML;
        document.cookie="cmd="+id;
    }
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
