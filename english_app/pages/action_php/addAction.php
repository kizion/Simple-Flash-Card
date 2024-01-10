<?php
    
    if(isset($_POST['save'])){
        $data = file_get_contents('../action_php/json/words.json');
        $data = json_decode($data);
        $isRepeated = false;
        foreach($data as $row){
            if($row->word == $_POST['word'] && $row->isDelete=="N"){
                $isRepeated = true;
                break;
            }
        }

        if($isRepeated == true){
            echo "The word is repeated!";
            echo "<br> <a href='../addWord.php'>
            <button>Back</button>
            </a> ";

        }else{
            $newID =  strval(count($data)); 

            $input= array(
                'id' => $newID,
                "word" => $_POST['word'],
                "type" => $_POST['type'],
                "chWord" => $_POST['chWord'],
                "desc" => $_POST['desc'],
                "year" => $_POST['year'],
                "month"=> $_POST['month'],
                "isDelete" => "N"
            

            );
            
            $data[] = $input;
            $data = json_encode($data,JSON_PRETTY_PRINT);
            file_put_contents("../action_php/json/words.json",$data);
            header("location: ../viewWordsList.php?page=1");
        }
        
        

    } 
    
    
?>