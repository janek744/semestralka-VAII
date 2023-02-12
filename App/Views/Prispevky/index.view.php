<?php

use \App\Models\Prispevok;
/** @var \App\Core\IAuthenticator $auth */
/** @var Prispevok[] $data */
?>
<body>

<div class="container-fluid cont">
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
                        <span id="formtext""><?php if ($prispevok->getText()) { ?></span>
                        <p class="text">
                            <?php $string = substr($prispevok->getText(), 0 ,40);
                            echo implode("\n", str_split($string, 40)); ?>

                        </p>
                    </div>
                </div>
                <div class="row">
                    <?php if ($auth->isLogged()) { ?>
                        <div class="col-md-auto">
                            <a href="?c=comment&postId=<?php echo $prispevok->getIdPrispevku()?>" class="btn btn-danger" style="width: 200px;
 margin-top:10px; margin-bottom:10px;">zobraz komenty</a>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        <?php } ?>
</div>
</body>
