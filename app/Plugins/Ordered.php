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

    public function orders(): Collection
    {
        return collect(session(self::SESSION_KEY, []));
    }

    public function updateCountProduct(int $product_id, int $count = 1)
    {
        $orders =  $this->orders();

        if (!$orders->where('product_id', $product_id)->count()) {
            return $this;
        }
        $keys = $orders->where('product_id', $product_id)->keys();

        $order = $orders[$keys[0]];
        $order['count'] = $count;
        // ++$order['count'];

        $orders->forget($keys[0]);
        $orders->push($order);

        session(['orders' => $orders]);
        session()->save();

        return $this;
    }

    public function toArray()
    {
        $products = $this->products();
        return [
            'products' => $products,
            'count' => $products->sum('count'),
            'count_sum' => $products->sum('price'),
        ];
    }

    /**
     * удаление товара из корзины
     */
    public function forget(int $product_id): Collection
    {
        $keys = $this->orders()->where('product_id', $product_id)->keys();
        for ($i = 0; $i < count($keys); $i++) {
            session()->forget(self::SESSION_KEY . '.' . $keys[$i]);
        }
        session()->save();
        return $this->products();
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
        // static $products;

        // if ($products) {
        //     return $products;
        // }
        $products = Product::whereIn('id', $this->productsId())->get();
        $productsCount = $this->productsCount();

        $products = $products->map(function ($product) use ($productsCount) {
            $product->count = $productsCount[$product->id];
            $product->price_origin = price($product->price);
            $product->price = price($product->price * $product->count);
            $product->price_old = price($product->price_old * $product->count);
            return $product;
        });

        return $products;
    }

    public function productsId(): Collection
    {
        return $this->productsCount()->keys();
    }

    public function productsCount(): Collection
    {
        return $this->orders()->sortBy('count')->pluck('count', 'product_id');
    }

}