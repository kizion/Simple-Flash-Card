<?php
 if(isset($_POST['edit'])){
    $data = file_get_contents('../action_php/json/words.json');
    $data_array = json_decode($data);



    $input= array(
        'id' => $_POST['id'],
        "word" => $_POST['word'],
        "type" => $_POST['type'],
        "chWord" => $_POST['chWord'],
        "desc" => $_POST['desc'],
        "year" => $_POST['year'],
        "month"=> $_POST['month']
       

    );
    
    $data_array[$_POST['id']] = $input;
    $data = json_encode($data_array,JSON_PRETTY_PRINT);
    file_put_contents("../action_php/json/words.json",$data);
    header("location: ../viewWordsList.php");
    

} 

?>