<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Images
 * @package App
 */
class Images extends Model
{
    protected $table = 'image';

    protected $appends = [
        'image',
        'image_grayscale',
        'image_thumbnail',
        'image_thumbnail_grayscale',
    ];

    protected $columns = [
        'id',
        'url',
        'thumbnail_url',
        'width',
        'height',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $fillable = array(
        'url',
        'thumbnail_url',
        'width',
        'height',
        'name',
        'description',
    );

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function filter(Request $request)
    {
        $image = (new Images)->newQuery();

        if ($request->has('width'))
        {
            $image->where('width', $request->input('width'));
        }
        if ($request->has('height'))
        {
            $image->where('height', $request->input('height'));
        }

        return $image->paginate(6);
    }

    /**
     * @return string
     */
    public function getImageAttribute()
    {
        return asset(implode('/', ['', 'id', $this->id, $this->width, $this->height]));
    }

    /**
     * @return string
     */
    public function getImageGrayscaleAttribute()
    {
        return $this->getImageAttribute() . '?grayscale';
    }

    /**
     * @return string
     */
    public function getImageThumbnailAttribute()
    {
        return asset(implode('/', ['', 'thumb', 'id', $this->id, $this->width, $this->height]));
    }

    /**
     * @return string
     */
    public function getImageThumbnailGrayscaleAttribute()
    {
        return $this->getImageThumbnailAttribute() . '?grayscale';
    }
}
