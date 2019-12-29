<?php

namespace App\Http\Controllers\Admin;

use Json;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;


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
       $test =   $request->sortby;


       switch ($test){

           case'' :


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

           break;
           case 1:


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


               break;
           case 2:


               $users = User::orderBy('name','desc')
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


               break;
           case 3:

               $users = User::orderBy('email')
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



               break;
           case 4:


               $users = User::orderBy('email','desc')
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


               break;
           case 5:

               $users = User::orderBy('active')
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



               break;
           case 6:

               $users = User::orderBy('admin')
                   ->where(function ($query) use ($user_title, $user_id) {
                       $query->where('name', 'like', $user_title)
                           ->where('id', 'like', $user_id)
                       ->where('admin', 'like', '1');
                          })
                   ->orWhere(function ($query) use ($user_title, $user_id) {
                       $query->where('email', 'like', $user_title)
                           ->where('id', 'like', $user_id);
                   })

                   ->paginate(9)
                   ->appends(['users'=> $request->input('user'), 'id' => $request->input('id')]);



               break;
       }




        $result = compact( 'users');

    Json::dump($result);
    return view('admin.users.index', $result);


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
        $getal = User::orderby('admin');


        $result = compact('user', 'getal');
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
            'name' => 'required|unique:users,name,' .$user->id,
            'email' => 'required|email|unique:users'
        ]);




        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('admin')) {
            $user->admin = 1;
        } else {
            $user->admin = 0;
        }

        if ($request->has('active')) {
            $user->active = 1;
        } else {
            $user->active = 0;
        }

        $user->save();
        session()->flash('success', "The  <b>$user->name</b> has been updated");
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
        $test = $user->admin;
        if ($test==1){

            $user->save();
            session()->flash('danger', "The user <b>$user->name</b> can not been deleted");


            return redirect('admin/users');
        }
        else{

            $user->delete();

            session()->flash('success', "The user <b>$user->name</b> has been deleted");
            return redirect('admin/users');
        }

    }
    public function qyrUsers()
    {
        $users = User::orderBy('name')

            ->get();

;
        return $users;
    }
}
