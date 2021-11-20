<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private $food;
    private $category;
    public function __construct(Food $food, Category $category)
    {
        $this->food = $food;
        $this->category = $category;
    }

    public function index()
    {
        $customer = Customer::all();
        $listFood = Food::paginate(9);
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [

            "q" => "HaNoi",

            "appid" => "bd563c8782b8e0fe320695d90b8beec1"

        ] );

        $data = json_decode($response->body());

        $currentTime = time();
        return view('welcome', compact('listFood','customer','data', 'currentTime'));
    }

    public function search(Request $request)
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [

            "q" => "HaNoi",

            "appid" => "bd563c8782b8e0fe320695d90b8beec1"

        ] );

        $data = json_decode($response->body());

        $currentTime = time();


        $product = Food::where('name','like','%'.$request->key.'%')
                            ->orWhere('price', $request->key)
                            ->paginate(4);
        return view('frontend.foods.search', compact('product','data', 'currentTime'));
    }

    public function bestSell()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [

            "q" => "HaNoi",

            "appid" => "bd563c8782b8e0fe320695d90b8beec1"

        ] );

        $data = json_decode($response->body());

        $currentTime = time();
        //$categories = Category::all();
//        $product->category()->where('name','like','%'.'Top Sell'.'%')->paginate(4);
        $food = Category::where('name','=','Drinks')->first();
        $product = $food->food()->paginate(4);
//        dd($product);
        return view('frontend.foods.bestSell', compact('product','data', 'currentTime'));
    }

    public function discount()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [

            "q" => "HaNoi",

            "appid" => "bd563c8782b8e0fe320695d90b8beec1"

        ] );

        $data = json_decode($response->body());

        $currentTime = time();
        $food = Category::where('name','=','Discount')->first();
        $product = $food->food()->paginate(4);
        return view('frontend.foods.discount', compact('product','data', 'currentTime'));
    }
    public function fastFood()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [

            "q" => "HaNoi",

            "appid" => "bd563c8782b8e0fe320695d90b8beec1"

        ] );

        $data = json_decode($response->body());

        $currentTime = time();
        $food = Category::where('name','=','Fast Food')->first();
        $product = $food->food()->paginate(4);
        return view('frontend.foods.fastFood', compact('product','data', 'currentTime'));
    }




}
