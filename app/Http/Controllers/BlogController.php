<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest('updated_at')->paginate(10);
        return view('blog.index', compact('blogs'));
    }
    // ブログ詳細取得処理
    public function show($blog)
    {
        $blog = Blog::find($blog);

        return view('blog.show', compact('blog'));
    }

    //ブログ投稿ページ
    public function create()
    {
        return view('blog.create');
    }

    //ブログ投稿機能
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->contents = $request->contents;
        if ($request->image) {
            $image_counter = 1;
            for ($i = 0; $i < count($request->image); $i++) {
                ${"image_name" . $i} = $request['image.' . $i]->store('public/blog_image/');
                $blog->{"image_{$image_counter}"} = basename(${"image_name" . $i});
                $image_counter++;
            }
        }
        $blog->save();
        return redirect()->route('users.home');
    }
    //ブログ編集ページ
    public function edit($blog)
    {
        $blog = Blog::find($blog);
        return view('blog.edit', ['blog' => $blog]);
    }
    //ブログ編集機能
    public function update(StoreBlogRequest $request, $blog)
    {
        $blog = Blog::find($blog);
        if(!empty($blog->image_1)){
            Storage::delete('public/blog_image/' . $blog->image_1);
        }
        if(!empty($blog->image_2)){
            Storage::delete('public/blog_image/' . $blog->image_2);
        }
        if(!empty($blog->image_3)){
            Storage::delete('public/blog_image/' . $blog->image_3);
        }
        if(!empty($blog->image_4)){
            Storage::delete('public/blog_image/' . $blog->image_4);
        }

        $blog->user_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->contents = $request->contents;
        if ($request->image) {
            $image_counter = 1;
            for ($i = 0; $i < count($request->image); $i++) {
                ${"image_name" . $i} = $request['image.' . $i]->store('public/blog_image/');
                $blog->{"image_{$image_counter}"} = basename(${"image_name" . $i});
                $image_counter++;
            }
        }
        $blog->save();
        return redirect('/');
    }
    //ブログ削除機能
    public function delete(Int $blog)
    {
        $blog = Blog::find($blog);
        if(!empty($blog->image_1)){
            Storage::delete('public/blog_image/' . $blog->image_1);
        }
        if(!empty($blog->image_2)){
            Storage::delete('public/blog_image/' . $blog->image_2);
        }
        if(!empty($blog->image_3)){
            Storage::delete('public/blog_image/' . $blog->image_3);
        }
        if(!empty($blog->image_4)){
            Storage::delete('public/blog_image/' . $blog->image_4);
        }

        $blog->delete();
        return redirect()->route('users.blogs.index');
    }
}