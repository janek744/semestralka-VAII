<?php

use \App\Models\Filter;
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Filter[] $data */

?>
<script src="js/filter.js"></script>
<div class="nadp">
    <br>
    <label>Filter
    </label>
    <select onchange="getFilters()" name="opt" id="opt">
        <?php foreach ($data as $filter) { echo "\n";?>
            <br>
            <?php if ($filter->getFilterName()) { ?>
                <option value="<?php $filter->getFilterId(); ?>"><?php echo $filter->getFilterName(); ?></option>
            <?php }?>
        <?php }?>
    </select>
</div>

<div>
    <p><span id="filters"></span></p>
</div>
<script src="public/js/filter.js"></script>

<?php
//<option value="1">Zviera</option>
//<option value="2">Auto</option>
//<option value="3">Stroj</option>
//<option value="4">PC</option>
?>