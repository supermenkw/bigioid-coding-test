<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;
use Auth;

class AccountController extends Controller
{
            /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $test = Auth::user();

        $item = User::findOrFail($test->id);

        return view('pages.surveyor.account.index', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $test = Auth::user();

        $item = User::findOrFail($test->id);

        $data = $request->all();

        $request->validate([
            'name' => 'required|string|max:30',
            'email' => "required|unique:usr_users,email,$item->id",
            'photo' => 'required|image',
        ]);

        $data['photo'] = $request->file('photo')->store('assets/account', 'public');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $item->update($data);

        return redirect()->route('surveyor-account.index');
    }
}
