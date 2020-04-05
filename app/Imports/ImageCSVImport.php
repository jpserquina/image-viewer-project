<?php

namespace App\Imports;

use App\Images;
use Maatwebsite\Excel\Concerns\ToModel;

class ImageCSVImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // CHANGE ME
        $url = $row[0];
        $uri = explode('/', $url);
        $thumbnail_url = preg_replace('/picsum/', 'i.picsum', $url);
        $width = (int) $uri[5];
        $height = (int) $uri[6];
        $name = hash('md5', $url);
        $desc = hash('md5', $url);

        return new Images([
            'url' => $url,
            'thumbnail_url' => $thumbnail_url,
            'width' => $width,
            'height' => $height,
            'name' => $name,
            'description' => $desc,
        ]);
    }
}
