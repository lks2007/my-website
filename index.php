<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lukas | Lukas.soigneux.fr</title>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="./js/jquery.min.js"></script>
        <link rel="canonical" href="index.php">
    </head>
    <body>
        <nav class="navbar">
            <ul class="site">
                <li class="tutorial"><a href="https://lukas.soigneux.fr" id="color"><img src="../../../images/logo2.png" class="logo2"></a></li>
                <?php
                if(isset($_SESSION['id'])){

                    require_once('include/dotenv/pdo.php');

                    $query = 'SELECT fistname, lastname from user WHERE id="'. $_SESSION['id'] .'";';
                    $req = $bdd->query($query);
    

        $rests = $req;
        while($rest = $rests->fetch()){

                    echo '
                        <li><a href="#" class=" register-login bound" id="a"><b>'.$rest['fistname'].'&nbsp'.$rest['lastname'].'</b></a></li>
                    ';
        }
        $rests->closeCursor();
                }else{
                    echo '
                        <li><a href="register" class="register-login color" id="a"><b>S\'inscrire</b></a></li>
                        <li><a href="login" class="register-login color1" id="a"><b>Se connecter</b></a></li>
                    ';
                } 
                
                if(isset($_SESSION['id'])){

                echo '<div class="container-menu" id="container-menu">
                <li class="item">
                    <a href="dashboard" class="btn"><i class="fas fa-user"></i> Account</a>
                </li>
                <li class="item">
                    <a href="#" class="btn"><i class="fas fa-cog"></i> Settings</a>
                </li>
                <li class="item">
                    <a href="#" class="btn"><i class="fas fa-envelope"></i> Message</a>
                <li>
                <li class="item">
                    <a href="#" class="btn"><i class="fas fa-bell"></i> Notify</a>
                </li>
                <li class="item">
                    <a href="javascript:void(0);" class="btn" id="modal-f"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <li>
            </div>
        </div>
        <div class="container">
                <div class="modal-panel" id="modal">
                    <div class="modal-close">
                        <a href="javascript:void(0);" id="close-f"><i class="fas fa-times"></i></a>
                    </div>
                    <p class="text" id="color">Are you sure want to logout ?</p>
                    <div class="no button"><a href="javascript:void(0);">No</a></div>
                    <div class="yes button"><a href="disconnect.php">Yes</a></div>
                </div>
        </div>'; } ?>
            </ul>
        </nav>
        <div class="container">
            <div class="container1">
                <div class="container-titre">
                    <h1>Apprenez de nouvelles choses</h1>
                    <p class="amelioration">Améliorez-vous et apprenez de nouvelles choses</p>
                </div>
                <br />
                <div class="container-formation">
                    <li id="b"><a href="./search/all/1" class="left" id="a"><b><i class="far fa-code"></i> Voir tous les tutoriels</b></a></li>
                    <a href="formation" class="left" id="a"><b><i class="fa fa-graduation-cap" aria-hidden="true"></i> Débuter avec une formation</b></a>
                </div>
            </div>
            <br />
            <div class="container-cours" id="container">
                <br />
                <div class="container-h2">
                    <h2 id="contenue">Les derniers contenus</h2>
                </div>
                <div class="container-all" id="all">
                    <?php 
                        require("container.php");
                    ?>
                </div>
                <br />
            </div>
        </div>
        <div id="ligne"></div>
        <footer>
            <ul class="footer">
                <li class="fo"><a href="https://lukas.soigneux.fr" id="color"><p><b>LukasS</b></p></a></li>
                <li class="fo"><a href="./search.php" id="color"><p><b>Cours</b></p></a></li>
                <li class="fo"><a href="./contact.php" id="color"><p><b>Me contacter</b></p></a></li>
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
    <noscript>Le javascript n'est pas activé sur votre navigateur web.</noscript>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/app.js"></script>
</html><?php  
