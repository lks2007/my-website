<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/search.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Lukas | Lukas.soigneux.fr</title>
</head>
<body>
<nav class="navbar">
    <ul class="site">
        <li class="tutorial">
            <a href="https://lukas.soigneux.fr" id="color">
                <p>Lukas Soigneux</p>
            </a>
        </li>
        <li class="tutorial around">
            <form action="../../search/" method="get">
                <input type="text" name="q" class="search inline" placeholder="Recherche" autocomplete="off" />
                <i class="fas fa-search button"></i>
            </form>
        </li>
    </ul>
</nav>
<div class="container-cours" id="container">
                <br />
                <div class="container-h2">
                    <h1 id="contenue">Cherchez tous vos cours préféré</h1>
                </div>
                <div class="container-all" id="all">
                <?php 
                if(empty($_GET["q"])){
                    echo "<h1 class='center'>Oops ... <br> essayez d'utiliser <br />des mots clés !</h1>";
                }

                $null = NULL;
                if(isset($_GET['q'])){
                    
                    
                    require_once("include/dotenv/pdo.php");
                    $coursParPage = 4;

                    if($_GET["q"] == "all"){
                        $req = $bdd->query('SELECT id from course;');
                    }

                    if($_GET["q"] != "all"){
                        $req = $bdd->query('SELECT id from course WHERE title="'. $_GET['q'] .'" OR language="'. $_GET['q'] .'";');
                    }

                    $coursTotal = $req->rowCount();
                    $pageTotal = ceil($coursTotal/$coursParPage);
                    
                    if(isset($_GET['page']) && !empty($_GET['page']) AND $_GET["page"] > 0){
                        $_GET["page"] = intval($_GET["page"]);
                        $pageCurant = $_GET['page'];
                    } else {
                        $pageCurant = 1;
                    }

                    $depart = ($pageCurant-1)*$coursParPage;
                    
                    if($_GET["q"] == "all"){
                        $req = $bdd->query('SELECT * from course ORDER BY id DESC LIMIT '. $depart .' , '. $coursParPage .';');
                    }
                    

                    if($_GET["q"] != "all"){
                        $req = $bdd->query('SELECT * from course WHERE title="'. $_GET['q'] .'" OR language="'. $_GET['q'] .'" ORDER BY id DESC LIMIT '. $depart .' , '. $coursParPage .';');
                    }
                    $cours = $req;


                    while ($donnees = $cours->fetch()){
                            echo "<div class='container-app contrainer-app1' id='container-app' style='display: block;'>";
                            echo "<div class='container-img'>";
                            echo "<a href='../../". $donnees['lien'] ."'><img class='img' src='../../". $donnees['image'] ."' title='". $donnees['title'] ."'></img></a>";
                            echo "</div>";
                            echo "<div class='ligne'></div>";
                            echo "<div class='container-logo'>";
                            echo "<img src='../../". $donnees['logo'] ."' class='logo css'>";
                            echo "</div>";
                            echo "<div class='container-text'>";
                            echo "<a href='../../". $donnees['lien'] ."' id='color_black'><b title='". $donnees['title'] ."'>". $donnees['text'] ."</b></a>";
                            echo "</div>";
                            echo "<div class='container-creator'>";
                            echo "<p>". $donnees['creator'] ."</p>";
                            echo "</div>
                            <br /></div>";
                    }
                    $cours->closeCursor();

                    echo "<ul class='pagination'>";
                    for($i=1; $i<=$pageTotal; $i++){
                        if($i == $pageCurant){
                            echo '<li class="pagination-block">'.$i.'</li>';
                        }else{
                            echo '<li class="pagination-block"><a href="../../search/'. $_GET["q"] .'/'.$i.'" class="grey">'.$i.'</a></li>';
                        }
                    }
                    echo "</ul>";

                }
                
                
                ?>
                </div>
                <br />
                <div id="ligne" class="<?php if(empty($_GET["q"])){ echo "top"; } ?>"></div>
        <footer class="<?php if(empty($_GET["q"])){ echo "top"; } ?>">
            <ul class="footer">
                <li class="fo"><a href="https://lukas.soigneux.fr" id="color"><p><b>LukasS</b></p></a></li>
                <li class="fo"><a href="./search" id="color"><p><b>Cours</b></p></a></li>
                <li class="fo"><a href="./contact" id="color"><p><b>Me contacter</b></p></a></li>
            </ul>
            <p class="foot foot1">Je suis un jeune développeur<br /> qui a créé un site web pour <br />apprendre aux autres tout ce <br />que je sais.</p>
            <p class="foot foot1">Tout les cours présents ici<br />son crée par Lukas Soigneux.</p>
            <div class="ft">
                <a href="mail.php" class="white foot right" ><b><i class="far fa-envelope"></i>&nbsp par email</b></a>
                <a href="a-propos.php" class="white foot right" ><b><i class="far fa-info"></i>&nbsp à propos</b></a>
                <a href="news.php" class="white foot right" ><b><i class="far fa-newspaper"></i>&nbsp news</b></a>
            </div>
            <div class="license">
                <span>Lukas Soigneux 2020 </span><span class="far fa-copyright"></span>
            </div>
        </footer>
</body>
</html>