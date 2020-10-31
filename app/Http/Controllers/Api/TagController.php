<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Tag;

class TagController extends Controller
{
 public function index(){
    return TagResource::collection(Tag::paginate());
 }

 public function show($id){
     return new TagResource(Tag::find($id));
 }
}
