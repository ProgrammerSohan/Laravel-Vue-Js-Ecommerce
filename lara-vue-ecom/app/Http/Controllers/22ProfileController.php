<?php
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Enums\AddressType;

class ProfileController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $customer = Customer::with('billingAddress', 'shippingAddress')->where('user_id', $user->id)->first();

        if (!$customer) {
            // Handle the case where the customer is not found
            // For example, you might want to create a new Customer instance
            $customer = new Customer(['user_id' => $user->id]);
            $customer->save();
        }

        $countries = Country::all(); // Assuming you have a Country model

        return view('profile', compact('user', 'customer', 'countries'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer) {
            // Handle the case where the customer is not found
            // For example, you might want to create a new Customer instance
            $customer = new Customer(['user_id' => $user->id]);
        }

        $customer->fill($request->only(['first_name', 'last_name', 'phone']));
        $customer->save();

        $customer->billingAddress()->updateOrCreate(
            ['type' => AddressType::Billing->value],
            $request->input('billing')
        );

        $customer->shippingAddress()->updateOrCreate(
            ['type' => AddressType::Shipping->value],
            $request->input('shipping')
        );

        return redirect()->route('profile')->with('flash_message', 'Profile updated successfully!');
    }
}
