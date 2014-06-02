<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::find(1);
	    return View::make('admin.user.index')->with('user', $user);
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
		// validation
	    $rules = array(
	        'email'       => 'required'
	    );
	    $validator = Validator::make(Input::all(), $rules);
	 
	    // jika tidak valid redirect ke halaman edit
	    if ($validator->fails()) {
	        return Redirect::to('admin/user/')->withErrors($validator);
	    } else {
	        // jika valid disimpan
	        $user = User::find($id);
	        $user->email      = Input::get('email');
	        if(Input::get('password')!=''){
	        	$user->password   = Hash::make(Input::get('password'));
	    	}
	        $user->save();
	 
	        // redirect ke halaman band index
	        Session::flash('message', 'Successfully updated user!');
	        return Redirect::to('admin/user');
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

	public function login(){
		return View::make('admin.login');
	}

	public function authenticate(){
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
		   return Redirect::to('admin/dashboard');;
		}
		else{
		  return Redirect::to('login')->with('pesan_error', 'Login gagal, email atau password salah!');
		}
	}

	public function logout(){
	   Auth::logout();
	   return Redirect::to('login')->with('pesan_error', 'Berhasil Logout');
	}


}
