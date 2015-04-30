@extends( 'layouts.main' )

@section('content')
<section>
  <div class="container">
    <div class="row">
        <div class="col-sm-3">
            @include('partials/sidebar')
        </div><!-- /col-sm-3 -->
        <div class="col-sm-9 padding-right">
         <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
              <div class="view-product">
                {{ HTML::image($product->image, $product->title) }}
                <h3>ZOOM</h3>
              </div>
              <div id="similar-product" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <div class="item active">
                      <a href="">{{ HTML::image('images/product-details/similar1.jpg') }}</a>
                      <a href="">{{ HTML::image('images/product-details/similar2.jpg') }}</a>
                      <a href="">{{ HTML::image('images/product-details/similar3.jpg') }}</a>
                    </div>
                    <div class="item">
                       <a href="">{{ HTML::image('images/product-details/similar1.jpg') }}</a>
                       <a href="">{{ HTML::image('images/product-details/similar2.jpg') }}</a>
                       <a href="">{{ HTML::image('images/product-details/similar3.jpg') }}</a>
                    </div>
                    <div class="item">
                       <a href="">{{ HTML::image('images/product-details/similar1.jpg') }}</a>
                       <a href="">{{ HTML::image('images/product-details/similar2.jpg') }}</a>
                       <a href="">{{ HTML::image('images/product-details/similar3.jpg') }}</a>
                    </div>
                  </div>
                  <!-- Controls -->
                  <a class="left item-control" href="#similar-product" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right item-control" href="#similar-product" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
              </div><!-- /similar-product -->
            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                {{ HTML::image('images/product-details/new.jpg', null, ['class' => 'newarrival']) }}
                <h2>{{ $product->title }}</h2>
                <p>Web ID: {{ $product->id }}</p>
                  <span><span>${{ $product->price }}</span>
                  {{ Form::open(['url' => 'store/addtocart']) }}
                  {{ Form::label('quantity', 'Qty') }}
                  {{ Form::text('quantity', 1, array('maxlength' => 2)) }}
                  {{ Form::hidden('id', $product->id) }}
                  <button type="submit" class="btn btn-fefault cart">
                   <i class="fa fa-shopping-cart"></i>ADD TO CART
                  </button>
                  {{ Form::close() }}
                 </span>

                <p><b>Availability:</b> {{ Availability::displayClass($product->availability) }}</p>
                <p><b>Brand:</b> E-SHOPPER</p>
                <p><b>Description:</b><br>{{ $product->description }}</p>
                <a href="">{{ HTML::image('images/product-details/share.png', null, ['class' => 'share img-responsive']) }}</a>
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
        </div><!-- /col-sm-9 padding-right -->
      </div><!-- /row -->
    </div><!-- /container -->
</section>
@stop