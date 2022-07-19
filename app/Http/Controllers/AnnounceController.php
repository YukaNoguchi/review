<?php

namespace App\Http\Controllers;

use App\Announce;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnounceRequest;

class AnnounceController extends Controller
{
    public function userIndex()
    {
        $announces = Announce::latest('updated_at')->paginate(10);
        return view('announce.userIndex', compact('announces'));
    }

    public function userShow($announce)
    {
        $announce = Announce::find($announce);
        return view('announce.userShow', compact('announce'));
    }

    //【管理者】通知一覧ページ
    public function adminIndex()
    {
        $announces = Announce::paginate(10);
        return view('announce.adminIndex', compact('announces'));
    }

    //【管理者】通知作成ページ
    public function adminCreate()
    {
        return view('announce.adminCreate');
    }

    //【管理者】通知プレビューページ
    public function adminPreview(StoreAnnounceRequest $request)
    {
        $announce = $request->all();
        return view('announce.adminPreview', compact('announce'));
    }

    //【管理者】通知作成機能
    public function adminStore(Announce $announce, Request $request)
    {
        if (isset($request['action'])) {
            return redirect()->route('admin.announces.create')->withInput();
        } else {
            $announce->fill($request->all())->save();
            return redirect()->route("admin.announces.index")->with('flash_message', '通知登録が完了しました');
        }
    }

    //【管理者】通知編集ページ
    public function adminEdit(Announce $announce)
    {
        return view('announce.adminEdit', compact('announce'));
    }

    //【管理者】通知編集プレビュー
    public function adminEditPreview(StoreAnnounceRequest $request)
    {
        $announce = Announce::find($request->id);
        $update_data = $request->all();
        return view('announce.adminEditPreview', compact('announce', 'update_data'));
    }

    //【管理者】通知編集機能
    public function adminUpdate(Request $request)
    {
        if (isset($request['action'])) {
            return redirect()->route('admin.announces.edit', ['announce' => $request->id])->withInput();
        } else {
            Announce::where('id', $request->id)
                ->update([
                    'title' => $request->title,
                    'contents' => $request->contents
                ]);
            return redirect()->route("admin.announces.index")->with('flash_message', '通知編集が完了しました');
        }
    }

    //【管理者】通知削除機能
    public function adminDelete(Announce $announce)
    {
        $announce->delete();
        return redirect()->route("admin.announces.index")->with('flash_message', '通知削除が完了しました');
    }
}
