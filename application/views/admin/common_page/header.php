<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NHSWTSDF</title>
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Open Sans Font [ OPTIONAL ]-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?=base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link href="<?=base_url(); ?>assets/admin/css/nifty.min.css" rel="stylesheet">
        <!--Nifty Premium Icon [ DEMONSTRATION ]-->
        <link href="<?=base_url(); ?>assets/admin/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
        <!--=================================================-->
        <!--Pace - Page Load Progress Par [OPTIONAL]-->
        <link href="<?=base_url(); ?>assets/admin/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?=base_url(); ?>assets/admin/plugins/pace/pace.min.js"></script>
        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?=base_url(); ?>assets/admin/css/demo/nifty-demo.min.css" rel="stylesheet">
        <link href="<?=base_url(); ?>assets/admin/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?=base_url(); ?>assets/admin/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
        <style type="text/css">
            div#example_wrapper > div {
                display: flex;
                justify-content: flex-end;
            }
        </style>
    </head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">    
        <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="<?=base_url('admin/dashboard'); ?>" class="navbar-brand">
                            <img src="<?=base_url(); ?>assets/admin/img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <div class="brand-title">
                                <span class="brand-text">NHSWTSDF</span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content">
                        <ul class="nav navbar-top-links">
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#">
                                    <i class="demo-pli-list-view"></i>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Navigation toogle button-->
                            <!--Search-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!-- <li>
                                <div class="custom-search-form">
                                    <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                                        <i class="demo-pli-magnifi-glass"></i>
                                    </label>
                                    <form>
                                        <div class="search-container collapse" id="nav-searchbox">
                                            <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                                        </div>
                                    </form>
                                </div>
                            </li> -->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Search-->
                        </ul>
                        <ul class="nav navbar-top-links">
                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="ic-user pull-right">
                                        <i class="demo-pli-male"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                    <ul class="head-list">
                                        <!-- <li>
                                            <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                                        </li> -->
                                        <li>
                                            <a href="<?=base_url('admin/logout'); ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--End user dropdown-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>
            <!--===================================================-->
        <!--END NAVBAR-->