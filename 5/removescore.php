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
if((isset($_GET['id']))&&(isset($_GET['date']))&&(isset($_GET['name']))&&(isset($_GET['score']))&&(isset($_GET['screenshot'])))
{
    $id=$_GET['id'];
    $date=$_GET['date'];
    $name=$_GET['name'];
    $score=$_GET['score'];
    $screenshot=$_GET['screenshot'];
}
else if (isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['score'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $score=$_POST['score'];
}
else{
    echo'<p class="error">Извините, ни одного рейтинга не выбрано для удаления.</p>';
}
if (isset($_POST['submit'])){
    if($_POST['confirm']=='Yes')
    {
        @unlink(GW_UPloadPATh.$$screenshot);
        $dbc=mysqli_connect('localhost','id_227_7','id_227_7','id_227_7');
        $query="DELETE FROM guitarwars WHERE id=$id LIMIT 1";
        $data=mysqli_query($dbc,$query);
        echo '<p> Ретинг со значением'.$score.' для пользователя '.$name.'был успешно удалён из базы данных.</p>';
    }
    else{
        echo'<p class="error">Рейтинг не удален.</p>';
    }
}
else if (isset($id)&&isset($name)&&isset($date)&&isset($score)&&isset($screenshot)){
    echo '<input type="radio" name="confirm" value="Yes"/>Yes';
    echo '<input type="radio" name="confirm" value="No" checked="checked"/>No<br/>';
    echo '<input type="submit" name="submit" value="Удалить"/>';

}
?>
</body>
</html>

