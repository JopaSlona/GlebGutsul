<!doctype html>
<html lang="ru">
<head>
    <title>Гитарные войны. Список рейтингов</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h2>Гитарные войны. Список рейтингов</h2>
<p>Добро пожаловать , гитарный воин! Твой рейтинг бьёт рекорд, зарегистрированный в этом списке рейтингов? Если так, просто <a href="addscore.php">добавь свой рейтинг</a> в список</p>
<hr/>
<?php
require_once('appvars.php');
$dbc=mysqli_connect('localhost','id_227_7','id_227_7','id_227_7');
$query="SELECT*FROM guitarwars ORDER BY score DESC, date ASC";
$data=mysqli_query($dbc,$query);
echo '<table>';
$i=0;
while($row=mysqli_fetch_array($data)){
    if($i==0){
        echo '<tr><td colspan="2" class="topscoreheader"> Наивысший рейтинг:' . $row['score'].'</td></tr>';
    }
    echo '<tr><td class="scoreinfo">';
    echo '<span class="score">'.$row['score'].'</span><br/>';
    echo '<strong>Имя:</strong>'.$row['name'].'<br/>';
    echo '<strong>Дата:</strong>'.$row['date'].'<br/></tr>';
    if(is_file(GW_UPLOADPATH.$row['screenshot']) && filesize(GW_UPLOADPATH.$row['screenshot'])>0){
        echo '<td><img src="'.GW_UPLOADPATH.$row['screenshot'].'" alt="Подтверждено"/></td></tr>';
    }
    else{
        echo'<td><img src="'.GW_UPLOADPATH.'univerified.gif'.'" alt="Не подтверждено!"/></td></tr>';
    }$i++;
}
echo '</table>';
mysqli_close($dbc);
?>
</body>
</html>

