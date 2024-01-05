<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script type="text/javascript">
    var maxNum = 0;
    const wholePage = document.querySelector("wholePage");
    document.addEventListener("click",function(event){
       
        getCurrentN = parseInt(document.getElementById("indexVal").value);
       
        document.getElementById("chWord").hidden = false;
       

        if(document.getElementById("indexVal").value == document.getElementById("maxNum").value-1){
            document.getElementById("restartBtn").hidden = false;
            document.getElementById("nextBtn").hidden = true;
            
        }else{
            document.getElementById("nextBtn").hidden = false;
        }
      
    });


</script>
<body id="wholePage">
<?php
    $index = 0;
    if(isset($_POST['nextBtn'])  ){
        $randNum = array_rand($_SESSION['allDataList'],1);
        $index = $_POST['indexVal']+1;
    }
    else if(isset($_POST['restartBtn'])){
        session_destroy();
        header("location: ../pages/randomMode.php");
    }
    else if(!isset($_POST['nextBtn'])){
        $data = file_get_contents('../pages/action_php/json/words.json');
        $data_array = json_decode($data);
        $_SESSION['totalNum'] = count($data_array);
        $randNum = rand(0,$_SESSION['totalNum']-1);
        $_SESSION['allDataList'] = $data_array;
        
        
    }else{
        echo "next word is not exist!";
    }
    $currentData = $_SESSION['allDataList'][$randNum];
    
    unset($_SESSION['allDataList'][$randNum]);
?>    
    <input id="engWord" type="text" readonly value='<?php echo $currentData->word;?>'><br>
    <input id="type" type="text" readonly value='<?php echo $currentData->type;?>'><br>
    <textarea id="desc" rows="4" cols="30" readonly ><?php echo $currentData->desc;?></textarea><br>
    <input id="chWord" type="text" readonly hidden value='<?php echo $currentData->chWord;?>'><br>
    
    <form method="post">
    <button name = "nextBtn" id="nextBtn"  name="nextBtn" hidden>Next</button>
    <button name = "restartBtn" id="restartBtn"  name="restartBtn" hidden>Restart</button>
    <input type = "hidden" id ="indexVal" name = "indexVal" value='<?php echo $index;?>'>
    <input type = "hidden" id ="maxNum" name = "maxNum" value='<?php echo $_SESSION['totalNum'];?>'>
   
    </form>
    <br>
    <a href="./selectMode.html" id="quitBtn" >
        <button >Quit</button>
    </a>
</body>
</html>