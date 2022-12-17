<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware // csrf対策を行うもの
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [ // csrf対策を適用しないアクションの配列
        'hello', // ワイルドカード(*): 'hello/*'というようにすれば、/hello配下に用意された全てのページでcsrf対策が行われなくなる
    ];
}
