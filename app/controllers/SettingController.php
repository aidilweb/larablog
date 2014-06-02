<?php

class SettingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$setting = Setting::find(1);
 
	    // menampilkan view template edit.blade.php dan mengisi variable band
	    return View::make('admin.setting.index')->with('setting', $setting);
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
		//
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
		//
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
	        'slogan'       => 'required',
	        'footer'       => 'required'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	 	if ($validator->fails()) {
	        return Redirect::to('admin/setting')
	            ->withErrors($validator);
	    } else {
	        $setting = Setting::find($id);
	        $setting->title = Input::get('title');
	        $setting->slogan = Input::get('slogan');
	        $setting->footer = Input::get('footer');
	        $setting->save();
	        Session::flash('message', 'Successfully updated setting!');
	        return Redirect::to('admin/setting');
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
