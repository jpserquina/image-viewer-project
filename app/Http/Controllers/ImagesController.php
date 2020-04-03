<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Images;
use Intervention\Image\Facades\Image;
use GuzzleHttp\Client;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $width = $request->get('width', 0);
        $height = $request->get('height', 0);
        $page = $request->get('page', 1);

        // note: this should be using the route() helper function
        // but this needs to be a specific IP alias to work with docker
        // $url = route('api', [
        $url = 'http://host.docker.internal/api?' . http_build_query([
            'page' => $page,
            'width' => $width,
            'height' => $height,
        ]);
        $client = new Client();
        $api_fetch = $client->request('GET', $url)->getBody()->getContents();
        $object = (array)json_decode($api_fetch);
        $images = new Images();
        $images->forceFill($object);

        return view('demo', ['images' => $images::paginate(6)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $width = $request->get('width', 0);
        $height = $request->get('height', 0);
        $is_grayscale = $request->has('grayscale');

        // note: this should be using the route() helper function
        // but this needs to be a specific IP alias to work with docker
        // $url = route('api', [
        $url = 'http://host.docker.internal/api/id/' .
                $id . '/' .
                $width . '/' .
                $height .
                ((int)$is_grayscale ? '?grayscale' : '');
        $client = new Client();
        $api_fetch = $client->request('GET', $url)->getBody()->getContents();
        $object = (array)json_decode($api_fetch);
        $image = new Images();
        $image->forceFill($object);

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
    public function showRaw(Request $request, $id, $width, $height, $type = 'url')
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
}
