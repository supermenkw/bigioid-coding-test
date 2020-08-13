<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Commodity;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index() {

        $surveyors = User::where('roles', 'SURVEYOR')->count();
        $commodities = Commodity::where('status', 'APPROVED')->count();

        return view('pages.admin.dashboard', [
            'surveyors' => $surveyors,
            'commodities' => $commodities,
        ]);
    }
}
