<?php
 $data = file_get_contents('../action_php/json/words.json');
 $data_array = json_decode($data);
    $id = $_GET['index'];


 $input= array(
     'id' => $id,
     "word" => $data_array[$id ]->word,
     "type" => $data_array[$id]->type,
     "chWord" => $data_array[$id ]->chWord,
     "desc" => $data_array[$id ]->desc,
     "year" => $data_array[$id ]->year,
     "month"=> $data_array[$id ]->month,
     "isDelete"=> "Y"
 );
 
 $data_array[$id ] = $input;
 $data = json_encode($data_array,JSON_PRETTY_PRINT);
 file_put_contents("../action_php/json/words.json",$data);
 header("location: ../viewWordsList.php?page=1");
?>