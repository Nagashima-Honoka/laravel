<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator {
    public function validateHello($attribute, $value, $parameters) { // validateHelloメソッド。helloという名前のルールを定義するもの。
        return $value % 2 == 0;
    }
}
