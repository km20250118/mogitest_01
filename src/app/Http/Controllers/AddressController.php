<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('address.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'postal_code' => 'required',
            'address' => 'required',
            'building' => 'nullable',
        ]);

        $user = Auth::user();
        $user->update([
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        // 🔹 item_id をリクエストから受け取ってリダイレクト
        return redirect()->route('purchase.index', ['item_id' => $request->item_id])
            ->with('success', '住所を更新しました。');
    }
}
