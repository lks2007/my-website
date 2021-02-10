<?php
    $month = date("n");
    $query = "SELECT visit FROM stats WHERE id=". $month .";";
    $ls = $bdd->query($query);
    while ($ls18 = $ls->fetch()){$ls8 = $ls18['visit'];};
    $ls8 +=1;
    $result = $ls8;
    $res = "UPDATE stats SET visit = ". $result ." WHERE id=". $month .";";
    $ls = $bdd->exec($res);
?>