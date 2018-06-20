<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{View, Cache};
use App\{Category,Chat};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Cache::remember() - извлечение данных из кеша, если их нету добавляет
         * @param string ключ для получения данных
         * @param int время хранения
         * @param closure получение новых данных 
         * https://laravel.com/docs/5.6/cache
         */
        try {
            $categories = Cache::remember('categories', 15, function () {
                return Category::roots()->withCount('products')->get();
            });
            $chats = Chat::with(['user'])->orderBy('id', 'desc')->get()->take(20);
            View::share('categories', $categories);
            View::share('chats', $chats);
            View::share('currentCategoriesId', []);

        } catch (\Exception $e) {}
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
