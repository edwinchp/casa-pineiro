<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }


    /**
     * Return all the customers by store including the customer's amount.
     */
    public function scopeGetCustomerSales($query, $store_id)
    {
        $customers_by_store = Customer::where('store_id', '=', $store_id)->get();

        foreach ($customers_by_store as $customer) {
            $amount = Sale::where('customer_id', '=', $customer->id)->select(
                DB::raw('SUM(qty * price) as amount')
            )->get()[0]->amount;
            $customer['amount'] = $amount ?: 0;
        }


        return $customers_by_store;
    }
}
