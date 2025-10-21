@extends('layouts.default')

@section('title', '住所の変更')

@section('content')
<div class="container">
    <h2>住所の変更</h2>

    <form action="{{ route('address.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $user->profile->postcode ?? '') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" value="{{ old('address', $user->profile->address ?? '') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building', $user->profile->building ?? '') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-danger mt-3">更新する</button>
    </form>
</div>
@endsection
