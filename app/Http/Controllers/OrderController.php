<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\City;
use App\Models\Country;
use App\Models\Inventory;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request)
    {
        $itemsIds = [];
        $items = $request->input('items');
        if ($items) {
            $itemsIds = json_decode($items);
        }
        // dd($itemsIds);
        $products = Product::whereIn('id', $itemsIds)->orderBy('id', 'desc')->get();
        // dd($products);
        $banner = asset('theme/images/all-collections.jpg');
        $cities = City::all();
        $countries = Country::all();
        return view('web.pages.cart', [
            'products' => $products, 'title' => 'Cart', 'banner' => $banner, 'cities' => $cities,
            'countries' => $countries
        ]);
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
        // dd(Order::all());
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2",
            "phone" => "required|min:7",
            "secondary_phone" => "string|nullable|min:7",
            "items" => "string|required",
            "shipment_address" => "string|min:10",
            "city" => "string",
            "country" => "string",
            "qty" => "array|required|min:1",

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $name = strip_tags($request->input('name'));
        $phone = $request->input('phone');
        $secondary_phone = $request->input('secondary_phone');
        $items = $request->input('items');
        $shipment_address = strip_tags($request->input('shipment_address'));
        $city = $request->input('city');
        $country = $request->input('country');
        $quantity = $request->input('qty');
        $user = User::where('phone', $phone)->first();
        $ids = [];
        
        DB::beginTransaction();
        try {
            // $items = json_decode($items);
            foreach ($quantity as $id => $qty) {
                array_push($ids, substr($id, 3));
            }
            $products = Product::whereIn('id', $ids)->get();
            if (!$user) {
                $user = new User();
                $user->type = 'customer';
                $user->phone = $phone;
            }
            $user->name = $name;
            $user->secondary_phone = $secondary_phone;
            $user->country = $country;
            $user->city = $city;
            $user->shipment_address = $shipment_address;
            $user->save();

            $order = new Order();
            $order->key = $this->generateRandomString(8);
            $order->title = $products[0]->name . ' & other for ' . $user->phone;
            $order->name = $name;
            $order->phone = $user->phone;
            $order->user_id = $user->id;
            $order->secondary_phone = $secondary_phone;
            $order->shipment_address = $shipment_address;
            $order->city = $city;
            $order->country = $country;
            $order->status = 'pending';
            $order->type = 'cod';
            $order->price = '-';
            $order->qty = '-';
            $order->save();
            $price = 0;
            $totalQty = 0;
            foreach ($products as $product) {
                if ($product->inventory && intval($product->inventory->qty) > 0) {
                    $productInventory = intval($product->inventory->qty);
                    $orderedQty = intval($quantity['pid' . $product->id]);
                    $orderProduct = new OrderProduct();
                    $orderProduct->product_id = $product->id;
                    $orderProduct->order_id = $order->id;
                    if ($productInventory >= $orderedQty) {
                        $orderProduct->qty = $orderedQty;
                        $updatedQty = $productInventory - $orderedQty;
                        $shipped = intval($product->inventory->shipped) + $orderedQty;
                        $product->inventory->update(
                            [
                                'qty' => $updatedQty,
                                'shipped' => $shipped
                            ]
                        );
                        $price += intval($product->price) * $orderedQty;
                        $totalQty += $orderedQty;
                        $orderProduct->save();
                    } else {
                        $orderProduct->qty = $productInventory;
                        $updatedQty = 0; // $productInventory - $productInventory
                        $shipped = intval($product->inventory->shipped) + $productInventory;
                        $product->inventory->update(
                            [
                                'qty' => $updatedQty,
                                'shipped' => $shipped
                            ]
                        );
                        $price += intval($product->price) * $productInventory;
                        $totalQty += $productInventory;
                        $orderProduct->save();
                    }
                }
            }
            $order->qty = $totalQty;

            if ($totalQty <= 2)
                $deliveryCharges = 125;
            else if ($totalQty > 2 && $totalQty <= 5)
                $deliveryCharges = 250;
            else if ($totalQty > 5 && $totalQty <= 10)
                $deliveryCharges = 500;
            else if ($totalQty > 10 && $totalQty <= 15)
                $deliveryCharges = 750;
            else if ($totalQty > 15 && $totalQty <= 20)
                $deliveryCharges = 1000;
            else if ($totalQty > 20 && $totalQty <= 25)
                $deliveryCharges = 1250;
            else if ($totalQty > 25 && $totalQty <= 30)
                $deliveryCharges = 1500;

            $order->price = $price + $deliveryCharges;
            $order->delivery_charges = $deliveryCharges;
            $order->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->withErrors($ex->getMessage());
        }
        $order = Order::find($order->id)->with(['orderProducts'])->first();
        return view('web.pages.order-success', ['order' => $order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $order = Order::find(13)->with(['orderProducts'])->first();
        return view('web.pages.order-success', ['order' => $order]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($characters), 0, $length);

        return $randomString;
    }
}
