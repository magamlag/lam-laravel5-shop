					<div class="left-sidebar">
						<h2>Category</h2>
						<div id="accordian" class="panel-group category-products"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#sportswear" data-parent="#accordian" data-toggle="collapse">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="sportswear">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
						 @foreach($catnav as $cat)
							<div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">{{ HTML::link('store/category/' . $cat->id, $cat->name) }}</h4>
                </div>
              </div>
             @endforeach

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>GrГјne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>RГ¶sch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
								<h2>Price Range</h2>
								<div class="well text-center">
									 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
									 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
								</div>
            </div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							{{ HTML::image('images/home/shipping.jpg') }}
						</div><!--/shipping-->
					
					</div>
