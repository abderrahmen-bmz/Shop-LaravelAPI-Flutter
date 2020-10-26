<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private function categoryNameExists($categoryName)
    {
        $category = Category::where('name', "=", $categoryName)->first();

        if (!is_null($category)) {
            session()->flash('message', 'Category Name ' . $category->name . ' already exists');
            return true;
        }
        return false;
    }
    public function index()
    {
        return view('admin.categories.categories')->with([
            'categories' => Category::paginate(env('PAGINATE_COUNT')),
            'showLinks' => true,
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required'
        ]);
        $categoryName = $request->input('category_name');

        if ($this->categoryNameExists($categoryName)) {
            return redirect()->back();
        }

        $category = new Category();
        $category->name = $request->input('category_name');
        $category->save();
        session()->flash('message', 'the category ' . $category->name . ' has been added');
        return redirect()->back();
    }
    public function  search(Request $request)
    {
        
        $request->validate([
            'category_search' => 'required'
        ]);
        $searchTerm = $request->input('category_search');


        $categories = Category::where(
            'name',
            'LIKE',
            '%' . $searchTerm . '%'
        )->get();
        if (count($categories) > 0) {
            return view('admin.categories.categories')->with([
                'categories' => $categories,
                'showLinks' => false,
            ]);
        }
        session()->flash('message', 'Nothing Found !!');
        return redirect()->back();
    }
    public function update(Request $request)
    {

        $request->validate([
         
            'category_id '=> 'required',
            'category_name' => 'required',
        ]);
        $categoryName = $request->input('category_name');
        

        if ($this->categoryNameExists($categoryName)) {
            return redirect()->back();
        }
     

        $categoryID = intval($request->input('category_id'));
        $category = Category::find($categoryID);

        $category->name = $request->input('tag_name');
        $category->save();
        session()->flash('message', 'Tag ' . $category->nametag . ' has been apdated');
        return redirect()->back();
    }
    public function  delete(Request $request)
    {
        if (
            is_null($request->input('category_id'))
            || empty($request->input('category_id'))
        ) {
            session()->flash('message', 'Category ID is required ');
            return redirect()->back();
        }
        $id = $request->input('category_id');
        Category::destroy($id);
        session()->flash('message', 'Category has been deleted');

        return redirect()->back();
    }
}
