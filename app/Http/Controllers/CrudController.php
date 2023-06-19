<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    // 一覧取得
    public function getIndex()
    {
        $query = \App\Address::query();

        // 全件取得 +ページネーション
        $addresses = $query->orderBy('id','desc')->paginate(5);
        return view('address.index')->with('addresses',$addresses);
    }
    // 新規登録(入力)
    public function new_index()
    {
        return view('address.new_index');
    }
    // 新規登録(確認)
    public function new_confirm(\App\Http\Requests\ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('address.new_confirm')->with($data);
    }
    // 新規登録(登録)
    public function new_finish(Request $request)
    {
        // Addressオブジェクト生成
        $address = new \App\Address;

        // 値の登録
        $address->user_id = 1; //ログイン機能未実装のため仮でid送る
        $address->name = $request->name;
        $address->email = $request->email;
        $address->tel = $request->tel;
        $address->message = $request->message;

        // 保存
        $address->save();

        // 一覧にリダイレクト
        return redirect()->to('address/index');
    }
}