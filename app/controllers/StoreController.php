<?php

class StoreController extends \BaseController {
	public function __construct() {
		parent::__construct();
		$this->beforeFilter( 'shopauth', array( 'only' => array( 'postAddtocart', 'getCart', 'Updatecart', 'getCheckout', 'getRemoveitem' ) ) );
//		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );
	}

	/**
	 * Display a listing of the resource.
	 * GET /store
	 *
	 * @return Response
	 */
	public function getIndex() {
		//
		return View::make( 'store.index' )->with( 'products', Product::take( 4 )->orderBy( 'created_at', 'DESC' )->get() );
	}

	public function getView( $id ) {
		return View::make( 'store.view' )->with( 'product', Product::find( $id ) );
	}

	public function getCategory( $cat_id ) {
		return View::make( 'store.category' )->with( 'products', Product::where( 'category_id', '=', $cat_id )->paginate( 6 ) )->with( 'category', Category::find( $cat_id ) );
	}

	public function getSearch() {
		$keyword = Input::get( 'keyword' );

		return View::make( 'store.search' )
				->with( 'products', Product::where( 'title', 'LIKE', '%' . $keyword . '%' )->get() )
				->with( 'keyword', $keyword );
	}

	public function postAddtocart() {
		$product  = Product::find( Input::get( 'id' ) );
		$quantity = Input::get( 'quantity' );

		Cart::insert( [
				'id'       => $product->id,
				'name'     => $product->title,
				'price'    => $product->price,
				'quantity' => $quantity,
				'image'    => $product->image
		] );
		return Redirect::to( 'store/cart' );
	}

	public function getCart() {
		return View::make( 'store.cart' )->with( 'products', Cart::contents() );
	}

	public function postUpdatecart() {
		$i = 0;
		foreach ( Cart::contents() as $item ) {
			$quantity       = 'quantity' . $i ++;
			$item->quantity = Input::get( $quantity );
		}
		return Redirect::to( 'store/checkout' );
	}

	public function getCheckout() {
		/*	echo '<pre>';
		dd( Cart::contents() );
		echo '</pre>';*/
		return View::make( 'store.checkout' )->with( 'products', Cart::contents() );
	}

	public function postCheckout() {
		//Take all fields from post form
		$input = Input::all();
		$v     = Validator::make( $input, Checkout::$rules );
		if ( $v->passes() ) {
			$checkout    = Checkout::create( [
					'user_id'     => Auth::user()->id,
					'email'       => Input::get( 'email' ),
					'first_name'  => Input::get( 'first_name' ),
					'last_name'   => Input::get( 'last_name' ),
					'address'     => Input::get( 'address' ),
					'zip'         => Input::get( 'zip' ),
					'country'     => Input::get( 'country' ),
					'state'       => Input::get( 'state' ),
					'phone'       => Input::get( 'phone' ),
					'description' => Input::get( 'description' )
			] );
			$order_items = Cart::contents( true );
			foreach ( $order_items as $order ) {
				DB::table( 'order_item' )->insertGetId( [
						'order_id'   => $checkout->id,
						'product_id' => $order['id'],
						'quantity'   => $order['quantity'],
						'price'      => $order['price'],
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
				] );
			}
			return Redirect::to( 'store/index' );
		}
		return Redirect::back()->withErrors( $v )->withErrors( $v->getMessageBag() );
	}

	public function getRemoveitem( $identifier ) {
		$item = Cart::item( $identifier );
		$item->remove();
		return Redirect::to( 'store/cart' );
	}

	public function getContact() {
		return View::make( 'store.contact' );
	}

	public function postContact() {
		$data = Input::all();
		$rules_contact = array(
				'name'    => 'required',
				'email'   => 'required|email',
				'subject'   => 'required|min:5',
				'message' => 'required|min:5'
		);

		$validator = Validator::make( $data, $rules_contact );
		if ( $validator->passes() ) {

			Mail::send( 'emails.contact', $data, function ( $message ) use ( $data ) {
				$message->to( $data['email'], $data['name'] )->from( 'lagovskiy@gmail.com' )->subject( $data['subject'] );
			} );
			// Redirect to page
			return Redirect::to( '/' )
					->with( 'message', 'Your message has been sent. Thank You!' );
		} else {
			//return contact form with errors
			return Redirect::back()->withErrors( $validator )->withErrors( $validator->getMessageBag() );
		}
	}
}