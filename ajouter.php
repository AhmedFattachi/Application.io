<?php require_once('laison.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styleajouter.css">
    <title>Ajouter</title>
</head>
<body>
      <div class="titre">
        <p> Ajouter Une Nouvelle Voiture </p>
      </div>
    <div class="contenut-pere">
        <form action="" method="post" class= "formulaire" name="form" enctype="multipart/form-data" >
            <label for="">Immatricule</label> 
            <input type="text" class="input" placeholder=" Entrer l'immatricule" name="imm">

            <label for="">Marque</label> 
            <input type="text" class="input" placeholder=" Entrer la marque" name="marque">

            <label for="">Modèle</label> 
            <input type="text" class="input" placeholder=" Entrer le modèle" name="modele">

            <label for="">Couleur</label> 
            <input type="text" class="input" placeholder=" Entrer le couleur" name="couleur">

            <label for="">Prix</label>
            <input type="number" class="input" placeholder=" Entrer le prix" name="prix">

            <label for="">Photo</label> 
            <input type="file" id="image" name="photo" required>

            <input type="submit" name="envoyer" value="Ajouter"  class="btn" >
            <a href="tableau_general.php"> <input type="button" name="" value="Tableau General" id="btn_retour"> </a>

            <?php
             

            if(!empty($_POST["imm"])){
                $imm = $_POST["imm"];
                $marque = $_POST["marque"];
                $modele = $_POST["modele"];
                $couleur = $_POST["couleur"];
                $prix = $_POST["prix"];
                $image = $_FILES["photo"]["tmp_name"];

                $traget = "imagesApp/".$_FILES["photo"]["name"];

                move_uploaded_file($image,$traget);

                $req1= "insert into voiture(Imm,Marque,Prix,Photo,Modele,Couleur) 
                values ('$imm','$marque','$prix','$traget','$modele','$couleur')" ;  

                $resultat1 = mysqli_query($connect_data,$req1);

                if($resultat1){
                    echo '<span style="color:green;font-size:20px;"> Insertion des données validés !!</span>';
                    
                }
                else{
                    echo '<span style="color:green;font-size:20px;"> Insertion des données non validés !!</span>';
                }
            }


            
            
            
            ?>
            

        </form>
    </div>
    

     
    
</body>
</html>