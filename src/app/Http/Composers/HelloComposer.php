<?php
namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer {
    public function compose (View $view) { // Viewインスタンスを引数として持っており、サービスプロバイダのbootからView::composerが実行された際に呼び出される
        $view->with('view_message', 'this view is "' . $view->getName() . '"!!'); // $view->getName()メソッドを使い、ビューの名前をview_messageに設定する
    }
}
