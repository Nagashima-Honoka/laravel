<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;


class Person extends Model
{ // 1つ1つのレコードは全てPersonクラスのインスタンスとしてまとめられている
    use HasFactory;

    public function getData() {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str) {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n) { // ageの値が引数の値と等しいかもっと大きいものに絞り込む
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n) { // ageの値が等しいかもっと小さいものに絞り込む
        return $query->where('age', '<=', $n);
    }

    protected static function boot() {
        parent::boot();

        static::addGlobalScope(new ScopePerson); // static::addGlobalScopeの引数にnew ScopesScopePersonを指定することで、ScopePersonがグローバルスコープとして追加される
    }

    protected $guarded = array('id');
    // 入力のガード（保護）を設定しておくもの
    // 例えばフォームから送信した値を元にインスタンスを作り、保存する場合。
    // モデルでは、基本的に必要となる全ての項目に値が揃っていて初めて保存ができるが、時には「値を用意しておかない項目」も存在する
    // このような時に用いられるのが$guarded
    // 例えばプライマリーキーであるidフィールドは、データベース側で自動的に番号を振るため、モデルを作成する際には値は必要でない
    // こうしたものでは$guardedでidを「値を用意しておかない項目」に指定しておくことで、値がnullであってもエラーなく動作する

    public static $rules = array( // バリデーションルールをまとめておく（モデルに用意しておいた方が便利）
       'name' => 'required',
       'mail' => 'email',
       'age' => 'integer|min:0|max:150',
    );

    public function board() { // メソッド名は、リレーションで関連付けるモデル名（1対1で1つしか取り出されないので単数形の命名）
        return $this->hasOne('App\Models\Board'); // hasOne(関連づけられるモデル)。hasOneの返り値をそのままreturnする。
    }


}
