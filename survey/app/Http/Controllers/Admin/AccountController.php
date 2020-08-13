<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use App\User;

class AccountController extends Controller
{
            /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = User::findOrFail(Auth::user()->id);
        $users = User::all();

        return view('pages.admin.account.index', [
            'item' => $item
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $item = User::findOrFail(Auth::user()->id);

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

        return redirect()->route('account.index');
    }
}

