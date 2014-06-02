@extends('layouts.front')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    @if (!empty($value->picture))
    <img class="img-responsive" width="800" src="pictures/{{$post->picture}}" alt="">
    @endif
    <div class="caption-full">
        <h3><a href="{{ URL::to('post') }}/{{$post->id}}">{{$post->title}}</a></h3>
        </h4>
        {{$post->content}}
    </div>
    <div class="ratings">                        
    <hr>
        <p><?php $cat = Category::find($post->category_id); ?>
            <a href="{{ URL::to('kategori') }}/{{ $cat->id }}"><span class="glyphicon glyphicon-th-list"> {{ $cat->name }} </span></a>
            
        </p>
        <p><span class="glyphicon glyphicon-time"> {{ $post->created_at->format('t M Y') }} </span></p>
    </div>
</div>

<div class="well">

    <div class="text-right">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
          <span class="glyphicon glyphicon-comment"></span> Leave a Comment
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Leave a Comments</h4>
          </div>
          {{ Form::open(array('url' => 'comment','role' => 'form', 'files' => true)) }}
          <div class="modal-body">
                <div class="form-group">
                <input type="hidden" value="{{$post->id}}" name="id">
                {{Form::label('name', 'Your Name')}}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Enter Your Name')) }}
                {{Form::label('comment', 'Comment')}}
                {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control', 'placeholder' => 'Enter Your Comment')) }}
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{Form::submit('Send', array('class' => 'btn btn-primary'))}} 
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>

    @foreach($comment as $key => $value)
    <hr>

    <div class="row">
        <div class="col-md-12">
            <span class="glyphicon glyphicon-user"></span> {{$value->name}}
            <span class="pull-right">{{ $value->created_at->format('t M Y') }}</span>
            <p>{{$value->content}}</p>
        </div>
    </div>
    @endforeach

</div>

@stop