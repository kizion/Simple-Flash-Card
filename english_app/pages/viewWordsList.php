<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNC-Table</title>
    <link rel="stylesheet" href="../css/viewList3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script >
function myFunction(id) {
  let text = "Are you sure to delete this word?";
  if (confirm(text) == true) {
    window.location.replace("../pages/action_php/deleteAction.php?index="+id);
  }
  
}
</script>
<?php
function printResult($maxData,$currentPageNum,$data,$totalNum){
  for($i =  ($maxData*$currentPageNum) -5 ; $i < ($maxData)*$currentPageNum;$i++){
    if($i >= $totalNum){
      break;
    }
    if($data[$i]->isDelete == "Y"){
      continue;
    }
    echo "<tr><td>".$data[$i]->word."</td>
    <td>".$data[$i]->chWord."</td>
    <td>".$data[$i]->type."</td>
    <td>
    <a href='editWord.php?index=".$data[$i]->id."'> <button class='editBtn' role='button'>EDIT</button></a>
    <button class='button-24' role='button' onclick='myFunction(".$data[$i]->id.")'>DELETE</button>
    </td>
    </tr>";  
  }
}
?>
<body>
<div class="top"></div>
<div class="btnPosition">
  <a href="../main.html" >
      <button class="btnQ" id="quitBtn"><</button>
  </a>

  <a href='../pages/addWord.php'>
      <button class="btnA" id="addBtn">+</button>
  </a>

</div>

<div class="searchBar">

<form method="POST" action ="./viewWordsList.php?page=1&search=Y"> 

<a href="./viewWordsList.php">
        <button id="reloadBtn"><i class="fa fa-refresh"></i></button>
</a>
<button type="submit" name="search" id="searchBtn"><i class="fa fa-search"></i></button>
<input type="text" placeholder="Search" name="searchWord" id ="searchInput">




</form>


</div>


<table>
    <tr>
        <th>Word</th>
        <th>cNWord</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    <?php
      $data = file_get_contents('../pages/action_php/json/words.json');
      $data = json_decode($data);
      $totalNum = count($data);
      
      $maxData = 5;
      $currentPageNum =$_GET['page'];
      $searchWord = array();
      $word = "";

      if(isset($_GET['page'])){
        if(isset($_GET['search'])){
          $wordNum =0;
          for($i = 0 ; $i < $totalNum ; $i++){
            if($data[$i]->isDelete == "N"){
              $string = $data[$i]->word;
            }else{
              continue;
            }
            
            if(isset($_GET['word'])){
              $word = $_GET['word'];
            }else{
              $word = $_POST['searchWord'];
            }
            if (str_contains($string, $word)){
              array_push($searchWord,$data[$i]);
              $wordNum++;
            }else{
              continue;
            }
          }
        
        }else{
          $wordNum =0;
          for($i = 0 ; $i < $totalNum ; $i++){
            $string = $data[$i]->isDelete;
            if (str_contains($string, "N")){
              array_push($searchWord,$data[$i]);
              $wordNum++;
            }else{
              continue;
            }
          }
          
        }
        printResult($maxData,$currentPageNum,$searchWord,count($searchWord));
        $pageNum = ceil($wordNum/5);
      }else{
        header("location: ./viewWordsList.php?page=1");
      }
    ?>
</table>
<div class="numlist">
<?php
  for($i = 0 ; $i<$pageNum ; $i++){
    if(isset($_GET['search'])){
      echo "<a href='./viewWordsList.php?page=".($i+1)."&search=Y&word=".$word."' class='pageNumList'><button id='numBtn'>".($i+1)."</button></a>";
    }else{
      echo "<a href='./viewWordsList.php?page=".($i+1)."' class='pageNumList'><button id='numBtn'>".($i+1)."</button></a>";
    }
      
  }
?>
</div>
</body>
</html>