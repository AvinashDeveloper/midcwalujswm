    <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">
            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>
            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>
            <p class="pad-lft">&#0169; 2018 Your Company</p>
        </footer>
        <!--===================================================-->
    <!-- END FOOTER -->
        <!-- SCROLL PAGE BUTTON -->
            <!--===================================================-->
            <button class="scroll-top btn">
                <i class="pci-chevron chevron-up"></i>
            </button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="<?=base_url(); ?>assets/admin/js/jquery.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="<?=base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
        <!--NiftyJS [ RECOMMENDED ]-->
        <script src="<?=base_url(); ?>assets/admin/js/nifty.min.js"></script>
        <!--=================================================-->
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="<?=base_url(); ?>assets/admin/js/demo/nifty-demo.min.js"></script>
        <!--Flot Chart [ OPTIONAL ]-->
        <script src="<?=base_url(); ?>assets/admin/plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="<?=base_url(); ?>assets/admin/plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <script src="<?=base_url(); ?>assets/admin/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <!--Sparkline [ OPTIONAL ]-->
        <script src="<?=base_url(); ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!--Specify page [ SAMPLE ]-->
        <script src="<?=base_url(); ?>assets/admin/js/demo/dashboard.js"></script>
        <script src="<?=base_url(); ?>assets/admin/plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?=base_url(); ?>assets/admin/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="<?=base_url(); ?>assets/admin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
   

        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                var url = window.location;

                $('#mainnav-menu a[href="'+ url +'"]').parent().addClass('active-sub');
                $('#mainnav-menu a').filter(function() {
                    return this.href == url;
                }).parent().addClass('active-sub');
            });


            $(document).ready(function() {
                $('#user_example').DataTable( {
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0,2,3,4,5,6,7],
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0,2,3,4,5,6,7],
                            }
                        }
                    ],
                });
                $('#admin_example').DataTable( {
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0,2,3,4,5,6,7],
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0,2,3,4,5,6,7],
                            }
                        }
                    ],
                });
                $('#vehical_example').DataTable( {
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10,11,12],
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10,11,12],
                            }
                        }
                    ],
                });
                $('#collection_example').DataTable( {
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10,11],
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8,9,10,11],
                            }
                        }
                    ],
                });
                $('#schedule_example').DataTable( {
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7],
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7],
                            }
                        }
                    ],
                });
            });
        </script>
        <script>
            setTimeout(function() {
                $('#msg_div').hide('fast');
            }, 4000);
        </script>
        <script src="<?=base_url();?>assets/admin/jquery.validate.min.js"></script>
        <script src="<?=base_url();?>assets/admin/function_script.js" ></script>
</body>
</html>