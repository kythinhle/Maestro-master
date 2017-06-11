<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Maestro</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('')}}">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<link rel="stylesheet" href="public/client/css/font.css">
        <link rel="stylesheet" href="public/client/css/bootstrap.css">
        <link rel="stylesheet" href="public/client/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/client/css/flickity.min.css">
		<link rel="stylesheet" href="public/client/css/animate.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <!--build:css css/all.min.css-->
        <link rel="stylesheet" href="public/client/css/styles.css">
        <link rel="stylesheet" href="public/client/css/responsive.css">
        <!--endbuild-->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <div class="fixed-overlay"></div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <header>
			<div class="navbar">
				<div class="container">
                    <input id="btn-nav-input" class="hidden" type="checkbox">
					<div class="navbar-header"> 
						<img class="logo" src="public/upload/images/logo.png">
						<div class="btn-nav">
                            <label class="btn-nav-lable" for="btn-nav-input">
                                <span class="one onetop">
                                    <span class="two twotop"></span>
                                </span>
                                <span class="one onebot">
                                    <span class="two twobot"></span>
                                </span>
                            </label>
                        </div>
					</div>
					<nav class="collapse navbar-collapse">
						<ul class="nav navbar-nav"> 
							<li><a href="index.html">HOME</a></li>
							<li><a href="about.html">PEOPLE</a></li>
							<li class="active"><a href="#">INVESTMENT STRATEGY</a></li>
							<li><a href="portfolio.html">PORTFOLIO</a></li>
							<li><a href="contact.html">CONTACT</a></li>
						</ul>
					</nav> 
				</div>
			</div>
			<div class="clearfix"></div>
		</header>
		
		<div class="about-page">
           <div class="top-bg investment-bg" style="background-image: url('public/upload/banner_main/{{$data->image}}')">
              <div class="container">
                   <div class="text-top text-center">
                       {{$data->content}}
                   </div>
               </div>
           </div>
           <div class="container">
                  
               <div class="about-content tab-content current text-center wow fadeIn">
               @foreach($content as $item)
                      <div class="about-sblock-info">
                           <div class="about-title">
                               {{$item->title}}
                           </div>
                           <div class="about-details">
                               {{$item->content}}
                           </div>
                       </div>   
               @endforeach         
               </div>
               <!--About us-->
               
           </div>
		</div>  <!--- END Page -->


		<footer class="wow fadeIn" data-wow-duration="0.5s">
			<div class="container">
				<div class="footer-left pull-left">
				    <p>Maestro Equity Partners 	&copy; 2017</p>
				</div>
				<div class="footer-right pull-right">
				<ul>
                    <li><a href="">Term of Use</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">English</a></li>
				</ul>
				</div>
			</div>
		</footer>


        
		<script src="public/client/js/jquery-1.9.1.min.js"></script>
		<script src="public/client/js/bootstrap.min.js"></script>
		<script src="public/client/js/classie.js"></script>
		<script src="public/client/js/flickity.pkgd.min.js"></script>
		<script src="public/client/js/wow.min.js"></script>
		<script src="public/client/js/jquery.matchHeight.js"></script>
    <script src="public/client/js/jquery.nice-select.min.js"></script>
        <!--build:js js/main.min.js -->
        <script src="public/client/js/plugins.js"></script>
        <script src="public/client/js/scripts.js"></script>
        <!-- endbuild -->
		
		<script>
            $(window).load(function () {
	   		      new WOW().init();
            });
                
             
		</script>
    </body>
</html>
