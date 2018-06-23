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
        $product = Product::whereDoesntHave('instagrams')->first();
        $this->sendPhoto($product);
        // $products = Product::whereDoesntHave('instagrams')->get()->take(3);
        // $this->sendAlbum($products);
    }

    public function login(AccountInstagram $account)
    {
        $ig = new Instagram;
        try {
            $ig->login($account->login, $account->password);
            echo "Подключился к {$account->login}\n";
        } catch (\Exception $e) {
            echo "Не смог подключиться к {$account->login}\n";
            return false;
        }
        return $ig;
    }

    public function sendPhoto(Product $product)
    {
        $accounts = AccountInstagram::get();

        foreach ($accounts as $account) {
            if (!$ig = $this->login($account)) {
                continue;
            }
            $ig->timeline->uploadPhoto(url($product->screen), ['caption' => $this->getCaption($product->id)]);
            echo "Скинул №{$product->id}\n\n";
        }
        $product->instagrams()->attach($accounts->pluck('id'));
    }

    public function sendAlbum($products)
    {
        $media = [];
        $accounts = AccountInstagram::get();
        foreach ($products as $product) {
            $media[] = [
                'type' => 'photo',
                'file' => $product->screenPath,
            ];
            $product->instagrams()->attach($accounts->pluck('id'));
        }
        foreach ($accounts as $account) {
            if (!$ig = $this->login($account)) {
                continue;
            }
            $ig->timeline->uploadAlbum($media, ['caption' => $this->getCaption()]);
            echo "Скинул\n\n";
        }
    }

    public function getCaption(?int $product_id): string
    {
        $message = "Звоните: 8 (989) 866 36 70\n";
        if ($product_id)
            $message .= "Посмотреть: http://vikri.ru/product/view/{$product_id}\n";
        $message .= "Кованные ворота, перила и лестницы, входные двери, индивидуальные заказы...отличное качество по доступным ценам.\n";
        $message .= "http://vikri.ru\n";
        return $message;
    }
}
