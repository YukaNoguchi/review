<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NameUpdateRequest;
use App\Http\Requests\AdminEmailUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class AdminController extends Controller
{
    // トップページ表示処理
    public function home()
    {
        return view('admin.home');
    }

    //【管理者】アカウント編集ページ
    public function edit()
    {
        return view('admin.edit');
    }

    //【管理者】アカウント名編集ページ
    public function nameEdit()
    {
        return view('admin.nameEdit');
    }

    //【管理者】アカウント名編集機能
    public function nameUpdate(NameUpdateRequest $request)
    {
        Auth::user()
            ->update([
                'name' => $request->name
            ]);
        return redirect()->route('admin.edit')->with('flash_message', 'アカウント名を変更しました');
    }

    //【管理者】メールアドレス変更ページ
    public function emailEdit()
    {
        $user = Auth::user();
        return view('admin.emailEdit', compact('user'));
    }

    //【管理者】メールアドレス編集機能
    public function emailUpdate(AdminEmailUpdateRequest $request)
    {
        Auth::user()
            ->update([
                'email' => $request->email
            ]);
        return redirect()->route('admin.edit')->with('flash_message', 'メールアドレスを変更しました');
    }

    //【管理者】パスワード変更ページ
    public function passwordEdit()
    {
        return view('admin.passwordEdit');
    }

    //【管理者】パスワード編集機能
    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        Auth::user()
            ->update([
            'password' => Hash::make($request->password)
            ]);
        return redirect()->route('admin.edit')->with('flash_message', 'パスワードを変更しました');
    }
}
