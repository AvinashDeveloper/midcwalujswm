<?php $this->load->view("website/header"); ?>
        <div class="ct-couponsSection ct-priceSection" data-height="600">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ct-u-marginBoth50">
                        <div class="headerSection">
                            <ol class="breadcrumb">
                                <li><a href="index-2.html">Home</a></li>
                                <li class="active">Contact us</li>
                            </ol>
                            <h1 class="big-blackHeader">Contact us</h1>
                        </div>
                        <div id="msg_div">
                            <?php $this->load->view('admin/common_page/session_msg'); ?>
                        </div>
                        <form id="contactForm" action="<?=base_url('Contact-us');?>" method="POST" data-email-subject="My Rota" class="ct-js-validate ct-formAppointment">
                            <div class="form-header">
                                <h4 class="text-uppercase">Contact form</h4>
                            </div>
                            <div class="form-group">
                                <label for="full_name" class="col-sm-2 control-label short-label">Name <span>*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control ct-input" id="full_name" data-placeholder="Name" placeholder="" name="full_name" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label short-label">Email <span>*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control ct-input" id="email" data-placeholder="Email" placeholder="" name="email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-sm-2 control-label short-label">Phone number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control ct-input ct-input--short" data-placeholder="Phone number" id="phone_number"
                                    placeholder="" name="phone_number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-lg-2 col-md-2 col-sm-12 control-label short-label">Message <span>*</span></label>
                                <div class="col-lg-10 col-md-10 col-sm-12">
                                    <textarea class="form-control ct-input ct-input--wide" id="message" placeholder="" name="message" required="required" data-placeholder="Message">
                                    </textarea>
                                </div>
                            </div>
                            <div class="btn-group ct-u-paddingBoth20">
                                <button type="submit" class="btn btn-accent">send message</button>
                            </div>
                            <!-- <div role="alert" class="successMessage alert alert-success alert-dismissible">
                                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">&times;</span>
                                </button>Your Email has been sent successfully.
                            </div>
                            <div role="alert" class="errorMessage alert alert-danger alert-dismissible">
                                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">&times;</span>
                                </button>Ups, something went wrong.
                            </div> -->
                        </form>
                    </div>
                 
                </div>
            </div>
        </div>
        <footer>
            <div class="ct-prefooter ct-u-backgroundGray ct-u-paddingBoth70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="widget ct-widget-contact">
                                <h3 class="ct-widget-header text-uppercase ct-fw-400">Contact us</h3>
                                <h6>Address</h6>
                                <h4>486 Engine Avenue Windshield, CA 87301</h4>
                                <h6>Phone</h6>
                                <a href="tel:9094502735" class="ct-u-colorLightBlack"><h4>909.450.2735</h4></a>
                                <h6>Email</h6>
                                <a href="#" class="ct-u-colorLightBlack"><h4>
                                info@xyz.com</h4></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget ct-widget-services">
                                <h3 class="ct-widget-header text-uppercase ct-fw-400">Our company</h3>
                                <ul>
                                    <li><a href="<?=base_url('/');?>">Home</a></li>
                                    <li><a href="<?=base_url('Contact-us');?>">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ct-postfooter container ct-u-paddingBoth20">
                <div class="row">
                    <div class="col-lg-9 col-md-6 ct-copyright">
                        <p>© 2020 xyz Auto Service. All rights reserved. Design by <a
                            href="https://www.hotbitinfotech.com" target="_blank">Hotbit</a>
                        </p>
                    </div>
                 
                </div>
            </div>
        </footer>
        <a href="#MainHeader" class="ct-js-btnScrollUp ct-btnScrollUp">
            <i class="fa fa-angle-up text-center"></i>
        </a>
    </div>
    <!-- ct-js-wrapper -->
    <!-- JavaScripts -->
    <script src="<?=base_url('assets/website/'); ?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/device.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/browser.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/jquery.placeholder.min.js"></script>
    <script id="googleMap" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/main.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/plugins/slick/slick.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/plugins/slick/init.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/form/js/contact-form.js"></script>
    <!-- switcher -->
    <script src="<?=base_url('assets/website/'); ?>demo/js/demo.js"></script>
    <!-- end switcher -->
    <script>
        setTimeout(function() {
            $('#msg_div').hide('fast');
            $('#contactForm').reset();
            location.reload();
        }, 4000);
    </script>
</body>
</html>