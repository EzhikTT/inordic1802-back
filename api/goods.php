<?php

$res = [
    'goods' => [],
    'err' => ''
];

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

$query = 'SELECT * FROM GOODS;';

$result = mysqli_query($link, $query);

while($arr = mysqli_fetch_assoc($result)){

    $res['goods'][] = $arr;
}

if(count($res['goods']) === 0){

    $res['err'] = mysqli_error($link);
}

mysqli_close($link);

die(json_encode($res));