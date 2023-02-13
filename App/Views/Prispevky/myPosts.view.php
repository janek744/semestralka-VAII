<?php

use \App\Models\Prispevok;
/** @var \App\Core\IAuthenticator $auth */
/** @var Prispevok[] $data */
?>

<div class="container-fluid cont">
    <?php
    foreach ($data as $prispevok)  {
        if ($this->app->getAuth()->getLoggedUserId() == $prispevok->getUserID()) {
        ?>
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
                    <span><?php if ($prispevok->getText()) { ?></span>
                    <p class="hidden" id="formtext" onresize="return myFunction()">
                        <?php
                        //$string = editText($prispevok->getText());
                        echo $prispevok->getText()?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <a href="?c=comment&postId=<?php echo $prispevok->getIdPrispevku()?>" class="btn" style="width: 200px;
 margin-top:10px; margin-bottom:10px;">KOMENTY</a>
                </div>
                <?php if ($auth->isLogged()) { ?>
                    <div class="col-md-auto">
                    <a href="?c=prispevky&a=edit&id=<?php echo $prispevok->getIdPrispevku()?>" class="btn" style="width: 200px;
 margin-top:10px;margin-bottom:10px;">EDITOVAŤ</a>
                </div>
                    <div class="col-md-auto">
                    <a href="?c=prispevky&a=delete&id=<?php echo $prispevok->getIdPrispevku()?>" class="btn" onresize="return deletePost (<?=$prispevok->getIdPrispevku()?>)" onclick="return deletePost (<?=$prispevok->getIdPrispevku()?>)" style="width: 200px;
 margin-top:10px;margin-bottom:10px;">VYMAZAŤ</a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    <?php } ?>
</div>
<script src="public/js/posts.js"></script>