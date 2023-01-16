<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function createManga(Request $request){
        $request->validate([
            'title'=>'required',
            'synopsis'=>'required',
            'release'=>'nullable|date',
            'genre'=>'nullable',
            'genre.*'=>'exists:genre,id'
        ]);
        
    }
    public function createChapter(Request $request){
        $request->validate([
            'manga_id'=>'required|exists:manga,id',
            'image.*'=>'image|mimes:jpg,jpeg,png'
        ]);
    }
}
