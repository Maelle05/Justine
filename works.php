<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Justine Magry</title>
        <link rel="stylesheet" type="text/css" href="works.css" />
        <?php 
        
        $bdd = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', ''); 
        $works = $bdd->query('SELECT * FROM articles ORDER BY id DESC');

        ?>
    </head>
    <body>
    <div class="aboutme">      
        <div class="img_fond" >
                <p class="back"> <a href="index.php" style="color:black;"> Back >> </a></p>
                <div id="carre_titre_works"></div>
                <h2 class="titre_page" >MY WORKS</h2>

                <div class="all_works" style=" display: flex; flex-direction: row;  flex-wrap: wrap; ">


                        <?php  while ($a = $works->fetch() ) { ?>
                            
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $a['titre']?></h5>
                                            <a href="article.php? id=<?=$a['id']?> " style="color:black;"> CLICK HERE</a>
                                        </div>
                                    </div>  
                                    
                           

                         <?php  } ?>
                    
                </div>
        </div>  
    </div>
    </body>
</html>