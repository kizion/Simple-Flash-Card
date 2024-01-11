<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNC-Edit</title>
    <link rel="stylesheet" href="../css/addWord.css">
</head>
<body>
<?php
    $index = $_GET['index'];
    $data = file_get_contents('../pages/action_php/json/words.json');
    $data_array = json_decode($data);

    $currentData = $data_array[$index];
    //echo $currentData ->id;
    $type = $currentData->type;

?>
<div class="container">
    <p id="labelText">Edit Action</p>
    <form method="POST" action='../pages/action_php/editAction.php'> 
        <div class="inputBox" id="inputBox">
            <label for ="word">Word</label>
            <input type="text" name="word" id = "word" value='<?php echo $currentData->word;?>'>
            
            <label for ="type">Type</label>
            <select name="type" value="Verb" id="type">
            <option value="Noun" <?php if($type == "Noun") echo "SELECTED" ?>>NOUN 名詞</option>
            <option value="Pronoun" <?php if($type == "Pronoun") echo "SELECTED" ?>>PRONOUN 代名詞</option>
            <option value="Verb" <?php if($type == "Verb") echo "SELECTED" ?>>VERB 動詞</option>
            <option value="Adjective" <?php if($type == "Adjective") echo "SELECTED" ?>>ADJECTIVE 形容詞</option>
            <option value="Adverb" <?php if($type == "Adverb") echo "SELECTED" ?>>ADVERB 副詞</option>
            <option value="Preposition" <?php if($type == "Preposition") echo "SELECTED" ?>>PREPOSITION 介系詞</option>
            <option value="Conjunction" <?php if($type == "Conjunction") echo "SELECTED" ?>>CONJUNCTION 連接詞</option>
            <option value="Interjection" <?php if($type == "Interjection") echo "SELECTED" ?>>INTERJECTION 感嘆詞</option>
            </select>

            <label for="chMeaning">Chinese Meaning</label>
            <input type="text" name="chWord" id ="chMeaning" value='<?php echo $currentData->chWord;?>'>
            
            <label for="desc">Description</label>
            <textarea  name="desc" id ="desc" rows="4" cols="30"><?php echo $currentData->desc;?></textarea>

            </div>
            <input type="hidden" name="year" value='<?php echo $currentData->year;?>'>
            <input type="hidden" name="month" value='<?php echo $currentData->month;?>'> 
            <input type="hidden" name="id" value='<?php echo $index;?>'> <br>
            <button type="submit" name="edit" class="createBtn">Edit</button>
        

    </form>
</div>

<a href='../pages/viewWordsList.php?page=1' >
      <button class="btnQ" id="quitBtn"><</button>
</a>
</body>
</html>