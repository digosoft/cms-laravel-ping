<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest; 

class UsersController extends Controller
{
    public function index(){
    	return view('users.index')->withUsers(User::all());
    }

    public function makeAdmin(User $user){
    	$user->role = 'Admin';
    	$user->save();
    	Session()->flash('message', 'Make Admin Successfully..');

    	return redirect(route('users.index'));

    }


    public function edit(){
    	return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request){
    	// return view('users.edit')->with('user', auth()->user());
    	$user = auth()->user();

    	$user->update([
    		'name' => $request->name,
    		'about'=> $request->about
    	]);

    	Session()->flash('message', 'User Update Successfully..');
    	return redirect()->back();
    }

}
