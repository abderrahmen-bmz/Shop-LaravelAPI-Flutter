<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private function tagNameExists($tagName)
    {
        $tag = Tag::where('tag', "=", $tagName)->first();

        if (!is_null($tag)) {
            session()->flash('message', 'Tag Name ' . $tag->tag . ' already exists');
            return true;
        }
        return false;
    }

    public function index()
    {
        $tags = Tag::paginate(env('PAGINATE_COUNT'));
        return view('admin.tags.tags')->with([
            'tags' => $tags,
            'showLinks' => true,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required',
        ]);
        $tagName = $request->input('tag_name');

        if ($this->tagNameExists($tagName)) {
            return redirect()->back();
        }

        $tag = new Tag();
        $tag->tag = $request->input('tag_name');
        $tag->save();
        session()->flash('message', 'the tag ' . $tag->tag . ' has been added');
        return redirect()->back();
    }
    public function search(Request $request)
    {

        $request->validate([
            'tag_search' => 'required'
        ]);
        $searchTerm = $request->input('tag_search');


        $tags = Tag::where(
            'tag',
            'LIKE',
            '%' . $searchTerm . '%'
        )->get();
        if (count($tags) > 0) {
            return view('admin.tags.tags')->with([
                'tags' => $tags,
                'showLinks' => false,
            ]);
        }
        session()->flash('message', 'Nothing Found !!');
        return redirect()->back();
    }
    public function update(Request $request)
    {

        $request->validate([
         
            'tag_id' => 'required',
            'tag_name' => 'required',
        ]);
        $tagName = $request->input('tag_name');
        

        if ($this->tagNameExists($tagName)) {
            return redirect()->back();
        }
     

        $tagID = intval($request->input('tag_id'));
        $tag = Tag::find($tagID);

        $tag->tag = $request->input('tag_name');
        $tag->save();
        session()->flash('message', 'Tag ' . $tag->tag . ' has been apdated');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if (
            is_null($request->input('tag_id'))
            || empty($request->input('tag_id'))
        ) {
            session()->flash('message', 'Tag ID is required ');
            return redirect()->back();
        }
        $id = $request->input('tag_id');
        Tag::destroy($id);
        session()->flash('message', 'tag has been deleted');

        return redirect()->back();
    }
}
