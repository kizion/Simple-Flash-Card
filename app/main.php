<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNC-Main</title>
</head>
<body>
<script>
function myFunction() {
    let text = prompt("Enter Name: ");
    
    if (text != null) {
        window.location.replace("./pages/action_php/createJson.php?fileName="+text);
    }
    
}
</script>
<?php 



$dir  = './pages/action_php/json';
$fileList = scandir($dir, SCANDIR_SORT_DESCENDING);
?>

<div class="container">
<form method="POST">
<?php 
 
    for( $i = 0 ; $i < count($fileList)-2 ; $i++){
        echo "<button type='submit' name='submit' value='".$fileList[$i]."'>".$fileList[$i]."</button>";
    }

?>
</form>
<br> <br> <br>
<button class='button-24' role='button' onclick='myFunction()' id='btnList'>+</button>

<?php
    if(isset($_POST['submit'])){
        session_start();
        $_SESSION["fileName"] = $_POST['submit'];
        header("location: ./pages/selectMode.php");
    }
?>
</div>
</body>
</html>