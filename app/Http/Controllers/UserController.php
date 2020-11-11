<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $users = User::orderBy('id', 'asc')->get();
      $today = Carbon::today()->format('Y年m月d日');
      return view('users.index', ['users'=>$users, 'today'=>$today]);
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
    public function edit(User $user){
      $today = Carbon::today()->format('Y年m月d日');
      return view('users.edit', ['user'=>$user, 'today'=>$today]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user){
      $user->name = $request->name;
      $user->username = $request->username;
      $user->email = $request->email;
      $user->content = $request->content;
      $user->save();
      session()->flash('flash_message', '変更しました！');
      return redirect('/users');
    }

    public function delete(Request $request){
      User::find($request->id)->delete();
      session()->flash('flash_message', '削除が完了しました！');
      return redirect('/users');
    }
}
