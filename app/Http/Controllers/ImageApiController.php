<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Images;
use App\Http\Resources\Image as ImageResource;
use App\Http\Resources\ImageCollection;
use Intervention\Image\Facades\Image;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImageApiController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $images = Images::filter($request);
        $data = new ImageCollection($images);
        $links = (string) $images->links();
        $query_string = $request->query();
        unset($query_string['page']);
        $query_string = http_build_query($query_string);
        $links = str_replace('/api', '', $links);
        $links = !empty($query_string)
            ? preg_replace('/\?/', '?' . $query_string . '&', $links) : $links;
        return [
            'data' =>  $data->collection,
            'links' => $links,
        ];
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function show(Request $request, $id)
    {
        $data = Images::find($id);
        return [
            'data' =>  $data,
        ];
    }
}
