<!doctype html>
<html lang="ru">
<head>
    <title>Гитарные войны. Админ</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h2>Гитарные войны.Админ</h2>
<p>Ниже удаление</p>
<?php
require_once('appvars.php');
require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query ="SELECT*FROM guitarwars ORDER BY score DESC, date ASC";
$data = mysqli_query($dbc, $query);
echo'<table>';
while ($row=mysqli_fetch_array($data)){
    echo '<tr class="scorerow"><td><strong>'.$row['name'].'</strong></td>';
    echo '<td>'.$row['date'].'</td>';
    echo'<td>'.$row['score'].'</td>';
    echo'<td><a href="removescore.php?id='.$row['id'].'&amp;date="'.$row['date'].'&amp;name='.$row['name'].'&amp;score'.$row['score'].'&amp;screenshot='.$row['screenshot'].'">Удалить</a></td></tr>';
}
echo '<table>';
mysqli_close($dbc);
?>
</body>
</html>


