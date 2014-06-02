<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$category = Category::orderBy('id', 'DESC')->paginate(5);
		return View::make('admin.category.index', array('category'=> $category));
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
	        'name'       => 'required'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	    if ($validator->fails()) {
	        return Redirect::to('admin/category')->withErrors($validator);
	    } else {
	        // jika valid simpan ke database
	        $post = new Category;
	        $post->name = Input::get('name');
	        $post->save();
	 
	        // redirect ke index bands
	        Session::flash('message', 'Successfully created category!');
	        return Redirect::to('admin/category');
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
		$category = Category::find($id);
        return View::make('admin.category.edit', array('category' => $category));
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
	        'name'       => 'required'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	 	if ($validator->fails()) {
	        return Redirect::to('admin/category/' . $id . '/edit')
	            ->withErrors($validator);
	    } else {
	        $tag = Category::find($id);
	        $tag->name = Input::get('name');
	        $tag->save();
	        Session::flash('message', 'Successfully updated category!');
	        return Redirect::to('admin/category');
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
		$category = Category::find($id);
	    $category->delete();
	    Session::flash('message', 'Successfully deleted the category!');
	    return Redirect::to('admin/category');
	}


}
