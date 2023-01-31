<?php require_once('laison.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-supprimer.css">
    <title>Suppression</title>
</head>

<body>
<div class="titre">
                <p> La suppression de la voiture à l'immatricule est  :  <?php echo $_GET['sup']; ?> </p>
      </div>
    <div class="suppression">
        <form action="" method="post">
            <a href="tableau_general.php"> <input type="btn" class="btn" name="btn" value="Tableau General"> </a> <br>
            <?php
            if(isset($_GET["sup"])){
                $sup = $_GET["sup"];
                $req = "DELETE from voiture WHERE Imm = '$sup' ";
                $resultat = mysqli_query($connect_data, $req);
            }

           if ($resultat){
                echo '<span style="color:green;font-size:20px;font-family:sans-serif;"> La suppresion effectué !!</span>';
            }
            else {
                echo '<span style="color:red;font-size:20px;font-family:sans-serif;"> La suppresion echoué !!</span>';
            }
            ?> 
        </form>

    </div>
    
</body>
</html>
