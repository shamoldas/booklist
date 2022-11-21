<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $books = Book::latest()->paginate(5);
    
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

         return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

           $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'book_name' => 'required|mimes:pdf|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $book_name = time().'.'.$request->book_name->extension();  
   
        $request->book_name->move(public_path('uploads'), $book_name);
    
        Book::create($input);
     
        return redirect()->route('books.index')
                        ->with('success','Book add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function show($id)
     public function show(Book $book)

    {
        //
         //$book = Book::all()->toArray();

         return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
     public function edit(Book $book)
    {
        //
        // $book = Book::all();
        //return view('books.edit')->with('books', $books);

        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Book $book)
    {
        //

          $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'book_name' => 'required|mimes:pdf|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $book_name = time().'.'.$request->book_name->extension();  
   
        $request->book_name->move(public_path('uploads'), $book_name);
    
        Book::update($input);
     
        return redirect()->route('books.index')
                        ->with('success','Book update successfully.');

        /*

           $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) 
        {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        else
        {
            unset($input['image']);
        }
          
        $book->update($input);
    
        return redirect()->route('books.index')
                        ->with('success','Updated successfully');

                        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function destroy($id)
     public function destroy(Book $book)
    {
        //
         $book->delete();
     
        return redirect()->route('books.index')
                        ->with('success',' deleted successfully');
    }

    public function showbook()
    {
        //
         $books = Book::latest()->paginate(5);            
         return view('books.showbook',compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
