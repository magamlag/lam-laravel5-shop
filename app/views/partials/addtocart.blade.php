{{ Form::open(array('url' => 'store/addtocart')) }}
                         {{ Form::hidden('quantity', 1) }}
                         {{ Form::hidden('id', $product->id) }}
                         <button type="submit" class="btn btn-default add-to-cart">
                             <i class="fa fa-shopping-cart"></i>ADD TO CART
                         </button>
{{ Form::close() }}