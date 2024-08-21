<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function index(): View
    {
        $this->authorize('view-any', User::class);
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
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);
    
            $user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return redirect()->route("getUsersAll")->with('status', 'Data Added for User');    
        }catch (ValidationException $errors){
            return $errors->getMessage();
        }    
    }
}
