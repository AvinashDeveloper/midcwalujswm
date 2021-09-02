/**
 * createIT main javascript file.
 */


// Helper Functions // -----
function validatedata($attr, $defaultValue) {
    "use strict";
    if ($attr !== undefined) {
        return $attr
    }
    return $defaultValue;
}
function parseBoolean(str, $defaultValue) {
    "use strict";
    if (str == 'true') {
        return true;
    } else if (str == "false") {
        return false;
    }
    return $defaultValue;
}

var $devicewidth = window.innerWidth > 0 ? window.innerWidth : screen.width,
    $deviceheight = (window.innerHeight > 0) ? window.innerHeight : screen.height,
    $device_width = $devicewidth,
    $device_height = $deviceheight,
    $bodyel = jQuery("body"),
    $navbarel = jQuery(".navbar"),
    $el_html = $('html');


(function ($) {
    "use strict";

    var clickEvent = "touchstart";

    if($el_html.hasClass("desktop")) {
        clickEvent += " click";
    }


    $(document).ready(function () {

        var dtarget = $('[data-target]');

        dtarget.each(function(){
            var that = $(this),
                target = that.attr("data-target");

            if (target) {

                var $target = $("#"+target);

                if($target.length) {

                    var firstOption = $("<option disabled selected>Select model...</option>");

                    that.change(function(){

                        var value = that.val();

                        value = value.toLowerCase();

                        if(value) {
                            $target.html("");

                            $target.append(firstOption);
                            $target.prop('disabled', false);

                            var jsonUrl = "assets/JSON/carModels.json";

                            $.ajax({
                                "url": jsonUrl,
                                data: {
                                    
                                },
                                "success": function success(result) {


                                    if (result.success) {                                       

                                        var res = result.results;

                                        for (var i = 0, len = res.length; i < len; ++i) {

                                            if (res[i].model.toLowerCase() === value) {

                                                var submodels = res[i].submodel;

                                                for (var j = 0, len = submodels.length; j < len; ++j){
                                                    var option = $("<option></option>");

                                                    option.attr("value", submodels[j]).text(submodels[j]);
                                                    $target.append(option);
                                                }

                                                break;
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    });
                }
            }

        });


        //datapicker


        var datapicker = $('.datepicker');

        if(datapicker.length) {
            datapicker.datepicker({
                format: 'mm/dd/yyyy'
            });
        }

        /* Timepicker */

        var timepickerElements = $(".ct-timepicker");

        if (timepickerElements.length) timepickerElements.clockpicker({
            "placement": "top",
            "align": "left",
            "autoclose": true,
            "default": "now",
            "vibrate": true,
            "twelvehour": false
        });


        var cuppons = $(".ct-pricingBox");

        cuppons.each(function(){
            var that = $(this),
                button = that.find(".btn-accent");


            button.on(clickEvent, function (e) {
                var mywindow = window.open('', '', 'left=0, top=0, height=600,width=800');
                mywindow.document.write('<html><head><title>Coupon</title>');

                mywindow.document.write('<link rel="stylesheet" href="assets/css/style.css" type="text/css" />');
                mywindow.document.write('<style> .ct-pricingBox-btn {display:none;}</style>');
                mywindow.document.write('</head><body >');
                mywindow.document.write(that.html());
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10

                setTimeout(function() {
					newWindow.print();
					newWindow.close();
				}, 250);

                return true;
            })

        });

        $(document).on(clickEvent, function(event) {

            // Close Admin Panel
            if (!$(event.target).closest('.ct-menuMobile').length && (!$(event.target).closest('.navbar-toggle').length)) {
                $bodyel.removeClass("is-mobile-open");
            }
        });


        $('.navbar-toggle').on(clickEvent, function(e){
            e.preventDefault();
            $bodyel.addClass("is-mobile-open");
        })



//search screen//---------------------------------------------------------

        $(".navbar-search").on(clickEvent, function (e) {
            e.preventDefault();
           $('body').addClass('is-search-screen-open');
        });

        $(".btn-mobileSearch").on(clickEvent, function (e) {
            e.preventDefault();
            $('body').removeClass('is-search-screen-open');
        });

//data attributes//---------------------------------------------------------

        if ($.browser.mozilla) {
            $el_html.addClass('browser-mozilla');
        }
        if ($.browser.msie) {
            $el_html.addClass('browser-msie');
        }
        if ($.browser.webkit) {
            $el_html.addClass('browser-webkit');
        }

        if ($('[data-color]').length > 0) {
            $('[data-color]').each(function () {
                var $this;
                $this = $(this);
                return $this.css('color', $this.attr('data-color'));
            });
        }
        if ($('[data-font-size]').length > 0) {
            $('[data-font-size]').each(function () {
                var $this;
                $this = $(this);
                return $this.css('font-size', $this.attr('data-font-size') + 'px');
            });
        }
        if ($('[data-background]').length > 0) {
            $('[data-background]').each(function () {
                var $background, $backgroundmobile, $this;
                $this = $(this);
                $background = $(this).attr('data-background');
                $backgroundmobile = $(this).attr('data-background-mobile');
                if ($this.attr('data-background').substr(0, 1) === '#') {
                    return $this.css('background-color', $background);
                } else if ($this.attr('data-background-mobile') && device.mobile()) {
                    return $this.css('background-image', 'url(' + $backgroundmobile + ')');
                } else {
                    return $this.css('background-image', 'url(' + $background + ')');
                }
            });
        }
        if ($('[data-height]').length > 0) {
            $('[data-height]').each(function () {
                var $height, $this;
                $this = $(this);
                $height = $this.attr('data-height');
                if ($height.indexOf('%') > -1) {
                    return $this.css('min-height', $device_height * parseInt($height, 10) / 100);
                } else {
                    return $this.css('min-height', parseInt($height, 10) + 'px');
                }
            });
        }


        // Mobile Menu // -----------------------------------------
       var $mobileEl = $('.ct-menuMobile .ct-menuMobile-navbar .dropdown > a');

        $mobileEl.on(clickEvent,function () {
            return false;
        }); // iOS SUCKS
        $mobileEl.on(clickEvent, function () {
            var $this = $(this);
            // Remove Class Open
            if ($this.parent().hasClass('open')) {
                $(this).parent().removeClass('open');
            } else {
                $('.ct-menuMobile .ct-menuMobile-navbar .dropdown.open').toggleClass('open');
                $(this).parent().addClass('open');
            } // Add Class Open
        });

        $('.ct-js-slick').attr('data-snap-ignore', 'true'); // Ignore Slick



        var lightGalleryElement = $('.ct-js-lightGallery');

        if(lightGalleryElement.length){
            lightGalleryElement.lightGallery({
                thumbnail:true
            });
        }

        // Google map // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        var mapSelector = $(".ct-js-googleMap");

        if(mapSelector.length) {
            var marker_address = mapSelector.attr("data-address");
            var map, bounds, marker, mapStyle, marker_icon;
            mapStyle = [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{"color": "#444444"}]
            }, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#f2f2f2"}]}, {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{"visibility": "off"}]
            }, {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{"saturation": -100}, {"lightness": 45}]
            }, {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{"visibility": "simplified"}]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{"visibility": "off"}]
            }, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{"color": "#425a68"}, {"visibility": "on"}]
            }]

            var draggable = false;

            if($device_width > 1200) {
                draggable = true;
            }

            map = new google.maps.Map(mapSelector[0], {
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP, //MapTypeId.ROADMAP, MapTypeId.SATELLITE, MapTypeId.HYBRID, MapTypeId.TERRAIN
                styles: mapStyle,
                scrollwheel: false,
                draggable: draggable,
                zoom: 16
            });
            bounds = new google.maps.LatLngBounds();
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': marker_address}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    var image = 'assets/images/demo-content/marker_icon.png';
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
                        map: map,
                        icon: image
                    });

                    bounds.extend(marker.position);
                    map.setCenter(results[0].geometry.location);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }



        // Tooltips and Popovers // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $("[data-toggle='tooltip']").tooltip();

        $("[data-toggle='popover']").popover({trigger: "hover", html: true});


        // Link Scroll to Section // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        function goToByScroll(id) {
            $('html,body').animate({scrollTop: $(id).offset().top - 70}, 'slow');
        }

        $('body .ct-js-btnScroll').on(clickEvent, function () {
            goToByScroll($(this).attr('href'));
            return false;
        });



        $('.ct-js-btnScrollUp').on(clickEvent, function (e) {
            e.preventDefault();
            $("body,html").animate({scrollTop: 0}, 700, "swing");
            $navbarel.find('.onepage').removeClass('active');
            $navbarel.find('.onepage:first-child').addClass('active');
            return false;
        });



        // Placeholder Fallback // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        if ($().placeholder) {
            $("input[placeholder],textarea[placeholder]").placeholder();
        }
 

        $(window).on("scroll", function(){

            var scroll        = $(window).scrollTop(),
                $toTopArrow = $('.ct-js-btnScrollUp');

            if (scroll > 150) {
                $bodyel.addClass('navbar-fixed');
            } else {
                $bodyel.removeClass('navbar-fixed');
            }


            if (scroll > 300) {
                $toTopArrow.addClass('is-active');
            } else {
                $toTopArrow.removeClass('is-active');
            }

        });

    });

    $(window).on('load', function() {


        /* Isotope */

        var isotope_gallery = function() {
            var isotope_filter, isotope_load;
            if ($().isotope) {
                isotope_gallery = $('.ct-isotope-gallery');
                isotope_filter = $('.ct-isotope-filtering button');
                isotope_load = $('#load-more');
                isotope_gallery.isotope({
                    itemSelector: '.ct-isotope-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
                isotope_filter.on(clickEvent, function() {
                    var filter_value, that;
                    that = $(this);
                    isotope_filter.removeClass('is-active');
                    that.addClass('is-active');
                    filter_value = that.attr('data-filter');
                    return isotope_gallery.isotope({
                        filter: filter_value
                    });
                });
                return isotope_load.on(clickEvent, function() {
                    var load_name, load_page, response, that;
                    that = $(this);
                    load_name = that.attr('data-load-name');
                    load_page = parseInt(that.attr('data-load-page'), 10);
                    response = '';
                    $.ajax({
                        type: 'GET',
                        url: load_name + load_page + '.html',
                        async: false,
                        success: function(value) {
                            response = value;
                            return isotope_gallery.isotope('insert', $(response));
                        },
                        complete: function() {
                            return $.ajax({
                                type: 'GET',
                                url: load_name + (load_page + 1) + '.html',
                                async: false,
                                error: function() {
                                    return that.parent().remove();
                                }
                            });
                        }
                    });
                    return that.attr('data-load-page', load_page + 1);
                });
            }
        };

        isotope_gallery();
    });



    $(window).on('load resize', function () {

        $devicewidth = window.innerWidth > 0 ? window.innerWidth : screen.width;

        $(".btn-search").on(clickEvent, function (e) {

            if($devicewidth < 1200) {
                e.preventDefault();
                $('body').addClass('is-search-screen-open');

                $("#search_mobile").focus();
            }
        });

        $("#ct-js-menu-button").on(clickEvent, function (e) {

            if($devicewidth < 1200) {
                e.preventDefault();
                $('body').addClass('is-search-screen-open');

                $("#search_mobile").focus();
            }
        });


        var offset, parent, child;
        parent = $('.ct-parent');
        child = $('.ct-child');

        if ($devicewidth > 1200) {
            offset = parent.offset();

            if ($bodyel.hasClass("boxed")) {
                offset += $("#ct-js-wrapper").css("margin-right");
            }


            return child.css({
                width: $(window).width() - offset.left
            });
        } else {
            return child.css({
                width: "100%"
            });
        }

    });

})(jQuery);


