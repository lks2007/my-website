<?php 
$output = shell_exec('./python/index.py');
echo $output;
header("Location: ./admin.php");
?>
