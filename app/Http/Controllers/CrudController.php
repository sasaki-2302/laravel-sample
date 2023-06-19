<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function getIndex()
    {
        $query = \App\Address::query();

        // 全件取得 +ページネーション
        $addresses = $query->orderBy('id','desc')->paginate(5);
        return view('Address.index')->with('addresses',$addresses);
    }
}