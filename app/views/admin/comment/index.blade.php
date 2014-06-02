@extends('layouts.admin')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
<div class="thumbnail">
    <div class="caption-full">
        <h3>Comments</h3>
        <hr>
        
        <!-- notifikasi messages -->
		@if (Session::has('message'))
		    <div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		 
		<table class="table table-striped table-bordered">
		    <thead>
		        <tr>
		            <th class="col-md-1">No</th>
		            <th class="col-md-6">Name</th>
		            <th class="col-md-2">Status</th>
		            <th class="col-md-3">Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($comment as $key => $value)
		        <tr>
		            <td>{{ $value->id }}</td>
		            <td>{{ $value->name}}</td>
		            <td>{{ $value->status}}</td>
		            <td>
		                {{ Form::open(array('url' => 'admin/comment/' . $value->id, 'class' => 'pull-right')) }}
		                {{ Form::hidden('_method', 'DELETE') }}
		                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
		                {{ Form::close() }}
		                
		                <!-- edit band GET /bands/{id}/edit -->
		                <a class="btn btn-small btn-info" href="{{ URL::to('admin/comment/' . $value->id . '/edit') }}"><span class="glyphicon glyphicon-edit"> Edit</a>
		 
		            </td>
		        </tr>
		    @endforeach
		    </tbody>
		</table>
                
    </div>
</div>
 
<div class="pagination">
    <div class="links">
        {{$comment->links()}}
    </div>
    <!-- end links -->
</div>


@stop