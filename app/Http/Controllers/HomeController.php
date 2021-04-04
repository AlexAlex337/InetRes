<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Процент скидки
        $discount =  DB::table('discounts')
            ->select('discounts.discount_percent')
            ->where('discounts.user_id', '=', Auth::user()->id)
            ->get();

        //Прошлые записи на автомойку
        $pastrecords = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('prices', 'prices.id', '=', 'orders.price_id')
            ->select('prices.name', 'orders.time', 'orders.sum')
            ->where('users.email', '=', Auth::user()->email)
            ->where('orders.time', '<', 'now()')
            ->orderBy('orders.time', 'desc')
            //->get();
            ->paginate(3, ['*'], 'past');

        //Будущие записи на автомойку
        $futurerecords = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('prices', 'prices.id', '=', 'orders.price_id')
            ->select('prices.name', 'orders.time', 'orders.sum', 'orders.id')
            ->where('users.email', '=', Auth::user()->email)
            ->where('orders.time', '>', 'now()')
            ->orderBy('orders.time', 'asc')
            //->get();
            ->paginate(3, ['*'], 'future');

        return view('home',  ['pastrecords' => $pastrecords, 'futurerecords' => $futurerecords, 'discount' => $discount]);
    }
}
