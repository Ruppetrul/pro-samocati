<?php

namespace Modules\Media\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Contact\Models\Contact;
use Modules\Media\Models\Media;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Models\Slider;

class MediaRepoEloquent
{

    public static function create($filename)
    {
        Media::query()->create([
            'user_id'      => 1,
            'filename'    => $filename,
            'files'       => $filename,
            'type'        => 'image',
            'is_private'  => 0,
        ]);
    }
}
