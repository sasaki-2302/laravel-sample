<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = ['id'];
    // ブラックリスト方式　idはユーザー入力から保存されない
}
