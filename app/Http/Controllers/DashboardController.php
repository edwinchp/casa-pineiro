<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $stores = [];
        foreach (auth()->user()->stores as $store) {
            array_push($stores, $store->id);
        }

        $conditions = ['created_at', '>=', CarbonImmutable::now()->locale('es_mx')->startOfWeek()];

        $products = Product::whereIn('store_id', $stores)->where('status', 'A')->get();
        $sales = Sale::whereIn('store_id', $stores)->where([$conditions])->get();
        $salesCount = Sale::whereIn('store_id', $stores)->where([$conditions])->get();

        setlocale(LC_MONETARY, 'es_MX.UTF-8');

        return view('index', [
            'accessToken' => null,
            'sales' => number_format($sales->sum('total'), 2, '.', ','),
            'salesCount' => count($salesCount),
            'products' => number_format(count($products), 0, null, ',')
        ]);
    }

    public function indexApi()
    {
        $stores = [];
        foreach (auth()->user()->stores as $store) {
            array_push($stores, $store->id);
        }

        $monthFilter = ['created_at', '>=', CarbonImmutable::now()->locale('es_mx')->startOfMonth()];
        $todayFilter = ['created_at', '>=', CarbonImmutable::now()->locale('es_mx')->today()];

        $products = Product::whereIn('store_id', $stores)->where('status', 'A')->get();
        $monthSales = Sale::whereIn('store_id', $stores)->where([$monthFilter])->get();
        $todaySales = Sale::whereIn('store_id', $stores)->where([$todayFilter])->get();
        //$salesCount = Sale::whereIn('store_id', $stores)->where([$monthFilter])->get();

        setlocale(LC_MONETARY, 'es_MX.UTF-8');

        return [
            'accessToken' => null,
            'today' => number_format($todaySales->sum('total'), 2, '.', ','),
            'month' => number_format($monthSales->sum('total'), 2, '.', ','),
            'products' => number_format(count($products), 0, null, ',')
        ];
    }
}
