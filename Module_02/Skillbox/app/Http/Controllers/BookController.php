<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Error;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view("getBooksData", compact("books"));
    }
    public function show(): View
    {
        return view("module6Form");
    }

    public function store(Request $request): RedirectResponse|string
    {

        try {  
            $book = new Book;

            $request->validate([
                "title"=> "required|max:255|unique:books",
                "description"=> "required",
                "author"=> "required|max:100",
                "genre"=> "required",
            ]);
            $book->create($request->all());
    
            return redirect()->route("showModule6")->with('status', 'Data Added for Book');    
        }catch (ValidationException $errors){
            return $errors->getMessage();
        }
    }
}
