<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Store;
use App\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = [];
        setlocale(LC_MONETARY, 'es_MX.UTF-8');
        if ($request->store_id) {
            $stores = auth()->user()->stores;
            foreach ($stores as $store) {
                if ($request->store_id == $store->id) {
                    $customer_sales = Customer::getCustomerSales($store->id);
                    $customers_by_store = Customer::where('store_id', '=', $store->id)->paginate(10);

                    // adding amount property to customers_by_store
                    foreach ($customers_by_store as $customer) {
                        $amount = Sale::where('customer_id', '=', $customer->id)->select(
                            DB::raw('SUM(qty * price) as amount')
                        )->get()[0]->amount;
                        $customer['amount'] = $amount ? number_format($amount, 2, '.', ',') : 0;
                    }

                    return [
                        'customers_data' => [
                            'total_customers' => $customer_sales->count(),
                            'total_amount' => number_format($customer_sales->sum('amount'), 2, '.', ',')
                        ],
                        'pagination' => [
                            'total' => $customers_by_store->total(),
                            'current_page' => $customers_by_store->currentPage(),
                            'per_page' => $customers_by_store->perPage(),
                            'last_page' => $customers_by_store->lastPage(),
                            'from' => $customers_by_store->firstItem(),
                            'to' => $customers_by_store->lastPage(),
                        ],
                        'customers' => $customers_by_store
                    ];
                }
            }
        } else {
            foreach (auth()->user()->stores as $store) {
                $c = Store::find($store->id);

                if (count($c->customers) > 0)
                    foreach ($c->customers as $customer) {
                        array_push($customers, $customer);
                    }
            }
        }
        return response()->json($customers, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
