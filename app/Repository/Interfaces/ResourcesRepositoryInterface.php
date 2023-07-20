<?php

namespace App\Repository\Interfaces;

interface ResourcesRepositoryInterface {
    public function Resource();
    public function getResourceByGroup(array $group);
}