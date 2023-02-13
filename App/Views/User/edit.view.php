<?php
$layout = 'auth';
/** @var Array $data */
?>

    <div class="container-fluid cont">
        <div class="row prispevok">
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <form class="form-signin" method="post" action="?c=user&a=edit">
                <h1>Zmena hesla</h1>
                <h5 style="color: white; padding-left: 20px">Uživateľ: <?php echo $this->app->getAuth()->getLoggedUserName(); ?></h5>
                <div class="nadp">
                    <label>Staré heslo
                        <input type="password" name="oldpass" id="nazovForm" value="" style="width: 90%;">
                    </label>
                    <br>
                    <br>
                    <label>Nové heslo
                        <input type="password" name="newpass" id="nazovForm" value="" style="width: 90%;">
                    </label>
                </div>
                <br>

                <div class="tlac">
                    <button class="btn" type="submit" name="submit">Zmeň</button>
                </div>

            </form>
        </div>
    </div>
    <script src="public/js/script2.js"></script>
<?php
