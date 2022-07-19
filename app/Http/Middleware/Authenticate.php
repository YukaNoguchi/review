<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{

    // 未ログイン時のリダイレクト先
    protected $user_route  = 'login';
    protected $admin_route = 'admin.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
        if (!$request->expectsJson()) {
            if (Route::is('user.*')) {
                // ルート名が「user」から始まる場合
                return route($this->user_route);
            } else if (Route::is('admin.*')) {
                // ルート名が「admin」から始まる場合
                return route($this->admin_route);
            }
        }
    }
}
