<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() // 必要なサービスの登録を行う
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() // ブートストラップ処理
    {
        View::composer( // View::composer( ビューの指定, 関数またはクラス )
            // views内のhelloフォルダ内にあるindex.blade.php
            'hello.index', function($view) { // Illuminate\Support\Facades名前空間にあるViewクラスのインスタンス
                $view->with('view_message', 'composer message!'); // $view->with( 変数名, 値 );
            }
        );
    }
}
