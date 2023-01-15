<?php

use \App\Models\Prispevok;
/** @var \App\Core\IAuthenticator $auth */
/** @var Prispevok[] $data */
?>
<body>

<div class="container-fluid cont">
<?php foreach ($data as $prispevok)  {
    ?>
    <div class="row prispevok">
    <?php if ($prispevok->getNazov()) { ?>
        <a class="nadpis" id="formNadpis" href="?c=prispevky"><?php echo substr($prispevok->getNazov(), 0 ,40) ?></a>
    <?php } ?>
    <div class="col-xxl-4">
        <?php if ($prispevok->getObrazok()) { ?>
            <img src="<?php echo $prispevok->getObrazok() ?>" class="img-fluid" alt="...">
        <?php } ?>
    </div>
    <div class="col-xxl-7">
    <span id="formtext""><?php if ($prispevok->getText()) { ?></span>
        <p class="text">
            <?php $string = substr($prispevok->getText(), 0 ,250);
            echo implode("\n", str_split($string, 40)); ?>
        </p>
        </div>
        <?php if ($auth->isLogged()) { ?>
            <a href="?c=prispevky&a=edit&id=<?php echo $prispevok->getIdPrispevku()?>" class="btn btn-danger">EDIT</a>
            <a href="?c=prispevky&a=delete&id=<?php echo $prispevok->getIdPrispevku()?>" class="btn btn-danger">DELETE</a>
        <?php } ?>
        </div>
    <?php } ?>
<?php } ?>
    </div>
    </body>
