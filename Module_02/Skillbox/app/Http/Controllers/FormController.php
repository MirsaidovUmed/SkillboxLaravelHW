<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(): View
    {
        return view('inputForm');
    }

    public function store(Request $request): View
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        // return response()->json([$name, $surname, $email]);
        return view('welcomeForm', compact('name','surname','email'));
    }
}
