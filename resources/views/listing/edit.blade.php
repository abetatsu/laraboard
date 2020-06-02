@extends('layouts.app')

@section('content')
<form action="{{ url('listing/edit') }}" method="post" class="my-3" enctype="multipart/form-data">
@csrf
     <div class="form-group">
          <ladel for="editTitle">タイトルを入力して下さい</ladel>
          <input type="text" id="editTitle" name="title_name" value="{{ old('title_name', $listing->title) }}">
     </div>
     <diV class="form-group">
          <label for="editImage">画像を選択してください(任意)</label>
          <input type="file" id="editImage" name="image">
     </diV>
     <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
     <button class="btn btn-info">更新</button>
</form>
<a class="btn btn-primary" href="/">TOPに戻る</a>
@endsection