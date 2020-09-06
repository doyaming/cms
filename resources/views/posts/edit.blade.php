@extends('template.master')

@section('page-title')
<title>Laravel Blog 編輯</title>
@endsection

@section('main')
    <h1 class="my-4">編輯文章</h1>
    <!-- <form action="/posts" method="post"> -->
    <form action="{{route('posts.update',['id' => $post->id])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">文章標題</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            @if($post->cover === 'no-pic.png')
            <input type="file" name="cover" >
            @else
            <img src="/storage/images/{{$post->cover}}" class="w-25">
            @endif
        </div>
        <div class="form-group">
            <label for="content">文章內容</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
        </div>
        <input type="submit" value="編輯文章" class="btn btn-primary">
        <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
    </form>
   
    <script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection