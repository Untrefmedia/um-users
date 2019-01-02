<?php

namespace Untrefmedia\UMUsers\App\Http\Controllers;

use App\Admin;
use App\User;
use Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use Session;
use Untrefmedia\UMUsers\App\Http\Requests\UserRequest;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = ['User' => 'User', 'Admin' => 'Admin'];

        $args = [
            'type' => $type
        ];

        return view('umusers::create', $args);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        switch ($request->type) {
            case 'User':
                $user = new User();
                break;

            case 'Admin':
                $user = new Admin();
                break;

            default:
                $user = new User();
                break;
        }

        $user->name     = $request->name;
        $user->password = Hash::make($request->password);
        $user->email    = $request->email;
        $user->save();

        Session::flash('guardado', 'creado correctamente');

        return back();
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('umusers::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

// public function update(UserRequest $request, $id)

// {

//     $user        = User::find($id);

//     $user->name  = $request->user;

//     $user->email = $request->email;

//     $user->save();

//     $userdata          = Userdata::where('user_id', $id)->get()->first();

//     $userdata->name    = $request->name;

//     $userdata->surname = $request->surname;

//     $userdata->save();

//     $user->syncRoles($request->rol);

//     Session::flash('guardado', 'Editado correctamente');

//     return back();

// }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

// public function destroy($id)

// {

//     //

// }

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

}
