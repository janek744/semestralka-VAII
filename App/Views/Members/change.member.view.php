<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <form method="post" action="?c=members&a=edit">
            <?php /**  @var \App\Models\Member $data */
            if ($data->getMemberId()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getMemberId() ?>">
            <?php } ?>
            <h1>Zmena hesla</h1>
            <div class="nadp">
                <label>Staré heslo
                    <input type="text" name="oldpass" id="nazovForm" value="<?php echo $data->getMemberPassword() ?>" style="width: 500px; margin-left: 20px">
                </label>
            </div>
            <br>
            <div class="nadp">
                <label>Nové heslo
                    <input type="text" name="newpass" id="nazovForm" value="<?php echo $data->getMemberPassword() ?>" style="width: 500px; margin-left: 20px">
                </label>
            </div>
            <br>
            <div class="tlac">
                <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>
