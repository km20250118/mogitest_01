<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // 住所編集画面
    public function edit(Request $request)
    {
        $user = Auth::user();
        $item_id = $request->item_id;
        return view('address.edit', compact('user', 'item_id'));
    }

    // 住所更新処理
    public function update(Request $request)
    {
        $request->validate([
            'postal_code' => 'required',
            'address' => 'required',
            'building' => 'nullable',
            'item_id' => 'required', // item_id が必須であることを明示
        ]);

        $user = Auth::user();
        $user->update([
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        // item_id をリクエストから取得してリダイレクト
        return redirect()->route('purchase.index', ['item_id' => $request->item_id])
            ->with('success', '住所を更新しました。');
    }
}
