<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Enums\AddressType;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = ['first_name', 'last_name', 'phone', 'status'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    private function getAddress(): HasOne
    {
        return $this->hasOne(CustomerAddress::class, 'customer_id', 'user_id');
    }

    public function shippingAddress(): HasOne
    {
        return $this->getAddress()->where('type', AddressType::Shipping->value);
    }

    public function billingAddress(): HasOne
    {
        return $this->getAddress()->where('type', AddressType::Billing->value);
    }
}
