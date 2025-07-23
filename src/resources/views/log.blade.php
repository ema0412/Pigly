@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/logs.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <a class="header__link" href="/weight_logs/goal_setting">目標体重設定</a>
  <input class="header__link" type="submit" value="logout">
  <a class="header__link" href="/weight_logs/create">データ追加</a>
</form>
@endsection

@section('content')
<div>
  <div>
    <table class="target__table">
      <tr class="target__row">  
        <th class="target__lavel">目標体重</th>
        <th class="target__lavel">目標まで</th>
        <th class="target__lavel">現在の体重</th>
      </tr>
      @foreach ($weight_logs as $WeightLog)
      <tr>
        <td>{{$WeightLog->target_weight}}</td>
        <td>{{$WeightLog->weight}}</td>
        <td>{{$WeightLog->weight}}</td>
      </tr>
      @endforeach  
    <table class="log__table">
      <tr class="log__row">
        <th class="log__label">日付</th>
        <th class="log__label">体重</th>
        <th class="log__label">食事摂取カロリー</th>
        <th class="log__label">運動時間</th>
      </tr>
      @foreach ($weight_logs as $WeightLog)
      <tr>
        <td>{{$WeightLog->date}}</td>
        <td>{{$WeightLog->weight}}</td>
        <td>{{$WeightLog->calories}}</td>
        <td>{{$WeightLog->exercise_time}}</td>
        <td class="log__data">
          <a class="log__detail-btn" href="#{{'$WeightLog->id'}}">詳細</a>
        </td>
      </tr>

      <div class="modal" id="{{'$WeightLog->id'}}">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
          <div class="modal__content">
            <form class="modal__detail-form" action="/update" method="post">
              @csrf
              <div class="modal-form__group">
                <label class="modal-form__label" for="">日付
                <span class="modal-form__required">※
                </label>
                <input class="mogal-form__input" type='date' name="date" id="date" value="{{old('date')}}"
                >{{ old('date') }}</input>
                <p class="modal-form__error-message">
                @error('date')
                {{ $message }}
                @enderror
                </p>
                <p>{{$WeightLog->date}}</p>
              </div>

              <div class="modal-form__group">
                <span class="modal-form__label" for="">体重
                <span class="modal-form__required">※
                <input class="mogal-form__input" type='text' name="weight" id="weight" value="{{old('weight')}}"
                placeholder="50.0" >{{ old('weight') }}</input>
                <p class="modal-form__error-message">
                @error('weight')
                {{ $message }}
                @enderror
                </p>
                <p>
                  {{$WeightLog->weight}}
                </p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">摂取カロリー</label>
                <span class="modal-form__required">※
                </label>
                <input class="mogal-form__input" type='text' name="calories" id="calories" value="{{old('calories')}}"
                placeholder="50.0" >{{ old('calories') }}</input>
                <p class="modal-form__error-message">
                @error('calories')
                {{ $message }}
                @enderror
                </p>
                <p>{{$WeightLog->calories}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">運動時間</label>
                <span class="modal-form__required">※
                </label>
                <input class="mogal-form__input" type='text' name="exercise_time" id="exercise_time" value="{{old('exercise_time')}}"
                placeholder="50.0" >{{ old('exercise_time') }}</input>
                <p class="modal-form__error-message">
                @error('exercise_time')
                {{ $message }}
                @enderror
                </p>
                <p>{{$WeightLog->exercise_time}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">運動内容</label>
                <span class="modal-form__required">※
                </label>
                <input class="mogal-form__input" type='text' name="exercise_content" id="exercise_content" value="{{old('exercise_content')}}"
                placeholder="50.0" >{{ old('exercise_content') }}</input>
                <p class="modal-form__error-message">
                @error('exercise_content')
                {{ $message }}
                @enderror
                </p>
                <p>{{$WeightLog->exercise_content}}</p>
              </div>

              <input type="hidden" name="id" value="{{ $WeightLog->id }}">
              <input class="modal-form__delete-btn btn" type="submit" value="登録">

            </form>
          </div>
        </div>
  </div>    
      @endforeach
    </table>
  </div>
</div>
@endsection