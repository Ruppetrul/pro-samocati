<?php

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Services\MediaFileService;

class Media extends Model
{
    protected $table = 'medias';

    protected $casts = ['files' => 'json'];

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'filename', 'files',
        'type', 'is_private',
    ];

    protected static function booted()
    {
        static::deleting(static function ($media) {
            MediaFileService::delete($media);
        });
    }

    public function getThumbAttribute()
    {
        return MediaFileService::thumb($this);
    }
}
