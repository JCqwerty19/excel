<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends BaseController
{
    // Excel export page
    public function export()
    {
        return view('main.export');
    }

    // Export excel through service
    public function import(ProductRequest $productRequest)
    {
        // Validate file
        $file = $productRequest->file('file');

        // Export excel through service
        $this->productService->import($file);

        // Send success message
        return redirect()->route('products.export')->withMessage('success', 'Excel Exported');
    }

    // Show products list
    public function list()
    {
        // Valiables for product list
        $variables = [
            'products' => Product::all(),
        ];

        // Show list page
        return view('main.list', $variables);
    }

    // Show product page
    public function show(Product $product)
    {
        // Valiables for product list
        $variables = [
            'product' => $product,
        ];

        // Show product page
        return view('main.show', $variables);
    }
}
