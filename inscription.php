<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=devise-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="form">
        <h3 class="titre">Inscription</h3>
        <form action="inscription.php" method="post">
            <p>Adresse Email :</p>
            <input type="email" name="email" id="email" placeholder="Entrer votre Adresse email"required>
            <p>Mot de pass :</p>
            <input type="password" name="pass" id="email" placeholder="Entrer un mot de pass" required>
            <p>Mot de pass(une fois encore) :</p>
            <input type="password" name="repass" id="email" placeholder="Entrer un mot de pass" required>
        <br>
        <br>
        <input type="submit" name="inscription" value="Envoyer"> &nbsp; &nbsp; &nbsp; &nbsp; <input type="reset" value="Effacer">
        <?php
         if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['inscription']))       {
            check();
         }
         function check(){
             $email=$_POST['email'];
             $pass=$_POST['pass'];
             require_once('connect.php');
            $query = "SELECT count(Id) as 'count' FROM users where Email='".$email."'";
            $r = @mysqli_query($dbc, $query);
            while($row=mysqli_fetch_array($r)){
                if($row[0]!='0') {
                        echo'<label style="color: red" >Erreur,ce email est deja utiliser</label>';

                      }
                     else if($_POST['pass']!=$_POST['repass']){
                        echo'<label style="color: red" >Erreur,votre mot de pass est pas comme le premier</label>';
                      }
                      else{
                        $sql = "INSERT INTO users VALUES (null,'".$email."','".$pass."' , 'user')";
                        
                        if ($dbc->query($sql) === TRUE) {
                            header('Location: connexion.php');
                        } else {
                            echo'<label style="color: red" >Erreur,au niveau server.</label>';
                        }
                        
                        mysqli_close($dbc);
                    
                      }
                
         }}
        ?>
           
        </form>
    </div>
</body>
<!--passons maintenant ou css-->
<style>
    body{
        margin: 0;
        padding: 0;
        background-image:url('stock/image3.jpg') ;
        -webkit-background-size:cover;
        background-size: cover;
        font-family: Tahoma, Geneva, Verdana, sans-serif;
    }
    .form{
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-sizing: border-box;
        background-color:grey;
        padding: 40px;
        border-radius: 15px;
        border:1px solid,#fff;

    }
    .form:hover{
        background-color: rosybrown;
    }
    .titre{
        margin: 0;
        padding: 0 0 20px;
        font-weight: bold;
        color: white;
        text-align: center;

    }
    .form p{
        margin: 0;
        padding: 0;
        color: white;
        font-weight: bold;
    }
    .form input,select{
        margin-bottom: 10px;
        width: 100%;
    }
    .form input[type=text], .form input[type=password], .form input[type=email]{
        border: none;
        border-bottom: 1px solid #fff ;
        background-color: transparent;
        outline: none;
        height: 40px;
        display: 16px;
        color: #fff;
    }
    ::placeholder{
        color: white;
    }
    .form select{
        margin-top: 20px;
        padding: 10px,0;
    }
    .form input[type=submit] .form input[type=reset]{
        border: none;
        height: 40px;
        outline: none;
        font-size: 15px;
        background-color: darkgray;
        cursor: pointer;
    }
</style>


</html>
