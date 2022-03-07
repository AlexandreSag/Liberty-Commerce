<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orders;
use App\Providers\RouteServiceProvider;
use Brick\Math\BigInteger;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

use function PHPSTORM_META\type;

class OrderController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $last_orders = Orders::latest()->first();
        if($last_orders == NULL){
            $last = 1;
        }
        else{
            $last = $last_orders->order_id;
            $last++;
        }

        
        $tab = $request->product;
        $tab = explode(',', $tab);
        
        $tab1 = array_chunk($tab, 3);
        foreach($tab1 as $table){
            $order = new Orders();

            $order->user_id = $request->user_id;
            $order->order_id = $last;
            $order->product_id = $table[0];
            $order->amount = $table[1];
            $order->total_order = $table[2];

            $order->save();
        }

        OrderController::storeTxtOrders();
        OrderController::storeTxtBestOrder();

        return view('cart.orderC');
    }

    public static function storeTxtOrders(){
        $last_orders = Orders::latest()->first();
        if($last_orders == NULL){
            $last = 0;
        }
        else{
            $last = $last_orders->order_id;
        }

        $last_txt = "<p>Orders' Total = ".$last."<p>";

        Storage::disk('my_files')->put("js/import/N_Orders.txt", $last_txt);
    }

    public static function storeTxtBestOrder(){
        $best_order = Orders::orderBy('total_order', 'DESC')->orderBy('order_id', 'DESC')->orderBy('id', 'DESC')->first();
        $best = "<p>Best Order : OrderId = ".$best_order->order_id." Total = ".$best_order->total_order."<p>";
        Storage::disk('my_files')->put("js/import/Best_Orders.txt", $best);
    }

}
