<?php namespace App\Plugins;

use Illuminate\Support\Collection;
use App\Product;

/**
 * Класс для управления заказами в корзине
 */
class Ordered {

    const SESSION_KEY = 'orders';

    /**
     * добавить товар в корзину
     */
    public function push(Product $product): self
    {
        session()->push(self::SESSION_KEY, $product->id);
        session()->save();

        return $this;
    }

    public function count(): int
    {
        return $this->productsId()->count();
    }

    public function pull(): Collection
    {
        $products = $this->products();
        $this->clear();

        return $products;
    }

    public function clear(): self
    {
        session()->forget(self::SESSION_KEY);

        return $this;
    }

    public function products(): Collection
    {
        $products = Product::whereIn('id', $this->productsId())->get();
        
        $products = $products->map(function ($product) {
            $product->price = price($product->price);
            return $product;
        });

        return $products;
    }

    public function productsId(): Collection
    {
        return collect(session('orders', []))->unique();
    }

}