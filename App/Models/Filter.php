<?php

namespace App\Models;

use App\Core\Model;

class Filter extends Model
{
    protected $id;
    protected $filter_name;

    /**
     * @return mixed
     */
    public function getFilterId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setFilterId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFilterName()
    {
        return $this->filter_name;
    }

    /**
     * @param mixed $filter_name
     */
    public function setFilterName($filter_name): void
    {
        $this->filter_name = $filter_name;
    }
}