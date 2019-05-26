<?php

$json = file_get_contents('php://input');
$post = json_decode($json, true);

$err = [];

if (empty($post['fio'])) {

    $err['fio'] = 'Напиши имя!';
}

if (empty($post['email'])) {

    $err['email'] = 'Напиши email!';
}

if (!is_numeric($post['phone'])) {

    $err['phone'] = 'Напиши валидный телефон!';
}

if (empty($post['message']) || mb_strlen($post['message']) < 82) {

    $err['message'] = 'Слишком короткое сообщение!';
}

$isSave = false;

if(empty($err)){

    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'web1802_petruhin';

    $link = mysqli_connect(
        $DB_HOST,
        $DB_USER,
        $DB_PASS,
        $DB_NAME
    );

    mysqli_set_charset($link, "window1251");

    foreach($post as &$item){

        $item = htmlspecialchars($item);
    }

    $values = implode($post, '\',\'');

    $query = "INSERT INTO feedback (FIO, EMAIL, PHONE, MESSAGE) VALUES ('$values');";

    $result = mysqli_query($link, $query);

    if($result !== false){

        $isSave = true;
    }
    else{
        $err['db'] = 'Сохранение не удалось!';
    }

    mysqli_close($link);
}

$res = ['isSave' => $isSave, 'err' => $err];

die(json_encode($res));