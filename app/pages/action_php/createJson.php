<?php
$fileName = $_GET['fileName'].".json";
$myfile = fopen("../action_php/json/".$fileName, "w");

$data = file_get_contents('../action_php/json/'.$fileName);
$data = json_decode($data);
$data = json_encode([],JSON_PRETTY_PRINT);
file_put_contents("../action_php/json/".$fileName,$data);
header("location: /app/main.php");
?>