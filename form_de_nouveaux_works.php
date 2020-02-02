 
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="form_de_nouveaux_works.css" />
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Six+Caps&display=swap" rel="stylesheet">        

        <title>Justine</title>
    </head>
    <body>
        
                 <?php
                        try
                        {
                            $bdd = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', '');
                            
                        }
                        catch (Exception $e)
                        {
                                die('Erreur : ' . $e->getMessage());
                        }

                        
                        if (isset($_POST['work_titre'], $_POST['work_contenu'], $_POST['work_skills'], $_POST['work_date'], $_POST['work_image']))
                            if(!empty($_POST['work_titre']) AND !empty($_POST['work_contenu']) ){

                                $work_titre = htmlspecialchars($_POST['work_titre']);
                                $work_contenu = htmlspecialchars($_POST['work_contenu']);
                                $work_skills = htmlspecialchars($_POST['work_skills']);
                                $work_date = htmlspecialchars($_POST['work_date']);
                                $work_image = $_POST['work_image'];

                                $ins = $bdd->prepare('INSERT INTO articles(titre, contenu, skills, date_work, image_work) VALUES(?,?,?,?,?)');
                                $ins->execute(array($work_titre,$work_contenu,$work_skills,$work_date, $work_image) );

                                $message = 'Ton nouveau Work est en ligne !';
                                echo $message;

                            }
                            else{
                                $erreur = "Il faut que tu remplices au moins titre et contenu !";
                            }
                    ?>

                <h2>Des nouveaux travaux ? </h2>

            <form method="POST" class="form">
            <h3>Titre *</h3>
                <input type="text" placeholder="titre" name="work_titre" /> <br />
                <h3>Contenu *</h3>
                <textarea  placeholder="contenu" name="work_contenu"> </textarea><br />
                <h3>Skills</h3>
                <input type="text" placeholder="skills" name="work_skills" /> <br />
                <h3>Date</h3>
                <input type="text" placeholder="date" name="work_date" /> <br />
                <h3>Une image ?</h3>
                <input type="file" id="avatar" name="work_image" accept="image/png, image/jpeg"> <br/>
                <h3>Poster</h3>
                <input type="submit"   value="Poster Work" />
            </form>

                <h2>Tes Articles deja en ligne !</h2>

                <?php  
                  
                  $bdd = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', '');
                  $articles = $bdd ->query('SELECT * FROM articles ORDER BY id DESC');
                
                ?>
                <ul>
                    <?php while($v = $articles->fetch()){ ?>
                        <li><?= $v['titre']?> <a href="article.php? id=<?=$v['id']?> "> Voir </a> | <a href="edit_article.php?edit=<?=$v['id']?> "> Modifier </a> | <a href="article.php? id=<?=$v['id']?> "> Suprimer</a></li>
                        
                    <?php }?>
                <ul>

            <br />
                    <?php 
                        if(isset($erreur)){ echo $erreur;}
                    ?>

            <a href="index.php">Retour</a>

    </body>
</html>
 
 
 
 
 