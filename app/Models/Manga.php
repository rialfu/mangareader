<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
class Manga extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'synopsis','cover_image', 'show'
    ];
    public function chapter(){
        return $this->hasMany(MangaChapter::class, 'manga_id');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'manga_genre');
        // return $this->morphToMany(Genre::class, 'manga_genre');
    }
}
