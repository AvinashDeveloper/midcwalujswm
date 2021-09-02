<!--NAVBAR-->
    <?php $this->load->view('admin/common_page/header');?>
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
<!--END NAVBAR-->

    <div class="boxed">
        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                <div class="pad-all text-center">
                    <h3>Welcome back to the Dashboard.</h3>
                    <p>Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty.</p>
                </div>
            </div>
            <!--Page content-->
            <div id="msg_div">
                <?php $this->load->view('admin/common_page/session_msg'); ?>
            </div>
            <!--===================================================-->
            <div id="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Network Line Chart-->
                        <!--===================================================-->
                        <div id="demo-panel-network" class="panel">
                            <div class="panel-heading">
                                <div class="panel-control">
                                    <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle btn btn-default btn-active-primary" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3 class="panel-title">Waste Processing</h3>
                            </div>
                            <!--chart placeholder-->
                            <div class="pad-all">
                                <div id="demo-chart-network" style="height: 255px"></div>
                            </div>
                            <!--Chart information-->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-xs-6 text-sm">
                                                <p>
                                                    <span>Total Wet Waste collection</span>
                                                    <span class="pad-lft text-semibold">
                                                        <span class="text-lg"><?php echo $totalwet_waste->total_wet_waste_collection?> tons</span>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>Total Dry Waste collection</span>
                                                    <span class="pad-lft text-semibold">
                                                        <span class="text-lg"><?php echo $totaldry_waste->total_dry_waste_collection?> tons</span>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>Total Garden Waste Collection</span>
                                                    <span class="pad-lft text-semibold">
                                                        <span class="text-lg"><?php echo $totalgarden_waste->total_garden_waste_collection?> tons</span>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-xs-6 text-sm">
                                                <p>
                                                    <span>Total Wet Waste Processing</span>
                                                    <span class="pad-lft text-semibold">
                                                        <span class="text-lg"><?php echo $totalwet_process->total_wet_waste_processing?> tons</span>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>Total Dry Waste Processing</span>
                                                    <span class="pad-lft text-semibold">
                                                        <span class="text-lg"><?php echo $totaldry_process->total_dry_waste_processing?> tons</span>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>Total Garden Waste Processing</span>
                                                    <span class="pad-lft text-semibold">
                                                        <span class="text-lg"><?php echo $totalgarden_process->total_garden_waste_processing?> tons</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="pad-rgt">
                                            <p class="text-semibold text-uppercase text-main">Today Tips</p>
                                            <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="text-uppercase text-semibold text-main">Total waste collection in a day</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="media pad-btm">
                                                    <div class="media-left">
                                                        <span class="text-2x text-thin text-main">754.9</span>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no">Tons</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-btm">
                                                <div class="clearfix">
                                                    <p class="pull-left mar-no">Wet Waste</p>
                                                    <p class="pull-right mar-no">70%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-info" style="width: 70%;">
                                                        <span class="sr-only">70% Complete</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="clearfix">
                                                    <p class="pull-left mar-no">Dry Waste</p>
                                                    <p class="pull-right mar-no">10%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 10%;">
                                                        <span class="sr-only">30% Complete</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--===================================================-->
                        <!--End network line chart-->
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->
        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
        <?php $this->load->view('admin/common_page/navigation');?>
    </div>

<!-- FOOTER -->
    <?php $this->load->view('admin/common_page/footer'); ?>
<!-- END FOOTER -->