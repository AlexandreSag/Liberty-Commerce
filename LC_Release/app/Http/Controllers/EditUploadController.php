<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Providers\RouteServiceProvider;

class EditUploadController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required', 'string', 'max:30',
            'description' => 'required', 'string', 'max:1000',
            'picture_link' => 'required',
            'price' => 'required', 'integer', 'max:100000',
            'year' => 'required', 'integer', "max:3000",
            'quantity' => 'required', 'integer',
        ]);

        $data = Product::find($request->id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->picture_link = $request->picture_link;
        $data->price = $request->price;
        $data->year = $request->year;
        $data->quantity = $request->quantity;

        $data->save();
        
        return redirect()->route('products.show', [$request->id]);

    }
}