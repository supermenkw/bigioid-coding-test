<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Commodity;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(4)->get();
        $commodities = Commodity::where('status', 'APPROVED')->take(8)->get();

        return view('pages.home', [
            'categories' => $categories,
            'commodities' => $commodities,
        ]);
    }
}
