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
                <a href="?c=auth&a=login">Prihlásiť</a>
            </div>

            <div class="tlac">
                <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>