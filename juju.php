<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="form_de_nouveaux_works.css" />
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Six+Caps&display=swap" rel="stylesheet"> 
        <title>Edit</title>
    </head>
    <body>
        
            <?php
        if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "JustineMMI") // Si le mot de passe est bon
        {
        // On affiche les codes
        ?>

            <h2> Salut Juju !!! </h2>
            <img style="width: 10%" src="images/portrait.jpg" class="img">
            <p> Tu veux ajouter ou suprimer un 'Work'?<br>
            <a href="form_de_nouveaux_works.php"> clic ICI </a>
            </p>
    
        <?php
        }
        else // Sinon, on affiche un message d'erreur
        {
            echo '<p>Mot de passe incorrect</p> <a href="editmdp.php"> Retour</a>';
        }
        ?>
        
        
    </body>
</html>