@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/create.css')}}">
@endsection

<div class="modal" id="{{'$WeightLog->id'}}">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
          <div class="modal__content">
            <form class="modal__detail-form" action="/postCreate" method="post">
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
                </label>
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