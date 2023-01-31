<?php require_once('laison.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_tableau.css">
    <title>Tableau General</title>
</head>
<body>

      <?php
        $req = " select * from voiture  ";
        $resultat = mysqli_query($connect_data,$req);
        $nbr = mysqli_num_rows($resultat);
      ?>
      <div class="nbr-voiture">

      <div class="ajouter">
                <a href="ajouter.php"><b id="signe-ajouter" > + </b> <strong> Ajouter </strong>  </a>
             </div>

      <div class="accueil">
                <a href="accueil.php"><strong id="accueil"> Acceuil </strong>  </a>
             </div>
             

        <?php echo "<p> Le nombre des voitures existe est ".$nbr . " . </p>"?>
      </div>

    <div class="contenut">

    <table>
        <tr>
            <th>Photo</th>
            <th>Immatrucle</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Couleur</th>
            <th>Prix</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>

        <?php
        while($ligne = mysqli_fetch_assoc($resultat))
        {
        ?>

        <tr>
        <td id="img" > <img id="img-voiture" src=" <?php echo $ligne["Photo"] ?>" alt=""> </td>
        <td id="center"> <?php echo $ligne["Imm"]  ?> </td>
        <td id="center" > <?php echo $ligne["Marque"]  ?> </td>
        <td id="center" > <?php echo $ligne["Modele"]  ?> </td>
        <td id="center" > <?php echo $ligne["Couleur"]  ?> </td>
        <td id="center" > <?php echo $ligne["Prix"]  ?> </td>
        <td id="td-sup" > <a href="supprimer.php?sup=<?php echo $ligne["Imm"];?>"> <img id="img-sup" src="imagesApp/supprimer.png" alt=""> </a> </td>
        <td id="td-sup" > <a href="modifier.php?mod=<?php echo $ligne['Imm']; ?>"> <img id="img-sup"  src="imagesApp/modifier.png" alt=""> </a> </td>
        </tr>

 
        <?php
        }?>    
      </table>

    </div>
    
</body>
</html