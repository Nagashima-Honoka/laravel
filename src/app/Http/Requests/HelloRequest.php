<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() // フォームリクエストの利用が許可されているかどうかを示す
    { // 戻り値として、trueを返せば許可。falseを返すと不許可になり、HttpExceptionという例外が発生してフォーム処理が行えなくなる。
        if($this->path() == 'hello') { // アクセスしたパスをチェックする
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // バリデーションの検証ルールを設定する。
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください。', // '項目名.ルール名' => 'メッセージ'
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入ください。',
            'age.between' => '年齢は0~150の間で入力ください。',
        ];
    }
}
