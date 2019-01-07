<?php

namespace Untrefmedia\UMUsers\App\Http\Controllers\Admin;

use App\Admin;
use App\User;
use Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use Session;
use Untrefmedia\UMUsers\App\Http\Requests\UserRequest;
use Yajra\Datatables\Datatables;

class UserController extends BaseController
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('umusers::models.user.collection');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umusers::models.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();

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

        $args = [
            'user' => $user
        ];

        return view('umusers::models.user.edit', $args);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $user->name  = $request->user;
        $user->email = $request->email;
        $user->save();

        Session::flash('guardado', 'Editado correctamente');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('guardado', 'Eliminado correctamente');

        return back();

    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function dataList()
    {
        return Datatables::of(User::query())
            ->addColumn('action', function ($user) {
                $button_edit = '<a href="' . URL::to("/") . '/admin/user/' . $user->id . '/edit   " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';

                $button_delete =
                '<form method="post" action="user/' . $user->id . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">

                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="glyphicon glyphicon-remove"></i> Delete
                    </button>
                </form>';

                return '<span style="display: inline-block;">' . $button_edit . '</span> <span style="display: inline-block;">' . $button_delete . '</span>';

            })->make(true);
    }
}
