<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    // モデルに関連付けるテーブル
    protected $table = 'contacts';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'contacts',
        'state',
        'programming_language',
        'created_at',
        'updated_at',
    ];

    public function InsertContent($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'book_name'             => $request->book_name,
        ]);
    }
}
