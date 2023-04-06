<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaChapter extends Model
{
    use HasFactory;
    protected $fillable= ['name_chapter','lang','show'];
    /**
     * Get the manga that owns the MangaChapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manga()
    // : BelongsTo
    {
        return $this->belongsTo(Manga::class, 'manga_id');
    }
    /**
     * Get all of the image for the MangaChapter
     *
     * @return \IllMangaImage\Database\Eloquent\Relations\HasMany
     */
    public function images()
    // : HasMany
    {
        return $this->hasMany(MangaImage::class, 'manga_chapter_id');
    }
}
