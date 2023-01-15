<?php
$layout = 'auth';
/** @var Array $data */
?>

<div class="container-fluid cont">
    <div class="row prispevok">
        <form method="post" action="?c=prispevky&a=store">
            <?php /**  @var \App\Models\Prispevok $data */
            if ($data->getIdPrispevku()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getIdPrispevku() ?>">
            <?php } ?>
                <h1>Vytvorenie príspevku</h1>

                <div class="nadp">
                    <label>Názov
                    <input type="text" name="nazov" id="nazovForm" value="<?php echo $data->getNazov() ?>" style="width: 500px; margin-left: 45px">
                    </label>
                </div>

                <div class="obr">
                    <br>
                    <label>Obrázok
                    <input type="text" name="obrazok" id="obrazokForm" value="<?php echo $data->getObrazok() ?>" style="width: 500px; margin-left: 20px;">
                    </label>
                    <br><br>
                </div>

                <div class="tex">
                    <label">Text
                    <input type="text" name="text" id="textForm" value="<?php echo $data->getText() ?>" style="width: 500px; height: 100px; margin-left: 70px; vertical-align: top;">
                    </label>
                </div>

                <br><br>

                <div class="tlac">
                    <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
                </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>