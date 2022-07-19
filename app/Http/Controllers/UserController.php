<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use App\User;
use App\Follow;
use App\Post;
use App\Blog;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\EmailUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('user.mypage', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', ['user' => $user]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        if(!empty($user->icon)){
            Storage::delete('public/user_icon/' . $user->icon);
        }
        if ($request['file']) {
            $file_name = $request['file']->store('public/user_icon/');
            $user->icon = basename($file_name);
        }
        $user->fill($request->all())->save();

        return redirect()->route('users.home');
    }

    public function show($user, $tab = null)
    {
        $user = User::find($user);
        $followList = Follow::where('following_id', Auth::id())->get()->toArray();
        if ($tab == null) {
            $posts = $user->posts()->paginate(5);
            return view('user.profile.posts', compact('user', 'followList', 'posts'));
        } else if ($tab == 1) {
            $blogs = $user->blogs()->paginate(5);
            return view('user.profile.blogs', compact('user', 'followList', 'blogs'));
        } else if ($tab == 2) {
            $likePosts = $user->likePosts()->paginate(5);
            return view('user.profile.likePosts', compact('user', 'followList', 'likePosts'));
        } else if ($tab == 3) {
            $favoriteProducts = $user->favoriteProducts()->paginate(5);
            return view('user.profile.favoriteProducts', compact('user', 'followList', 'favoriteProducts'));
        }
    }

    public function follow($user)
    {
        $follow = User::find($user);
        Follow::insert([
            'following_id' => Auth::id(),
            'followed_id' => $follow->id
        ]);
        return redirect()->route('users.profile.show', ['user' => $follow->id]);
    }

    public function unfollow($user)
    {
        $unfollow = User::find($user);
        Follow::where([
            'following_id' => Auth::id(),
            'followed_id' => $unfollow->id,
        ])
            ->delete();
        return redirect()->route('users.profiles.show', ['user' => $follow->id]);
    }

    public function emailEdit()
    {
        $user = Auth::user();
        return view('user.emailEdit', ['user' => $user]);
    }

    public function emailUpdate(EmailUpdateRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->all())->save();

        return redirect()->route('users.home');
    }

    public function passwordEdit()
    {
        $user = Auth::user();

        return view('user.passwordEdit', ['user' => $user]);
    }

    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.home');
    }

    public function followIndex($tab = null)
    {
        $users = User::find(Auth::id());
        if($tab == null){
            return view('user.followIndexBlogs', compact('users'));
        }elseif($tab == 1){
            return view('user.followIndexPosts', compact('users'));
        }else{
            return view('user.followIndexBlogs', compact('users'));
        }
    }

    public function followList(Int $user)
    {
        $user = User::find($user);
        $followList = Follow::where('following_id', Auth::id())->get()->toArray();
        return view('user.followList', compact('user', 'followList'));
    }

    public function followerList(Int $user)
    {
        $user = User::find($user);
        $followList = Follow::where('following_id', Auth::id())->get()->toArray();
        return view('user.followerList', compact('user', 'followList'));
    }
}