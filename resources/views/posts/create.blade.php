@extends('template.master')

@section('page-title')
<title>Laravel Blog 建立新文章</title>
@endsection

@section('main')
<h1 class="my-4">建立文章
</h1>
<!-- <form action="/posts" method="post"> -->
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">文章標題</label>
        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="category_id"></label>
        <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $cate)
            <option value="{{$cate->id}}">{{$cate->title}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="cover">封面圖片</label>
        <input type="file" name="cover" id="cover">
    </div>
    <div class="form-group">
        <label for="content">文章內容</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
    </div>
    <input type="submit" value="新增文章" class="btn btn-primary">
    <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
</form>
@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger mt-4">
        {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endforeach
@endif
<script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
