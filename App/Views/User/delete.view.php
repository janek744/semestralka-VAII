<?php
$layout = 'auth';
/** @var Array $data */
?>

    <div class="container-fluid cont">
        <div class="row prispevok">
            <form method="post" action="?c=user&a=delete">
                <h1>Zmena hesla</h1>
                <div class="nadp">
                    <label>Staré heslo
                        <input type="text" name="oldpass" id="nazovForm" value="" style="width: 500px; margin-left: 22px">
                    </label>
                    <br>
                <br>

                <div class="tlac">
                    <button class="btn btn-primary" type="submit" name="submit">Vymaž</button>
                </div>

            </form>
        </div>
    </div>
    <script src="public/js/script2.js"></script>
<?php
