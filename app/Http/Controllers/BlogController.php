<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(12);

        return BlogResource::collection($blogs);
    }

    public function store(BlogStoreRequest $request)
    {
        $blog = Blog::create($request->only(['title','body']));

        return new BlogResource($blog);
    }

    public function show(Request $request)
    {
        $request->validate([
            'blog_id' => ['required','int','exists:blogs,id']
        ]);

        $blog = Blog::find($request->input('blog_id'));

        return new BlogResource($blog);
    }

    public function update(BlogUpdateRequest $request)
    {
        $blog = Blog::find($request->input('blog_id'));
        $blog->update($request->only(['title','body']));

        return new BlogResource($blog);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'blog_id' => ['required','int','exists:blogs,id']
        ]);

        $blog = Blog::find($request->input('blog_id'));

        $blog->delete();

        return response()->json(['message' => 'Blog deleted'], 204);
    }

}
