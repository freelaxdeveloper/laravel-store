<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Gumlet\ImageResize as Resize;
use App\Product;

class ImageResize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImageResize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $images = glob(base_path() . '/storage/images/*.jpg');
        for ($i = 0; $i < count($images); $i++) {
            $basename = basename($images[$i]);

            $product = Product::create([
                'title' => $basename,
            ]);

            $image = new Resize($images[$i]);
            $image->crop(800, 600, Resize::CROPCENTER);
            $image->addFilter(function ($imageDesc) {
                $logo = imagecreatefrompng(base_path() . '/storage/banner_num.png');
                imagealphablending($logo, true);
                $alpha_level = 100;
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                $image_x = 0;
                $image_y = 0;
                //imagecopymerge($imageDesc, $logo, $image_x, $image_y, 0, 0, $logo_width, $logo_height, $alpha_level);
                imagecopy($imageDesc, $logo, $image_x, $image_y, 0, 0, $logo_width, $logo_height);
            });
            $image->addFilter(function ($imageDesc) {
                $logo = imagecreatefrompng(base_path() . '/storage/banner_400x139.png');
                imagealphablending($logo, true);
                $alpha_level = 50;
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                $image_x = 0;
                $image_y = 0;
                imagecopymerge($imageDesc, $logo, $image_x, $image_height - $logo_height, 0, 0, $logo_width, $logo_height, $alpha_level);
            });
            $image->addFilter(function ($imageDesc) {
                $logo = imagecreatefrompng(base_path() . '/storage/banner_250x86.png');
                imagealphablending($logo, true);
                $alpha_level = 50;
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                $image_x = $image_width - $logo_width;
                $image_y = $image_height - $logo_height;
                imagecopymerge($imageDesc, $logo, $image_x, $image_y, 0, 0, $logo_width, $logo_height, $alpha_level);
            });
            $image->addFilter(function ($imageDesc) use ($product) {
                $color = ImageColorAllocate($imageDesc, 255, 255, 255); //получаем идентификатор цвета
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                ImageTTFtext($imageDesc, 17, 0, 10, 60, $color, base_path() . '/resources/assets/fonts/OpenSans-ExtraBoldItalic.ttf', "№{$product->id}");
                ImageTTFtext($imageDesc, 17, -10, 55, $image_height - 50, $color, base_path() . '/resources/assets/fonts/OpenSans-ExtraBoldItalic.ttf', '8(989)8663670');
                ImageTTFtext($imageDesc, 15, 0, $image_width - 105, $image_height - 20, $color, base_path() . '/resources/assets/fonts/OpenSans-ExtraBoldItalic.ttf', 'vikri.ru');
            });

            $result = $image->save(base_path() . '/public/products/' . $product->id . '.jpg', null, 100);
            copy($images[$i], base_path() . '/resources/archive/' . $basename);
            //unlink($images[$i]);

            echo "Обработал: {$basename}\n";
        }
    }
}
