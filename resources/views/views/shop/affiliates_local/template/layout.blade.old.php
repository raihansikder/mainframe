<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="LetsBab | FARFETCH">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
<title>LetsBab | {{ $affil_store['storeName'] }}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('letsbab/shop/affil/themes/images/favicon.ico')}}">
@include('shop.affiliates_local.template.css')
</head>
<body>
<!-- Header Starts -->
<!--Start Nav bar -->
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

	<div class="container-fluid">
		<div class="pmd-navbar-right-icon pull-right navigation">
		</div>
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a href="javascript:void(0);" data-target="basicSidebar" data-placement="left" data-position="slidepush" is-open="true" is-open-width="1200" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a>	
		  <a href="index.html" class="navbar-brand"><img src="{{asset('letsbab/shop/affil/assets/images/logo-lb-far-light-50pc.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></a>
		</div>
	</div>

</nav><!--End Nav bar -->
<!-- Header Ends -->

<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left sidebar-with-icons" role="navigation">
	<ul class="nav pmd-sidebar-nav">
		<li>
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true"
				href="javascript:void(0);">
				<i class="material-icons media-left pmd-sm">arrow_back</i>
				<span class="media-body">Home</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a>
		</li>
		<li class="dropdown pmd-dropdown">
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true"
				href="javascript:void(0);">
				<i class="material-icons media-left pmd-sm">chevron_right</i>
				<span class="media-body">Women</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a>
			<ul class="dropdown-menu">
				@foreach ($affil_store['storeCategories'] as $cat)
					@foreach ($cat['categoryChildren'] as $child_category)
			<li><a class="cat-links" href="#"  data-categorypath="{{$cat['category']}}|{{$child_category['category']}}" data-json="{{ \App\Http\Controllers\Shop\ShopController::slugify($child_category['categoryUrl']) }}">{{$child_category['category']}}</a></li>
					@endforeach
				@endforeach

				<li><a class="cat-links" href="#"  data-categorypath="Women|New In" data-json="farfetch-women-new.json">New In</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Clothing" data-json="farfetch-women-all.json">Clothing</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Activewear" data-json="farfetch-women-activewear.json">Activewear</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Shoes" data-json="farfetch-women-shoes.json">Shoes</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Bags" data-json="farfetch-women-bags.json">Bags</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Accessories" data-json="farfetch-women-accessories.json">Accessories</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Homeware" data-json="farfetch-women-homeware.json">Homeware</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Fashion Jwellery" data-json="farfetch-women-fashion-jewellery.json">Fashion Jwellery</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Fine Jwellery" data-json="farfetch-women-fine-jewellery.json">Fine Jwellery</a></li>
				<li><a class="cat-links" href="#"  data-categorypath="Women|Pre-Owned" data-json="farfetch-women-preowned.json">Pre-Owned</a></li>
			</ul>
		</li>
		
	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->

<!--content area start-->
<div id="content" class="pmd-content inner-page">
	<!--tab start-->
	<div class="container-fluid ">
		<!-- Title -->
		<h1 class="section-title" id="services">
			<span>Women</span>
		</h1><!-- End Title -->
	
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  <li><a href="index.html">Women</a></li>
		  <li class="active">New In</li>
		</ol><!--breadcrum end-->
	
		<div class="row prodgallery masonry-grid" id="card-masonry">
			<div class="grid-sizer col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> 
				<small class="next-button-desc"></small><br>
				<button type="button" class="col-md-4 btn btn-secondary next" style="float:none;">Load More...</button>
			</div>
		</div>
	</div><!-- tab end -->
	
</div><!-- content area end -->

<!-- Footer Starts -->
<footer class="admin-footer">
 <div class="container-fluid">
 	<ul class="list-unstyled list-inline">
	 	<li>
			<span class="pmd-card-subtitle-text">LetsBab &copy; <span class="auto-update-year"></span>. All Rights Reserved.</span>
			<h3 class="pmd-card-subtitle-text">Shop brands that love you back.</h3>
        </li>
        
        <li class="pull-right for-support">
			<a href="mailto:support@propeller.in">
          		<div>
					<svg x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38">
<g><path fill="#A5A4A4" d="M25.621,21.085c-0.642-0.682-1.483-0.682-2.165,0c-0.521,0.521-1.003,1.002-1.524,1.523
		c-0.16,0.16-0.24,0.16-0.44,0.08c-0.321-0.2-0.683-0.32-1.003-0.521c-1.483-0.922-2.726-2.125-3.809-3.488
		c-0.521-0.681-1.002-1.402-1.363-2.205c-0.04-0.16-0.04-0.24,0.08-0.4c0.521-0.481,1.002-1.003,1.524-1.483
		c0.721-0.722,0.721-1.524,0-2.246c-0.441-0.44-0.842-0.842-1.203-1.202c-0.441-0.441-0.842-0.842-1.243-1.243
		c-0.642-0.642-1.483-0.642-2.165,0c-0.521,0.521-1.002,1.002-1.524,1.523c-0.481,0.481-0.722,1.043-0.802,1.685
		c-0.08,1.042,0.16,2.085,0.521,3.047c0.762,2.085,1.925,3.849,3.328,5.532c1.884,2.286,4.17,4.05,6.815,5.333
		c1.203,0.562,2.406,1.002,3.729,1.123c0.922,0.04,1.724-0.201,2.365-0.923c0.441-0.521,0.923-0.922,1.403-1.403
		c0.682-0.722,0.682-1.563,0-2.245C27.265,22.729,26.423,21.927,25.621,21.085z"/>
	<path fill="#A5A4A4" d="M32.437,5.568C28.869,2,24.098-0.005,19.005-0.005S9.182,2,5.573,5.568C2.005,9.177,0,13.908,0,19
		s1.965,9.823,5.573,13.432c3.568,3.568,8.34,5.573,13.432,5.573s9.823-1.965,13.431-5.573
		C39.854,25.014,39.854,12.985,32.437,5.568z M30.299,30.294c-3.003,3.045-7.021,4.695-11.293,4.695
		c-4.272,0-8.291-1.65-11.294-4.695C4.666,27.29,3.016,23.271,3.016,19c0-4.272,1.649-8.291,4.695-11.294
		c3.003-3.003,7.022-4.695,11.294-4.695c4.272,0,8.291,1.649,11.293,4.695C36.56,13.924,36.56,24.075,30.299,30.294z"/>
</g></svg>
            	</div>
            	<div>
				  <span class="pmd-card-subtitle-text">For Support</span>
				  <h3 class="pmd-card-title-text">support@letsbab.app</h3>
				</div>
            </a>
        </li>
    </ul>
 </div>
</footer>
<!-- Footer Ends -->

@include('shop.affiliates_local.template.js')



<div tabindex="-1" class="modal fade-in-fwd" id="center-dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<div class="media-left"> <a href="javascript:void(0);" class="avatar-list-img"> <img width="40"
							height="40" src="{{asset('letsbab/shop/affil/assets/images/logo-lb-40x40.png')}}"> </a> </div>
				<div class="media-body media-middle">
					<h3 class="pmd-card-title-text modal-prod-name">LetsBab lets you earn cash or donate to charity by recommending products to your friends as well as shop for yourself</h3>
					<span class="pmd-card-subtitle-text">Come join the LetsBab Community</span>
				</div>
			</div>
			<div class="pmd-modal-media"> <img height="60%" class="img-responsive modal-prod-img" src=""> </div>
			<div class="modal-body"><span class="modal-price"></span></div>
			<div class="pmd-modal-action">
				<button data-dismiss="modal" type="button"
					class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary"> <i
						class="material-icons pmd-sm">share</i> </button>
				<button data-dismiss="modal" type="button"
					class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary"> <i
						class="material-icons pmd-sm">thumb_up</i> </button>
				<button data-dismiss="modal" type="button"
					class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary"> <i
						class="material-icons pmd-sm">favorite</i> </button>
			</div>
		</div>
	</div>
</div>
</body>
</html>