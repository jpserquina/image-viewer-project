<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class ImageTableSeeder
 */
class ImageTableSeeder extends Seeder
{

    private $picsum_ids = [
        [ 'id' => 12, 'width' => 300, 'height' => 200 ],
        [ 'id' => 434, 'width' => 300, 'height' => 200 ],
        [ 'id' => 966, 'width' => 300, 'height' => 200 ],
        [ 'id' => 637, 'width' => 300, 'height' => 200 ],
        [ 'id' => 180, 'width' => 300, 'height' => 200 ],
        [ 'id' => 342, 'width' => 300, 'height' => 200 ],
        [ 'id' => 467, 'width' => 300, 'height' => 200 ],
        [ 'id' => 389, 'width' => 300, 'height' => 200 ],
        [ 'id' => 525, 'width' => 300, 'height' => 200 ],
        [ 'id' => 385, 'width' => 300, 'height' => 200 ],
        [ 'id' => 256, 'width' => 100, 'height' => 100 ],
        [ 'id' => 70, 'width' => 100, 'height' => 100 ],
        [ 'id' => 844, 'width' => 100, 'height' => 100 ],
        [ 'id' => 130, 'width' => 100, 'height' => 100 ],
        [ 'id' => 328, 'width' => 100, 'height' => 100 ],
        [ 'id' => 886, 'width' => 100, 'height' => 100 ],
        [ 'id' => 218, 'width' => 100, 'height' => 100 ],
        [ 'id' => 29, 'width' => 100, 'height' => 100 ],
        [ 'id' => 639, 'width' => 100, 'height' => 100 ],
        [ 'id' => 396, 'width' => 100, 'height' => 100 ],
        [ 'id' => 20, 'width' => 250, 'height' => 250 ],
        [ 'id' => 925, 'width' => 250, 'height' => 250 ],
        [ 'id' => 872, 'width' => 250, 'height' => 250 ],
        [ 'id' => 629, 'width' => 250, 'height' => 250 ],
        [ 'id' => 1074, 'width' => 250, 'height' => 250 ],
        [ 'id' => 341, 'width' => 250, 'height' => 250 ],
        [ 'id' => 267, 'width' => 250, 'height' => 250 ],
        [ 'id' => 1021, 'width' => 250, 'height' => 250 ],
        [ 'id' => 928, 'width' => 250, 'height' => 250 ],
        [ 'id' => 238, 'width' => 250, 'height' => 250 ],
        [ 'id' => 385, 'width' => 400, 'height' => 200 ],
        [ 'id' => 319, 'width' => 400, 'height' => 200 ],
        [ 'id' => 1059, 'width' => 400, 'height' => 200 ],
        [ 'id' => 71, 'width' => 400, 'height' => 200 ],
        [ 'id' => 637, 'width' => 400, 'height' => 200 ],
        [ 'id' => 118, 'width' => 400, 'height' => 200 ],
        [ 'id' => 634, 'width' => 400, 'height' => 200 ],
        [ 'id' => 1065, 'width' => 400, 'height' => 200 ],
        [ 'id' => 1073, 'width' => 400, 'height' => 200 ],
        [ 'id' => 323, 'width' => 400, 'height' => 200 ],
        [ 'id' => 660, 'width' => 300, 'height' => 300 ],
        [ 'id' => 511, 'width' => 300, 'height' => 300 ],
        [ 'id' => 339, 'width' => 300, 'height' => 300 ],
        [ 'id' => 693, 'width' => 300, 'height' => 300 ],
        [ 'id' => 198, 'width' => 300, 'height' => 300 ],
        [ 'id' => 964, 'width' => 300, 'height' => 300 ],
        [ 'id' => 59, 'width' => 300, 'height' => 300 ],
        [ 'id' => 160, 'width' => 300, 'height' => 300 ],
        [ 'id' => 737, 'width' => 300, 'height' => 300 ],
        [ 'id' => 891, 'width' => 300, 'height' => 300 ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->comment('Seeding Images...');
        foreach($this->picsum_ids as $picsum_id)
        {
            $id = $picsum_id['id'];
            $width = $picsum_id['width'];
            $height = $picsum_id['height'];
            $this->command->comment("Inserting picsum - id $id, width $width, height $height");
            DB::table('image')->insert([
                'name' => Str::random(10),
                'url' => "https://picsum.photos/id/$id/$width/$height.jpg",
                'thumbnail_url' => "https://i.picsum.photos/id/$id/$width/$height.jpg",
                'width' => $picsum_id['width'],
                'height' => $picsum_id['height'],
            ]);
        }
    }
}
