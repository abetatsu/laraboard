@extends('layouts.app')
@section('content')
リスト名：{{ $listing->title }}<br>
<form action="{{ url('/card/edit') }}" method="post">
@csrf
     <label for="newTaskName">新しいタスク名：</label>
     <input id="newTaskName" type="text" name="new_task_name" value="{{ old('new_task_name', $card->title) }}"><br>
     詳細を記入してください：<br>
     <textarea name="content" rows="4" cols="40">{{ old('content', $card->content) }}</textarea>
     <input type="hidden" name="listing_id" value="{{ old('listing_id', $card->listing_id) }}">
     <input type="hidden" name="id" value="{{ old('id', $card->id) }}"><br>
     <button class="btn btn-primary">更新</button>
</form>
@endsection