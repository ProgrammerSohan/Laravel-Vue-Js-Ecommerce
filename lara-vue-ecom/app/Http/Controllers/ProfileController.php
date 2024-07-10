<?php

namespace App\Http\Controllers;

use App\Enums\AddressType;
use App\Models\Country;
use App\Models\CustomerAddress;
use App\Http\Requests\ProfileRequest;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function view(Request $request)
    {
        $user = $request->user();
        $customer = $user->customer;
        //ensure the customer exists
       /* if(!$customer){
            $customer = new Customer(['user_id' => $user->id]);
            $customer->save();
        }*/

       $shippingAddress = $customer->shippingAddress ?: new CustomerAddress(['type' => AddressType::Shipping]);
        $billingAddress = $customer->billingAddress ?: new CustomerAddress(['type' => AddressType::Billing]);
       // dd($customer, $shippingAddress->attributesToArray(), $billingAddress, $billingAddress->customer);
        $countries = Country::query()->orderBy('name')->get();
        return view('profile.view',compact('customer','user','shippingAddress','billingAddress','countries'));
    }//end method
}
