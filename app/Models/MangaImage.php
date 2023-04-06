<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MangaImage extends Model
{
    use HasFactory;
    protected $fillable= ['page','location'];
    /**
     * Get the chapter that owns the MangaImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chapter()
    // : BelongsTo
    {
        return $this->belongsTo(MangaChapter::class, 'manga_chapter_id');
    }
    public function getUrlImageAttribute(){
        return Storage::url($this->location);
    }
}
