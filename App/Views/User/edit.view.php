<?php
$layout = 'auth';
/** @var Array $data */
?>

    <div class="container-fluid cont">
        <div class="row prispevok">
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <form class="form-signin" method="post" action="?c=user&a=edit">
                <h1>Zmena hesla</h1>
                <div class="nadp">
                    <label>Staré heslo
                        <input type="text" name="oldpass" id="nazovForm" value="" style="width: 500px; margin-left: 22px">
                    </label>
                    <br>
                    <br>
                    <label>Nové heslo
                        <input type="text" name="newpass" id="nazovForm" value="" style="width: 500px; margin-left: 20px">
                    </label>
                </div>
                <br>

                <div class="tlac">
                    <button class="btn btn-primary" type="submit" name="submit">Zmeň</button>
                </div>

            </form>
        </div>
    </div>
    <script src="public/js/script2.js"></script>
<?php
