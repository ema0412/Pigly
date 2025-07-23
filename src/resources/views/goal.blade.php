@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/goal.css')}}">
@endsection

<div class="goal-form__group">
  <span class="goal-form__label" for="">体重
  <span class="goal-form__required">※
  <input class="goal-form__input" type='text' name="weight" id="weight" value="{{old('weight')}}"
  placeholder="50.0" >{{ old('weight') }}</input>
  <p class="goal-form__error-message">
  @error('weight')
  {{ $message }}
  @enderror
  </p>
  <div class="confirm-form__btn-inner">
        <input class="confirm-form__send-btn btn" type="submit" value="登録" name="send">
        <input class="confirm-form__back-btn" type="submit" value="戻る" name="back">
      </div>
  <p>
   {{$WeightLog->weight}}
  </p>
 </div>
 @endsection