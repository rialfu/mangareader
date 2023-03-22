<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Genre;
class AdminController extends Controller
{
    //
    public function postCreateManga(Request $request){

        
        $request->validate([
            'title'=>'required',
            'synopsis'=>'required',
            'show'=>'nullable|in:1',
            // 'genre'=>'nullable',
            'genre.*'=>'exists:genres,id'
        ]);
        $filter = $request->only('title', 'synopsis', 'show');
        
        // $manga = Manga::create($filter);
        // $manga->genres()->attach($request->genre);
        // dd($manga->genres);
        // var_dump('sukses');
        
    }
    public function createChapter(Request $request){
        $request->validate([
            'manga_id'=>'required|exists:manga,id',
            'image.*'=>'image|mimes:jpg,jpeg,png'
        ]);
    }
    public function createManga(Request $request){
        $genres = Genre::all();
        // dd($genre);
        // $mangaList = Manga::paginate();
        // dd($manga);  
        // return view('admin');      
        return view('manga.create', compact('genres'));
    }
    public function indexManga(Request $request){
        // $manga = Manga::paginate(5);
        $manga = Manga::findOrFail(2);
        $d =$manga->genres->toArray();
        dd($d);
    }
}
