<?php

namespace App;

use App\Product;
use Illuminate\Support\Collection;

class ProductScreen {

    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * путь к категории со скринами
     */
    public function getPath(string $path = null): string
    {
        return public_path("/images/products/{$this->product->id}/{$path}");
    }

    /**
     * весь список скриншотов к продукту
     */
    public function all(): Collection
    {
        $screens = [];
        $files = glob($this->getPath('*'));
        for($i = 0, $id = 1; $i < count($files); $i++, $id++) {
            $screens[] = $this->screen($files[$i], $id);
        }
        if (!$screens) {
            $screens[] = $this->default();
        }
        return collect($screens);
    }

    /**
     * скриншот по умолчанию
     */
    public function default(): array
    {
        return $this->screen(public_path() . '/images/default.png', 1);
    }

    /**
     * удаление скриншота по ID
     */
    public function deleteById(int $screen_id): bool
    {
        $screen = $this->all()->firstWhere('id', $screen_id);
        return unlink($screen['path']);
    }

    /**
     * формирование данных к скриншоту
     */
    public function screen(string $path, int $id): array
    {
        $screen = pathinfo($path);
        $screen['src'] = str_replace(public_path(), '', $path);
        $screen['path'] = $screen['dirname'] . '/' . $screen['basename'];
        $screen['id'] = $id;

        return $screen;
    }
}