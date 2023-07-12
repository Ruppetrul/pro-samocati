<?php

namespace Modules\Media\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Modules\Media\Contracts\FileServiceContract;
use Modules\Media\Models\Media;

class ImageFileService extends DefaultFileService implements FileServiceContract
{
    protected static array $sizes = ['300', '600'];

    public static function upload(UploadedFile $file, $filename, $dir): array
    {
        Storage::putFileAs($dir, $file, $filename.'.'.$file->getClientOriginalExtension());
        $path = $dir.$filename.'.'.$file->getClientOriginalExtension();

        return self::resize(Storage::path($path), $dir, $filename, $file->getClientOriginalExtension());
    }

    private static function resize($img, $dir, $filename, $extension)
    {
        $img = Image::make($img);
        $imgs['original'] = $filename.'.'.$extension;
        foreach (self::$sizes as $size) {
            $imgs[$size] = $filename.'_'.$size.'.'.$extension;
            $img->resize($size, null, function ($aspect) {
                $aspect->aspectRatio();
            })->save(Storage::path($dir).$filename.'_'.$size.'.'.$extension);
        }

        return $imgs;
    }

    public static function getFilename()
    {
        return (static::$media->is_private ? 'private/' : 'public/').static::$media->files['original'];
    }

    public static function thumb(Media $media)
    {
        Log::info(json_encode($media));
        //Log::info(json_encode($media->files['300']));
        //Log::info(json_encode('/storage/'.$media->files['300']));
       // return '/storage/'.$media->files['300'];
       // return '/storage/' . $media->filename;
        return $media->filename;
    }
}
