<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StockController extends Controller
{
    public function show($id)
    {

        $product = Product::find($id);

        return view('stocks.show', [
            'product' => $product
        ]);
    }

}
