<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Library extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getLibrary(){
        $library = DB::table('tb_library')->get();
        $book = DB::table('tb_book')->where('id_lib',1)->get();

        return view('index',[
            'library' => $library,
            'book' => $book
        ]);
    }

    public function getBook($id_lib){
        $library = DB::table('tb_library')->where('id_lib',$id_lib)->get();
        $book = DB::table('tb_book')->where('id_lib',$id_lib)->get();

        return view('booklist',[
            'book' => $book,
            'library' => $library,
        ]);
    }

    public function editLibrary(Request $request)
    {
        DB::table('tb_library')->where('id_lib',$request->id_lib)->update([
            'library_name' => $request->library_name
        ]);
        return redirect('/index');
    }

    public function addLibrary(Request $request)
    {
        DB::table('tb_library')->insert([
            'library_name' => $request->library_name,
        ]);
        return redirect('/index');
    }

    public function addBook(Request $request)
    {
        DB::table('tb_book')->insert([
            'book_name' => $request->book_name,
            'id_lib' => $request->id_lib
        ]);
        return redirect('/booklist/'.$request->id_lib);
    }

    public function editBook(Request $request)
    {
        DB::table('tb_book')->where('id_book',$request->id_book)->update([
            'book_name' => $request->book_name
        ]);
        return redirect('/booklist/'.$request->id_lib);
    }

    public function deleteBook(Request $request)
    {
        DB::table('tb_book')->where('id_book',$request->id_book)->delete();
		return redirect('/booklist/'.$request->id_lib);
    }
}
