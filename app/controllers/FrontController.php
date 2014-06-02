<?php

class FrontController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome(){
		$post = Post::orderBy('id', 'DESC')->where('status','=','publish')->paginate(5);
		$setting = Setting::find(1);
		$category = Category::all();
        return View::make('front.index', array('post' => $post, 'category' => $category, 'setting' => $setting));
	}

	public function showPostDetail($id){
		$post = Post::find($id);
		$setting = Setting::find(1);
		$category = Category::all();
		$comment = Comment::where('post_id', '=', $id)->where('status','=','publish')->get();
        return View::make('front.postdetail', array('post' => $post, 'category' => $category, 'setting' => $setting, 'comment' => $comment));
	}

	public function showCategory($id){
		$post = Post::orderBy('id', 'DESC')->where('category_id', '=', $id)->where('status','=','publish')->paginate(5);
		$setting = Setting::find(1);
		$category = Category::all();
        return View::make('front.category', array('post' => $post, 'category' => $category, 'setting' => $setting));
	}
}
