@extends('layouts.front')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
@foreach($post as $key => $value)
<div class="thumbnail">
    @if (!empty($value->picture))
    <img class="img-responsive" width="800" src="../pictures/{{$value->picture}}" alt="">
    @endif
    <div class="caption-full">
        <h3><a href="{{ URL::to('post') }}/{{$value->id}}">{{$value->title}}</a></h3>
        </h4>
        {{ nl2br(Str::words($value->content, 80)) }}
    </div>
    <div class="ratings">                        
    <hr>
        <p><?php $cat = Category::find($value->category_id); ?>
            <a href="{{ URL::to('kategori') }}/{{ $cat->id }}"><span class="glyphicon glyphicon-th-list"> {{ $cat->name }} </span></a>
        </p>
        <p><span class="glyphicon glyphicon-time"> {{ $value->created_at->format('t M Y') }} </span></p>
    </div>
</div>
@endforeach
<div class="pagination">
    <div class="links">
        {{$post->links()}}
    </div>
    <!-- end links -->
</div>
@stop