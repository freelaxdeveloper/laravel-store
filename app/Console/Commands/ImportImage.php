<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\{Product,Category};
use Storage;
use File;

class ImportImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ImportImage';

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
        $categoriesID = $this->ask('В какие категории добавить? (перечислите ID или названия категорий через запятую)');
        $categoriesID = explode(',', $categoriesID);

        $categories = Category::whereIn('id', $categoriesID)->orWhereIn('name', $categoriesID)->get();

        if (!$categories->count()) {
            return $this->error('Категории не найдены');
        }
        
        $this->comment('Продукты будут добавлены в:');
        $this->info(implode(', ', $categories->pluck('name')->toArray()));
        if (!$this->confirm('Продолжить? (Yes/no)')) {
            return;
        }
        
        $files = Storage::allFiles('images');
        $bar = $this->output->createProgressBar(count($files) - 1);
        foreach ( $files as $file ) {
            $ext = File::extension($file);
            if ( 'gitkeep' == $ext) {
                continue;
            }
            $title = File::name($file);

            $product = new Product;
            $product->title = $title;
            $product->save();

            Storage::copy(($file), "public/uploads/products/{$product->id}/" . time() . md5(microtime()) . '.' . $ext);

            $product->categories()->attach($categories->pluck('id')->toArray());
            $bar->advance();
        }
        $bar->finish();
        $this->info('Finish!');
    }
}
