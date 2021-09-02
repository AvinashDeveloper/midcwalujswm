<!DOCTYPE html>
<html class="no-js" lang="en"> 
<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Rota - Creative HTML Template">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <script src="cdn-cgi/apps/head/sxN6HgCn8v7CG45Nsym8imDXilk.js"></script>
    <link rel="shortcut icon" href="<?=base_url('assets/website/'); ?>assets/images/demo-content/favicon.png">
    <!--<link rel="apple-touch-icon" href="/apple-touch-icon.png">-->
    <title>Rota Auto Service — Mechanic Workshop HTML Template</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/website/'); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/website/'); ?>assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/bootstrap/js/html5shiv.min.js"></script>
    <script src="assets/bootstrap/js/respond.min.js"></script>
    <![endif]-->
    <style>
    .flex {
    display: flex;
    color: #fff;
    justify-content: flex-start;
    align-items: center;
    flex-direction: row;
}
.logo > img {
    height: 100px;
    /* margin: 0; */
}
    </style>
</head>
<body class="cssAnimate">
    <div class="ct-menuMobile">
        <div class="search-button ct-u-backgroundBlack2">
            <a href="appointments.html" class="btn btn-accent">Request an appointment</a>
        </div>
        <ul class="ct-menuMobile-navbar">
            <li class="active">
                <a href="index-2.html">Home</a>
            </li>
            <li class="panel-title">
                <a href="#about" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="about"><span>About us</span><span class="caret"></span></a>
                <div id="about" class="panel-collapse collapse" role="tabpanel"
                aria-expanded="true">
                    <ul class="list-group">
                        <li><a href="about-us.html">Who we are</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="careers.html">Careers</a></li>
                    </ul>
                </div>
            </li>
            <li class="panel-title">
                <a href="#services" role="button" data-toggle="collapse" aria-expanded="true"
                aria-controls="services">
                    <span>Services</span><span class="caret"></span>
                </a>
                <div id="services" class="panel-collapse collapse" role="tabpanel"
                aria-expanded="true">
                    <ul class="list-group">
                        <li><a href="services_overview.html">Services overview</a></li>
                        <li><a href="preventive_maintenance.html">Preventive Maintenance</a></li>
                        <li><a href="oil_change.html">Oil Change</a></li>
                        <li><a href="tires.html">Tires &amp; Tire Repair</a></li>
                        <li><a href="brakes.html">Brakes &amp; Brake Repair</a></li>
                        <li><a href="mufflers.html">Mufflers &amp; Exhaust</a></li>
                        <li><a href="steering.html">Steering &amp; Suspension</a></li>
                        <li><a href="batteries.html">Batteries, Starters &amp; Charging</a></li>
                        <li><a href="climate.html">Climate Control</a></li>
                        <li><a href="belts.html">Belts &amp; Hoses</a></li>
                        <li><a href="engine.html">Engine Cooling</a></li>
                        <li><a href="check_engine.html">Check Engine Light</a></li>
                        <li><a href="lights.html">Lights, Wipers &amp; Accessories</a></li>
                    </ul>
                </div>
            </li>
            <li class=""><a href="appointments.html">Appointments</a></li>
            <li class=""><a href="coupons.html">Coupons</a></li>
            <li class=""><a href="faq.html">Faq</a></li>
            <li class="panel-title">
                <a href="#blog" role="button" data-toggle="collapse" aria-expanded="true"aria-controls="blog">
                    <span>Blog</span><span class="caret"></span>
                </a>
                <div id="blog" class="panel-collapse collapse" role="tabpanel"
                aria-expanded="true">
                    <ul class="list-group">
                        <li><a href="blog.html">Posts</a></li>
                        <li><a href="blog-post.html">Single post</a></li>
                    </ul>
                </div>
            </li>
            <li class="">
                <a href="contact.html">Contact us</a>
            </li>
        </ul>
    </div>
    <div id="ct-js-wrapper" class="ct-pageWrapper">
        <div class="search-screen">
            <button class="ct-u-colorWhite btn-mobileSearch"><i class="fa fa-times ct-u-colorWhite"></i>
            </button>
            <form class="mobile-form" role="search">
                <div class="form-group">
                    <label for="search_mobile" class="form-control empty text-center">Just type and press 'enter'</label>
                    <input type="text" class="form-control empty text-center" id="search_mobile" autofocus="autofocus"
                    placeholder=" ">
                </div>
            </form>
        </div>
        <header class="ct-mainHeader" id="MainHeader">
            <!-- <div class="ct-topBar">
                <div class="navbar ct-topBar-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-5 ct-u-marginBoth40 nav-logo">
                                <a href="index-2.html" class="navbar-logo">
                                   
                                </a>
                            </div>
                            <div class="col-md-offset-7 col-lg-3  visible-lg ct-u-marginBoth40">
                                <div class="btn-group">
                                   
                              
                                </div>
                            </div>
                            <div class="col-xs-6 col-xs-offset-1 visible-xs">
                                <button class="navbar-toggle ct-u-colorBlack" id="ct-js-search-button"><i
                                    class="fa fa-bars ct-u-colorWhite"></i>
                                </button>
                                <button class="navbar-search ct-u-colorBlack" id="ct-js-menu-button"><i
                                    class="fa fa-search ct-u-colorWhite"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-md-offset-7 col-sm-3 col-sm-offset-3 col-xs-12 hidden-lg ct-header-contact">
                                <ul class="list-unstyled list-inline">
                                    <li>
                                        <a href="tel:9094502735">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index-2.html#ct-mapSection">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="appointments.html">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <nav class="navbar ct-u-backgroundLightGray hidden-xs">
                <div class="container ct-navbar-container">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="flex">
                    <div class="logo">
                    <img src="<?=base_url(); ?>assets/admin/img/logo.png" alt="Nifty Logo" class="brand-icon">
                    </div>
                   
                            <div class="brand-title">
                                <span class="brand-text">NHSWTSDF</span>
                            </div>
                    </div>
                    
                    </div>
                    <div class="col-md-8">
                    <div class="pull-right">
                    <ul class="navbar-left ct-u-paddingBoth20 ">
                            <li class="active"><a href="<?=base_url('/');?>"><span>Home</span></a></li>
                            <?php $session = $this->session->userdata('web_login');if(!empty($session)){?>
                            <li><a href="<?=base_url('Account-details');?>"><span>Account</span></a></li>
                            <?php }?>
                            <li><a href="<?=base_url('Contact-us');?>"><span>Contact us</span></a></li>
                            <?php if(empty($session)) { ?>
                                  <li>   <a href="<?=base_url('Login');?>" class="btn btn-accent">
                                        Login
                                    </a></li>
                                    <?php } else { ?>
                                        <li>  <a href="<?=base_url('Logout');?>" class="btn btn-accent">
                                        Logout
                                    </a></li>
                                    <?php } ?>
                        </ul>
                        </div>
                  
                      
                    </div>
                    </div>
                   
                </div>
            </nav>
        </header>