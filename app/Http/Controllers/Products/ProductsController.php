<?php

namespace App\Http\Controllers\Products;

use App\Actions\Admin\Products\CreateProductAction;
use App\Actions\Admin\Products\EditProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\EditProductRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products(){
        $products = Product::get();
        return view('admin.products.index',[
            'products' => $products,
        ]);
    }
    public function productCreate(){
        return view('admin.products.create');
    }
    public function productStore(CreateProductRequest $request,CreateProductAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Product has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create Product.']);
    }
    public function productDelete(Product $product){
        try{
            $product->delete();
            return response()->json(['status' => true, 'message' => 'Product has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }
    public function productEdit(Product $product){
        return view('admin.products.edit',[
            'product' => $product,
        ]);
    }
    public function productUpdate(Product $product,EditProductRequest $request,EditProductAction $action){
        $response = $action->execute(collect($request->validated()),$product);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Product has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit Product.']);
    }
}

