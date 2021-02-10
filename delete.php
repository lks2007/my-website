<?php

session_start();


//On vérifie que tous les jetons sont là
if (isset($_SESSION['token']) AND isset($_POST['token']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) {

    // On vérifie que les deux correspondent
    if ($_SESSION['token'] == $_POST['token']) {

                // Vérification terminée
                // On peut supprimer l'utilisateur
                echo "User delete";
    }else{
        echo "Erreur de vérification";
    }
} else {
    
    // Les token ne correspondent pas
    // On ne supprime pas

    echo "Erreur de vérification";
}

?>