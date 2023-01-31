<?php require_once('laison.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <title>Document</title>
</head>
<body>
                  
              <div class="titre"> <p> BIENVENUE </p> </div>
    <div class="login">

        <form action="" method="post">
            <img src="imagesApp/admin.png" alt="">
            <input type="text" name="user" placeholder=" Username" id="user">
            <input type="password" name="pswr" placeholder=" Password" id="pswrd">
            <input type="submit" name="submit" value="LOGIN" class="btn" id="">

            <?php

        if(isset($_POST["submit"])){
            $req= "select * from user where nom = '".$_POST['user']."' and password = '".$_POST['pswr']."' ";

            if($resultat = mysqli_query($connect_data ,$req)){
                $ligne = mysqli_fetch_assoc($resultat);
                if($ligne!=0){
                    session_start();
                    $_SESSION['login'] = $_POST['user'];
                    header("location:accueil.php");
                }

                else{
                    echo " <span style='color:red;font-size:20px;font-family;sans-serif;letter-spacing:1px;'> Login est invalide </span> ";
                    echo "<style>
                         #user,#pswrd{
                            border-color: red !important;
                         }
                         </style>";
                }

            }

        }
        ?>

        </form>
    
    </div>

</body>
</html>