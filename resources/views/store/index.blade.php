@extends( 'layouts.main' )

@section('content')
<section>
  <div class="container">
    <div class="row">
        <div class="col-sm-3">
            @include('partials/sidebar')
        </div><!-- /col-sm-3 -->
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            @foreach($products as $product)
              <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <a href="/store/view/{{ $product->id }}">
                        <div class="single-products">
                            <div class="productinfo text-center">
                              {{ HTML::image($product->image, $product->title,
                                                 array('class' => 'feature', 'width' => '240', 'height' => '260')) }}
                              <h2>${{ $product->price }}</h2>
                              <p>{{ $product->title }}</p>
                              @include('partials.addtocart')
                            </div>
                            <div class="product-overlay">
                              <div class="overlay-content">
                                <h2>${{ $product->price }}</h2>
                                <p>{{ $product->title }}</p>
                                @include('partials.addtocart')
                              </div>
                            </div>
                        </div>
                    </a>
                    <div class="choose">
                      <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                      </ul>
                    </div>
                  </div>
              </div>
            @endforeach
          </div><!-- /features_items-->
        </div><!-- /col-sm-9 padding-right -->
      </div><!-- /row -->
    </div><!-- /container -->
</section>
@stop