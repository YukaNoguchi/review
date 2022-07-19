<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function userIndex(){
    $posts = Post::latest('updated_at')->paginate(10);
    $likes = Like::where('user_id', Auth::id())->get()->toArray();
    return view('post.userIndex', compact('posts','likes'));
  }
  public function userLike($post){
    $like = new Like();
    $like->fill([
      'user_id' => Auth::id(),
      'post_id' => $post,
    ])->save();
    return back();
  }
  public function userUnLike($post){
    $like = Like::where('post_id',$post)->where('user_id',Auth::id())->first();
    $like->delete();
    return back();
  }
}
