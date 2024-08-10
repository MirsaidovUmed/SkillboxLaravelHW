<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfGeneratorController extends Controller
{
    public function index(int $id)
    {
        $user = User::findOrFail($id);
        
        $data = [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
        ];

        $pdf = PDF::loadView('welcomeForm', $data, compact('user'));
        return $pdf->download('user.pdf');
    }
}
