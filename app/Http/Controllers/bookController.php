<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index()
    {
        $bookData = Book::all();
        return view('book.showAllBooks')->with('bookData' , $bookData);
    }

    public function showAddNewBook()
    {
        return view('book.addNewBook');
    }
    public function addNewBook(Request $request)
    {
        $this->validate($request , [
            'bookName' => 'required',
            'price' => 'required'
        ]);
        Book::create([
            'bookName' => $request->bookName,
            'price' => $request->price,
        ]);
        return redirect('/showAllBook');
    }

    public function showEditBook($id)
    {
        $bookData = Book::find($id);
        return view('book.editBook')->with('bookData' , $bookData);
    }
    public function editBook(Request $request , $id)
    {
        $this->validate($request , [
            'bookName' => 'required',
            'price' => 'required'
        ]);
        Book::where( 'id' ,$id)->update([
            'bookName' => $request->bookName,
            'price' => $request->price,
        ]);
        return redirect('/showAllBook');

    }

    public function deleteBook($id)
    {
        Book::find($id)->delete();
        return redirect('/showAllBook');
    }
}
