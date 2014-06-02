<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$post = Post::orderBy('id', 'DESC')->paginate(5);
		return View::make('admin.post.index', array('post'=> $post));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$category = Category::all();
		return View::make('admin.post.create', array('category' => $category));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
	        'title'       => 'required',
	        'content'       => 'required',
	        'category'       => 'required',
	        'status'       => 'required',
	        'picture' => 'image|max:2000|mimes:jpg,jpeg,png'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	    if ($validator->fails()) {
	        return Redirect::to('admin/post/create')->withErrors($validator);
	    } else {
	    	$foto = Input::file('picture'); 
	    	if (!empty($foto)){
		    	//picture
		    	$directory = public_path().'/'.'pictures';
	            $foto = Input::file('picture'); 
	            $filename = $foto->getClientOriginalName();
	            $upload_sukses = $foto->move($directory, $filename);

		        // jika valid simpan ke database
		        $post = new Post;
		        $post->title = Input::get('title');
		        $post->content = Input::get('content');
		        $post->category_id = Input::get('category');
		        $post->picture = $filename;
		        $post->status = Input::get('status');
		        $post->save();
	    	}else{
		    	// jika valid simpan ke database
		        $post = new Post;
		        $post->title = Input::get('title');
		        $post->content = Input::get('content');
		        $post->category_id = Input::get('category');
		        $post->picture = '';
		        $post->status = Input::get('status');
		        $post->save();
	    	}
	 
	        // redirect ke index bands
	        Session::flash('message', 'Successfully created post!');
	        return Redirect::to('admin/post');
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
		$post = Post::find($id);
 
	    // menampilkan view template edit.blade.php dan mengisi variable band
	    return View::make('admin.post.edit')->with('post', $post);
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
	        'title'       => 'required',
	        'content'       => 'required',
	        'category'       => 'required',
	        'status'       => 'required',
	        'picture' => 'image|max:2000|mimes:jpg,jpeg,png'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	    if ($validator->fails()) {
	        return Redirect::to('admin/post/' . $id . '/edit')->withErrors($validator);
	    } else {
	    	$directory = public_path().'/'.'pictures';
            $foto = Input::file('picture'); 
	    	if ($foto==''){
				$post = Post::find($id);;
		        $post->title = Input::get('title');
		        $post->content = Input::get('content');
		        $post->category_id = Input::get('category');
		        $post->status = Input::get('status');
		        $post->save();
	    	}else{
		    	//picture		    	
            	$filename = $foto->getClientOriginalName();
	            $upload_sukses = $foto->move($directory, $filename);

		        // jika valid simpan ke database
		        $post = Post::find($id);;
		        $post->title = Input::get('title');
		        $post->content = Input::get('content');
		        $post->category_id = Input::get('category');
		        $post->picture = $filename;
		        $post->status = Input::get('status');
		        $post->save();
	 		}
	        // redirect ke index bands
	        Session::flash('message', 'Successfully created post!');
	        return Redirect::to('admin/post');
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
		$post = Post::find($id);
	    $post->delete();
	    Session::flash('message', 'Successfully deleted the post!');
	    return Redirect::to('admin/post');
	}


}
