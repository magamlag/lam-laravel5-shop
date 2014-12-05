<?php

class ProductsController extends \BaseController {
	/**
	 *
	 */
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf',['on'=>'post']);
		/*$this->beforeFilter('admin');*/
	}

	public function getIndex() {
		$categories = [ ];
		foreach ( Category::all() as $category ) :
			$categories[$category->id] = $category->name;
		endforeach;

		return View::make( 'products.index' )->with('products', Product::all())->with('categories', $categories);
	}

	public function postCreate() {
		$validator = Validator::make( Input::all(), Product::$rules );

		if ( $validator->passes() ) :
			$product = new Product();
			$product->category_id = Input::get( 'category_id' );
			$product->title = Input::get( 'title' );
			$product->description = Input::get( 'description' );
			$product->price = Input::get( 'price' );

			$image = Input::file( 'image' );
			$filename = date( 'Y-m-d' ) . "-" . $image->getClientOriginalName();
			Image::make( $image->getRealPath() )->resize( 468, 249 )->save( 	'img/products/' . $filename );
			$product->image = 'img/products/' . $filename;
			$product->save();

			return Redirect::to( 'admin/products/index' )->with( 'notice', 'Product Created' );
		endif;

		return Redirect::to( 'admin/products/index' )->with( 'notice', 'Something went wrong' )->withErrors( $validator )->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 * @return Response
	 */
	public function postDestroy()
	{
		$product = Product::find( Input::get( 'id' ) );
		if ( $product ) :
			if ( File::exists( 'public/' . $product->image ) ):
				File::delete( 'public/' . $product->image );
			endif;

			$product->delete();
			return Redirect::to( 'admin/products/index' )->with( 'notice', 'Product Deleted' );
		endif;

		return Redirect::to( 'admin/products/index' )->with( 'notice', 'Something went wrong, please try again' );
	}

	public function postToggleAvailability() {
		$product = Product::find( Input::get( 'id' ) );

		if ( $product ) :
			$product->availability = Input::get( 'availability' );
			$product->save();
			return Redirect::to( 'admin/products/index' )->with( 'notice', 'Product Updated' );
		endif;

		return Redirect::to( 'admin/products/index' )->with( 'notice', 'Invalid Product' );
	}

}