@extends('layouts.app')
@section('content')
<form action="{{ url('listing/{$user_id}/{$listing_id}/card') }}" method="post">
@csrf
     <label for="newtask">タスクを追加：</label>
     <input type="text" id="newtask" name="task_name" value="{{ old('task_name') }}"><br>
     詳細を記入してください：<br>
     <textarea name="content" rows="4" cols="40">{{ old('content') }}</textarea>
     <input type="hidden" name="user_id" value="{{ $user_id }}">
     <input type="hidden" name="listing_id" value="{{ $listing_id }}"><br>
     <button class="btn btn-primary" type="submit">新規登録</button>
</form>
<a class="btn btn-primary my-2" href="/">TOPに戻る</a>
@endsection