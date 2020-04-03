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
class ImageApiController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $width = $request->get('width');
        $height = $request->get('height');
        $page = $request->get('page');
        return response()->json(
            DB::table('image')
                ->when($height, function($query) use ($height) {
                    if ($height > 0) return $query->where('height', $height);
                })
                ->when($width, function($query) use ($width) {
                    if ($width > 0) return $query->where('width', $width);
                })
                ->paginate(6)
        );

//        return response()->json(Images::exclude(['url','thumbnail_url'])->paginate(6));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        return response()->json(Images::exclude(['url','thumbnail_url'])->find($id));
    }
}
