<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $year = date("Y");
    $month = date("M");
?>
<form method="POST" action='../pages/action_php/addAction.php'> 
    The word:<input type="text" name="word"> <br>
    Type:
    <select name="type">
    <option value="Noun">NOUN 名詞</option>
    <option value="Pronoun">PRONOUN 代名詞</option>
    <option value="Verb">VERB 動詞</option>
    <option value="Adjective">ADJECTIVE 形容詞</option>
    <option value="Adverb">ADVERB 副詞</option>
    <option value="Preposition">PREPOSITION 介系詞</option>
    <option value="Conjunction">CONJUNCTION 連接詞</option>
    <option value="Interjection">INTERJECTION 感嘆詞</option>
    </select> <br>
    Chinese meaning: <input type="text" name="chWord"> <br>
    Description: <textarea  name="desc" rows="4" cols="30">describe the word</textarea><br>
    <input type="hidden" name="year" value='<?php echo $year;?>'>
    <input type="hidden" name="month" value='<?php echo $month;?>'>

    <input type= "hidden" value='https://qqeng.net/tw/Learning/the-eight-parts-of-speech-introduction-to-english-grammar/'> <br>
    <input type="submit" name="save" >
</form>

<a href='../pages/viewWordsList.php'>Back</a>
</body>
</html>