<?php
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

$query = "SELECT * FROM users;";

$result = mysqli_query($link, $query);

echo '<pre>';
//var_dump($result);

while($arr = mysqli_fetch_assoc($result)){

    var_dump($arr);
}

echo '</pre>';




echo '<pre>';

var_dump($_REQUEST);

echo '</pre>';

$isVisualForm = true;
//
//if(count($_POST) > 0){
//
//    $isVisualForm = false;
//}

// empty($_POST['fio'])

$formData = [
    'fio' => '',
    'email' => '',
    'phone' => '',
    'message' => 'Ваше сообщение'
];

$isFormSubmit = false;

$err = [];

if (!empty($_POST)) {

    foreach ($formData as $name => $item) {

        if (isset($_POST[$name])) {

            $formData[$name] = $_POST[$name];
        }
    }

    if (empty($_POST['fio'])) {

        $err['fio'] = 'Напиши имя!';
    }

    if (empty($_POST['email'])) {

        $err['email'] = 'Напиши email!';
    }

    if (!is_numeric($_POST['phone'])) {

        $err['phone'] = 'Напиши валидный телефон!';
    }

    if (empty($_POST['message']) || mb_strlen($_POST['message']) < 80) {

        $err['message'] = 'Слишком короткое сообщение!';
    }

    $isFormSubmit = true;
}

if ($isFormSubmit && empty($err)) {

    foreach($_POST as &$item){

        $item = htmlspecialchars($item);
    }

    $values = implode($_POST, '\',\'');

    echo '<pre>';
    var_dump($values);
    echo '</pre>';

    $query = "INSERT INTO feedback (FIO, EMAIL, PHONE, MESSAGE) VALUES ('$values');";

    $result = mysqli_query($link, $query);
}

//
//echo '<pre>';
//
//var_dump($_POST);
//
//echo '</pre>';




