<?php require_once('laison.php') ?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-accueil.css">
    <title>Acceuil</title>

</head>
<body>
       <header>
             <div class="form_recherche">

             <div class="tableau_general">
                <a href="tableau_general.php"><b>Tableau General</b></a>
             </div>

             <div class="deconexion">
                <a href="logout.php"><b>Logout</b></a>
             </div>
             
                <form action="" name="formulaire" method="post">
                    <input type="text"  name="motcle" placeholder="RECHERCHER PAR MARQUE" id="recherche">
                    <input type="submit" name="submit" value="RECHERCHE" class="btn" >
                </form>
             </div>
       </header>




       <div class="article-pere">

       <div class="article">
<?php
    if(isset($_POST['submit'])){
        $mot_cle = $_POST['motcle'];
        $req = "select * from voiture where Marque like '$mot_cle%' ";   
    }
    else {
        $req= " select *from voiture " ;
    }
     $resultat = mysqli_query($connect_data, $req);
     $nbr = mysqli_num_rows($resultat);
      echo '<p>' .$nbr . ':' . ' Resultat de votre recherche </p>' ;
     while($ligne = mysqli_fetch_assoc($resultat)){
         ?>

         <div class="resultat" >
            <img src=" <?php echo $ligne['Photo'] ?>" alt=""> <br>
            <?php echo 'Immatrucle : '. $ligne['Imm']; ?> <br>
            <?php echo 'Marque : '. $ligne['Marque']; ?> <br>  
            <?php echo 'Modèle : ' . $ligne['Modele']; ?> <br>
            <?php echo 'Couleur : ' . $ligne['Couleur']; ?> <br>
            <?php echo 'Prix : ' . $ligne['Prix'] . 'dh/jour'; ?>
        </div>

    <?php } ?>
</div>
       </div>



</body>
</html>
