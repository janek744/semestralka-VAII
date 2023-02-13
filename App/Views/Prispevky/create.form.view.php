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
                        <input type="text" name="nazov" id="nazovForm" value="<?php echo $data->getNazov() ?>" style="width: 90%;">
                    </label>
                </div>

            <div class="nadp">
                <br>
                <label>Obrázok
                    <input type="file" name="obrazok" id="obrazokForm" value="<?php echo $data->getObrazok() ?>" style="width: 90%;">
                </label>
                <br><br>
            </div>

            <div class="nadp">
                <br>
                <label">Text
                    <input type="text" name="text" id="textForm" value="<?php echo $data->getText() ?>" style="width: 90%; he">
                </label>
            </div>
                <br><br>
            <div class="nadp">
                <label>Filter
                </label>
                <select name="opt" id="opt">
                    <option name="opt" value="1">Zviera</option>
                    <option name="opt" value="2">Auto</option>
                    <option name="opt" value="3">Stroj</option>
                    <option name="opt" value="4">PC</option>
                </select>
            </div>
            <br><br>
            <div class="tlac">
                <input type="submit" name="tlacitko" id="tlacitkoForm" value="Odoslat">
            </div>

        </form>
    </div>
</div>
<script src="public/js/script2.js"></script>