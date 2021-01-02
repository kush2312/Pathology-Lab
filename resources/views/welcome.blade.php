<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pathology Lab</title>
    <!-- Meta -->
    <meta charset="utf-8"> 
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Global CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <!-- Theme CSS -->  
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    
    
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">       
            <h1 class="logo">
                <a class="scrollto" href="#hero">
                    
                    <span class="text"><span class="highlight">Pathology</span> Lab</span></a>
            </h1><!--//logo-->
            <nav class="main-nav navbar-expand-md float-right navbar-inverse" role="navigation">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item"><a class="active nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li class="nav-item"><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>  
                                @endif                      
                            @endif
                        @endif
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->                     
        </div><!--//container-->
    </header><!--//header-->
    
    <div id="hero" class="hero-section">      
        <div id="hero-carousel" class="hero-carousel carousel carousel-fade slide" data-ride="carousel" data-interval="10000">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
    			
				<div class="carousel-item item-1 active" style="background-image: url('{{ asset('img/hero2.jpg') }}');">
					<div class="item-content container">
    					<div class="item-content-inner">
    				        
				            <h2 class="heading">Welcome to <br class="d-none d-md-block"> Pathology Lab Management</h2>
				            <p class="intro">We provide the world class facility to our users. You are just few clicks away from booking an appointment for the test</p>
				            <a class="btn btn-primary btn-cta" href="/register">Register Now</a>
    				        
    					</div><!--//item-content-inner-->
					</div><!--//item-content-->
                </div><!--//item-->
			</div>	
		</div><!--//carousel-->
    </div><!--//hero-->
    
    
    <div id="about" class="about-section">
        <div class="container text-center">
            <h2 class="section-title">Pathology Lab Management</h2>
            <p class="intro">This are some of the features of this project </p>
            
            <div class="items-wrapper row">
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{ asset('img/figure-1.png') }}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">Reports</h3>
                        <div class="item-desc mb-3">
                            Download your test reports. This website gives pdf format of the reports. You can see all your previous reports and payment history. 
                        </div><!--//item-desc-->
                        <a class="btn btn-primary" href="/">Find out more</a>
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{ asset('img/figure-2.png') }}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">Time Management</h3>
                        <div class="item-desc mb-3">
                            Manage your time. Book appointment as per your preference and edit the appointment if you wants to </div><!--//item-desc-->
                        <a class="btn btn-primary" href="/">Find out more</a>
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="figure-holder">
                            <img class="figure-image" src="{{ asset('img/figure-3.png') }}" alt="image">
                        </div><!--//figure-holder-->
                        <h3 class="item-title">Device compatibility</h3>
                        <div class="item-desc mb-3">
                            Book an appointment from any device. Easy and fast experience with beautiful User Interface </div><!--//item-desc-->
                       <a class="btn btn-primary" href="/">Find out more</a>
                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//items-wrapper-->
        </div><!--//container-->
    </div><!--//about-section-->
    
    <div id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="section-title text-center">Many Happy Customers</h2>
            <div class="item mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Loved this site. It helps me to book the appointment for the test as per my preference.</p>
                        <div class="quote-source">
                            <span class="name">@Mandar,</span>
                            <span class="meta">Mumbai</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item item-reversed mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Nice experience with the site. It helps me to keep track of all my previous reports.</p>
                        <div class="quote-source">
                            <span class="name">@Chinmay,</span>
                            <span class="meta">Mumbai</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>This website is really helpful for me. Now I don't need to ask on the phone call for my preferable appointment time.</p>
                        <div class="quote-source">
                            <span class="name">@Akash,</span>
                            <span class="meta">Mumbai</span>
                        </div><!--//quote-source-->
                    </blockquote>
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="item item-reversed mx-auto">
                <div class="profile-holder">
                    <img class="profile-image img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="profile">
                </div>
                <div class="quote-holder">
                    <blockquote class="quote">
                        <p>Amazing website with nice experience. I don't have to keep track of my previous reports and the report system is really fast.</p>
                         <div class="quote-source">
                            <span class="name">@Hrishikesh,</span>
                            <span class="meta">Mumbai</span>
                        </div><!--//quote-source-->
                    </blockquote>
                    
                </div><!--//quote-holder-->
            </div><!--//item-->
            <div class="text-center mt-4">
            <a class="btn btn-inverse btn-cta" href="/appointments/create">Book an appointment now</a>
            </div>
        </div><!--//container-->
    </div><!--//testimonials-->
    
    <div id="features" class="features-section ">
        <div class="container text-center ">
            <h2 class="section-title">Discover Features</h2>
            <p class="intro">You can use this section to list your product features. The screenshots used here were taken from <a href="https://www.uxfordev.com/appify/index.html" target="_blank">Bootstrap 4 admin theme Appify</a></p>
                <!-- Nav tabs -->
                <div class="feature-nav nav nav-pill flex-column col-lg-12 col-md-12 col-12 order-0 order-md-1 align-items-center" role="tablist" aria-orientation="vertical">
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-1" data-toggle="pill" role="tab" aria-selected="true">Fast and easy appointment booking</a>
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-2" data-toggle="pill" role="tab" aria-selected="false">Manage all your previous reports</a>
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-3" data-toggle="pill" role="tab" aria-selected="false">See the status of your invlices</a>
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-4" data-toggle="pill" role="tab" aria-selected="false">Pay the tests fees online</a>
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-5" data-toggle="pill" role="tab" aria-selected="false">Select the appointment time as per your convenience</a>
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-6" data-toggle="pill" role="tab" aria-selected="false">Fully Responsive</a>
                     <a class="nav-link mb-lg-3" href="/" aria-controls="feature-7" data-toggle="pill" role="tab" aria-selected="false">Beautiful UI</a>            
                </div>
        </div><!--//container-->
    </div><!--//features-->
    
    <div class="team-section" id="team">
        <div class="container text-center">
            <h2 class="section-title">Our Team</h2>
            <div class="story">
                <p>This is the dedicated team behind this project.</p>
            </div>
            <div class="members-wrapper row">
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="Xiaoying Riley" />
                        </div>
                        
                        <div class="member-content">
                            <h3 class="member-name">Siddhesh Bandgar</h3>
                            <div class="member-title">Full-Stack Designer</div>
                            <ul class="social list-inline">
                                <li class="list-inline-item"><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>        
                            </ul>
                            <div class="member-desc">
                                <p>Siddhesh is a full-stack developer specialising in building large, scalable and user-friendly web apps. Follow him on Twitter for fresh developer tips and check out his Github for useful open-source tools.
                                </p>
                            </div><!--//member-desc-->
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="Tom Najdek" />
                        </div>
                        
                        <div class="member-content">
                            <h3 class="member-name">Parijat Dhalkar</h3>
                            <div class="member-title">Full-Stack Developer</div>
                            <ul class="social list-inline">
                                <li class="list-inline-item"><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>        
                            </ul>
                            <div class="member-desc">
                                <p>Parijat is a full-stack developer specialising in building large, scalable and user-friendly web apps. Follow him on Twitter for fresh developer tips and check out his Github for useful open-source tools.
                                </p>
                            </div><!--//member-desc-->
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
                <div class="item col-md-4 col-12">
                    <div class="item-inner">
                        <div class="profile mb-2">
                            <img class="profile-image" src="https://res.cloudinary.com/mhmd/image/upload/v1556834133/avatar-1_s02nlg.png" alt="Tom Najdek" />
                        </div>
                        
                        <div class="member-content">
                            <h3 class="member-name">Kush Dabade</h3>
                            <div class="member-title">Full-Stack Developer</div>
                            <ul class="social list-inline">
                                <li class="list-inline-item"><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="facebook" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>        
                            </ul>
                            <div class="member-desc">
                                <p>Kush is a full-stack developer specialising in building large, scalable and user-friendly web apps. Follow him on Twitter for fresh developer tips and check out his Github for useful open-source tools.
                                </p>
                            </div><!--//member-desc-->
                        </div><!--//member-content-->
                    </div><!--//item-inner-->
                </div><!--//item-->
            </div><!--//members-wrapper-->
    </div><!--//team-section-->
    
    <div id="contact" class="contact-section">
        <div class="container text-center">
            <h2 class="section-title">Contact Us</h2>
            <div class="contact-content">
                <p>If you have any quries leave a message here we will reach to you as soo as possible.</p>

            </div>
            <a class="btn btn-cta btn-primary" href="/">Contact Us</a>
            
        </div><!--//container-->
    </div><!--//contact-section-->

     
    <!-- Javascript -->          
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
       
</body>
</html> 

