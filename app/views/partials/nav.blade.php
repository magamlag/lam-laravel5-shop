<header id="header"><!--header-->
       		<div class="header_top"><!--header_top-->
       			<div class="container">
       				<div class="row">
       					<div class="col-sm-6">
       						<div class="contactinfo">
       							<ul class="nav nav-pills">
       								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
       								<li><a href="#"><i class="fa fa-envelope"></i> lagovskiy@gmail.com</a></li>
       							</ul>
       						</div>
       					</div>
       					<div class="col-sm-6">
       						<div class="social-icons pull-right">
       							<ul class="nav navbar-nav">
       								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
       								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
       								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
       								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
       								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
       							</ul>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div><!--/header_top-->

       		<div class="header-middle"><!--header-middle-->
       			<div class="container">
       				<div class="row">
       					<div class="col-sm-4">
       						<div class="logo pull-left">
       							 <a href="{{ URL::to('/') }}">{{ HTML::image('images/home/logo.png') }}</a>
       						</div>
       					</div>
       					<div class="col-sm-8">
       						<div class="shop-menu pull-right">
       							<ul class="nav navbar-nav">
       							@if(Auth::check())
       								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
       								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
       								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
       								<li><a href="{{ url('store/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
       								<li><a href="{{ url('users/signout') }}"><i class="fa fa-sign-out"></i> Sign Out</a></li>
       							@else
       								<li><a href="{{ url('users/signin') }}"><i class="fa fa-lock"></i> Login</a></li>
       							@endif
       							</ul>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div><!--/header-middle-->

       		<div class="header-bottom"><!--header-bottom-->
       			<div class="container">
       				<div class="row">
       					<div class="col-sm-9">
       						<div class="navbar-header">
       							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       								<span class="sr-only">Toggle navigation</span>
       								<span class="icon-bar"></span>
       								<span class="icon-bar"></span>
       								<span class="icon-bar"></span>
       							</button>
       						</div>
       						<div class="mainmenu pull-left">
       							<ul class="nav navbar-nav collapse navbar-collapse">
       								<li><a href="/" class="active">Home</a></li>
       								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
											 <ul role="menu" class="sub-menu">
													<li><a href="shop.html">Products</a></li>
													<li><a href="product-details.html">Product Details</a></li>
													<li>{{HTML::link('users/signin', 'Login')}}</li>
											 </ul>
                      </li>
       								<li><a href="404.html">404</a></li>
       								<li><a href="contact-us.html">Contact</a></li>
       							</ul>
       						</div>
       					</div>
       					<div class="col-sm-3">
       						<div class="search_box pull-right">
       							 {{ Form::open(array('url' => 'store/search', 'method' => 'GET')) }}
											{{ Form::text('keyword', null, array('placeholder' => 'Search')) }}
											{{ Form::close() }}
       						</div>
       					</div>
       				</div>
       			</div>
       		</div><!--/header-bottom-->
</header><!--/header-->