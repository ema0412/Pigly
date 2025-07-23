@extends('layouts.app')

@section('css')
<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('link')
<a class="header__link" href="/register">register</a>
@endsection

@section('content')
<div class="login-form">
  <h2 class="login-form__heading content__heading">Login</h2>
  <div class="login-form__inner">
    <form class="login-form__form" action="/login" method="post">
      @csrf
      <div class="login-form__group">
        <label class="login-form__label" for="email">メールアドレス</label>
        <input class="login-form__input" type="mail" name="email" >
        <p class="register-form__error-message">
          @error('email')
          <div class="error"><span>{{ $message }}</span></div>
          @enderror
        </p>
      </div>
      <div class="login-form__group">
        <label class="login-form__label" for="password">パスワード</label>
        <input class="login-form__input" type="password" name="password" >
        <p>
          @error('password')
          <div class="error"><span>{{ $message }}</span></div>
          @enderror
        </p>
      </div>
      <input class="login-form__btn btn" type="submit" value="ログイン">
    </form>
  </div>
</div>
@endsection('content')
=======
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-form__content">
  <div class="login-form__heading">
    <h2>ログイン</h2>
  </div>
  <form class="form" action="/login" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">パスワード</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password" />
        </div>
        <div class="form__error">
          @error('password')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">ログイン</button>
    </div>
  </form>
  <div class="register__link">
    <a class="register__button-submit" href="/register">会員登録の方はこちら</a>
  </div>
</div>
@endsection
>>>>>>> origin/main
