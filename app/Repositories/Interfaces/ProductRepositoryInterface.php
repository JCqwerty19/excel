<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    // Excel import function
    public function import(object $file): void;
}