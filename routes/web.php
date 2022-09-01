<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


//ユーザー側ログイン・新規登録
Route::get('login', 'Auth\Users\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\Users\LoginController@login');

Route::get('register', 'Auth\Users\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\Users\RegisterController@register');

//管理者側ログイン・新規登録
Route::get('admin/login', 'Auth\Admins\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\Admins\LoginController@login');

Route::get('admin/register', 'Auth\Admins\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'Auth\Admins\RegisterController@register');

//ユーザー側ログアウト
Route::post('logout', 'Auth\Users\LoginController@logout')->name('logout');

//管理者側ログアウト
Route::post('admin/logout', 'Auth\Admins\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'auth:user'], function () {
    //【ユーザー】トップページ
    Route::get('/', 'ProductController@userHome')->name('users.home');

    //【ユーザー】検索ページ・機能
    Route::get('search/{category?}', 'ProductController@userSearch')->name('users.search');

    //【ユーザー】商品詳細ページ
    Route::get('products/{product}', 'ProductController@userShow')->name('users.products.show');

    //【ユーザー】商品お気に入り機能
    Route::post('products/favorite/{product}', 'ProductController@userFavorite')->name('users.products.favorite');

    //【ユーザー】商品お気に入り解除機能
    Route::delete('products/unfavorite/{product}', 'ProductController@userUnFavorite')->name('users.products.unfavorite');

    //【ユーザー】口コミ投稿機能
    Route::post('products/post/{product}', 'ProductController@userPost')->name('users.products.post');

    //【ユーザー】口コミ一覧ページ
    Route::get('posts', 'PostController@userIndex')->name('users.posts.index');

    //【ユーザー】いいね機能
    Route::post('posts/like/{post}', 'PostController@userLike')->name('users.posts.like');

    //【ユーザー】いいね解除機能
    Route::delete('posts/unlike/{post}', 'PostController@userUnLike')->name('users.posts.unlike');

    //【ユーザー】ブログ一覧ページ
    Route::get('blogs', 'BlogController@index')->name('users.blogs.index');

    //【ユーザー】ブログ詳細ページ
    Route::get('blogs/{blog}', 'BlogController@show')->name('users.blogs.show');

    //【ユーザー】フォロー機能
    Route::post('follow/{user}', 'UserController@follow')->name('users.follow');

    //【ユーザー】フォロー解除
    Route::delete('unfollow/{user}', 'UserController@unfollow')->name('users.unfollow');

    //【ユーザー】総合ランキングページ
    Route::get('ranking', 'ProductController@allRanking')->name('users.products.allRanking');

    //【ユーザー】カテゴリー別ランキングページ
    Route::get('ranking/{category}', 'ProductController@ranking')->name('users.products.ranking');

    //【ユーザー】フォローページ
    Route::get('follows/tabs/{tab?}', 'UserController@followIndex')->name('users.follows.index');

    //【ユーザー】フォロー一覧ページ
    Route::get('follows/{user}', 'UserController@followList')->name('users.follows.followList');

    //【ユーザー】フォロワー一覧ページ
    Route::get('followers/{user}', 'UserController@followerList')->name('users.follows.followerList');

    //【ユーザー】お知らせ一覧ページ
    Route::get('announces', 'AnnounceController@userIndex')->name('users.announces.index');

    //【ユーザー】お知らせ詳細ページ
    Route::get('announces/{announce}', 'AnnounceController@userShow')->name('users.announces.show');

    //【ユーザー】マイページ
    Route::get('mypage', 'UserController@mypage')->name('users.mypage');

    //【ユーザー】ブログ投稿ページ
    Route::get('blog/create', 'BlogController@create')->name('users.blogs.create');

    //【ユーザー】ブログ投稿機能
    Route::post('blog/store', 'BlogController@store')->name('users.blogs.store');

    //【ユーザー】ブログ編集ページ
    Route::get('blog/edit/{blog}', 'BlogController@edit')->name('users.blogs.edit');

    //【ユーザー】ブログ編集機能
    Route::post('blog/{blog}/update', 'BlogController@update')->name('users.blogs.update');

    //【ユーザー】ブログ削除機能
    Route::post('blog/{blog}/delete', 'BlogController@delete')->name('users.blogs.delete');

    //【ユーザー】プロフィール編集ページ
    Route::get('profile/edit', 'UserController@edit')->name('users.profile.edit');

    //【ユーザー】プロフィール編集機能
    Route::put('profile/update', 'UserController@update')->name('users.profile.update');

    //【ユーザー】メールアドレス編集ページ
    Route::get('email/edit', 'UserController@emailEdit')->name('users.email.edit');

    //【ユーザー】メールアドレス編集機能
    Route::put('email/update', 'UserController@emailUpdate')->name('users.email.update');

    //【ユーザー】パスワード編集ページ
    Route::get('password/edit', 'UserController@passwordEdit')->name('users.password.edit');

    //【ユーザー】パスワード編集機能
    Route::put('password/update', 'UserController@passwordUpdate')->name('users.password.update');

    //【ユーザー】他者プロフィールページ
    Route::get('users/{user}/tabs/{tab?}', 'UserController@show')->name('users.profiles.show');

    // chatbotのルーティング
Route::get('sample', function () {
    return view('sample');
});

Route::get('/tasks', function () {
    return view('task');
});

Route::post('/send-message', function (Request $request) {
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
    // return view('index');
    return ["success" => true];

});

});

Route::group(['middleware' => 'auth:admin'], function () {
    //【管理者】トップページ
    Route::get('admin', 'AdminController@home')->name('admin.home');

    //【管理者】商品登録ページ
    Route::get('admin/products/create', 'ProductController@adminCreate')->name('admin.products.create');

    //【管理者】商品プレビュー
    Route::post('admin/products/preview', 'ProductController@adminPreview')->name('admin.products.preview');

    //【管理者】商品登録機能
    Route::post('admin/products/store', 'ProductController@adminStore')->name('admin.products.store');

    //【管理者】商品編集ページ
    Route::get('admin/products/edit/{product}', 'ProductController@adminEdit')->name('admin.products.edit');

    //【管理者】商品編集プレビュー
    Route::post('admin/products/edit-preview', 'ProductController@adminEditPreview')->name('admin.products.editPreview');

    //【管理者】商品編集機能
    Route::post('admin/products/update/{product}', 'ProductController@adminUpdate')->name('admin.products.update');

    //【管理者】商品削除機能
    Route::post('admin/products/delete/{product}', 'ProductController@delete')->name('admin.products.delete');

    //【管理者】商品一覧ページ
    Route::get('admin/products', 'ProductController@adminIndex')->name('admin.products.index');

    //【管理者】広告登録ページ
    Route::get('admin/slides/create', 'SlideController@adminCreate')->name('admin.slides.create');

    //【管理者】広告プレビュー
    Route::post('admin/slides/preview', 'SlideController@adminPreview')->name('admin.slides.preview');

    //【管理者】広告登録機能
    Route::post('admin/slides/store', 'SlideController@adminStore')->name('admin.slides.store');

    //【管理者】広告一覧ページ
    Route::get('admin/slides', 'SlideController@adminIndex')->name('admin.slides.index');

    //【管理者】広告編集ページ
    Route::get('admin/slides/edit/{slide}', 'SlideController@adminEdit')->name('admin.slides.edit');

    //【管理者】広告プレビューページ
    Route::post('admin/slides/edit-preview', 'SlideController@adminEditPreview')->name('admin.slides.editPreview');

    //【管理者】広告編集機能
    Route::post('admin/slides/update/{slide}', 'SlideController@adminUpdate')->name('admin.slides.update');

     //【管理者】広告削除機能
    Route::post('admin/slides/delete/{slide}', 'SlideController@adminDelete')->name('admin.slides.delete');

    //【管理者】通知一覧ページ
    Route::get('admin/announces', 'AnnounceController@adminIndex')->name('admin.announces.index');

    //【管理者】通知作成ページ
    Route::get('admin/announces/create', 'AnnounceController@adminCreate')->name('admin.announces.create');

    //【管理者】通知プレビューページ
    Route::post('admin/announces/preview', 'AnnounceController@adminPreview')->name('admin.announces.preview');

    //【管理者】通知作成機能
    Route::post('admin/announces/store', 'AnnounceController@adminStore')->name('admin.announces.store');

    //【管理者】通知編集ページ
    Route::get('admin/announces/edit/{announce}', 'AnnounceController@adminEdit')->name('admin.announces.edit');

    //【管理者】通知編集プレビュー
    Route::post('admin/announces/edit-preview', 'AnnounceController@adminEditPreview')->name('admin.announces.editPreview');

    //【管理者】通知編集機能
    Route::post('admin/announces/update', 'AnnounceController@adminUpdate')->name('admin.announces.update');

    //【管理者】通知削除機能
    Route::delete('admin/announces/delete/{announce}', 'AnnounceController@adminDelete')->name('admin.announces.delete');

    //【管理者】アカウント編集ページ
    Route::get('admin/edit', 'AdminController@edit')->name('admin.edit');

    //【管理者】アカウント名編集ページ
    Route::get('admin/name/edit', 'AdminController@nameEdit')->name('admin.name.edit');

    //【管理者】アカウント名編集機能
    Route::put('admin/name/update', 'AdminController@nameUpdate')->name('admin.name.update');

    //【管理者】メールアドレス変更ページ
    Route::get('admin/email/edit', 'AdminController@emailEdit')->name('admin.email.edit');

    //【管理者】メールアドレス編集機能
    Route::put('admin/email/update', 'AdminController@emailUpdate')->name('admin.email.update');

    //【管理者】パスワード変更ページ
    Route::get('admin/password/edit', 'AdminController@passwordEdit')->name('admin.password.edit');

    //【管理者】パスワード編集機能
    Route::post('admin/password/update', 'AdminController@passwordUpdate')->name('admin.password.update');
});

// Auth::routes();
// ↑UIインストールで追加された？

Route::get('welcome', 'HomeController@index')->name('welcome');

// Route::get('/{any}', function(){
//     return view('App');
// })->where('any', '.*');
// // .*は、正規表現で0文字以上の任意の文字列を意味する
