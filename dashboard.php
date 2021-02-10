<?php

// On démarre la session en début de chaque page
    session_start();
    if(!isset($_SESSION['id']) AND empty($_SESSION['id'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    </head>
    <body>
        <?php
            include_once("./include/menu.html");
        ?>
        <div class="container-menu" id="container-menu">
                <li class="item">
                    <a href="#" class="btn"><i class="fas fa-user"></i> Account</a>
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
                <div class="modal-panel">
                    <div class="modal-close">
                        <a href="javascript:void(0);" id="close-f"><i class="fas fa-times"></i></a>
                    </div>
                    <p class="text" id="color">Are you sure want to logout ?</p>
                    <div class="no button"><a href="javascript:void(0);">No</a></div>
                    <div class="yes button">">Yes<div>
                </div>
        </div>
    </body>
    <script src="./js/jquery.min.js"></script>
    <script>

const menu = document.querySelector('#container-menu');
const btn = document.querySelector('.user');

function add() {
    menu.classList.toggle('show');
}

btn.addEventListener('click', add);

$(document).ready(function(){
    $("#modal-f").click(function(e){
        $(".modal-panel").css("visibility", "visible");
        $(".modal-panel").animate({'opacity': '1'});
        e.preventDefault();
    });

    $("#close-f, .no, .yes").click(function( ){
        $(".modal-panel").animate({opacity: 0}, 500, function(){
            $(".modal-panel").css("visibility", "hidden");
        });
    });
});

    </script>
</html>