<?php session_start();
?>
<html>
    <head>
        <title></title>
             
        <link rel="stylesheet" href ="stylecnx.css">

    </head>
    <body>
        <form action="connexion.php" method="post">
        <div class="login-box" style="height: 500px">
            <img src="stock/avatar.png" class="avatar">
             <h1>Login Here</h1>
             <form>
             <p>E-mail</p>
             <input type="text" name="email" placeholder="Enter Email">
             <p>Password</p>
             <input type="password" name="pass" placeholder="Enter password">
             <input type="submit" name="connecter" value="connecter">
             <input type="submit" name="register" value="register">

         
             
             <?php
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['connecter']))         {
            connecter();
         }
         else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
            header('Location: inscription.php');
         }
        function connecter(){
            require_once('connect.php');
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $query = "SELECT TypeUser,Id,count(Id) as 'count' FROM users where Email='".$email."' and Pass='".$pass."' ";
            $r = @mysqli_query($dbc, $query);


                // mysqli_fetch_array will return a row of data from the query
                // until no further data is available
                

        while($row=mysqli_fetch_array($r)){
                

             if($row['count']!='0')
                 {
                    echo $row['count'];

                     $_SESSION['compte']=$row['Id'];
                     echo  $_SESSION['compte'];
                     if($row['TypeUser']=='user'){
                        header('Location: home.php');
                     }
                     else if($row['TypeUser']=='admin'){
                        header('Location: admin/index.php?Admin=Admin');
                     }


                 }
             else
                 {
                    $_SESSION['compte']=0;
                    echo'<label style="color: red" >Erreur</label>';

                 }
                 }
                // Close connection to the database
                mysqli_close($dbc);
                }
        ?>
             

             </form>

        </div>
    </body>
</html>
