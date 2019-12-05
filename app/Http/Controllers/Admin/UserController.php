<?php

namespace App\Http\Controllers\Admin;

use Json;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->input('id') ?? '%';
        $user_title = '%' . $request->input('user') . '%';
        $users = User::orderBy('name')
            ->where(function ($query) use ($user_title, $user_id) {
                $query->where('name', 'like', $user_title)
                      ->where('id', 'like', $user_id);
            })
            ->orWhere(function ($query) use ($user_title, $user_id) {
                $query->where('email', 'like', $user_title)
                      ->where('id', 'like', $user_id);
            })
                ->paginate(9)
                ->appends(['users'=> $request->input('user'), 'id' => $request->input('id')]);
if ( $user_id=2) {

    $user = User::orderBy('name','desc')// short version of orderBy('name', 'asc')
    ->get();
    $result = compact('user', 'users');

    Json::dump($result);
    return view('admin.users.index', $result);
}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:users,name'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->save();
        return response()->json([
            'type' => 'success',
            'text' => "The genre <b>$user->name</b> has been added"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect('admin/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $result = compact('user');
        Json::dump($result);
        return view('admin.users.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:users,name,' .$user->id
        ]);
        $user->name = $request->name;
        $user->save();
        session()->flash('success', 'The user has been updated');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();
        session()->flash('success', "The genre <b>$user->name</b> has been deleted");
        return redirect('admin/users');
    }
    public function qyrUsers()
    {
        $users = User::orderBy('name')

            ->paginate(9);
        $result = compact('users');
        Json::dump($result);
        return view('admin.users.index', $result);
    }
}
