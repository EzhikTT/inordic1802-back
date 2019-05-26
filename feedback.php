<?php
include 'header.php';
?>
<div class="error_text"></div>
<form action="saveFeedback.php" method="get" id="form" class="feedback_form">

    <input name="fio" type="text" placeholder="Введите ФИО"/>
    <input name="email" type="email" placeholder="Введите email"/>
    <input name="phone" type="text" placeholder="Введите телефон"/>
    <textarea name="message" placeholder="Введите сообщение">
    </textarea>

    <button type="submit" id="submit_form">Отправить</button>

</form>

<div class="hide" id="result">
    Спасибо за обращение!
</div>


<script>

    document.getElementById('submit_form').addEventListener(
        'click',
        event => {

            event.preventDefault();

            const fio = document.getElementsByName('fio')[0].value;
            const email = document.getElementsByName('email')[0].value;
            const phone = document.getElementsByName('phone')[0].value;
            const message = document.getElementsByName('message')[0].value;

            let submit = true;

            if(!fio){

                submit = false;
                document.getElementsByName('fio')[0].classList.add('error');
            }

            if(
                email.indexOf('@') < 1 ||
                email.lastIndexOf('.') < email.indexOf('@') ||
                email.lastIndexOf('.') === email.length - 1
            ){
                submit = false;
                document.getElementsByName('email')[0].classList.add('error');
            }

            if(!+phone){

                submit = false;
                document.getElementsByName('phone')[0].classList.add('error');
            }

            if(!message && message < 82){

                submit = false;
                document.getElementsByName('message')[0].classList.add('error');
            }

            if(submit){

                const body = JSON.stringify({
                    fio,
                    email,
                    phone,
                    message
                });

                console.log(body);

                fetch(
                    'saveFeedback.php',
                    {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body
                    }
                ).then(res => res.json()).then(res => {

                    console.log(res);

                    if(res.isSave){

                        document.getElementById('result').classList.remove('hide');
                        document.getElementById('form').classList.add('hide');
                    }
                    else{

                        for(let i in res.err){

                            if(res.err.hasOwnProperty(i)){

                                if(i !== 'mysql'){

                                    document.getElementsByName(i)[0].classList.add('error');
                                }
                                else{

                                    document.getElementsByClassName('error_text')[0].innerHTML = res.err[i];
                                }
                            }
                        }
                    }

                });
            }
        }
    );

</script>