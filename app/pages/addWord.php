<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNC-Add</title>
    <link rel="stylesheet" href="../css/addWord1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    $year = date("Y");
    $month = date("M");
    if(isset($_GET['error'])){
        if($_GET['error'] == "repeatedWord"){
            echo "<script>alert('This word is exist');</script>";
        }else if($_GET['error'] == "blankError"){
            echo "<script>alert('The input box cant empty');</script>";
        }
        
    }
?>

<div class="container">
<form method="POST" action='../pages/action_php/addAction.php'> 
    <p id="labelText">Create Action</p>
    <div class="inputBox" id="inputBox">
    <label for ="word">Word</label>
    <input type="text" name="word" id ="name" placeholder="Word"> 

    <label for ="type">Type</label>
    <select name="type" id="type">
    <option value="Noun">NOUN 名詞</option>
    <option value="Pronoun">PRONOUN 代名詞</option>
    <option value="Verb">VERB 動詞</option>
    <option value="Adjective">ADJECTIVE 形容詞</option>
    <option value="Adverb">ADVERB 副詞</option>
    <option value="Preposition">PREPOSITION 介系詞</option>
    <option value="Conjunction">CONJUNCTION 連接詞</option>
    <option value="Interjection">INTERJECTION 感嘆詞</option>
    </select> 
    <label for="chMeaning">Chinese Meaning</label>
    <input type="text" name="chWord" id ="chMeaning" placeholder="中文意思"> 
    <label for="desc">Description</label>
    <textarea name="desc" rows="4" cols="30" id ="desc" placeholder="Describe the word"></textarea>
    </div>
    <input type="hidden" name="year" value='<?php echo $year;?>'>
    <input type="hidden" name="month" value='<?php echo $month;?>'>
    <input type="hidden" name="maxPage" value='<?php echo $_GET['maxPage'];?>'>


    <input type= "hidden" value='https://qqeng.net/tw/Learning/the-eight-parts-of-speech-introduction-to-english-grammar/'> <br>
    <button type="submit" name="save" class="createBtn">Create</button>
</form>
</div>

<a href='../pages/viewWordsList.php?page=1&maxPage=<?php echo $_GET['maxPage']; ?>' >
      <button class="btnQ" id="quitBtn"><i class="fa fa-mail-reply"></i></button>
</a>
</body>
</html>