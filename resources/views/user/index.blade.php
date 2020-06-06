@extends('layouts.app')
@section('content')

<a class="btn btn-primary my-2" href="/">TOPに戻る</a>

@foreach($users as $user)
<div class="card">
  <div class="card-body">
     ユーザー名：{{ $user->name }}<br>
     メールアドレス：{{ $user->email }}<br>
  </div>
</div>
@endforeach


@endsection
