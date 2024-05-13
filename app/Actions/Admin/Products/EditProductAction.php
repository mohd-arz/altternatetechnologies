<?php

namespace App\Actions\Admin\Products;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditProductAction
{
    public function execute(Collection $collection,Model $product)
    {
        DB::beginTransaction();
        try {
            $product->title = $collection['title'];
            $product->description = $collection['description'];
            if(isset($collection['is_home'])){
              $product->is_home = true;
            }
            if(isset($collection['img1']) && $collection['img1']){ 
              $imageData =  $collection->get('img1');              
              $product->img1 = Storage::disk('public')->put('products/', $imageData);
            }
            if(isset($collection['img2']) && $collection['img2']){
              $imageData =  $collection->get('img2');              
              $product->img2 = Storage::disk('public')->put('products/', $imageData);
            }
            if(isset($collection['img3']) && $collection['img3']){
              $imageData =  $collection->get('img3');              
              $product->img3 = Storage::disk('public')->put('products/', $imageData);
            }
            $product->save();

            ProductAttribute::where('product_id',$product->id)->delete();
            foreach($collection['attribute'] as $key => $attributeName){
              $productAttribute = new ProductAttribute();
              $productAttribute->attribute = $attributeName;
              $productAttribute->value = $collection['value'][$key];
              $productAttribute->product_id = $product->id;
              $productAttribute->save();
          }
            
            // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $collection->get('banner_img')));

            // $fileName = 'cropped_image_' . time() . '.png';
            
            // Storage::disk('public')->put('notes/' . $fileName, $imageData);
            
            // $product->banner_img = 'notes/' . $fileName;
            

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
