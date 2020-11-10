<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductService
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * ProductService constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Returns a product.
     *
     * @return Product
     */
    public function findById($id)
    {
        $product = $this->product->find($id);

        return $product;
    }

    /**
     * Returns all products.
     *
     * @return Product[]
     */
    public function getProducts()
    {
        $product = $this->product->all();

        return $product;
    }

    /**
     * Stores a product.
     *
     * @param $data
     * @return Product $product
     */
    public function storeProduct($data)
    {
        if (array_key_exists('image', $data)) {
            $image = $data['image'];
            $newFileName = Str::random() . '.' . $image->getClientOriginalExtension();

            $path = storage_path('app/public/images');
            if (!File::exists($path)) {
                mkdir($path, 0755, true);
            }

            $uploadFolder = 'images';
            $newImage = $image->storeAs($uploadFolder, $newFileName, 'public');

            $data['image'] = $newImage;
        }
        $product = $this->product->create($data);

        return $product;
    }

    /**
     * Updates a product.
     *
     * @param $data
     * @param $id
     * @return Product $product
     */
    public function updateProduct($data, $id)
    {
        $product = $this->findById($id);

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->stock = $data['stock'];
        $product->save();

        return $product;
    }

    /**
     * Deletes a product.
     *
     * @param $id
     * @return Product $product
     */
    public function deleteProduct($id)
    {
        $product = $this->findById($id);
        if($product){
            $product->delete();
        }

        return $product;
    }



}