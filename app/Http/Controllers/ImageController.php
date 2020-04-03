<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function getImages()
    {
        return view('demo', ['images' => Image::all()]);
    }
}
