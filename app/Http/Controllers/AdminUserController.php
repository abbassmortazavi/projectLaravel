<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name' , 'id')->all();
        return view('admin.users.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if (is_null(trim($request->password)))
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id'))
        {
            $fileName = time() . $file->getClientOriginalName();
            $path = "images/users/";
            $file->move(public_path($path) , $fileName);
            $photo = Photo::create([
                'file' => $fileName
            ]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);

        User::create($input);
        return redirect(route('users.index'));
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

        $user = User::findOrFail($id);
        $roles = Role::pluck('name' , 'id')->all();
        return view('admin.users.edit' , compact('user' , 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {

        if (trim($request->password) == '')
        {
            $input = $request->except('password');
        }
        else
        {

            $input['password'] = bcrypt($request->password);
            $input = $request->all();
        }

        $user = User::findOrFail($id);


        if ($file = $request->file('photo_id'))
        {
            $fileName = time() . $file->getClientOriginalName();
            $path = "images/users/";
            $file->move(public_path($path) , $fileName);
            $photo = Photo::create([
                'file' => $fileName
            ]);
            $input['photo_id'] = $photo->id;
        }


        $user->update($input);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path("images/users/"). $user->photo->file);
        $user->delete();
        Session::flash('delete_user' , 'this user has been deleted!!!');
        return redirect(route('users.index'));
    }
}
