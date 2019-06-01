<?php

$json = file_get_contents('php://input');
$post = json_decode($json, true);

$res = [];

if(!empty($post) && isset($post['id'])){

    $id = htmlspecialchars($post['id']);

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

    $query = "SELECT * FROM GOODS WHERE VENDOR_CODE='$id';";

    $result = mysqli_query($link, $query);

    while($arr = mysqli_fetch_assoc($result)){

        if(empty($res) && count($res) === 0){

            $res = $arr;

            $res['PHOTO'] = [$res['PHOTO']];
            $res['SIZE'] = [$res['SIZE']];
        }
        else{

            $res['PHOTO'][] = $arr['PHOTO'];
            $res['SIZE'][] = $arr['SIZE'];
        }
    }

    mysqli_close($link);
}

die(json_encode($res));