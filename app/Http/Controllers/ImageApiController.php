<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Images;
use App\Http\Resources\Image as ImageResource;
use App\Http\Resources\ImageCollection as ImageCollection;
use Intervention\Image\Facades\Image;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImageApiController extends Controller
{
    /**
     * @param Request $request
     * @return ImageCollection
     */
    public function index(Request $request)
    {
        return new ImageCollection(Images::filter($request));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        return new ImageCollection(Images::filter($request));
        //        return response()->json(Images::exclude(['url','thumbnail_url'])->find($id));
    }
}
