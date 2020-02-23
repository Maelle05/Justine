<?php 
        
        $bdd = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', ''); 

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);
            $article = $bdd->prepare('SELECT * FROM articles WHERE id=?');
            $article->execute(array($get_id));

            if($article->rowCount() == 1){
                $article =$article->fetch();
                $titre = $article['titre'];
                $contenu = $article['contenu'];
                $skills = $article['skills'];
                $date_work = $article['date_work'];
                $image_work = $article['image_work'];
            }else{
                die('Ce Work n\'existe pas !');
            }
        }else{
            die('Erreur');
        }

        
        ?>



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Justine Magry</title>
        <link rel="stylesheet" type="text/css" href="aboutme.css" />
        <link rel="stylesheet" type="text/css" href="indexstyle.css" />
        <link rel="stylesheet" type="text/css" href="article.css" />
    </head>
    <body>
        <div class="article">      
            <div class="img_fond" >
                    <p class="back"> <a href="index.php" style="color:black;"> Back >> </a></p>
                    <div id="carre_article"></div>
                    <h2 class="titre_article" ><?= $titre?></h2>
                    <p><?= $contenu ?></p>
                    <p><?= $skills ?></p>
                    <p><?= $date_work ?></p>
                    <img src="data:image/jpeg;base64'.base64_encode($image_work).'" class="img_work" alt="" />

                        
                    </div>
            </div>  
        </div>
    </body>
</html>
    
