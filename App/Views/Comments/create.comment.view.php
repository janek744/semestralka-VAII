<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <form method="post" action="?c=comment&a=store">
            <?php /**  @var \App\Models\Comment $data */
            if ($data->getUserId()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getCommentId() ?>">
            <?php } ?>
            <h1>Registrácia</h1>
            <div class="nadp">
                <label>Username
                    <input type="text" name="login" id="nazovForm" value="<?php echo $data->getCommentText() ?>" style="width: 500px; margin-left: 20px">
                </label>
            </div>

            <div class="tlac">
                <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>