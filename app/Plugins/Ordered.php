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
        session()->push(self::SESSION_KEY, ['product_id' => $product->id, 'count' => 1]);
        session()->save();

        return $this;
    }

    /**
     * удаление товара из корзины
     */
    public function forget(int $product_id): void
    {
        $keys = collect(session(self::SESSION_KEY))->where('product_id', $product_id)->keys();
        for ($i = 0; $i < count($keys); $i++) {
            session()->forget(self::SESSION_KEY . '.' . $keys[$i]);
        }
        session()->save();
        return;
    }

    public function count(): int
    {
        return $this->products()->sum('count');
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
        static $products;

        if ($products) {
            return $products;
        }
        $products = Product::whereIn('id', $this->productsId())->get();
        $productsCount = $this->productsCount();

        $products = $products->map(function ($product) use ($productsCount) {
            $product->count = $productsCount[$product->id];
            $product->price = price($product->price * $product->count);
            $product->price_old = price($product->price_old * $product->count);
            return $product;
        });

        return $products;
    }

    public function productsId(): Collection
    {
        return collect(session(self::SESSION_KEY, []))->pluck('product_id')->unique();
    }

    public function productsCount(): Collection
    {
        return collect(session(self::SESSION_KEY, []))->pluck('count', 'product_id');
    }

}