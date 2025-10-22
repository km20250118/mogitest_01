@extends('layouts.default')

@section('title','購入手続き')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/purchase.css')  }}">
@endsection

@section('content')

@include('components.header')
<div class="container">
    <form class="buy" id="stripe-form" action="/purchase/{{$item->id}}" method="post">
        <div class="buy__left">
            <div class="item">
                <div class="item__img">
                    <img src="{{ \Storage::url($item->img_url) }}" alt="">
                </div>
                <div class="item__info">
                    <h3 class="item__name">{{$item->name}}</h3>
                    <p class="item__price">¥ {{number_format($item->price)}}</p>
                </div>
            </div>
            
            <div class="purchases">
                <div class="purchase">
                    <div class="purchase__flex">
                        <h3 class="purchase__title">支払い方法</h3>
                    </div>
                    <select 
                        class="purchase__value" 
                        id="payment" 
                        name="payment_method"
                        style="width: 100%; padding: 15px 20px; font-size: 16px; border: 2px solid #00c896; border-radius: 4px; background-color: #ffffff; color: #333; cursor: pointer; box-sizing: border-box; margin-top: 10px;"
                    >
                        <option value="" selected disabled>選択してください</option>
                        <option value="konbini">コンビニ払い</option>
                        <option value="card">クレジットカード払い</option>
                    </select>
                </div>
                
                <div class="purchase">
                    <div class="purchase__flex">
                        <h3 class="purchase__title">配送先</h3>
                        <a href="{{ route('address.edit', ['item_id' => $item->id]) }}" id="purchase__update">変更する</a>
                    </div>
                    <div class="purchase__value">
                        <p>〒 {{ $user->postal_code ?? '' }}</p>
                        <p>{{ $user->address ?? '' }}</p>
                        @if ($user->building)
                        <p>{{ $user->building }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="buy__right">
            <div class="buy__info">
                <table>
                    <tr>
                        <th class="table__header">商品代金</th>
                        <td id="item__price" class="table__data">¥ {{ number_format($item->price) }}</td>
                    </tr>
                    <tr>
                        <th class="table__header">支払い方法</th>
                        <td id="pay_confirm" class="table__data">コンビニ払い</td>
                    </tr>
                </table>
            </div>
            @csrf
            @if ($item->sold())
            <button class="btn disable" disabled>売り切れました</button>
            @elseif ($item->mine())
            <button class="btn disable" disabled>購入できません</button>
            @else
            <button id="purchase_btn" class="btn">購入する</button>
            @endif
        </div>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="{{ asset('js/purchase.js') }}"></script>
@endsection