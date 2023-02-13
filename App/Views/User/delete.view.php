<?php
$layout = 'auth';
/** @var Array $data */
?>

    <div class="container-fluid cont">
        <div class="row prispevok">
            <form method="post" action="?c=user&a=delete">
                <h1>Zmazať účet</h1>
                <h5 style="color: white; padding-left: 20px">Uživateľ: <?php echo $this->app->getAuth()->getLoggedUserName(); ?></h5>
                <br>
                <div class="nadp">
                    <label>Staré heslo
                        <input type="password" name="oldpass" id="nazovForm" value="" style="width: 90%;">
                    </label>
                    <br>
                <br>

                <div class="tlac">
                    <button class="btn" type="submit" name="submit" >Vymaž</button>
                </div>

            </form>
        </div>
    </div>
    <script src="public/js/script2.js"></script>
<?php
