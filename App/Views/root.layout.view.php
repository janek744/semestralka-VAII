<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/styl.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-md">
    <div class="container-fluid">
        <a class="navbar-brand" href="?c=prispevky">Bazar.sk</a>
        <button class ="navbar-toggler custom-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <div class="navbar-nav">
                <a class="nav-link" href="?c=prispevky">Domov</a>
                <a class="nav-link" aria-current="page" href="?c=prispevky">Príspevky</a>
                <a class="nav-link" href="?c=prispevky">Info</a>
                <?php if (!$auth->isLogged()) { ?>
                <a class="nav-prihl" href="?c=auth">Prihlásiť</a>
                <?php } ?>
                <?php if ($auth->isLogged()) { ?>
                    <a class="nav-link" href="?c=prispevky&a=create">Vytvor</a>
                    <a class="nav-prihl" href="?c=auth&a=logout">Odhlásiť</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
<div>
    <footer class="footer">
        <ul class="nav border-bottom">
            <i class="bif bi-twitter"></i><i class="bif bi-facebook"></i><i class="bif bi-youtube"></i><i class="bif bi-telephone-fill"></i>
        </ul>
        <p class="copy">&copy; 2022 Company, Inc</p>
    </footer>
</div>
</body>
</html>
