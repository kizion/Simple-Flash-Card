<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php
function printResult($maxData,$currentPageNum,$data,$totalNum,$index){
  for($i =  ($maxData*$currentPageNum) -5 ; $i < ($maxData)*$currentPageNum;$i++){
    if($i >= $totalNum){
      break;
    }
    echo "<tr><td>".$data[$i]->word."</td>
    <td>".$data[$i]->chWord."</td>
    <td>".$data[$i]->type."</td>
    <td>
    <a href='editWord.php?index=".$index."'>Edit</a>
    <a href='../pages/action_php/deleteAction.php?index=".$index."'>Delete</a>
    </td>
    </tr>";  
    $index++;
  }
} 
?>
<body>
<!-- direct to add word page-->
<a href='../pages/addWord.php'>Add Word</a>

<!-- back to main page-->
<a href='../main.html'>Back</a>

<br><br><br>

<form method="POST" action ="./viewWordsList.php?page=1&search=Y"> 
<input type="text" name="searchWord"/> 
<input type="submit" name="search">


</form>

<!-- reset result-->
<a href="./viewWordsList.php">
        <button>Reload</button>
</a>


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
      $index = 0;
      $searchWord = array();
      $word = "";

      if(isset($_GET['page'])){
        if(isset($_GET['search'])){
          $wordNum =0;
          for($i = 0 ; $i < $totalNum ; $i++){
            $string = $data[$i]->word;
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
          printResult($maxData,$currentPageNum,$searchWord,count($searchWord),$index);
          $pageNum = ceil($wordNum/5);
        }else{
          printResult($maxData,$currentPageNum,$data,$totalNum,$index);
          $pageNum = ceil($totalNum/5);
        }
      }else{
        header("location: ./viewWordsList.php?page=1");
      }
    ?>
</table>
<?php
  for($i = 0 ; $i<$pageNum ; $i++){
    if(isset($_GET['search'])){
      echo "<a href='./viewWordsList.php?page=".($i+1)."&search=Y&word=".$word."'>".($i+1)."</a>";
    }else{
      echo "<a href='./viewWordsList.php?page=".($i+1)."'>".($i+1)."</a>";
    }
      
  }
?>
</body>
</html>