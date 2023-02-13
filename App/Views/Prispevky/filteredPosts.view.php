<?php

use \App\Models\Prispevok;
/** @var \App\Core\IAuthenticator $auth */
/** @var Prispevok[] $data */
?>
<div class="container-fluid cont">
    <div class="nadp">
        <label>Obrázok
        </label>
        <select name="opt" id="opt">
            <option name="opt" value="1">Zviera</option>
            <option name="opt" value="2">Auto</option>
            <option name="opt" value="3">Stroj</option>
            <option name="opt" value="4">PC</option>
        </select>
    </div>
    <br>
    <?php
    foreach ($data as $prispevok)  {?>
        <div class="row prispevok">
            <div class="nadpis">
                <?php if ($prispevok->getNazov()) { ?>
                    <a class="nadpis" id="formNadpis" href="?c=prispevky"><?php echo substr($prispevok->getNazov(), 0 ,20) ?></a>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-xxl-5 col-lg-12">
                    <?php if ($prispevok->getObrazok()) { ?>
                        <img src="<?php echo $prispevok->getObrazok() ?>" class="img-fluid" alt="...">
                    <?php } ?>
                </div>
                <div class="col-xxl-7 col-lg-12">
                    <span id="formtext"><?php if ($prispevok->getText()) { ?></span>
                    <spa class="text">
                        <?php $string = substr($prispevok->getText(), 0 ,40);
                        echo implode("\n", str_split($string, 40)); ?>
                    </spa>
                </div>
            </div>
            <div class="row col-md-auto">
                <div class="col-md-auto">
                    <a href="?c=comment&postId=<?php echo $prispevok->getIdPrispevku()?>" class="btn" style="
     margin-top:10px; margin-bottom:10px;">zobraz komenty</a>
                </div>
                <?php if ($auth->isLogged()) { ?>
                    <div class="col-md-auto">
                        <a href="?c=comment&a=create&postId=<?php echo $prispevok->getIdPrispevku()?>" class="btn" style="
 margin-top:10px; margin-bottom:10px;">pridať koment</a>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>


