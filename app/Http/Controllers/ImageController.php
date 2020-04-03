<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;

class ImageController extends Controller
{
    public function getImages()
    {
        return view('demo', ['images' => DB::table('image')->paginate(6)]);
    }

    public function show(Request $request, $id)
    {
        return view('demo', ['images' => [Image::findOrFail($id)], 'grayscale' => $request->has('grayscale')]);
    }
}
