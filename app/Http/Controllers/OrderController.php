<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prices = Price::get();
        return view('order.form', compact('prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // $checkbusy = DB::table('orders')
        // ->select('orders.id')
        // ->whereBetween($request->time, ['orders.time', 'orders.time+interval 1 hour'])
        // ->get();
        // dd($checkbusy);

        $discount =  DB::table('discounts')
            ->select('discounts.discount_percent')
            ->where('discounts.user_id', '=', Auth::user()->id)
            ->get();
        $discount = json_decode(json_encode($discount), true);

        $price =  DB::table('prices')
            ->select('prices.price')
            ->where('prices.id', '=', $request->price_id)
            ->get();
        $price = json_decode(json_encode($price), true);
        $price = (float)$price[0]['price'];
        if (isset($discount[0])) {
            //Скидка есть
            //Процент скидки $discount[0]['discount_percent']
            $sum = $price / 100 * (100 - $discount[0]['discount_percent']);
            DB::table('orders')->insert([
                'user_id' => Auth::user()->id,
                'price_id' => $request->price_id,
                'time' => $request->time,
                'sum' => $sum
            ]);
        }
        else {
            //Скидка отсутствует
            $sum = $price;
            DB::table('orders')->insert([
                'user_id' => Auth::user()->id,
                'price_id' => $request->price_id,
                'time' => $request->time,
                'sum' => $sum
            ]);
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('orders')->where('id', '=', $id)->delete();
        return redirect()->route('home');
    }
}
