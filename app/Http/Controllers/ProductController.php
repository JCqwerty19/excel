<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

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

    public function list()
    {
        $variables = [
            'products' => Product::all(),
        ];

        return view('main.list', $variables);
    }

    public function show(Product $product)
    {
        $variables = [
            'product' => $product,
        ];

        return view('main.show', $variables);
    }
}
