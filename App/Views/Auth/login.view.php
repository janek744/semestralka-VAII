<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="container-fluid cont">
    <div class="row prihlasenie">
        <div class="col-sm-9 col-md-7 col-lg-5">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h1 class="card-title text-center">Prihlásenie</h1>
                    <form class="form-signin" method="post">
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login">
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button class="btn" type="submit" name="submit" id="logBtn">Prihlásiť
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/js/script.js"></script>
