<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <form method="post" action="?c=users&a=store">
            <?php /**  @var \App\Models\User $data */
            if ($data->getUserId()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getUserId() ?>">
            <?php } ?>
            <h1>Registrácia</h1>
            <div class="nadp">
                <label>Username
                    <input type="text" name="login" id="nazovForm" value="<?php echo $data->getUserLogin() ?>" style="width: 500px; margin-left: 20px">
                </label>
            </div>

            <div class="obr">
                <br>
                <label>Password
                    <input type="text" name="password" id="obrazokForm" value="<?php echo $data->getUserPassword() ?>" style="width: 500px; margin-left: 25px;">
                </label>
                <br><br>
            </div>

            <div class="log-registracia">
                <a href="?c=users&a=log">Prihlasiť</a>
            </div>

            <div class="tlac">
                <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>