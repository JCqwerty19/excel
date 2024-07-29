<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;

class ProductController extends BaseController
{
    public function export()
    {
        return view('main.export');
    }

    public function import(ProductRequest $productRequest)
    {
        $file = $productRequest->file('file');

        $this->productService->import($file);
    }
}
