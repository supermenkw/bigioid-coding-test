<?php

namespace App\Http\Controllers\Admin;

use App\Commodity;
use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommodityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



use Yajra\DataTables\Facades\DataTables;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Commodity::with(['surveyor', 'approvedBy', 'categories']);

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button"
                                    data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <form action="'. route('status.change', $item->id) .'" method="POST">
                                        '. method_field('PUT') . csrf_field() .'
                                        <button type="submit" class="dropdown-item primary-danger text-primary font-weight-bold">
                                            Change Status
                                        </button>
                                    </form>
                                    <a class="dropdown-item font-weight-bold" href="'. route('commodities.edit', $item->id) .'">
                                        Edit
                                    </a>
                                    <form action="'. route('commodities.destroy', $item->id) .'" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button type="submit" class="dropdown-item text-danger font-weight-bold">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.commodity.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.commodity.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommodityRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        Commodity::create($data);

        return redirect()->route('commodities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Commodity::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.commodity.edit', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    public function status(Request $request, $id)
    {
        $item = Commodity::findOrFail($id);

        if ($item->status === 'UNAPPROVED') {
            $item->status = 'APPROVED';
        } else {
            $item->status = 'UNAPPROVED';
        }
        

        $item->update();

        return redirect()->route('commodities.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Commodity::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('commodities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Commodity::findOrFail($id);

        $item->delete();

        return redirect()->route('commodities.index');
    }
}
