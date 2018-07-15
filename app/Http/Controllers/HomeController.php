<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Product};
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Jobs\{UserJob, OneJob, TwoJob, ThreeJob};
use Gumlet\ImageResize as Resize;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function resize()
    {
        // $product = Product::first();
        // //Storage::disk('s3')->put('t2.jpg', file_get_contents($product->screen['image']->size(50, 50)['path']), 'public');
        // Storage::disk('s3')->makeDirectory('test');
        // echo Storage::disk('s3')->url('products-photo/t2.jpg');
        // echo "<img src='{$product->screen['image']->size(50, 50)['src']}' />";
        // dd();
        $product = Product::first();
        echo "<img src='{$product->screen['image']->size(240, 320)['src']}' />";
        dd();
        $product = Product::first();
        $screen = $product->screen['path'];

        $image = new Resize($screen);
        $image->crop(240, 320, Resize::CROPCENTER);

        $result = $image->save(base_path() . '/public/test2.jpg', null, 100);
        
        echo '<img src="/test2.jpg" />';
    }

    public function effect(Request $request)
    {
        if (View::exists('effects.' . $request->effect)) {
            return view('effects.' . $request->effect);
        }
        return '=)';
    }

    public function telegram()
    {
        $messageText = 'dfdfff';
        // for($i = 0; $i < 10; $i++)
        // $messageText .= 'lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol lol ';
        $chatId = '@dcms_pro';
        $bot = new \TelegramBot\Api\BotApi(env('TELEGRAM_BOT'));

        //$bot->sendMessage('@dcms_pro', $messageText);
        $media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
        $media->addItem(new \TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://cdn.taburetka.ua/4e/73/h9dvedkihb9rbv0ff9ahefqougavm.jpg', "description description description description description description description description description description description description description description\nhttps://скачай-ка.рф"));
        //$media->addItem(new \TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
        // Same for video
        // $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
        $bot->sendMediaGroup($chatId, $media);
        $bot->sendMessage($chatId, $messageText);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // configure with favored image driver (gd by default)
        // Image::configure(array('driver' => 'imagick'));

        // $watermark = Image::make(public_path('images/avatar.png'))->opacity(50)->rotate(-45);
        // return Image::make(public_path('images/nature.jpeg'))->text('foo2', 0, 0, function($font) {
        //     $font->file(base_path("/resources/assets/fonts/OpenSans-Bold.ttf"));
        //     $font->size(24);
        //     $font->color('#333');
        //     $font->align('center');
        //     $font->valign('top');
        //     //$font->angle(45);
        // })->opacity(100)->insert($watermark, 'bottom-right', 10, 10)->response('png');
        // Storage::delete('public/uploads/lMrCA7sLmhKq8YZ0sAtvCmXbiobEYyqrUMakzFSA.jpeg');
        // dd(\Storage::allFiles('public/uploads'));
        // dd( order()->products()->sum('count') );
        // $user = \Auth::user();
        // Mail::send('emails.q', ['user' => $user], function ($m) use ($user) {
        //     $m->from('hello@app.com', 'Your Application');
      
        //     $m->to($user->email, $user->name)->subject('Your Reminder!');
        // });
        $user = \Auth::user();

        // OneJob::withChain([
        //     (new TwoJob($user, 2))->delay(5),
        //     (new ThreeJob($user, 3))->delay(5),
        // ])->dispatch($user, 1)->delay(5);


 /*         $nova_poshta = new \App\Plugins\NovaPoshta;
        $regions = $nova_poshta->getRegions();
        $cities = $nova_poshta->getCities('db5c88de-391c-11dd-90d9-001a92567626');
        $offices = $nova_poshta->getOffices('a9522a7e-eaf5-11e7-ba66-005056b2fc3d');
 */
        /* foreach ( $cities as $city ) {
            echo "{$city->Description} ({$city->Ref})<br/>";
        } */
        /* foreach ( $offices as $office ) {
            echo "{$office->Description}<br/>";
        } */
        // b3debd00-89b4-11e3-b441-0050568002cf
        // dd($regions);
        if ( !request()->has('limit') ) {
            request()->merge(['limit' => 20]);
        }
        $limit = request()->get('limit');

        $columns = Schema::getColumnListing('products');
        if ( !request()->has('sort') || !in_array(request()->get('sort'), $columns) ) {
            request()->merge(['sort' => 'created_at']);
        }
        $sort = request()->get('sort');
        $order = request()->get('order') ?? 'desc';
        $minPrice = request()->get('minPrice');
        $maxPrice = request()->get('maxPrice');

        $products = Product::when($sort, function ($query) use ($sort, $order) {
            return $query->orderBy($sort, $order);
        })->when($minPrice, function ($query) use ($minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($maxPrice, function ($query) use ($maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->paginate($limit);

        return view('home', compact('products'));
    }
}
