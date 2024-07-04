<?php

namespace App\Http\Helpers;

use App\Models\CartItem;
//use App\Http\Controllers\Controller;



 class Cart
 {

    public static function getCartItemsCount()
    {

        $request = \request();
        $user = $request->user();
        if($user){
            return CartItem::where('user_id', $user->id)->sum('quantity');
        }else{
            $cartItems = self::getCookiesCartItems();

            return array_reduce(
                $cartItems,
                fn($carry, $item)=> $carry + $item['quantity'],
                0

            );
        }

    }

    public static function getCartItems()
    {
        $request = \request();
        $user = $request->user();

        if($user){
            return CartItem::where('user_id', $user->id)->get()->map(
                fn($item) => ['product_id' => $item->product_id, 'quantity' => $item->quantity]

            );
        } else {
            return self::getCookiesCartItems();
        }

    }

    public static function getCookiesCartItems()
    {
        $request = \request();

        return json_decode($request->cookie('cart_items', '[]'), true);


    }

    public static function getCountFromItems($cartItems)
    {
        return array_reduce(
            $cartItems,
            fn($carry, $item) => $carry + $item['quantity'],
            0
        );


    }
    public static function moveCartItemsInToDb()
    {
        $request = \request();
        $cartItems = Self::getCookiesCartItems();
        $dbCartItems = CartItem::where(['user_id' => $request->user()->id])->get()->keyBy('product_id');
        $newCartItems = [];
        foreach($cartItems as $cartItem){
            if(isset($dbCartItems[$cartItem['product_id']])){
                continue;
            }
            $newCartItems[] = [
                'user_id' => $request->user()->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
            ];
        }
        if(!empty($newCartItems)){
            CartItem::insert($newCartItems);
        }


    }


 }


