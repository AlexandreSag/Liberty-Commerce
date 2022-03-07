<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Providers\RouteServiceProvider;

class UploadController extends Controller
{
    
    public function index(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:30',
            'file' => 'required|image',
            'description' => 'required', 'string', 'max:1000',
            'price' => 'required', 'integer', 'max:100000',
            'year' => 'required', 'integer', "max:3000",
            'quantity' => 'required', 'integer',
        ]);

        $path = $request->file('file')->store('image', ['disk' => 'my_files']);
        UploadController::store($request, $path);

        return redirect(RouteServiceProvider::HOME);

    }

    public static function store(Request $request, $path)
    {

        $product = new Product;

        $product->title = $request['title'];
        $product->picture_link = $path;
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->year = $request['year'];
        $product->quantity = $request['quantity'];

        $product->save();

        return 0;
    }
}
