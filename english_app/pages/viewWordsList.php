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
<body>
<!-- direct to add word page-->
<a href='../pages/addWord.php'>Add Word</a>

<!-- back to main page-->
<a href='../main.html'>Back</a>
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

        $index = 0;
        
        foreach($data as $row){
                echo "<tr><td>".$row->word."</td>
                <td>".$row->chWord."</td>
                <td>".$row->type."</td>
                <td>
                    <a href='editWord.php?index=".$index."'>Edit</a>
                    <a href='../pages/action_php/deleteAction.php?index=".$index."'>Delete</a>
                </td>
                </tr>";
            $index++;
        }
    ?>
</table>
</body>
</html>