<?php
 if(isset($_POST['edit'])){
    
    session_start();
    $data = file_get_contents('../action_php/json/'.$_SESSION['fileName']);
    $data_array = json_decode($data);


    $input= array(
        'id' => $_POST['id'],
        "word" => $_POST['word'],
        "type" => $_POST['type'],
        "chWord" => $_POST['chWord'],
        "desc" => $_POST['desc'],
        "year" => $data_array[$_POST['id']]->year,
        "month"=> $data_array[$_POST['id']]->month,
        "isDelete"=> $data_array[$_POST['id']]->isDelete
    );
    
    $data_array[$_POST['id']] = $input;
    $data = json_encode($data_array,JSON_PRETTY_PRINT);
    file_put_contents("../action_php/json/".$_SESSION['fileName'],$data);
    header("location: ../viewWordsList.php?page=".$_POST['page']."&maxPage=".$_POST['maxPage']);
    

} 

?>