<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Item;

class PurchaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $itemId = $request->route('item_id');
        $item = Item::find($itemId);

        // アイテムが存在しない場合
        if (!$item) {
            return redirect('/')->with('error', '商品が見つかりません。');
        }

        // 自分の商品は購入できない
        if ($item->user_id === auth()->id()) {
            return redirect('/')->with('error', '自分の商品は購入できません。');
        }

        // 既に購入済みの商品は購入できない（purchasesテーブルがある場合）
        // if ($item->is_sold) {
        //     return redirect('/')->with('error', 'この商品は既に売り切れです。');
        // }

        return $next($request);
    }
}
