@extends('layouts.main')

@section('content')
    <section id="cart_items">
    		<div class="container">
    			<div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
          </div><!--/breadcrums-->
          <div class="shopper-informations">
            <div class="row">
              <div class="col-sm-5 clearfix">

                <div class="bill-to">
                  <h2>Bill To</h2>
                  <div class="form-one">
                      {!! Form::open(array('url' => 'store/checkout')) !!}
                        {!! Form::text('email', Input::old('email'), array('placeholder' => 'Email*')) !!}
                        {!! Form::text('title', Input::old('title'), array('placeholder' => 'Title')) !!}
                        {!! Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name *')) !!}
                        {!! Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Last Name *')) !!}
                        {!! Form::text('address', Input::old('address'), array('placeholder' => 'Address *')) !!}
                  </div>
                  <div class="form-two">
                        {!! Form::text('zip', Input::old('zip'), array('placeholder' => 'Zip / Postal Code *')) !!}
                        {!! Form::text('country', Input::old('country'), array('placeholder' => 'Country')) !!}
                        {!! Form::text('state', Input::old('state'), array('placeholder' => 'State')) !!}
                        {!! Form::text('phone', Input::old('phone'), array('placeholder' => 'Phone *')) !!}
                  </div>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="order-message">
                  <p>Shipping Order</p>
                  <textarea name="description"  placeholder="Notes about your order, Special Notes for Delivery" rows="4"></textarea>
                </div>
              </div>
            </div>
          </div><!-- /shopper-informations -->

    			<div class="table-responsive cart_info">
             @if($products)
    				<table class="table table-condensed">
    					<thead>
    						<tr class="cart_menu">
    							<td class="image">Item</td>
    							<td class="description"></td>
    							<td class="price">Price</td>
    							<td class="quantity">Quantity</td>
    							<td class="total">Total</td>
    							<td></td>
    						</tr>
    					</thead>
    					<tbody>
    					 @foreach($products as $product)
    						<tr>
    							<td class="cart_product">
    								{!! HTML::image($product->image, $product->name, array('width' => '110', 'height' => '110')) !!}
    							</td>
    							<td class="cart_description">
    								<h4>{!!$product->name!!}</h4>
    								<p>Web ID: {!! $product->id !!}</p>
    							</td>
    							<td class="cart_price">
    								<p>${!! $product->price !!}</p>
    							</td>
    							<td class="cart_quantity">
    								<div class="cart_quantity_button">
    									<a class="cart_quantity_up" href=""> + </a>
    									<input class="cart_quantity_input" type="text" name="quantity" value="{!! $product->quantity !!}" autocomplete="off" size="2">
    									<a class="cart_quantity_down" href=""> - </a>
    								</div>
    							</td>
    							<td class="cart_total">
    								<p class="cart_total_price">${!! $product->total() !!}</p>
    							</td>
    							<td class="cart_delete">
    								<a class="cart_quantity_delete" href="/store/removeitem/{!! $product->identifier !!}"><i class="fa fa-times"></i></a>
    							</td>
    						</tr>
    						@endforeach
    						<tr>
									<td colspan="4">&nbsp;</td>
									<td colspan="2">
										<table class="table table-condensed total-result">
											<tr class="shipping-cost">
												<td>Shipping Cost</td>
												<td>Free</td>
											</tr>
											<tr>
												<td>Total</td>
												<td><span>${!! Cart::total(false); !!}</span></td>
											</tr>
										</table>
									</td>
								</tr>
    					</tbody>
    				</table>
    				 @else
                        <h3 class="text-center">Your shopping cart is empty.</h3>
             @endif
    			</div>
    		</div>
    	</section> <!--/#cart_items-->
    	<section id="do_action">
    		<div class="container">
    			<div class="row">
          				<div class="col-sm-6">
          						{!! HTML::link('/', 'Continue Shopping', array('class' => 'btn btn-default check_out')) !!}
          						{!! Form::submit('Process Payment', array('class' => 'btn btn-default check_out')) !!}
                     {!! Form::close() !!}
          				</div>
          				<div class="col-sm-6">
          					&nbsp;
          				</div>
          			</div>
    		</div>
    	</section>
@stop