@extends('template.master')

@section('page-title')
<title>Laravel Blog</title>
@endsection

@section('main')
<h1 class="my-4">Home
  <small>Secondary Text</small>
</h1>
@foreach($posts as $post)
<div class="card mb-4">
  <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
  @if($post->cover === 'no-pic.png')
    <img class="card-img-top" src="https://via.placeholder.com/600x300?text=no-image" alt="Card image cap">
  @else
    <img class="card-img-top" src="/storage/images/{{$post->cover}}" alt="Card image cap">
  @endif

  <div class="card-body">
    <h2 class="card-title">{{$post->title}}</h2>
    <p class="card-text">
      {!! Str::limit(strip_tags($post->content), 200) !!}
    </p>
    <!-- <a href="/posts/{{$post->id}}" class="btn btn-primary">繼續閱讀 &rarr;</a> -->
    <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-primary">繼續閱讀 &rarr;</a>
  </div>
  <div class="card-footer text-muted">
    建立時間 {{$post->created_at}}

    {{-- @php Carbon\Carbon::setLocale('zh_TW') @endphp
    {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} --}}
    by
    <a href="#">
      {{$post->user->name}}
    </a>
    {{-- <a href="#">
        {{$post->Category->title}}
      </a> --}}


  </div>
</div>
@endforeach




@endsection
