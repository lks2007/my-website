#!/usr/bin/python3

A = "../index.php"
B = "<?php header('Location: maintenance.php') ?>\n" 
fichier = open(A, "r") 
total = B + fichier.read() 
fichier.close() 
fichier = open(A, "w") 
fichier.write(total) 
fichier.close() 
