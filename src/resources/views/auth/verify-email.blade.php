@extends('layouts.default')

@section('title', 'メール認証誘導画面')

@section('content')
<div style="max-width: 600px; margin: 100px auto; padding: 40px; background-color: #f5f5f5; border-radius: 8px; text-align: center;">
    <h2 style="margin-bottom: 30px;">登録していただいたメールアドレスに認証メールを送信しました。<br>メール認証を完了してください。</h2>
    
    <p style="margin: 20px 0; color: #666;">
        メールに記載されたリンクをクリックして、認証を完了してください。
    </p>
    
    <form method="POST" action="{{ route('verification.send') }}" style="margin-top: 30px;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #0066cc; text-decoration: underline; cursor: pointer; font-size: 16px;">
            認証メールを再送する
        </button>
    </form>
</div>
@endsection