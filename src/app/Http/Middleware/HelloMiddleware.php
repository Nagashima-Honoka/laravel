<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { // レスポンスから、クライアントに返送されるコンテンツを取り出し、その一部を置換して返送する
        $response = $next($request); // $nextでコントローラのアクションが実行され、その結果を$responseに代入
        $content = $response->content(); // $responseのcontentメソッドで、レスポンスに設定されているコンテンツが取得できる。これは、送り返されるHTMLソースコードのテキストが入っている。ここから、<middleware>というタグを正規表現で置換する。

        $pattern = '/<middleware?>(.*)<\/middleware>/i'; // <middleware>○○</middleware>という表現を、
        $replace = '<a href="http://$1">$1</a>'; // <a href="〜">○○</a>というテキストに
        $content = preg_replace($pattern, $replace, $content); // 置換する

        $response->setContent($content); // レスポンスにコンテンツを設定
        return $response;
    }
}
