<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <br /><br />
        <h1>Login</h1>
        <br /><br />
        <form method="post" enctype="multipart/form-data">
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="pseudo" class="psd" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>Name</label><br /><br />
                </div>
            </div>
            <div class="wrapper">
                <div class="input-data">
                    <input type="password" name="password" class="pwd" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>Password</label><br /><br /><br />
                </div>
            </div>
            <input type="submit" value="Se connecter" class="submit">
        </form>
        <br /><br />
    </div>
    <?php
    
if(isset($_GET['json'])){
    if(isset($_POST['pseudo']) AND isset($_POST['password'])){
        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];

        $file = './json/.mcgzpzoe.json'; 
        // mettre le contenu du fichier dans une variable
        $Jsondata = file_get_contents($file); 
        // décoder le flux JSON
        $data = json_decode($Jsondata); 

        $hash = $data[0]->password;

        if($pseudo === $data[0]->name AND password_verify($password, $hash)){
            echo 'Le mot de passe est valide !';
            session_start();
            $_SESSION['admin'] = $pseudo;
            header("Location: admin");
        }else{
            echo "utilisateur ou mot de passe invalide.";
        }
    }
}

require_once("include/dotenv/pdo.php");
    
        $req = $bdd->query('SELECT name, password from admin');
    
        $results = $req->fetch(PDO::FETCH_ASSOC);
        //print_r($results);
        $hash = $results['password'];
        $pseudo_database = $results['name'];
        if(isset($_POST["pseudo"]) AND isset($_POST["password"])){
        if (($_POST["pseudo"] == $pseudo_database) AND (password_verify($_POST["password"], $hash))) {
            echo 'Le mot de passe est valide !';
            session_start();
            $_SESSION['admin'] = $pseudo_database;
            header("Location: admin");  
        } 
        else {
            echo 'Le mot de passe est invalide.';
        }
    }
    $bdd = null;
?>

</body>
</html>