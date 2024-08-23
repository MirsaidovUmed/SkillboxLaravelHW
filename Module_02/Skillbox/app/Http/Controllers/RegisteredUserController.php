<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Telegram\Bot\Laravel\Facades\Telegram;

class RegisteredUserController extends Controller
{

    public function index(): View
    {
        $users = User::all();
        return view('userForm', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Ошибка валидации: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors());
        } 
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        Auth::login($user);
    
        event(new UserRegistered($user));
        
        Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID'),
        'parse_mode' => 'html',
        'text' => 'Появился новый пользователь -> ' . $user->name,
        ]);
        
        return redirect()->route('dashboard');
    }
}
