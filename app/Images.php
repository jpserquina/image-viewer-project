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

    protected $fillable = array(
        'url',
        'thumbnail_url',
        'name',
        'description',
    );
}
