<?php

$json = file_get_contents('php://input');
$post = json_decode($json, true);

$res = false;

if(!empty($post) && !empty($post['email'])){

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

    mysqli_set_charset($link, "utf8");

    $email = htmlspecialchars($post['email']);

    $query = "INSERT INTO SUBSCRIBE(EMAIL) VALUES ('$email');";

    $res = mysqli_query($link, $query);

    mysqli_close($link);
}

die(json_encode($res));