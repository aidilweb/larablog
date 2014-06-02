@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Posts</h3>
        <hr>
        <p>
        <ul class="nav nav-pills">
		  <li class="active"><a href="{{ URL::to('admin/post') }}">Post</a></li>
		  <li><a href="{{ URL::to('admin/category') }}">Category</a></li>
		</p>
		<br><br>
        <!-- notifikasi messages -->
		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		 
		<table class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <th class="col-md-1">Id</th>
		            <th class="col-md-4">Title</th>
		            <th class="col-md-3">Category</th>
		            <th class="col-md-1">Status</th>
		            <th class="col-md-3">Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($post as $key => $value)
		        <tr>
		            <td>{{ $value->id }}</td>
		            <td>{{ $value->title }}</td>
		            <?php $category = Category::find($value->category_id); ?>
		            <td>{{ $category->name}}</td>
		            <td>{{ $value->status }}</td>
		            <td>
		                {{ Form::open(array('url' => 'admin/post/' . $value->id, 'class' => 'pull-right')) }}
		                {{ Form::hidden('_method', 'DELETE') }}
		                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
		                {{ Form::close() }}
		                
		                <!-- edit band GET /bands/{id}/edit -->
		                <a class="btn btn-small btn-info" href="{{ URL::to('admin/post/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-edit"> Edit</a>
		 
		            </td>
		        </tr>
		    @endforeach
		    </tbody>
		</table>


                
    </div>

</div>
<div class="pagination">
    <div class="links">
        {{$post->links()}}
    </div>
    <!-- end links -->
</div>
 


@stop