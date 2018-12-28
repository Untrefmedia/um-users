<?php

namespace Untrefmedia\UMUsers\App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use Yajra\Datatables\Datatables;

class UMUsersController extends BaseController
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('umusers::collection');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function dataList()
    {
        return Datatables::of(User::query())
            ->addColumn('action', function ($user) {
                return '<a href="' . URL::to("/") . '/admin/users/' . $user->id . '/edit   " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->make(true);
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        return view('umusers::edit', ['user' => User::find($id)]);
    }
}
