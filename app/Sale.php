<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $guarded = [];

    public function scopeFilterByNameBarcodeAndBrand($query, $userInput)
    {
        return $query->where('name', 'like', '%' . $userInput . '%')
            //->orWhere('name', 'like', '%' + $userInput + '%')
        ;
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function details()
    {
        return $this->hasMany('App\SalesProducts');
    }

    public function scopeGetProductsSold($query)
    {
        return $query;
    }

    public function scopeGetSalesIndex($query, $conditions)
    {
        return $query
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->where($conditions)
            ->select(
                'sales.id',
                'sales.total',
                'sales.customer_id',
                'sales.received',
                'sales.change',
                'sales.created_at',
                'users.name as user_name',
                'sales.customer_id',
            )->orderBy('sales.created_at', 'desc')->paginate(8);
    }

    public function scopeGetSalesBySearchBox($query, $conditions, $user_input)
    {
        return $query
            ->join('sales_products', function ($join) use ($user_input) {
                $sp = $join->on('sales.id', '=', 'sales_products.sale_id')
                    ->join('products', 'sales_products.product_id', '=', 'products.id');
                // In case user is using the search box
                if ($user_input) {
                    $sp->where(
                        function ($query) use ($user_input) {
                            $query->where('sales_products.name', 'like', '%' . $user_input . '%')
                                ->orWhere('products.bar_code', 'like', '%' . $user_input . '%');
                            //->orWhere(function ($query) use ($user_input)
                            //     $query->join('products', 'products.id', '=', 'sales_products.product_id')
                            //     ->where('products.bar_code', 'like', '%' . $user_input . '%');
                            // });
                        }
                    );
                }
            })
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->where($conditions)
            ->select(
                'sales.id',
                'sales.total',
                'sales.customer_id',
                'sales.received',
                'sales.change',
                'sales.created_at',
                'users.name as user_name',
                'sales.customer_id',
            )->orderBy('sales.created_at', 'desc')
            ->paginate(8);
    }

    public function scopeGetSalesDataBySearchBox($query, $conditions, $user_input)
    {

        return DB::table('sales_products')
            //->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->join('products', function ($join) use ($user_input) {
                $products = $join->on('sales_products.product_id', '=', 'products.id');
                // In case user is using the search box
                if ($user_input) {
                    $products->where(
                        function ($query) use ($user_input) {
                            $query->where('sales_products.name', 'like', '%' . $user_input . '%')
                                ->orWhere('products.bar_code', 'like', '%' . $user_input . '%');
                            //->orWhere(function ($query) use ($user_input)
                            //     $query->join('products', 'products.id', '=', 'sales_products.product_id')
                            //     ->where('products.bar_code', 'like', '%' . $user_input . '%');
                            // });
                        }
                    );
                }
            })
            ->join('sales', 'sales.id', '=', 'sales_products.sale_id')
            ->where($conditions);
    }
}
