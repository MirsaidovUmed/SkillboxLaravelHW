<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('getUserData', compact('users'));
    }

    public function getUserById(int $id): View
    {
        $user = User::findOrFail($id);
        return view('welcomeForm', compact('user'));
    }

    public function showUserForm(): View
    {
        return view('userForm');
    }

    public function create(Request $request): RedirectResponse|string
    {
        try {  
            $user = new User;

            $request->validate([
                "name"=> "required|max:50",
                "surname"=> "required|max:50",
                "email"=> "required|email|max:255|unique:users",
            ]);
            $user->create($request->all());
    
            return redirect()->route("getUsersAll")->with('status', 'Data Added for User');    
        }catch (ValidationException $errors){
            return $errors->getMessage();
        }    
    }
}
