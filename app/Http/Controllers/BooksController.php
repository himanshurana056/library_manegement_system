<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $books = Book::all();
    //    dd($books);  
        return view('books.index',compact('books'));
        // dd('return');     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //dd('here');
        return view('books.create',compact('books'));
        //dd('here');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book ();
        // dd($book);

        $book->book_name = $request->get('book_name');
        $book->auther_name = $request->get('auther_name');
        $book->description = $request->get('description');
       
        $book->save();
      
        return redirect('/books');

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
          $book = Book::find($id);
        //   dd($book);
          return redirect('/books.edit');
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function updateBook(Request $request)
    {
        //  dd($request->all());
        
         $book = Book::find($request->get('id'));
         
        //  print_r($book);
         
         $book->book_name = $request->get('book_name');
         $book->auther_name = $request->get('auther_name');
         $book->description = $request->get('description');
        //  dd($book);
         $book->save();
         return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('here');
        // $book = Book::find($id);
        // $book->delete();
        // return redirect('/books');
    }
     public function editBook($id)
    {

        $book = Book::find($id);
        return response()
            ->json(['book' => $book]);
         
    }

    public function deleteBook($id)
    {
        $status = false;
        if(Book::find($id)->destroy($id)){
            $status = true;
        } 

        return response()
        ->json(['status' => $status]);
    

    }
}

