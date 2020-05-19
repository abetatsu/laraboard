@extends('layouts.app')
@section('content')
<form action="{{ url('listing/{$listing_id}/card') }}" method="post">
@csrf
     <label for="newtask">タスクを追加</label>
     <input type="text" id="newtask" name="task_name" value="{{ old('task_name') }}">
     <input type="hidden" name="listing_id" value="{{ $listing_id }}">
     <button class="btn btn-primary" type="submit">新規登録</button>
</form>
@endsection