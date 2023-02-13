<?php

use \App\Models\Prispevok;
/** @var \App\Core\IAuthenticator $auth */
/** @var Prispevok[] $data */
?>
<script src="js/filter.js"></script>
<div class="nadp">
    <button id="tlacitko" onclick="getFilters()" class="primary" > Refresh</button>
    <br>
    <label>Filter
    </label>
    <select onchange="getFilters()" name="opt" id="opt">
        <option value="1">Zviera</option>
        <option value="2">Auto</option>
        <option value="3">Stroj</option>
        <option value="4">PC</option>
    </select>
</div>

<div>
    <p><span id="filters"></span></p>
</div>
<script src="public/js/filter.js"></script>