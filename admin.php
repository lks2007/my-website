<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: loginAdmin");
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lukas Soigneux| Lukas.soigneux.fr</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="./js/jquery.min.js"></script>
</head>
<body>
    <?php include("./include/menu.html");
     ?>
    <div class="container-all">
        <br /><br />
        <h1>Liste des droits</h1>
        <div class="container" id="app">
            <div class="command">
                <h3 id="block">liste des fichiers</h3><i class="fas fa-check ls l2" id="block"></i>
            </div>
        </div>
        <div class="container" id="app">
            <div class="command">
                <h3 id="block">maintenance</h3><i class="fas fa-ellipsis-v ls dots" id="block mod2"></i>
            </div>
            <div class="ico">
                <ul class="block">
                    <li id="bo"><i class="fas fa-check icon" id="accept" onclick="window.location = './stop.php';"></i></li>
                    <li class="bo"><i class="fas fa-times icon" id="denied" onclick="window.location = './start.php';"></i></li>
                </ul>
            </div>
        </div>
        <div class="container" id="app">
            <div class="command">
                <h3 id="block">créé un nouveau cours</h3><i class="fas fa-check ls l2" id="block" onclick="window.location = 'create.php';"></i>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".dots").click(function() { 
            $(".ico").toggleClass("active")
        });
    })
</script>
</html>