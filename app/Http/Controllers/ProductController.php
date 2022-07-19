<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\Favorite;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StorePostRequest;

class ProductController extends Controller
{
    public function userHome()
    {
        $slides = Slide::all();
        $products = Product::take(8)->get();
        return view('product.userHome', ['slides' => $slides, 'products' => $products]);
    }

    public function userShow($product)
    {
        $product = Product::find($product);
        return view('product.userShow', compact('product'));
    }

    // 総合ランキングページ表示処理
    public function allRanking()
    {
        // カテゴリーを取得
        $categories = Category::all();
        // productsテーブルとpostsテーブルの平均pointを取得
        $products = Product::with('postsPoint')->get();
        // 平均pointの降順でソートし、上位3件を取得
        $rankedProducts = $products->sortByDesc(function ($product) {
            return $product->postsPoint->first()->avg;
        })->take(3);

        return view('product.allRanking', compact('rankedProducts', 'categories'));
    }

    public function ranking(Int $category)
    {
        // カテゴリーを取得
        $categories = Category::all();

        $categoryName = "";
        foreach ($categories as $cate) {
            if ($cate->id === $category) {
                $categoryName = $cate->name;
                break;
            }
        }

        $products = Product::with('postsPoint')
            ->where('category', $category)
            ->get();

        return view('product.ranking', compact('categoryName', 'products', 'categories'));
    }

    public function userSearch(Request $request)
    {
        // カテゴリーを取得
        $categories = Category::all();

        $keyword = $request->keyword;

        $products = Product::query()
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('brand', 'like', '%' . $keyword . '%')
            ->take(8)->get();

        return view('product.userSearch', ['keyword' => $keyword, 'products' => $products, 'categories' => $categories]);
    }

    public function userFavorite($product)
    {
        $favorite = new Favorite();
        $favorite->fill([
            'user_id' => Auth::id(),
            'product_id' => $product,
        ])->save();
        return back();
    }

    public function userUnFavorite($product)
    {
        $favorite = Favorite::where('product_id', $product)->where('user_id', Auth::id())->first();
        $favorite->delete();
        return back();
    }

    public function userPost($product, StorePostRequest $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->product_id = $product;
        $post->point = $request->point;
        $post->comment = $request->comment;
        $post->save();
        return redirect()->route('users.products.show', ['product' => $product]);
    }

    public function adminIndex()
    {
        $products = Product::latest('updated_at')->paginate(10);
        return view('product.adminIndex', compact('products'));
    }

    // 商品登録ページ表示処理
    public function adminCreate()
    {
        // カテゴリーを取得
        $categories = Category::all();

        if (session()->has('newProduct')) {
            // プレビューページから遷移時
            // セッションに格納された情報を登録ページへ渡す
            $product = session()->pull('newProduct');
            return view("product.adminCreate", with([
                'product' => $product,
                'categories' => $categories
            ]));
        } else {
            // トップページから遷移時
            // そのまま登録ページを表示する
            return view("product.adminCreate", with([
                'categories' => $categories
            ]));
        }
    }

    // 商品登録プレビューページ表示処理
    public function adminPreview(StoreProductRequest $request)
    {
        // 登録ページから取得した値をモデルに格納
        $product = new Product();
        if ($request->images) {
            $file_name = $request->images->store('public/product_image/');
            $product->images = basename($file_name);
        }
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->category = $request->category;
        // categoryとcategory_2で同じ選択をしていたらcategory_2にはnullを格納
        if ($request->category == $request->category_2) {
            $product->category_2 = null;
        } else {
            $product->category_2 = $request->category_2;
        }
        $product->price = $request->price;
        $product->detail = $request->detail;
        // セッションに格納
        session()->put('newProduct', $product);

        return view('product.adminPreview', compact('product'));
    }

    // 商品登録処理
    public function adminStore(Request $request)
    {
        // type="hidden"で埋め込んだモデルを復元し、テーブルに保存
        $product = new Product();
        $product->forceFill(json_decode($request->product, true))->save();
        // セッションの情報を削除
        session()->forget('newProduct');

        return redirect()
            ->route('admin.products.index')
            ->with('flash_message', '商品登録が完了しました。');
    }

    // 商品編集ページ
    public function adminEdit($product)
    {
        $categories = Category::all();

        $product = Product::find($product);
        return view('product.adminEdit', with([
            'product' => $product,
            'categories' => $categories
        ]));
    }

    // 商品登録プレビューページ
    public function adminEditPreview(StoreProductRequest $request)
    {
        $product_image = new Product();
        if ($request->images) {
            $file_name = $request->images->store('public/product_image/');
            $product_image->images = basename($file_name);
        }

        $products = $request->all();
        return view('product.adminEditPreview', compact('products', 'product_image'));
    }

    // 商品編集機能
    public function adminUpdate(Request $request, $product)
    {
        $product = Product::find($product);
        if(!empty($product->images)){
            Storage::delete('public/product_image/' . $product->images);
        }
        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->price = $request->input('price');
        $product->detail = $request->input('detail');
        $product->category = $request->input('category');
        $product->category_2 = $request->input('category_2');
        $product->images = $request->input('images');

        $product->save();
        return redirect()->route('admin.products.index');
    }

    // 商品削除機能
    public function delete($product)
    {
        $product = Product::find($product);
        if(!empty($product->images)){
            Storage::delete('public/product_image/' . $product->images);
        }
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
