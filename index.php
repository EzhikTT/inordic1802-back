<?php

require_once __DIR__ .'/autoload.php';

include 'script.php';

include 'header.php';


?>

<main>

    <article class="slider">

        <div class="images">

            <div class="data" id="data_images">

<!--                <div class="img">-->
<!--                    <img src="./photos/top.jpg" alt=""/>-->
<!--                </div>-->

<!--                <div class="img">-->
<!--                    <img src="./images/2_02.jpg" alt=""/>-->
<!--                </div>-->

<!--                <div class="img">-->
<!--                    <img src="./images/2_04.jpg" alt=""/>-->
<!--                </div>-->

            </div>

        </div>

        <div class="wrapper">

            <div class="slider_arrow left">
            </div>

            <section>

                <div class="header">
                    <h2>Необычная Москва</h2>
                    <h4>MyMoscow - агенство интересных маршрутов</h4>
                </div>

                <aside>
                    <button>
                        Подробнее о нас
                    </button>
                </aside>

            </section>

            <div class="slider_arrow right">
            </div>

            <nav>
                <span></span>
                <span class="active"></span>
                <span></span>
            </nav>

        </div>

    </article>

    <article class="service">

        <div class="header">
            <h3>Что мы предлагаем?</h3>
            <h5>Наша главная цель - рассказать о Москве так, чтобы это было интересно всем!</h5>
        </div>

        <div class="service_body">

            <section>

                <div class="img"></div>

                <div class="header">
                    <h4>Необычные маршруты</h4>
                </div>

                <aside>Мы обязательно....</aside>

            </section>

            <section>

                <div class="img"></div>

                <div class="header">
                    <h4>Необычные маршруты</h4>
                </div>

                <aside>Мы обязательно....</aside>

            </section>

        </div>

    </article>

    <article class="about">

        <div class="img">
        </div>

        <section>

            <div class="header">
                <h2>Кто мы такие</h2>
            </div>

            <div>
                ....
            </div>

            <button>
                Подробнее о нас
            </button>

        </section>

    </article>

    <article class="gallery">

        <div class="header">

            <h2>Москва в фотографиях</h2>
            <hr/>
            <h4>....</h4>

        </div>

        <section>

            <div class="img">
            </div>

            <div class="img">
            </div>

            <div class="img">
            </div>

        </section>

    </article>

    <article class="review">

        <div class="header">
            <h2>Отзывы</h2>
            <hr/>
        </div>

        <div class="review_body">

            <section>

                <div class="text">
                    ....
                </div>

                <footer>

                    <div class="img"></div>
                    <div class="name"></div>

                </footer>

            </section>

        </div>

        <nav>
            <span class="active"></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>

    </article>

    <article class="feedback">

        <div class="header">
            <h2>Напишите нам</h2>
        </div>


        <?php if(!$isFormSubmit || !empty($err)):?>

            <div class="error_message">
                <?=implode($err, ' ')?>
            </div>

            <form method="post" action="">

                <div class="right_column">

                    <input name="fio"
                           type="text"
                           placeholder="ФИО"
                           value="<?=$formData['fio']?>"
                           class="<?php if(!empty($err['fio'])) echo 'error';?>"/>

                    <div class="error_message">
                        <?=$err['fio']?>
                    </div>

                    <input name="email"
                           type="email"
                           placeholder="Email"
                           value="<?=$formData['email']?>"
                           class="<?php if(!empty($err['email'])) echo 'error';?>"/>
                    <input name="phone"
                           type="number"
                           placeholder="Телефон"
                           value="<?=$formData['phone']?>"
                           class="<?php if(!empty($err['phone'])) echo 'error';?>"/>

                    <button type="submit" class="">Отправить вопрос</button>

                </div>

                <textarea name="message"
                          class="<?php if(!empty($err['message'])) echo 'error';?>">
                    <?=$formData['message']?>
                </textarea>

            </form>

        <?php else:?>

            <div class="thanks">

                <span>Спасибо за обращение!</span>

            </div>

        <?php endif;?>


    </article>

</main>

<?php
include 'footer.php';
?>