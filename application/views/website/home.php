<?php $this->load->view("website/header"); ?>
<style>
.image img
{
    height:200px;
    width:100%;
}
h3.gallery_title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
}
</style>
    <div class="ct-slick ct-js-slick ct-mainSlider ct-slick-arrow--type1 ct-slick-dots--type1" data-autoplay="false" data-arrows="true" data-dots="true" data-items="1" data-height="550">
        <?php $slider = GetSliderInfo();
            if(!empty($slider)){
                foreach($slider as $value){
        ?>
        <div class="item" data-background="<?=base_url().slider_image_url.$value['slider_image']; ?>" data-height="550">
            <div class="item-inner container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-8 col-xs-10 slider-header">
                
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
    <div class="ct-iconBoxes ct-u-backgroundLightGray text-uppercase" data-height="149">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-6 ct-u-paddingTop50 ">
                    <a href="https://www.trackinggenie.com/">
                        <div class="media directions">
                            <div class="media-left">
                                <img class="media-object directions" src="<?=base_url('assets/website/'); ?>assets/images/demo-content/img_trans.png" alt="directions">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Track your Vechicle</h3>
                            </div>
                        </div>
                    </a>
                    <div class="break-line"><img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/break-line.png" alt=" "></div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="container ct-services ct-u-marginBoth80">
        <div class="row">
            <!-- <a href="preventive_maintenance.html"> -->
            <?php $gallery = GetGalleryInfo();
                if(!empty($gallery)){
                    $i = 0;
                    foreach($gallery as $value){
                        // if($i == 7){
                        // break;
                        // }
            ?>
                <div class="col-md-3"><!-- ct-item-hover ct-item-hover--big -->
                    <div class="outer">
                        <div class="inner">
                            <div class="image">
                                <img class="img-responsive" src="<?=base_url().gallery_image_url.$value['image_name']; ?>" alt="<?=$value['image_title'];?>">
                                <h3 class="gallery_title">
                                    <?=$value['image_title'];?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $i++;}
                }
            ?>
            <!-- </a> -->
       
        </div>
    </div>
    <div class="ct-description" data-height="450">
        <div class="container ct-u-paddingTop70 ct-u-paddingBottom100">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="ct-description--header ct-fw-700">‘Clean and Green MIDC’ initiative by MIDC and executed by Mahindra…...</h1>
                    <p class="ct-fw-400">
                        We, human beings want a clean & green environment but our contribution towards this is very minimal. Here is an opportunity to join our initiative to create a clean & green environment which would also solve your waste disposal problem. We believe that waste management is going to play a major role in the days to come.

                    </p>
                    <p style="padding: 0px 0!important;">
                        
What is the project about? Nearly 60% of the waste we generate on daily basis is organic waste which mostly ends up in landfill, creating huge problems for the surrounding industries, polluting ground water table & generating harmful greenhouse gas emissions. 

                    </p>
                    <p style="padding: 0px 0!important;">
                        
The best possible way is to segregate dry and organic waste separately at source. Societies, Commercial Establishments, Private Organisations can choose to part with our initiative and the waste can be reduced, recycled & reused. It has tremendous benefits for our country in terms of solving social issues, promoting good health & even tackling climate change.

                    </p>
                    <p style="padding: 0px 0!important;">
                        
As a socially responsible Industrial Development Organisation, MIDC - Aurangabad has taken the initiative for setting up a state of art facility to create a scientific disposal unit for organic wastes such as food waste & process related organic waste from Industries & Corporates with the help of Mahindra to design, develop and execute this project at P-183, Waluj Industrial Area, Waluj, Aurangabad.

                    </p>
                    <p style="padding: 0px 0!important;">
                        
In continuation to our discussion, Bajaj is being a major shareholder of MIDC Waluj industrial area and we understood that you have already taken up various green initiative like Vermi composting, Electrical compositing for the waste generated from the canteens. Since MIDC Bio-Methanation project is live and it is very nearer to your organisation, we request you to give the wet waste generated from your facilities to our plant for doing the scientific manner processing. In addition to the wet waste, we will be accepting the garden waste separately. By participating in this project, your organisation will be able to divert your segregated organic waste to our facility for scientific disposal without any additional cost to your organisation as a processing fee.

                    </p>
                    <p style="padding: 0px 0!important;">
                        
As a benefit, you will ensure that your organisation is disposing your organic waste scientifically, meeting pollution control board norms specified by Government & contributing to society by reducing the greenhouse gas emissions that organic waste releases from landfills and help to clean up our country.

                    </p>
                    <p style="padding: 0px 0!important;">
This initiative has been taken up by MIDC with the Technology Partner Mahindra to make ‘Clean and Green MIDC’ and we would really appreciate if you could participate in this project by providing segregated organic waste on daily basis to our plant.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="ct-gallery ct-u-paddingTop70" data-height="425">
        <h3 class="text-center text-uppercase ct-u-paddingBoth20">Our gallery</h3>
        <div class="container">
            <div class="ct-slick ct-light-gallery ct-u-marginBottom30 ct-js-slick ct-slick-arrow--type1 ct-slick-dots--type1 ct-js-lightGallery" data-autoplay="false"
            data-arrows="true" data-dots="false" data-items="1" data-items-xs="2" data-items-sm="3" data-items-md="4"
            data-items-lg="6" data-height="165">
                <a href="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_1_large.jpg">
                    <div class="item">
                        <div class="item-inner">
                            <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_1.jpg" alt="">
                        </div>
                    </div>
                </a>
                <a href="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_2_large.jpg">
                    <div class="item">
                        <div class="item-inner">
                            <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_2.jpg" alt="">
                        </div>
                    </div>
                </a>
                <a href="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_3_large.jpg">
                    <div class="item">
                        <div class="item-inner">
                            <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_3.jpg" alt="">
                        </div>
                    </div>
                </a>
                <a href="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_4_large.jpg">
                    <div class="item">
                        <div class="item-inner">
                            <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_4.jpg" alt="">
                        </div>
                    </div>
                </a>
                <a href="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_5_large.jpg">
                    <div class="item">
                        <div class="item-inner">
                            <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_5.jpg" alt="">
                        </div>
                    </div>
                </a>
                <a href="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_6_large.jpg">
                    <div class="item">
                        <div class="item-inner">
                            <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/pic_6.jpg" alt="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div> -->
    <div class="ct-mapSection ct-u-backgroundLightBlack" data-height="568" id="ct-mapSection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 ct-contact">
                    <div class="widget ct-widget-contact ct-widget-contact--map">
                        <h3 class="ct-widget-header text-uppercase ct-fw-400" style="padding: 0px 0;">Get in touch</h3>
                        <h6 class="address">Address</h6>
                        <h4>P-183, Waluj Industrial Area, Waluj, Aurangabad-431133</h4>
                        <h6 class="phone">Phone</h6>
                        <a href="#"><h4>9503385128</h4></a>
                        <!-- <h6>Hours of operation</h6>
                        <h4>Mon—Fri: 8:00am—5:30pm</h4>
                        <h4>Sat: 8:00am—4:30pm</h4>
                        <h4>Sun: Closed</h4> -->
                        <a href="contact.html" class="btn btn-white ct-u-marginTop20">Send Us A Message</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60050.75212380807!2d75.19974150367706!3d19.83267362614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdb9bc36aa14927%3A0xbe9f87b5b93017e4!2sWaluj%2C%20Aurangabad%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1612415236650!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="ct-logosSection ct-u-paddingBoth50" data-height="160">
        <div class="container">
            <div class="ct-slick ct-js-slick ct-mainSlider ct-slick-arrow--type1 ct-slick-dots--type1"
            data-autoplay="false"
            data-arrows="true" data-dots="false" data-items="2" data-items-sm="4" data-items-md="5"
            data-items-lg="7"
            data-height="65">
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-1.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-2.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-3.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-4.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-5.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-6.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="item-inner">
                        <img src="<?=base_url('assets/website/'); ?>assets/images/demo-content/car-logo-7.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <footer>
        <div class="ct-postfooter container ct-u-paddingBoth20">
            <div class="row">
                <div class="col-lg-9 col-md-6 ct-copyright">
                    <p>© 2020 xyz Auto Service. All rights reserved. Design by <a
                        href="https://www.Hotbitinfotech.com" target="_blank">Hotbit</a>
                    </p>
                </div>
            
            </div>
        </div>
    </footer>
    <a href="#MainHeader" class="ct-js-btnScrollUp ct-btnScrollUp">
        <i class="fa fa-angle-up text-center"></i>
    </a>
</div>
    <script src="<?=base_url('assets/website/'); ?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/device.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/browser.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/jquery.placeholder.min.js"></script>
    <script id="googleMap" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/lightgallery/lightgallery-all.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/js/main.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/plugins/slick/slick.min.js"></script>
    <script src="<?=base_url('assets/website/'); ?>assets/plugins/slick/init.js"></script>
    <script src="demo/js/demo.js"></script>
</body>
</html>