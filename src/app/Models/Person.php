<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
