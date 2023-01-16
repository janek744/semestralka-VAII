<?php

use \App\Models\Comment;
/** @var \App\Core\IAuthenticator $auth */
/** @var Comment[] $data */
?>
<body>

<div class="container-fluid cont">
    <?php
    foreach ($data as $comment)  {
        ?>
        <div class="row prispevok">
        <?php if ($comment->getCommentText()) { ?>
            <a class="nadpis" id="formNadpis" href="?c=prispevky"><?php echo substr($comment->getCommentText(), 0 ,40) ?></a>
        <?php } ?>
        </div>
    <?php } ?>
</div>
</body>
