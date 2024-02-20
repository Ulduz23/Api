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
        $request=$request->validated();
        $blog = Blog::create($request);

        return new BlogResource($blog);
    }

    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }

    public function update(Blog $blog, BlogUpdateRequest $request)
    {
        $request = $request->validated();
        $blog->update($request);

        return new BlogResource($blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Blog deleted'], 204);
    }

}
