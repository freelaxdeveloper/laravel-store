<?php
# https://github.com/etrepat/baum#creating-root-node
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category,Product};
use Auth;

class CategoryController extends Controller
{
    
    public function view(Category $category)
    {
        $products = Product::categorized($category)->paginate(15);
        //dd($products->toArray());
        if (Auth::user() && Auth::user()->hasRole('Admin')) {
            $actions = [
                ['link' => route('prod.add', [$category]), 'title' => 'Добавить товар'],
                ['link' => route('cat.new', [$category]), 'title' => 'Добавить подкатегорию'],
                ['link' => '', 'title' => 'Изменть категорию'],
                ['link' => route('cat.delete', [$category]), 'title' => 'Удалить категорию'],
            ];
        }
 
        return view('categories.view', compact('category', 'products', 'actions'));
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
            Category::create(['name' => $request->name]);
        } else {
            $category->children()->create(['name' => $request->name]);
        }
        return redirect()->route('cat');
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
