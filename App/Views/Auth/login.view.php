<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <div class="text-center text-danger mb-3">
            <?= @$data['message'] ?>
        </div>
        <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
            <input type="hidden" name="id" value="">
            <h1>Prihlásenie</h1>
            <div class="nadp">
                <label>Username
                    <input type="text" name="login" id="login" value="" style="width: 100%;">
                </label>
            </div>

            <div class="nadp">
                <br>
                <label>Password
                    <input type="password" name="password" id="password" value="" style="width: 100%; margin-left: 4px">
                </label>
                <br><br>
            </div>

            <div class="log-prihlasenie">
                <a href="?c=user&a=register">Registrovať</a>
            </div>

            <div class="tlac">
                <button class="btn" type="submit" name="submit" id="logBtn">Prihlásiť</button>
            </div>

        </form>
    </div>
</div>
<script src="public/js/login.js"></script>