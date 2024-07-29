<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface as ProductInterface;

class ProductService
{
    public function __construct(
        public ProductInterface $productInterface,
    ) {
        $this->productInterface = $productInterface;
    }

    public function import(object $file)
    {
        $this->productInterface->import($file);
    }
}