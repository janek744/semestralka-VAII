<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <form method="post" action="?c=comment&a=store">
            <?php /**  @var \App\Models\Comment $data */
            if ($data->getCommentId()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getCommentId() ?>">
            <?php } ?>
            <h1>Pridanie komentu</h1>
            <div class="nadp">
                <label>Text
                    <input type="text" name="text" id="nazovForm" value="<?php echo $data->getCommentText() ?>" style="width: 500px; margin-left: 20px">
                </label>
            </div>
            <br>
            <div class="nadp">
                <input type="text" name="postId" id="nazovForm" value="<?php echo $_GET["postId"] ?>" style="width: 0px; height: 0px">
            </div>
            <br>
            <div class="tlac">
                <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>