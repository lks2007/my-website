<?php
    $days = date("j");
    $query_days = "SELECT visit FROM stats_days WHERE id=". $days .";";
    $ls_days = $bdd->query($query_days);
    while ($ls18_days = $ls_days->fetch()){$ls8_days = $ls18_days['visit'];};
    $ls8_days +=1;
    $result_days = $ls8_days;
    $res_days = "UPDATE stats_days SET visit = ". $result_days ." WHERE id=". $days .";";
    $ls_days1 = $bdd->exec($res_days);
?>