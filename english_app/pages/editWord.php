<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form method="POST" action='../pages/action_php/editAction.php'> 
    The word:<input type="text" name="word" value='<?php echo $currentData->word;?>'> <br>
    Type:
    <select name="type" value="Verb">
    <option value="Noun" <?php if($type == "Noun") echo "SELECTED" ?>>NOUN 名詞</option>
    <option value="Pronoun" <?php if($type == "Pronoun") echo "SELECTED" ?>>PRONOUN 代名詞</option>
    <option value="Verb" <?php if($type == "Verb") echo "SELECTED" ?>>VERB 動詞</option>
    <option value="Adjective" <?php if($type == "Adjective") echo "SELECTED" ?>>ADJECTIVE 形容詞</option>
    <option value="Adverb" <?php if($type == "Adverb") echo "SELECTED" ?>>ADVERB 副詞</option>
    <option value="Preposition" <?php if($type == "Preposition") echo "SELECTED" ?>>PREPOSITION 介系詞</option>
    <option value="Conjunction" <?php if($type == "Conjunction") echo "SELECTED" ?>>CONJUNCTION 連接詞</option>
    <option value="Interjection" <?php if($type == "Interjection") echo "SELECTED" ?>>INTERJECTION 感嘆詞</option>
    </select> <br>
    Chinese meaning: <input type="text" name="chWord" value='<?php echo $currentData->chWord;?>'> <br>
    Description: <textarea  name="desc" rows="4" cols="30"><?php echo $currentData->desc;?></textarea><br>
    <input type="hidden" name="year" value='<?php echo $currentData->year;?>'>
    <input type="hidden" name="month" value='<?php echo $currentData->month;?>'> 
    <input type="hidden" name="id" value='<?php echo $index;?>'> <br>
    <input type="submit" name="edit" >
</form>

<a href='../pages/viewWordsList.php'>Back</a>
</body>
</html>