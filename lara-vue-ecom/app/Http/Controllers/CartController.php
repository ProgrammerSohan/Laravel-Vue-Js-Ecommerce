<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Cart;
use App\Models\CartItem;
use Illuminate\Support\Arr;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use session;
use Stripe\Stripe;

class CartController extends Controller
{
    public function index()
    {
       /* $cartItems = Cart::getCartItems();

        $ids = Arr::pluck($cartItems,'product_id');
        $products = Product::query()->whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        $total = 0;
        foreach($products as $product){
            $total += $products->price * $cartItems[$product->id]['quantity'];
        }

        return view('cart.index', compact('cartItems','products','total'));*/
        $cartItems = Cart::getCartItems();
        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::query()->whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return view('cart.index', compact('cartItems', 'products', 'total'));//ekhan hote cart/index.blade a data jabe
    }//end method

    public function add(Request $request, Product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();

        if($user){
            $cartItem = CartItem::where(['user_id' => $user->id,'product_id' => $product->id])->first();

            if($cartItem){
                $cartItem->quantity += $quantity;
                $cartItem->update();

            }else {
                $data = [
                    'user_id' => $request->user()->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ];
                CartItem::create($data);
            }

            return response([
                'count' => Cart::getCartItemsCount(),

            ]);

        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            $productFound = false;
            foreach ($cartItems as &$item){
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] += $quantity;
                    $productFound = true;
                    break;
                }
            }
            if (!$productFound) {
                $cartItems[] = [
                    'user_id' => null,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ];
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);

            return response(['count' => Cart::getCountFromItems($cartItems)]);

        }


    }//end method

    public function remove(Request $request, Product $product)
    {
        $user = $request->user();
        if ($user) {
            $cartItem = CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                $cartItem->delete();
            }

            return response([
                'count' => Cart::getCartItemsCount(),
            ]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            foreach ($cartItems as $i => &$item) {
                if ($item['product_id'] === $product->id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);

            return response(['count' => Cart::getCountFromItems($cartItems)]);
        }

    }//end method

    public function updateQuantity(Request $request, Product $product)
    {
        $quantity = (int)$request->post('quantity');
        $user = $request->user();

       /* if ($product->quantity !== null && $product->quantity < $quantity) {
            return response([
                'message' => match ( $product->quantity ) {
                    0 => 'The product is out of stock',
                    1 => 'There is only one item left',
                    default => 'There are only ' . $product->quantity . ' items left'
                }
            ], 422);
        }*/

        if ($user) {
            CartItem::where(['user_id' => $request->user()->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);

            return response([
                'count' => Cart::getCartItemsCount(),
            ]);
        } else {
            $cartItems = json_decode($request->cookie('cart_items', '[]'), true);
            foreach ($cartItems as &$item) {
                if ($item['product_id'] === $product->id) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
            Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 30);

            return response(['count' => Cart::getCountFromItems($cartItems)]);
        }
    }//end method

    public function checkout(Request $request)
    {
        Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

        $cartItems = Cart::getCartItems();
        dd($cartItems);

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
          ]);


    }//end method



    }



