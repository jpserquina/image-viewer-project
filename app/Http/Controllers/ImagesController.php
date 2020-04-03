<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Images;
use Intervention\Image\Facades\Image;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getImages()
    {
        return view('demo', ['images' => DB::table('image')->paginate(6)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $width
     * @param $height
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id, $width, $height)
    {
        $is_grayscale = $request->has('grayscale');
        $image = Images::findOrFail($id);
        return view('demo', ['images' => [$image], 'grayscale' => $is_grayscale]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $width
     * @param $height
     * @param string $type
     * @return mixed
     */
    public function viewImage(Request $request, $id, $width, $height, $type = 'url')
    {
        $is_grayscale = $request->has('grayscale');
        $image_data = Images::findOrFail($id);
        if ($is_grayscale)
        {
            $image = Image::make($image_data->{$type})->resize($width, $height)->greyscale()->response('jpg');
        }
        else
        {
            $image = Image::make($image_data->{$type})->resize($width, $height)->response('jpg');
        }
        return $image;
    }

    /**
     * @param Request $request
     * @param $id
     * @param $width
     * @param $height
     * @return mixed
     */
    public function viewThumbnail(Request $request, $id, $width, $height)
    {
        return self::viewImage($request, $id, $width, $height, 'thumbnail_url');
    }
}
