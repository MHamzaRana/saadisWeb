<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Home;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
                if($search)
                $products = Product::where('status',"publish")->where('name','LIKE',"%{$search}%")->orderBy('id', 'desc')->paginate(20);
                else
                $products = Product::where('status',"publish")->orderBy('id', 'desc')->paginate(20);

                $banner = asset('theme/images/all-collections.jpg');
                $title = 'All Collections';
                break;

            case 'bin-saeed':
                $products = Product::where('status',"publish")->where('brand', 'Bin Saeed')->orderBy('id','desc')->paginate(20);
                $banner = asset('theme/images/bin-saeed-01.png');
                $title = 'Bin Saeed';
                break;
            case 'alaaya':
                $products = Product::where('status',"publish")->where('brand', 'Alaaya')->orderBy('id','desc')->paginate(20);
                $banner = asset('theme/images/alaaya.jpg');
                $title = 'Alaaya';
                break;
            case 'today-deal':
                $products = Product::where('status',"publish")->where('created_at', Carbon::now()->toDateTimeString())->orderBy('id','desc')->paginate(20);
                $banner = asset('theme/images/alaaya.jpg');
                $title = 'Today`s Deal';
                break;
                
            default:
                $products = Product::where('status',"publish")->where('created_at', '>=', Carbon::now()->subDays(5)->toDateTimeString())
                ->orderBy('id', 'desc')->paginate(20);
                $banner = asset('theme/images/new-arrival.jpg');
                $title = 'New Arrival';
                break;
        }

        // $banner = asset('theme/images/bin-saeed-01.png');
        // dd($products);
        return view('web.pages.explore', ['products' => $products, 'banner' => $banner, 'title' => $title]);
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
