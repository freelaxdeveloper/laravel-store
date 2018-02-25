<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AccountInstagram;
use Gumlet\ImageResize as Resize;


class UploadAlbumInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UploadAlbumInstagram';

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
        $accounts = AccountInstagram::get();

        foreach ($accounts as $account) {
            echo "Подключаюсь к: {$account->login}\n";
            $this->sendAlbum($account);
        }
    }

    public function sendAlbum(AccountInstagram $account)
    {
        $ig = new \InstagramAPI\Instagram;
        try {
            $ig->login($account->login, $account->password);
            echo "Подключился\n";
        } catch (\Exception $e) {
            echo "Не смог подключиться\n";
            return;
        }

        try {
            $captionText = "Phone: 0xxxxxxxxx\n";
            $photoFilename = base_path() . '/storage/images/test.jpg';
            $images = glob(base_path() . '/storage/images/resize/*.jpg');
            $media = [];
            for ($i = 0; $i < count($images); $i++) {
                $image = new Resize($images[$i]);
                if (1080 < $image->getSourceWidth()) {
                    continue;
                }
                $media[] = [
                    'type' => 'photo',
                    'file' => $images[$i],
                ];
            }
            echo "Скидываю фотки\n";
            $ig->timeline->uploadAlbum($media, ['caption' => $captionText]);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }
        echo "Конец\n\n";
    }
}
