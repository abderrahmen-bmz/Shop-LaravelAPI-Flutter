<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::paginate(env("PAGINATION_COUNT")));
    }

    public function show($id)
    {
        return new CategoryResource(Category::find($id));
    }
}
