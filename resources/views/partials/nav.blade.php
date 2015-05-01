<header id="header"><!--header-->
       		<div class="header_top"><!--header_top-->
       			<div class="container">
       				<div class="row">
       					<div class="col-sm-6">
       						<div class="contactinfo"></div>
       					</div>
       					<div class="col-sm-6">
       						<div class="social-icons pull-right">
       							<ul class="nav navbar-nav">
       								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
       								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
       								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
       							 <a href="{!! URL::to('/') !!}">{!! HTML::image('images/home/sample-logo.jpg') !!}</a>
       						</div>
       					</div>
       					<div class="col-sm-8">
       						<div class="shop-menu pull-right">
       							<ul class="nav navbar-nav">
       							@if(Auth::check())
       								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
       								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
       								<li><a href="{!! URL::to('store/cart') !!}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
       								<li><a href="{!! URL::to('users/signout') !!}"><i class="fa fa-sign-out"></i> Sign Out</a></li>
       							@else
       								<li><a href="{!! URL::to('users/signin') !!}"><i class="fa fa-lock"></i> Login</a></li>
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
       								<li>{!! HTML::link('/', 'Home', ['class'=>'active'])!!}</li>
       								<li>{!! HTML::link('store', 'Shop')!!}</li>
       								<li><a href="404.html">404</a></li>
       								<li>{!! HTML::link('store/contact', 'Contact')!!}</li>
       							</ul>
       						</div>
       					</div>
       					<div class="col-sm-3">
       						<div class="search_box pull-right">
       							  {!! Form::open(array('url' => 'store/search', 'method' => 'GET')) !!}
											{!! Form::text('keyword', null, array('placeholder' => 'Search')) !!}
											{!! Form::close() !!}
       						</div>
       					</div>
       				</div>
       			</div>
       		</div><!--/header-bottom-->
</header><!--/header-->