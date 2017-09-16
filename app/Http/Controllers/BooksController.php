<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => "showBooks"]);
    

  }
  public function showBooks ()
  {
    if (auth()->check())
    {
       $books = Book::where("user_id", "=", "0")->orderBy('name', 'asc')->paginate(10);
       return view('books', compact("books"));
    }
    else 
    {
         return view('auth.login'); 

    }


  }

   public function show($id)
  {
   
     $book = Book::find($id);

     return view('book', compact("book"));

  }

  public function showReservation($id)
  {
    $book = Book::find($id);

    return view("reservation", compact("book")); 
  }

  public function reservate()
  {
    $this->validate(request(), [

      "from" => "required|date", 
      "to" => "required|date", 
      "bookId" => "required|integer"
        ]);


      if (request()->from >= request()->to)
      {
        return redirect()->back()->withErrors(array('message' => 'Špatně zadaná data'));
      }

      Book::where('id', request()->bookId)->update(['fromD' =>request()->from ,'toD' =>request()->to,'user_id'=>auth()->user()->id]);

     
        $book = $book = Book::find(request()->bookId);
     return view("reservation", compact("book")); 
  }


  public function showInventory()
  {
     $books = Book::where('user_id', auth()->user()->id)->paginate(5);
     return view("inventory", compact("books")); 

  }
  
  public function feed()
   {
  for ($i=0; $i < 50 ; $i++) { 
    Book::insert( ['name' => substr(md5(rand()), 0, 7) , 'detail' => substr(md5(rand()), 0, 40), 'user_id' => "0"]);
   }
  }
    

 public function deleteInventory()
 {
  $this->validate(request(), [

      "bookId" => "required|integer", 
        ]);

  Book::where([
    ['id', request()->bookId],
    ['user_id', auth()->user()->id],])->update(['fromD' =>null ,'toD' =>null,'user_id'=>"0"]);

    return redirect()->back(); 

 }
  


}
