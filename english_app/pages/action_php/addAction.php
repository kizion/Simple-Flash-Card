<?php
    
    if(isset($_POST['save'])){
        $data = file_get_contents('../action_php/json/words.json');
        $data = json_decode($data);
        $newID =  strval(count($data) +1); 


        $input= array(
            'id' => $newID,
            "word" => $_POST['word'],
            "type" => $_POST['type'],
            "chWord" => $_POST['chWord'],
            "desc" => $_POST['desc'],
            "year" => $_POST['year'],
            "month"=> $_POST['month']
           

        );
        
        $data[] = $input;
        $data = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents("../action_php/json/words.json",$data);
        header("location: ../viewWordsList.php");
        

    } 
    
    
?>