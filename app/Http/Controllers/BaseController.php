<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;

class BaseController extends Controller
{
    public function __construct(
        public ProductService $productService,
    ) {
        $this->productService = $productService;
    }
}
