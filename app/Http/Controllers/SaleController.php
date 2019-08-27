<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleItem;
use App\Product;
use DB;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sale::orderBy('id', 'desc')->with('customer')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO validate unique product id in items
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer'
        ]);

        $itemsPayload = collect($request->items);

        $items = $itemsPayload->map(function ($item) {
            $product = Product::find($item['product_id']);
            return [
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $product->price,
                'subtotal' => $product->price * $item['qty'],
            ];
        });

        $total = $items->pluck('subtotal')->sum();

        return DB::transaction(function () use ($request, $total, $items) {

            $sale = Sale::create([
                'customer_id' => $request->input('customer_id'),
                'total' => $total
            ]);

            SaleItem::insert(
                $items->map(function ($item) use ($sale) {
                    return array_merge($item, ['sale_id' => $sale->id]);
                })->toArray()
            );

            $sale->load('customer', 'items');

            return $sale;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $sale->load(['items.product', 'customer']);
        return $sale;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
