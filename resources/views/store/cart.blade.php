@extends('layouts.main')

@section('content')
    <section id="cart_items">
    		<div class="container">
    			<div class="breadcrumbs">
    				<ol class="breadcrumb">
    				  <li><a href="#">Home</a></li>
    				  <li class="active">Shopping Cart</li>
    				</ol>
    			</div><!-- /breadcrumbs -->
    			 @if($products)
            {!! Form::open(array('url' => 'store/updatecart')) !!}
    			<div class="table-responsive cart_info">
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
<?php $i=0; ?>
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
    									<input class="cart_quantity_input" type="text" name="quantity{!!$i++!!}" value="{!! $product->quantity !!}" autocomplete="off" size="2">
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
    					</tbody>
    				</table>
    			</div><!-- /table-responsive cart_info -->
    				{!! HTML::link('/', 'Continue Shopping', array('class' => 'btn btn-default check_out')) !!}
						{!! Form::submit('Checkout', array('class' => 'btn btn-default check_out')) !!}
					{!! Form::close() !!}
    			 @else
								<h3 class="text-center">Your shopping cart is empty.</h3>
					 @endif
    		</div>
    	</section> <!--/#cart_items-->
@stop