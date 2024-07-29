<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function import(object $file);
}