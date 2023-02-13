<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <form method="post" action="?c=user&a=register">
            <?php if($data != null){ ?>
                <?php foreach ($data as $item) { ?>
                    <div class='text-danger'><?=@$item?></div><br>
                <?php }?>
            <?php }?>
            <input type="hidden" name="id" value="">
            <h1>Registrácia</h1>
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
                <a href="?c=auth&a=login">Prihlásiť</a>
            </div>

            <div class="tlac">
                <button class="btn" type="submit" name="submit" id="logBtn">Registrovať</button>
            </div>

        </form>
    </div>
</div>
<script src="public/js/login.js"></script>