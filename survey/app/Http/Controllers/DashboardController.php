<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Commodity;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approvedCommodities = Commodity::where([['status', '=' ,'APPROVED'],['users_id', '=', Auth::user()->id]])->count();
        $unapprovedCommodities = Commodity::where('status', 'UNAPPROVED')->count();

        return view('pages.surveyor.dashboard', [
            'approvedCommodities' => $approvedCommodities,
            'unapprovedCommodities' => $unapprovedCommodities
        ]);
    }
}
