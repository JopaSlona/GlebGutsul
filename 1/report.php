<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Космические пришельцы похищали меня - сообщение по похищении</title>
</head>
<body>
  <h2>Космические пришельцы похищали меня - сообщение по похищении</h2>

<?php
  $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $how_many = $_POST['howmany'];
  $alien_description = $_POST['aliendescription'];
  $what_they_did = $_POST['whattheydid'];
  $fang_spotted = $_POST['fangspotted'];
  $email = $_POST['email'];
  $other = $_POST['other'];

  $to = 'gutsul93@list.ru';
  $subject = 'Космические пришельцы похищали меня - сообщение по похищении';
  $msg = "$name был похищен $when_it_happened и отстутствовал в течение $how_long.\n" .
    "Количество пришельцев: $how_many\n" .
    "Описание пришельцев: $alien_description\n" .
    "Что они делали? $what_they_did\n" .
    "Фенг замечен? $fang_spotted\n" .
    "Дополнительная информация: $other";
  mail($to, $subject, $msg, 'From:' . $email);

  echo 'Спасибо за заполнение формы.<br />';
  echo 'Вы были похищены ' . $when_it_happened;
  echo ' и отстутствовали в течение ' . $how_long . '<br />';
  echo 'Количество пришельцев: ' . $how_many . '<br />';
  echo 'Опишите их: ' . $alien_description . '<br />';
  echo 'Что они делали? ' . $what_they_did . '<br />';
  echo 'Видели ли вы мою собаку Фенга? ' . $fang_spotted . '<br />';
  echo 'Дополнительная информация: ' . $other . '<br />';
  echo 'Ваш адрес электронной почты: ' . $email;
?>
</body>
</html>
