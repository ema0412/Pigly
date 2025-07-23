@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/logs.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="log">
  <h2 class="log__heading content__heading">log</h2>
  <div class="log__inner">
    <form class="search-form" action="/weight_logs/search" method="get">
      @csrf
      <input class="search-form__keyword-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{request('keyword')}}">
      <div class="search-form__category">
        <select class="search-form__user-select" name="user_id">
          <option disabled selected>お問い合わせの種類</option>
          ($weight_logs as $WeightLog)
          <option value="{{ $user->id }}" @if( request('user_id')==$user->id ) selected @endif
            >{{$WeightLog->content }}
          </option>
          
        </select>
      </div>
      <input class="search-form__date" type="date" name="date" value="{{request('date')}}">
      <div class="search-form__actions">
        <input class="search-form__search-btn btn" type="submit" value="検索">
        <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset">
      </div>
    </form>

    <table class="log__table">
      <tr class="log__row">
        <th class="log__label">お名前</th>
        <th class="log__label">性別</th>
        <th class="log__label">メールアドレス</th>
        <th class="log__label">お問い合わせの種類</th>
        <th class="log__label"></th>
      </tr>
      
      <tr class="log__row">
        <td class="log__data">{{$contact->first_name}}{{$contact->last_name}}</td>
        <td class="log__data">
          @if($contact->gender == 1)
          男性
          @elseif($contact->gender == 2)
          女性
          @else
          その他
          @endif
        </td>
        <td class="log__data">{{$contact->email}}</td>
        <td class="log__data">{{$contact->user->content}}</td>
        <td class="log__data">
          <a class="log__detail-btn" href="#{{$contact->id}}">詳細</a>
        </td>
      </tr>

      <div class="modal" id="{{$contact->id}}">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
          <div class="modal__content">
            <form class="modal__detail-form" action="/weight_logs/{:weightLogId}/delete" method="post">
              @csrf
              <div class="modal-form__group">
                <label class="modal-form__label" for="">お名前</label>
                <p>{{$contact->first_name}}{{$contact->last_name}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">性別</label>
                <p>
                  @if($contact->gender == 1)
                  男性
                  @elseif($contact->gender == 2)
                  女性
                  @else
                  その他
                  @endif
                </p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">メールアドレス</label>
                <p>{{$contact->email}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">電話番号</label>
                <p>{{$contact->tell}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">住所</label>
                <p>{{$contact->address}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">お問い合わせの種類</label>
                <p>{{$contact->user->content}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">お問い合わせ内容</label>
                <p>{{$contact->detail}}</p>
              </div>
              <input type="hidden" name="id" value="{{ $contact->id }}">
              <input class="modal-form__delete-btn btn" type="submit" value="削除">

            </form>
          </div>

          <a href="#" class="modal__close-btn">×</a>
        </div>
      </div>
      
    </table>
  </div>
</div>

</div>
@endsection