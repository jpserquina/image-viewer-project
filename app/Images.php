<?php

namespace App;

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
        'name',
        'description',
    );

    public function scopeExclude($query,$value = array())
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }

    public function getImageAttribute()
    {
        return asset(implode('/', ['', 'id', $this->id, $this->width, $this->height]));
    }

    public function getImageGrayscaleAttribute()
    {
        return $this->getImageAttribute() . '?grayscale';
    }

    public function getImageThumbnailAttribute()
    {
        return asset(implode('/', ['', 'thumb', 'id', $this->id, $this->width, $this->height]));
    }

    public function getImageThumbnailGrayscaleAttribute()
    {
        return $this->getImageThumbnailAttribute() . '?grayscale';
    }
}
