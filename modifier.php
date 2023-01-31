<?php require_once('laison.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleajouter.css">
    <title>Modification</title>
</head>
<body>

      <div class="titre">
                <p> Modifier la voiture à l'immatricule est :  <?php echo $_GET['mod']?> </p>
      </div>
    <div class="contenut-pere" method="post">
        <form action="" method="post" class= "formulaire" name="form" enctype="multipart/form-data" >

            <label for="">Immatricule</label> 
            <input type="text" class="input" placeholder=" Entrer l'immatricule" value="<?php echo $_GET['mod']?>"  name="imm" readonly>

            <label for="">Couleur</label> 
            <input type="text" class="input" placeholder=" Entrer le couleur" name="couleur" required>

            <label for="">Prix</label>
            <input type="number" class="input" placeholder=" Entrer le prix" name="prix" required>

            <label for="">Photo</label> 
            <input type="file" id="image" name="photo" required>

            <input type="submit" name="btr" value="Modifier"  class="btn" >
            <a href="tableau_general.php"> <input type="button" name="" value="Tableau General" id="btn_retour"> </a>
             
             
            <?php
                
            if(isset($_POST["btr"])){
                $imm = $_POST["imm"];
                $couleur = $_POST["couleur"];
                $prix = $_POST["prix"];
                $modifier = $_GET["mod"];
                $image = $_FILES["photo"]["tmp_name"];

                $traget = "imagesApp/".$_FILES["photo"]["name"];
                move_uploaded_file($image,$traget);

                $req= " UPDATE voiture SET Prix ='$prix' , Photo = '$traget' , couleur ='$couleur' 
                WHERE Imm = '$modifier' ";
               

                $resultat = mysqli_query($connect_data,$req);
                if($resultat){
                    echo '<span style="color:green;font-size:20px;font-family:sans-serif;"> La modification des données validés !!</span>';
                }
                else{
                     echo '<span style="color:red;font-size:20px;font-family:sans-serif;"> La modification des données échouer !!</span>';
                     
                }
            }
            ?>
             
        </form>
    </div>
    
</body>
</html>
