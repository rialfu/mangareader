<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //

    public function indexManga(Request $request){
        $mangas = Manga::with('genres')->paginate(10);
        return view('manga.index',compact('mangas'));
    }
    public function editManga(Request $request, $id){
        $manga = Manga::findOrFail($id);
        $genres = Genre::all(); 
        return view('manga.edit',compact('manga', 'genres'));
        // dd($id);
    }
    public function postCreateManga(Request $request){

        
        $request->validate([
            'title'=>'required',
            'synopsis'=>'required',
            'show'=>'nullable|in:1',
            // 'genre'=>'nullable',
            'genre.*'=>'exists:genres,id'
        ]);
        $filter = $request->only('title', 'synopsis', 'show');
        
        $manga = Manga::create($filter);
        $manga->genres()->attach($request->genre);

        return redirect('/manga');
        // dd($manga->genres);
        // var_dump('sukses');
        
    }
    public function putEditManga(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'synopsis'=>'required',
            'show'=>'nullable|in:1',
            // 'genre'=>'nullable',
            'genre.*'=>'exists:genres,id'
        ]);
        $manga = Manga::findOrFail($id);
        $filter = $request->only('title', 'synopsis', 'show');
        $filter['show'] = $filter['show'] ?? 0;
        
        
        $manga->update($filter);
        $manga->genres()->sync($request->genre);
        return redirect('/manga');
    }
    public function createChapter(Request $request){
        $request->validate([
            'manga_id'=>'required|exists:manga,id',
            'image.*'=>'image|mimes:jpg,jpeg,png'
        ]);
    }
    public function createManga(Request $request){
        $genres = Genre::all(); 
        return view('manga.create', compact('genres'));
    }
    public function indexChapter(Request $request, $id, $title){
        // dd($id, $title);
        $manga = Manga::with('chapter')->findOrFail($id);
        return view('manga.chapter.index', compact('manga'));
        // dd($manga);
    }
    public function addChapter(Request $request, $id, $title){
        return view('manga.chapter.create');
    }
    public function postAddChapter(Request $request, $id, $title){
        $request->validate([
            'name_chapter'=>'required',
            'lang'=>'required|in:id,en',
            'show'=>'nullable|in:1',
            // 'genre'=>'nullable',
            'fileName.*'=>'required',
            'image.*'=>'required|image|max:2048'
        ]);
        // dd($request->fileName);
        $uploadFile = [];
        $manga = Manga::with('chapter')->findOrFail($id);
        foreach($request->file('image') as $index => $file){
            $name =  str_pad($request->fileName[$index],3, "0", STR_PAD_LEFT) . '_' . $manga->title . "_".date('Y-m-d')."_". $this->RandomString(10).".".$file->getClientOriginalExtension();
            // dd($file->getClientOriginalExtension());
            $path = Storage::putFileAs('images', $file, $name);
            array_push($uploadFile, ['page'=>$request->fileName[$index], 'location'=>$path]);
            // dd($path);
        }
        $filter = $request->only('name_chapter', 'lang', 'show');
        try{
            DB::transaction(function() use($id, $manga, $filter, $uploadFile){
                
                $chapter = $manga->chapter()->create($filter);
                $chapter->image()->createMany($uploadFile);
                // $chapter
                // dd($chapter);
            });
            
    
        }catch(\Exception $e){
            $paths = collect($uploadFile)->map(function($data, $key){
                return $data['location'];
            });
            // Storage::disk('s3')->delete()
            Storage::delete($paths);
            dd($e);
        }
        return redirect('/manga/'.$manga->id.'/'.$manga->title);
    }
    public function RandomString($len = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $len; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }    
}
