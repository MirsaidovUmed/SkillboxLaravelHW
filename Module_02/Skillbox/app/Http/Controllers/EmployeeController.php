<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(): View
    {
        return view('get-employee-data');
    }

    public function store(Request $request): View
    {
        $path = $this->getPath($request);
        $url = $this->getUrl($request);

        $data = json_decode($request->getContent(), true);

        $name = $data['name'] ?? null;
        $surname = $data['surname'] ?? null;
        $email = $data['email'] ?? null;
        $position = $data['position'] ?? null;
        $address = $data['address'] ?? null;
        $workData = $data['workData'] ?? null;

        return view('get-employee-data', compact('name', 'surname', 'email', 'address', 'position', 'workData', 'path', 'url'));
    }

    public function update(Request $request, int $id): View
    {
        $path = $this->getPath($request);
        $url = $this->getUrl($request);

        $jsonData = $request->input('jsonData');
        $data = json_decode($jsonData, true);
        
        $name = $data['name'] ?? null;
        $surname = $data['surname'] ?? null;
        $email = $data['email'] ?? null;
        $position = $data['position'] ?? null;
        $address = $data['address'] ?? null;
        $workData = $data['workData'] ?? null;

        return view('get-employee-data', compact('id', 'name', 'surname', 'email', 'address', 'position', 'workData', 'path', 'url'));
    }
    
    public function getPath(Request $request): string
    {
        return $request->path();
    }
    
    public function getUrl(Request $request): string
    {
        return $request->url();
    }
}
