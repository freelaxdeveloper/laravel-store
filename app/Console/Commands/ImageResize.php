<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Gumlet\ImageResize as Resize;

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
        $image18Plus1 = base_path() . '/storage/banner_250x86.png';
        $image18Plus = base_path() . '/storage/banner_num.png';
        $image18Plus2 = base_path() . '/storage/banner_400x139.png';
        for ($i = 0; $i < count($images); $i++) {
            $basename = basename($images[$i]);

            $image = new Resize($images[$i]);
            //$image->crop(800, 600, Resize::CROPCENTER);
            $image->addFilter(function ($imageDesc) use ($image18Plus) {
                $logo = imagecreatefrompng($image18Plus);
                imagealphablending($logo, true);
                $alpha_level = 50;
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                $image_x = 30;
                $image_y = 50;
                imagecopymerge($imageDesc, $logo, $image_x, $image_y, 0, 0, $logo_width, $logo_height, $alpha_level);
            });
            $image->addFilter(function ($imageDesc) use ($image18Plus2) {
                $logo = imagecreatefrompng($image18Plus2);
                imagealphablending($logo, true);
                $alpha_level = 50;
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                $image_x = 10;
                $image_y = 10;
                imagecopymerge($imageDesc, $logo, $image_x, $image_height - $logo_height, 0, 0, $logo_width, $logo_height, $alpha_level);
            });
            $image->addFilter(function ($imageDesc) use ($image18Plus1) {
                $logo = imagecreatefrompng($image18Plus1);
                imagealphablending($logo, true);
                $alpha_level = 50;
                $logo_width = imagesx($logo);
                $logo_height = imagesy($logo);
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                $image_x = $image_width - $logo_width - 15;
                $image_y = $image_height - $logo_height - 15;
                imagecopymerge($imageDesc, $logo, $image_x, $image_y, 0, 0, $logo_width, $logo_height, $alpha_level);
            });
            $image->addFilter(function ($imageDesc) {
                $color = ImageColorAllocate($imageDesc, 255, 255, 255); //получаем идентификатор цвета
                $image_width = imagesx($imageDesc);
                $image_height = imagesy($imageDesc);
                ImageTTFtext($imageDesc, 24, 0, 45, 115, $color, base_path() . '/resources/assets/fonts/OpenSans-ExtraBoldItalic.ttf', "№" . mt_rand(1, 99));
                ImageTTFtext($imageDesc, 30, 5, 65, $image_height - 45, $color, base_path() . '/resources/assets/fonts/OpenSans-ExtraBoldItalic.ttf', '8(989)8663670');
                ImageTTFtext($imageDesc, 30, 0, $image_width - 207, $image_height - 45, $color, base_path() . '/resources/assets/fonts/OpenSans-ExtraBoldItalic.ttf', 'vikri.ru');
            });
            $result = $image->save(base_path() . '/storage/images/resize/' . $basename, null, 100);
            echo "Обработал: {$basename}\n";
        }
    }
}
