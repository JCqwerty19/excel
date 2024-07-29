<?php

namespace App\Repositories\Implementators\Eloquent;

use App\Repositories\Interfaces\ProductRepositoryInterface as ProductInterface;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Client\Response;

use App\Models\Product;
use App\Models\Additional;
use App\Models\Photo;

class ProductRepositoryImplementator implements ProductInterface
{
    public function import(object $file)
    {
        // save file
        $savedFile = $this->saveFile($file);

        // get path
        $filePath = $this->getPath($savedFile);

        // parse file
        $parsedFile = $this->parseFile($filePath);

        // get rows
        $rows = $this->getRows($parsedFile);

        foreach($rows as $key => $row) {
            if ($key === 0) continue;
            $productData = $this->collectProductData($row);
            $product = Product::create($productData);

            $additionalData = $this->collectAdditionalInfo($row, $product->id);
            Additional::create($additionalData);

            $photoPath = $this->photo($row[37], $product->id);
        }
    }

    // ==========================================

    private function saveFile(object $file): string
    {
        return $file->store('imports');
    }

    private function getPath(string $savedFile): string
    {
        return storage_path('app/' . $savedFile);
    }

    private function parseFile(string $filePath): object
    {
        return SimpleXLSX::parse($filePath);
    }

    private function getRows(object $parsedFile)
    {
        return $parsedFile->rows();
    }

    // ==========================================

    private function collectProductData(array $row): array
    {
        return [
            'group' => $row[0],
            'uuid' => $row[1],
            'type' => $row[2],
            'code' => $row[3],
            'name' => $row[4],
            'external_code' => $row[5],
            'article' => $row[6],
            'unit' => $row[7],
            'price' => $row[8],
            'currency' => $row[9],
            'internalPrice' => $row[10],
            'internalCurrency' => $row[11],
            'ean13_code' => $row[12],
            'ean8_code' => $row[13],
            'code128' => $row[14],
            'upc_code' => $row[15],
            'gtin_code' => $row[16],
            'description' => $row[17],
            'indication' => $row[18],
            'discount' => $row[19] === "да" ? true : false,
            'min_price' => $row[20],
            'min_price_currency' => $row[21],
            'country' => $row[22],
            'vat' => $row[23],
            'supplier' => $row[24],
            'archieved' => $row[25] === "да" ? true : false,
            'weight' => $row[26],
            'weight_product' => $row[27] === "да" ? true : false,
            'marked' => $row[28] === "да" ? true : false,
            'volume' => $row[29],
            'excise' => $row[30] === "да" ? true : false,
        ];
    }

    private function collectAdditionalInfo(array $row, int $product_id)
    {
        return [
            'product_id' => $product_id,
            'size' => $row[31],
            'colour' => $row[32],
            'brand' => $row[33],
            'structure' => $row[34],
            'quantityInBox' => $row[35],
            'boxLink' => $row[36],
            'title' => $row[38],
            'h1' => $row[39],
            'desctiption' => $row[40],
            'weight' => $row[41],
            'width' => $row[42],
            'height' => $row[43],
            'lenght' => $row[44],
            'boxWeight' => $row[45],
            'boxWidth' => $row[46],
            'boxHeight' => $row[47],
            'boxLenght' => $row[48],
            'category' => $row[49],
        ];
    }

    private function photo(string $links, int $product_id): void
    {
        $urls = explode(', ', $links);

        foreach($urls as $url) {
            $photo = $this->downloadPhoto($url);
            $extension = $this->getExtension($photo->header('Content-Type'));

            $path = $this->photoPath($extension);
            $this->savePhoto($photo, $path);
            
            $photoData = $this->collectPhotoData($product_id, $url, $path);
            Photo::create($photoData);
        }
    }







    // =======================================

    private function downloadPhoto(string $url): Response
    {
        set_time_limit(120);
        return Http::timeout(30)->get($url);
    }

    private function getExtension(string $type): string
    {
        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];

        return $extensions[$type] ?? 'unknown';
    }

    private function photoPath(string $extension)
    {
        return 'photos/' . Str::random(50) . '.' . $extension;
    }

    private function savePhoto(Response $photo, string $photoPath): string
    {
        return Storage::put($photoPath, $photo->body());
    }

    private function collectPhotoData(int $product_id, string $url, string $path): array
    {
        return [
            'product_id' => $product_id,
            'url' => $url,
            'path' => $path,
        ];
    }
}