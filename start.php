<?php 
$output = shell_exec('python python/remove.py');
echo $output;
header("Location: ./admin.php");
?>
