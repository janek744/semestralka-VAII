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
                    <input type="text" name="login" id="nazovForm" value="" style="width: 500px; margin-left: 20px">
                </label>
            </div>

            <div class="obr">
                <br>
                <label>Password
                    <input type="text" name="password" id="obrazokForm" value="" style="width: 500px; margin-left: 25px;">
                </label>
                <br><br>
            </div>

            <div class="log-prihlasenie">
                <a href="?c=user&a=register">Registrovať</a>
            </div>

            <div class="tlac">
                <button class="btn btn-primary" type="submit" name="submit">Login</button>
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>