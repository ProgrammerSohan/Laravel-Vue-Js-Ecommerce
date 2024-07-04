<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     public function index()
     {
        //$products = Product::query()->paginate(5);
        $products = Product::query()->orderBy('updated_at','desc')->paginate(8);
        return view('product.index',[
             'products' => $products
        ]);
     }

     public function view(Product $product)
     {

      /*  echo '<pre>';
            var_dump($product);
        echo '</pre>';*/

        return view('product.view',['product'=>$product]);

     }
}
