<?php

namespace App\Http\Controllers;

use App\Book;
use App\Department;
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
         $departments = Department::all();

        return view('books.index',compact('books', 'departments'));
           

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
     
        $department = Department::find($request->get('department_id')); 
        
        $book->book_name = $request->get('book_name');
        $book->auther_name = $request->get('auther_name');
        $book->description = $request->get('description');   
        $book->cover_image = $request->file('cover_image')->store('books','public');
    
        $department->book()->save($book);
        return redirect ('/books');
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
    
         $department = Department::find($request->get('department_id'));
         
         $book->book_name = $request->get('book_name');
         $book->auther_name = $request->get('auther_name');
         $book->description = $request->get('description');

         $book->cover_image = $request->file('cover_image')->store('books','public');
                                          
         $department->book()->save($book);
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
            //
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

