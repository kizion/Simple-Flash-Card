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
        if(getCurrentN == 0){
            document.getElementById("preBtn").hidden = true;
        }else{
            document.getElementById("preBtn").hidden = false;
        }
        document.getElementById("chWord").hidden = false;
        document.getElementById("nextBtn").hidden = false;
        currnetClick = currnetClick+1;
    });


</script>
<body id="wholePage">
<?php
      $index = 0;
      $data = file_get_contents('../pages/action_php/json/words.json');
      $data_array = json_decode($data);
      $totalNum = count($data_array);
      if(isset($_POST['nextBtn'])){
        if(isset($_POST['indexVal']) && $_POST['indexVal'] < $totalNum-1){
            $index = $_POST['indexVal']+1;
        }
      }else if(isset($_POST['preBtn']) && !$_POST['indexVal'] ==0){
        if(isset($_POST['indexVal']) ){
            $index = $_POST['indexVal']-1;
        }
      }
      $currentData = $data_array[$index];

?>    
    <input id="engWord" type="text" readonly value='<?php echo $currentData->word;?>'><br>
    <input id="type" type="text" readonly value='<?php echo $currentData->type;?>'><br>
    <textarea id="desc" rows="4" cols="30" readonly ><?php echo $currentData->desc;?></textarea><br>
    <input id="chWord" type="text" readonly hidden value='<?php echo $currentData->chWord;?>'><br>
    
    <form method="post">

    <button name = "preBtn" id="preBtn" hidden >Previous</button>
    <button name = "nextBtn" id="nextBtn" hidden>Next</button>
    <input type = "hidden" id ="indexVal" name = "indexVal" value='<?php echo $index;?>'>
    <input type = "hidden" id = "maxNum" value='<?php echo $totalNum;?>'> 

    
    </form>
    <br>
    <a href="./selectMode.html" id="quitBtn" >
        <button >Quit</button>
    </a>
</body>
</html>