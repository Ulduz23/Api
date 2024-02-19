<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $blog = Blog::firstOrCreate([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json($blog);
    }


    public function show($id)
    {
        $blog = Blog::find($id);

        return response()->json($blog);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();

        return response()->json($blog);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return response()->json(['message' => 'Blog deleted']);
    }
}
