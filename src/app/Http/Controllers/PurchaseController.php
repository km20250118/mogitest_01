<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class PurchaseController extends Controller
{
  // 購入画面
  public function index($item_id, Request $request)
  {
    $item = Item::find($item_id);

    // Authインスタンスをリフレッシュして最新情報を取得
    Auth::user()->refresh();
    $user = Auth::user();

    return view('purchase', compact('item', 'user'));
  }

  // 購入処理（Stripeなし）
  public function purchase($item_id, Request $request)
  {
    $item = Item::find($item_id);

    // ここに実際の購入処理を書く
    // 例: 購入履歴をデータベースに保存など

    return redirect()->route('purchase.index', ['item_id' => $item_id])
      ->with('success', '購入処理を完了しました（仮）');
  }
}
