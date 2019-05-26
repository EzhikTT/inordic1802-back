<?php
include 'header.php';

$errorMsg = '';
$result = [];
$tableHead = [];
$search = '';
$type = 'all';

if (!empty($_GET) && isset($_GET['search'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'web1802_petruhin');
    mysqli_set_charset($conn, "utf8");

    if (!$conn) {

        $errorMsg = 'Извините, запрос не получилось обработать. Повторите запрос позже';
    } else {

        $type = $_GET['type'];

        $search = htmlentities($_GET['search']);

        // query = DELETE
        // mysqli_query (conn, query)

//        $query = "SELECT * FROM feedback WHERE FIO LIKE '%$search%' OR EMAIL LIKE '%$search%' OR PHONE LIKE '%$search%' OR MESSAGE LIKE '%$search%';";

        $query = "SELECT * FROM feedback";

        if(empty($_GET['type'])){

            $query .= ';';
        }
        else{

            $query .= ' WHERE ';
        }

        $queryAll = [];

        if($_GET['type'] === 'fio' || $_GET['type'] === 'all'){

            $queryAll[]= "FIO LIKE '%$search%'";
        }

        if($_GET['type'] === 'phone' || $_GET['type'] === 'all'){

            $queryAll[] = "PHONE LIKE '%$search%'";
        }

        if($_GET['type'] === 'email' || $_GET['type'] === 'all'){

            $queryAll[] = "EMAIL LIKE '%$search%'";
        }

        if($_GET['type'] === 'message' || $_GET['type'] === 'all'){

            $queryAll[] = "MESSAGE LIKE '%$search%'";
        }

        $query .= implode(' OR ', $queryAll) . ';';

        $resultDB = mysqli_query($conn, $query);

        if (!$resultDB) {

            $errorMsg = 'Извините, запрос не получилось обработать. Повторите запрос позже';
        }
        else {

            while ($row = mysqli_fetch_assoc($resultDB)) {

                $result[] = $row;
            }

            mysqli_close($conn);

            if (count($result) > 0) {

                $tableHead = array_keys($result[0]);
            }
        }
    }
}

?>

    <div class="search_page">

        <div class="search_page-line">

            <form method="GET" action="">

                <div class="search_line">

                    <input type="search"
                           name="search"
                           autocomplete="false"
                           value="<?=$search?>"
                           placeholder="Введите поисковый запрос"/>

                    <button type="submit">
                        Найти
                    </button>

                </div>

                <div class="choose_type">

                    <span>Искать:</span>

                    <label for="type">
                        <input type="radio" name="type" value="all" <?php if($type === 'all') echo 'checked'?>/>
                        <span>везде</span>
                    </label>

                    <label for="type">
                        <input type="radio" name="type" value="fio" <?php if($type === 'fio') echo 'checked'?>/>
                        <span>по ФИО</span>
                    </label>

                    <label for="type">
                        <input type="radio" name="type" value="email" <?php if($type === 'email') echo 'checked'?>/>
                        <span>по Email'у</span>
                    </label>

                    <label for="type">
                        <input type="radio" name="type" value="phone" <?php if($type === 'phone') echo 'checked'?>/>
                        <span>по телефону</span>
                    </label>

                    <label for="type">
                        <input type="radio" name="type" value="message" <?php if($type === 'message') echo 'checked'?>/>
                        <span>по сообщению</span>
                    </label>

                </div>


            </form>

        </div>

        <div class="search_page-result">

            <?php if (count($result) > 0): ?>

                <div class="search_page-result_table">

                    <div class="search_page-result_table-head">

                        <?php foreach($tableHead as $head):?>

                            <div class="search_page-result_table-head_item">
                                <?=$head?>
                            </div>

                        <?php endforeach;?>

                    </div>

<!--                    <div class="search_page-result_table-body">-->

                        <?php foreach ($result as $row):?>

                            <div class="search_page-result_table-body">

                                <?php foreach ($row as $item):?>

                                    <div class="search_page-result_table-body_item">
                                        <?=$item?>
                                    </div>

                                <?php endforeach;?>

                            </div>

                        <?php endforeach;?>

<!--                    </div>-->

                </div>

            <?php else:?>

                <?php if (empty($errorMsg)): ?>
                    Нет результатов
                <?php else: ?>
                    <?= $errorMsg ?>
                <?php endif; ?>

            <?php endif;?>

        </div>


    </div>

<?php
include 'footer.php';
?>