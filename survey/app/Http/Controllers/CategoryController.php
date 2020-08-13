<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Commodity;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $commodities = Commodity::where('status', 'APPROVED')->paginate(20);

        return view('pages.categories', [
            'categories' => $categories,
            'commodities' => $commodities
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $commodities = Commodity::where([['categories_id', '=',$category->id],['status', '=', 'APPROVED']])->paginate(20);

        return view('pages.categories', [
            'categories' => $categories,
            'commodities' => $commodities
        ]);
    }
}
