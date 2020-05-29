@extends('layouts.app')

@section('content')
<form action="{{ url('listing/edit') }}" method="post">
@csrf
     <ladel for="editTitle">タイトルを入力して下さい</ladel>
     <input type="text" id="editTitle" name="title_name" value="{{ old('title_name', $listing->title) }}">
     <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
     <button class="btn btn-info">更新</button>
</form>
<a class="btn btn-primary" href="/">TOPに戻る</a>
@endsection