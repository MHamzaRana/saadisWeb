<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Web\Home;
use App\Models\Product;
use App\Models\City;
use App\Models\Country;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
// use iterable;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newArrivals = Product::orderBy('id', 'desc')->limit(6)->get();
        $binSaeed = Product::where('brand', 'Bin Saeed')->orderBy('id', 'desc')->limit(6)->get();
        $alaaya = Product::where('brand', 'Alaaya')->orderBy('id', 'desc')->limit(6)->get();
        // dd($newArrivals);
        return view('web.pages.home', [
            'newArrivals' => $newArrivals, 'binSaeed' => $binSaeed,
            'alaaya' => $alaaya
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function explore($item = 'new-arrival', Request $request)
    {
        $search = $request->input('search');
        switch ($item) {
            case 'all-collections':
                if ($search)
                    $products = Product::where('status', "publish")->where('name', 'LIKE', "%{$search}%")->orderBy('id', 'desc')->paginate(20);
                else
                    $products = Product::where('status', "publish")->orderBy('id', 'desc')->paginate(20);

                $banner = asset('theme/images/all-collections.jpg');
                $title = 'All Collections';
                break;

            case 'bin-saeed':
                $products = Product::where('status', "publish")->where('brand', 'Bin Saeed')->orderBy('id', 'desc')->paginate(20);
                $banner = asset('theme/images/bin-saeed-01.png');
                $title = 'Bin Saeed';
                break;
            case 'alaaya':
                $products = Product::where('status', "publish")->where('brand', 'Alaaya')->orderBy('id', 'desc')->paginate(20);
                $banner = asset('theme/images/alaaya.jpg');
                $title = 'Alaaya';
                break;
            case 'today-deal':
                $products = Product::where('status', "publish")->where('created_at', Carbon::now()->toDateTimeString())->orderBy('id', 'desc')->paginate(20);
                $banner = asset('theme/images/alaaya.jpg');
                $title = 'Today`s Deal';
                break;
            case 'best-seller':
                $products = Inventory::where('qty', '!=', 0)->with(['product'])->orderBy('shipped', 'desc')->paginate(20);
                $banner = asset('theme/images/new-arrival.jpg');
                $title = 'Best Seller';
                break;

            default:
                $products = Product::where('status', "publish")->where('created_at', '>=', Carbon::now()->subDays(5)->toDateTimeString())
                    ->orderBy('id', 'desc')->paginate(20);
                $banner = asset('theme/images/new-arrival.jpg');
                $title = 'New Arrival';
                break;
        }

        // $banner = asset('theme/images/bin-saeed-01.png');
        // dd($products);
        return view('web.pages.explore', ['products' => $products, 'banner' => $banner, 'title' => $title]);
    }

    public function customerService() {
        $cities = City::all();
        $countries = Country::all();
        $banner = asset('theme/images/banner.png');
        return view('web.pages.customer-service', [
            'banner' => $banner,
            'cities' => $cities,
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
    public function storeCMsg(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "name" => "required|min:2",
            "phone" => "required|min:7",
            "secondary_phone" => "string|nullable|min:7",
            "message" => "string|min:10|max:256",
            "city" => "string",
            "country" => "string"

        ]);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator->errors());
        }
        $name = strip_tags($request->input('name'));
        $phone = $request->input('phone');
        $secondary_phone = $request->input('secondary_phone');
        $messageString = strip_tags($request->input('message'));
        $city = $request->input('city');
        $country = $request->input('country');
        $client_ip = $request->ip();
        $last_entry = Message::where('client_ip',$client_ip)->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-1 hour')))->first();
        if($last_entry){
            $msgBag = new MessageBag();
            $msgBag->add('time','You already have submitted a query within last hour.');
            return redirect()->back()->withErrors($msgBag);
        }
        DB::beginTransaction();
        try {
            $message = new Message();
            $message->name = $name;
            $message->phone = $phone;
            $message->secondary_phone = $secondary_phone;
            $message->message = $messageString;
            $message->city = $city;
            $message->country = $country;
            $message->client_ip = $client_ip;
            $message->save();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->withErrors($ex->getMessage());
        }
        return redirect()->route('customer-service')->with('success', 'Your querry has been submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Web\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
