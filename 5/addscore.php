<!doctype html>
<html lang="ru">
<head>
    <title>Гитарные войны. Добавьте свой рейтинг</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h2>Гитарные войны. Добавьте свой рейтинг</h2>
<?php
require_once('appvars.php');
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $score = $_POST['score'];
    $screenshot = $_FILES['screenshot']['name'];
    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size'];
    if (!empty($name) && !empty($score) && !empty($screenshot)) {
        if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png')) && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
            if ($_FILES['screenshot']['error'] == 0) {
                $target = GW_UPLOADPATH . $screenshot;
                if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
                    $dbc = mysqli_connect(localhost, id_227_7, id_227_7, id_227_7);
                    $query = "INSERT INTO guitarwars VALUES (null, NOW(), '$name', '$score', '$screenshot')";
                    mysqli_query($dbc, $query);
                    echo '<p>Спасибо за то, что добавили свой рейтинг!</p>';
                    echo '<p><strong>Имя:</strong>' . $name . '<br/>';
                    echo '<strong>Рейтинг:</strong>' . $score . '</p>';
                    echo '<img src"' . GW_UPLOADPATH . $screenshot . '" alt="Изображение, подтверждающее подлинность рейтинга"/><br/>';
                    echo '<p><a href="1.php">&lt;&lt; Назад к списку рейтингов</a></p>';
                    $name = "";
                    $score = "";
                    $screenshot="";
                    mysqli_close($dbc);
                } else {
                    echo '<p class="error">Извините, возникла ошибка при загрузке файла изображения.</p>';
                }
            }
        } else {
            echo '<p class="error">Файл, подтверждающий рейтинг, должен быть файлом изображения в форматах GIF,JPEG или PNG, и его размер не должен превышать' . (GW_MAXFILESIZE / 1024) . 'Кб.</p>';
        }
        @unlink($_FILES['screenshot']['tmp_name']);
    } else {
        echo '<p class="error">Введите пожалуйста, всю информацию для добавления вашего рейтинг.</p>';
    }
}

?>
<hr/>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="32768"/>
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" value="<?php if(!empty($name)) echo $name;?>"/><br />
    <label for="score">Рейтинг:</label>
    <input type="text" id="score" name="score" value="<?php if(!empty($score)) echo $score;?>"/><br />
    <label for="screenshot">Файл изображения:</label>
    <input type="file" id="screenshot" name="screenshot"/>
    <hr/>
    <input type="submit" value="Добавить" name="submit" />
</form>
</body>
</html>

