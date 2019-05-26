<?php

include 'header.php';

// Найти сумму  1+4+7+10+...+112.
$sum = 0;

for($i = 1; $i <= 112; $sum += ($i += 3) - 3 );

echo $sum;

// Найти сумму натуральных чисел от a до b,
// где a и b вводит пользователь.
// В случае некорректных a и b (например, a>b)
// вывести сообщение 'Сумма не существует'.

$sum = 0;
$error = '';

if(!empty($_POST) && !empty($_POST['a']) && !empty($_POST['b'])) {

    if (is_numeric($_POST['a']) && is_numeric($_POST['b']) && $_POST['a'] < $_POST['b']) {

        for ($i = $_POST['a']; $i < $_POST['b']; $sum += $i++) ;
    }
    else {

        $error = 'Сумма не существует';
    }
}
?>

<?if(!empty($error)):?>
    <span style="color:red"><?=$error?></span>
<?endif;?>

<form method="post" action="">

    <?if(empty($error) && $sum !== 0):?>

        <span>Сумма: </span><input type="text" value="<?=$sum?>" readonly/><br/>

    <?endif;?>

    <input name="a" type="text" value="<?if(!empty($_POST['a'])) echo $_POST['a']?>" placeholder="Введите число а"/>
    <input name="b" type="text" value="<?if(!empty($_POST['b'])) echo $_POST['b']?>" placeholder="Введите число b"/>

    <button type="submit">найти сумму</button>

</form>


<?php

// Вывести на черном фоне n красных квадратов
// случайного размера в случайной позиции в браузере.
$n = 0;

if(!empty($_GET) && !empty($_GET['n']) && is_numeric($_GET['n']) && $_GET['n'] > 0){

    $n = intval($_GET['n']);
}

?>

<form method="get" action="">

    <input type="number" name="n" placeholder="Введите количество квадратов "/>

    <button type="submit">Отрисовать</button>

</form>


<div class="random">

    <?for($i = 0; $i < $n; $i++):?>

        <?
            $width = rand(0, 200);
        ?>
        <div class="random-item"
             style="
                 width: <?=$width?>px;
                 height: <?=$width?>px;
                 top: <?=rand(0, 600 - $width - 1)?>px;
                 left: <?=rand(0, 600 - $width - 1)?>px;
                 ">
        </div>

    <?endfor;?>

</div>

<?php

// Вывести все числа, меньшие 10000,
// у которых есть хотя бы одна цифра 3 и которые не делятся на 5.

for($i = 0; $i < 10000; $i++){

//    $i = 61;

    if($i % 5 !== 0 && strpos(strval($i), '3') !== false){

//        $digit = $i;
//
//        $numDigit = 1;
//
//        do{
//
//            if($digit % 10 === 3){

//                echo $i . '<br/>';
//                break;
//            }
//
//        }while($digit = intdiv($i, (10 ** $numDigit++)));
    }
}



// Cоздать массив из n чисел,
// каждый элемент которого равен квадрату своего номера.

$count = [0];

if(!empty($_GET) && isset($_GET['count']) && is_numeric($_GET['count']) && intval($_GET['count']) > 0){

    for($i = 1; $i <= $_GET['count']; $count[] = $i++ ** 2);

    echo '<pre>';
//    var_dump($count);
    echo '</pre>';

}
?>

<form method="get" action="">

    <input type="number" name="count" placeholder="Введите количество элементов"/>

    <button type="submit">Вывести квадраты</button>

</form>


<?php

// Удалите в массиве повторы значений.
// Например, для массива 1 2 4 4 2 5 результатом будет 1 2 4 5.
// Задание необходимо выыполнить как с помощью функции array_unique(), так и без.

$array = [];

for($i = 0; $i < 10; $i++){

    $array[] = rand(1, 5);
}

//echo '<pre>';
foreach ($array as $key=>$value){

    echo "$key - $value<br/>";
}
//echo '</pre>';

$array1 = [];

for($i = 0; $i < count($array); $i++){

    $item = $array[$i];

    for($j = $i + 1; $j < count($array); $j++){

        if($item === $array[$j]){

            array_splice($array, $j, 1);

            if($i > 0){
                $i--;
            }

            if($j > 0){
                $j--;
            }
        }
    }
}


//echo '<pre>';
echo count($array) . '<br/>';

foreach ($array as $key=>$value){

    echo "$key - $value<br/>";
}
//echo '</pre>';

?>




<?include 'footer.php';?>