<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Lukas Soigneux | Lukas.soigneux.fr</title>
</head>
<body>
    <div class="container">
        <br /><br />
        <h1>Register</h1>
        <br /><br />
        <form method="post" action="register.php">
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="name" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>First name</label><br /><br />
                </div>
            </div>
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="surname" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>Last name</label><br /><br />
                </div>
            </div>
            <div class="wrapper">
                <div class="input-data">
                    <input type="password" name="pwd" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>Password</label><br /><br />
                </div>
            </div>
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="mail" autocomplete="off" required>
                    <div class="underline"></div>
                    <label>Email</label><br /><br /><br />
                </div>
            </div>
            <input type="submit" value="Se connecter" class="submit">
        </form>
        <br /><br />
    </div>
    
    <?php 
    // Vérification de la validité des informations
    
    if ((isset($_POST['pwd'])) AND (isset($_POST['mail'])) AND (isset($_POST['name']) AND isset($_POST['surname'])))
    {
    
        $name = $_POST['name'];
        $lastname = $_POST['surname'];
        $email = $_POST['mail'];

        // Hachage du mot de passe avec password_hash()
        $pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    
        require_once("include/dotenv/pdo.php");
        //Insertion du formulaire dans la base de donnés
         $req = $bdd->prepare('INSERT INTO user(fistname, lastname, email, password, last_connect) VALUES (:fistname, :lastname, :email, :pass, CURRENT_TIMESTAMP);');

         $req->execute(array(
            ':fistname' => $name,
            ':lastname' => $lastname,
             ':pass' => $pass_hache,
             ':email' => $email             
            ));
             header("Location: ./login.php");
    }
    
    ?>


</body>
</html>