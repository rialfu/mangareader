<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    public function chapter(){
        return $this->hasMany(MangaChapter::class, 'manga_id');
    }
}
