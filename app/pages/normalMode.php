<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNC-Normal</title>
    <link rel="stylesheet" href="../css/mode3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type="text/javascript">
    var maxNum = 0;
    document.addEventListener("click",function(event){ 
        var target = event.target;
        if(target == document.getElementById("nextBtn") ||
        target == document.getElementById("preBtn") ||
        target == document.getElementById("quitBtn")) {
            return;
        }else{
            document.getElementById("nextBtn").hidden = false;
            document.getElementById("preBtn").hidden = false;
            document.getElementById("chWord").innerHTML = document.getElementById("resultWord").value;
        }
        
    });


</script>
<body id="wholePage">
<?php
      $index = 0;
      $searchWord = array();
      $data = file_get_contents('../pages/action_php/json/words.json');
      $data_array = json_decode($data);
      $totalNum = count($data_array);

      for($i = 0 ; $i < $totalNum ; $i++){
        $string = $data_array[$i]->isDelete;
        if (str_contains($string, "N")){
          array_push($searchWord,$data_array[$i]);
        }else{
          continue;
        }
      }
      $searchNum = count($searchWord);
      if($searchNum ==0){
        header("location: ./selectMode.php?error=EmptyWordList");
      }
      if(isset($_POST['nextBtn'])){
        if(isset($_POST['indexVal']) && $_POST['indexVal'] < $searchNum-1){
            $index = $_POST['indexVal']+1;
        }
      }else if(isset($_POST['preBtn']) && !$_POST['indexVal'] ==0){
        if(isset($_POST['indexVal']) ){
            $index = $_POST['indexVal']-1;
        }
      }
      
      $currentData = $searchWord[$index];

?>
<div class="container">
    <h1 id="engWord"><?php echo $currentData->word;?></h1>
    <h2 id="chWord">???</h2> 
    <h4 id="type"><?php echo $currentData->type;?></h4>
    <p id="desc"><?php echo $currentData->desc;?></p>

    <form method="post">

    
    <div class ="btnPosition"  id="btnPosition">
        <button class="Btn" role="button" name = "preBtn" id="preBtn" hidden>Previous</button>
        <button class="Btn" role="button" name = "nextBtn" id="nextBtn" hidden>Next</button>
    </div>

    <input type = "hidden" id ="indexVal" name = "indexVal" value='<?php echo $index;?>'>
    <input type = "hidden" id = "maxNum" value='<?php echo $totalNum;?>'> 
    <input type = "hidden" id = "resultWord" value='<?php echo $currentData->chWord;?>'> 
    </form>
    
</div>

<a href="./selectMode.php" >
    <button class="quitBtn" id="quitBtn"><i class="fa fa-mail-reply"></i></button>
</a>

<div class="countNum">
    <label><?php echo $index+1;?>/<?php echo count($searchWord);?></label>
</div>

   
    
</body>
</html>