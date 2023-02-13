<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Filter;

class FilterController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */

    public function index(): Response
    {
        $filtre = Filter::getAll();
        return $this->html($filtre);
    }
}