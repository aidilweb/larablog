<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$comment = Comment::orderBy('id', 'DESC')->paginate(5);
		return View::make('admin.comment.index', array('comment'=> $comment));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
	        'name'       => 'required',
	        'comment'	=> 'required'
	    );
	    $id = Input::get('id');
	    $validator = Validator::make(Input::all(), $rules);
	    if ($validator->fails()) {
	        return Redirect::to('post/'. $id )->withErrors($validator);
	    } else {
	        // jika valid simpan ke database
	        $comment = new Comment;
	        $comment->post_id = $id;
	        $comment->name = Input::get('name');
	        $comment->content = Input::get('comment');
	        $comment->status = 'pending';
	        $comment->save();
	 
	        // redirect ke index bands
	        Session::flash('message', 'Successfully created comment!');
	        return Redirect::to('post/'.$id);
	    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::find($id);
        return View::make('admin.comment.edit', array('comment' => $comment));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
	        'name'      => 'required',
	        'content'   => 'required',
	        'status'	=> 'required'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	 	if ($validator->fails()) {
	        return Redirect::to('admin/comment/' . $id . '/edit')
	            ->withErrors($validator);
	    } else {
	        $comment = Comment::find($id);
	        $comment->name = Input::get('name');
	        $comment->content = Input::get('content');
	        $comment->status = Input::get('status');
	        $comment->save();
	        Session::flash('message', 'Successfully updated comment!');
	        return Redirect::to('admin/comment');
	    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
