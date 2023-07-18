<?php

namespace App\Repository;

use App\Models\Resource;
use App\Repository\Interfaces\ResourcesRepositoryInterface;

class ResourcesRepository implements ResourcesRepositoryInterface {

    private $resource;

    public function __construct()
    {
        $this->resource = new Resource();
    }

    public function Resource()
    {
        return $this->resource;
    }

    public function getResourceByGroup(array $group)
    {
        $resource = [];

        $this->resource->whereIn("group", $group)->get()
        ->map(function ($query) use ($group, &$resource) {
            foreach ($group as $value) {
                if ($value == $query->group) 
                    $resource[$value][] = $query;
            }
        });

        return $resource;
    }
}