<?php
# https://github.com/etrepat/baum#creating-root-node
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    public function view(Category $category)
    {

        return view('categories.view', compact('category'));
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
        $category->delete();

        return redirect()->back();
    }

}
