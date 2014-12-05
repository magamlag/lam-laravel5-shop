<?php

class CategoriesController extends \BaseController {
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf',['on'=>'post']);
		/*$this->beforeFilter('admin');*/
	}

	public function getIndex() {
		return View::make( 'categories.index' )->with('categories', Category::all());
	}

	public function postCreate() {
		$validator = Validator::make( Input::all(), Category::$rules );

		if ( $validator->passes() ) :
			$category = new Category();
			$category->name = Input::get( 'name' );
			$category->save();

			return Redirect::to( 'admin/categories/index' )->with( 'notice', 'Category Created' );
		endif;

		return Redirect::to( 'admin/categories/index' )->with( 'notice', 'Something went wrong' )->withErrors( $validator )->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function postDestroy()
	{
		$category = Category::find( Input::get( 'id' ) );
		if ( $category ) :
			$category->delete();
			return Redirect::to( 'admin/categories/index' )->with( 'notice', 'Category Deleted' );
		endif;

		return Redirect::to( 'admin/categories/index' )->with( 'notice', 'Something went wrong, please try again' );
	}

}