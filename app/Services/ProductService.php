<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface as ProductInterface;

class ProductService
{
    // Product service contruction
    public function __construct(
        public ProductInterface $productInterface,
    ) {
        $this->productInterface = $productInterface;
    }

    // Import excel file through repository
    public function import(object $file): void
    {
        $this->productInterface->import($file);
    }
}