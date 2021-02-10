<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/create.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <div class="wrapper"><br>
            <h1>Create a course</h1><br>
            <input type="text" name="titre" placeholder="Titre" autocomplete="off"/><br /><br>
            <input type="File" name="file" id="real-file" hidden="hidden" />
            <button type="button" id="custom-button">CHOOSE A FILE</button>
            <span id="custom-text">No file chosen</span>
            <p class="logo" id="logo-btn">logo</p>
            <input type="text" name="text" placeholder="Text" autocomplete="off"/><br /><br>
            <input type="text" name="creator" placeholder="Temps" autocomplete="off"/><br /><br>
            <br />
            <br>
            <input type="submit" value="Créé le cours" name="submit">
        </div>
    </form>
    <div class="container" id="content">
        <?php 

        require_once('include/dotenv/pdo.php');

        $req = $bdd->query("SELECT DISTINCT * FROM logo");

        $res = $req;

        while($donnes = $res->fetch()){
            $i++;
            echo "<img src='".$donnes["path"]."' class='custom-logo ".$donnes["nom"]."'></img>";
        }
        $res->closeCursor();

        ?>
    </div>
<?php
        if(isset($_POST['submit'])){

            

            $title = $_POST["title"];
            $text = $_POST["text"];

            $pname = rand(1000,10000).'-'.$_FILES["file"]["name"];

            $tname = $_FILES["file"]["tmp_name"];

            $upload_dir = './img';

            $resultat = move_uploaded_file($tname, $upload_dir.'/'.$pname);

            if($resultat){
                echo "success";
            }

            $sql = 'SELECT COUNT(id) FROM course;'; 
            $req = $bdd->query($sql); 

            $result = $req;
            while ($donnees = $result->fetch()){
                $id = $donnees["COUNT(id)"] +=1;
                $sql = 'INSERT into course VALUES("'.$id.'", "../app/img/'.$pname.'", "./?id='.$id.'", "../app/img/logo/css3-logo.png", "'.$title.'", "'.$text.'", "'.$_POST['creator'].'min| par Lukas Soigneux", "'.$_POST['language'].'")';
                $req = $bdd->query($sql); 
            }

            $result->closeCursor();
            
        }  
        
    ?>
</body>
<script type="text/javascript">


const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");
const logoBtn = document.querySelector("#logo-btn");
const logoImg = document.getElementById("content");

logoBtn.addEventListener("click", function() {
    logoImg.style.visibility = "initial";
    logoImg.style.opacity = "1";
    setTimeout(function(){
        if((logoImg.style.visibility = "visible") && (logoImg.style.opacity = "1")){window.addEventListener("click", function() {
            logoImg.style.visibility = "hidden";
            logoImg.style.opacity = "0";
        });}
}, 0300);
});

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});


</script>
</html>