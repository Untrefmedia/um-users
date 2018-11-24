<?php


namespace Untrefmedia\UMUsers;

use Illuminate\Routing\Controller as BaseController;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\URL;

class UMUsersController extends BaseController
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('umusers::collection');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        return Datatables::of(\App\User::query())
            ->addColumn('action', function ($user) {
            return '<a href="'.URL::to("/").'/admin/users/'.$user->id.'/edit   " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })->make(true);
    }

}