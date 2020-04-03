<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function getImages()
    {
        return view('demo', ['images' => DB::table('image')->paginate(6)]);
    }
}
