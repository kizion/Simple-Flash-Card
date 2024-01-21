<?php 
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNC-Random</title>
    <link rel="stylesheet" href="../css/randMode2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type="text/javascript">
    var maxNum = 0;
    const wholePage = document.querySelector("wholePage");
    document.addEventListener("click",function(event){
       
        getCurrentN = parseInt(document.getElementById("indexVal").value);
       
        document.getElementById("chWord").hidden = false;

        if(document.getElementById("resultWord").value == null){
            document.getElementById("chWord").innerHTML = "Empty English Word(Error)";
        }else{
            document.getElementById("chWord").innerHTML = document.getElementById("resultWord").value;
        }
        
       

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
        $data = file_get_contents('../pages/action_php/json/'.$_SESSION['fileName']);
        $data_array = json_decode($data);
        $totalNum = count($data_array);
        $searchWord = array();
        for($i = 0 ; $i < $totalNum ; $i++){
            $string = $data_array[$i]->isDelete;
            if (str_contains($string, "N")){
            array_push($searchWord,$data_array[$i]);
            }else{
            continue;
            }
        }
        $totalNum = count($searchWord);
        $_SESSION['totalNum'] = count($searchWord);
        $randNum = rand(0,$totalNum-1);
        $_SESSION['allDataList'] = $searchWord;
        
        
    }else{
        echo "next word is not exist!";
    }
    $currentData = $_SESSION['allDataList'][$randNum];
    
    unset($_SESSION['allDataList'][$randNum]);
?>
<div class="container"> 
    <h1 id="engWord"><?php echo $currentData->chWord;?></h1>
    <h2 id="chWord">???</h2> 
    <h4 id="type"><?php echo $currentData->type;?></h4>
    <p id="desc"><?php echo $currentData->desc;?></p>
 
    <form method="post">
    <button class="Btn" role="button" name = "nextBtn" id="nextBtn" hidden>Next</button>
    <button class="Btn" name = "restartBtn" id="restartBtn"  name="restartBtn" hidden>Restart</button>
    <input type = "hidden" id ="indexVal" name = "indexVal" value='<?php echo $index;?>'>
    <input type = "hidden" id ="maxNum" name = "maxNum" value='<?php echo $_SESSION['totalNum'];?>'>
    <input type = "hidden" id = "resultWord" value='<?php echo $currentData->word;?>'> 
    </form>
</div>
<a href="./selectMode.php" >
    <button class="quitBtn" id="quitBtn"><i class="fa fa-mail-reply"></i></button>
</a>
<div class="countNum">
    <label><?php echo $index+1;?>/<?php echo $_SESSION['totalNum'];?></label>
</div>
</body>
</html>