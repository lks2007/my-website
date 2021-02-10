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
                    <input type="text" name="email" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>Email</label><br /><br />
                </div>
            </div>
            <div class="wrapper">
                <div class="input-data">
                    <input type="password" name="password" autocomplete="off" required>
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
            header("Location: admin.php");
        }else{
            echo "utilisateur ou mot de passe invalide.";
        }
    }
}

if(empty($_GET["json"]) AND !isset($_GET['json'])){
    require_once("include/dotenv/pdo.php");

    $select = 'SELECT id, email, password from user';
    $req = $bdd->query($select);
    

        $results = $req;
        while($result = $results->fetch()){
            $id = $result['id'];
            $hash = $result['password'];
            $email = $result['email'];
            if(isset($_POST["email"]) AND isset($_POST["password"])){
            if (($_POST["email"] == $email) AND (password_verify($_POST["password"], $hash))) {
                $insert = 'UPDATE user SET last_connect=CURRENT_TIMESTAMP WHERE id="'.$id.'";';
                $req = $bdd->query($insert);
                session_start();
                $_SESSION['id'] = $id;
                header("Location: index.php");  
            } 
            else {
                echo 'Le mot de passe est invalide.';
            }
        }
    }
        
    if($bdd){
        $bdd = null;
    }
}
?>

</body>
</html>