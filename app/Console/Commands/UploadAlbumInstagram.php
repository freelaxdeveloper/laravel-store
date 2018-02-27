<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AccountInstagram;
use Gumlet\ImageResize as Resize;
use App\Product;
use InstagramAPI\Instagram;

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
        $product = Product::where('instagram', 0)->first();
        $this->sendPhoto($product);
        // $products = Product::where('instagram', 0)->get()->take(3);
        // $this->sendAlbum($products);
    }

    public function login(AccountInstagram $account)
    {
        $ig = new Instagram;
        try {
            $ig->login($account->login, $account->password);
            echo "Подключился к {$account->login}\n";
        } catch (\Exception $e) {
            echo "Не смог подключиться\n";
            return false;
        }
        return $ig;
    }

    public function sendPhoto(Product $product)
    {
        $accounts = AccountInstagram::where('login', 'vorota_vikri')->get();

        foreach ($accounts as $account) {
            if (!$ig = $this->login($account)) {
                return;
            }
            $ig->timeline->uploadPhoto($product->screenPath, ['caption' => $this->getCaption()]);
            echo "Скинул №{$product->id}\n\n";
        }
        $product->instagram = 1;
        $product->save();
    }

    public function sendAlbum($products)
    {
        $media = [];
        $accounts = AccountInstagram::where('login', 'vorota_vikri')->get();
        foreach ($products as $product) {
            $media[] = [
                'type' => 'photo',
                'file' => $product->screenPath,
            ];        
        }
        foreach ($accounts as $account) {
            if (!$ig = $this->login($account)) {
                return;
            }
            $ig->timeline->uploadAlbum($media, ['caption' => $this->getCaption()]);
            echo "Скинул\n\n";
        }
        Product::whereIn('id', $products->pluck('id'))->update(['instagram' => 1]);
    }

    public function getCaption()
    {
        return "Phone: 8 (989) 866 36 70";
    }
}
