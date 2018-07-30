<?php
# https://github.com/etrepat/baum#creating-root-node
namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\{Category,Product};
use Auth;
use Illuminate\Support\Facades\Schema;

class CategoryController extends Controller
{
    
    public function view(Category $category)
    {
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

        $products = Product::with(['comments'])->withCount(['comments'])->when($sort, function ($query) use ($sort, $order) {
            return $query->orderBy($sort, $order);
        })->when($minPrice, function ($query) use ($minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($maxPrice, function ($query) use ($maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->categorized($category)->paginate($limit);

        if (Auth::user() && Auth::user()->hasRole('Admin')) {
            $actions = [
                ['link' => route('prod.add', [$category]), 'title' => 'Добавить товар'],
                ['link' => route('cat.new', [$category]), 'title' => 'Добавить подкатегорию'],
                ['link' => '', 'title' => 'Изменть категорию'],
                ['link' => route('cat.delete', [$category]), 'title' => 'Удалить категорию'],
            ];
        }

        View::share('currentCategoriesId', $category->getAncestorsAndSelf()->pluck(['id'])->toArray());
        return view('categories.view', compact('category', 'products', 'actions', 'currentCategoriesId'));
    }

    public function index()
    {
        $categories = Category::all()->toHierarchy();
        return view('categories.list', compact('categories'));
    }
    
    public function new(Category $category = null)
    {
        if (null === $category) {
            $category = new \stdClass;
            $category->id = null;
            $category->name = null;
        }
        return view('categories.new', compact('category'));
    }

    public function newPost(Request $request, Category $category = null)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        if (null === $category) {
            $newCategory = Category::create(['name' => $request->name]);
        } else {
            $newCategory = $category->children()->create(['name' => $request->name]);
        }
        return redirect()->route('cat.view', compact('newCategory'));
    }
    
    public function delete(Category $category)
    {
        $category_id = $category->id;
        $backCategory = $category->getAncestorsAndSelf()->first();
        $category->delete();
        if ($backCategory && $category_id != $backCategory->id) {
            return redirect()->route('cat.view', [$backCategory]);
        }
        return redirect()->route('cat');
    }

}
