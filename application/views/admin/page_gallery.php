<!--NAVBAR-->
    <?php $this->load->view('admin/common_page/header');?>
<!--END NAVBAR-->

    <div class="boxed">
        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Gallery Images List</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Gallery Images List</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <div id="msg_div">
                <?php $this->load->view('admin/common_page/session_msg'); ?>
            </div>
            <!--===================================================-->
            <div id="page-content">
                <hr class="new-section-sm bord-no">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading flex_justify_between">
                                <h4 class="panel-title">Gallery Images List</h4>
                                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#add" ><i class="demo-pli-add"></i> Add Entry</button>
                            </div>
                            <div class="panel panel-body text-center">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($image_info)){ 
                                                $i = 1;
                                                foreach($image_info as $value){    
                                        ?>
                                        <tr id="rowId_<?=$value['image_id'];?>">
                                            <td><?=$i;?></td>
                                            <td><?php if($value['image_name']){?>
                                                <img src="<?=base_url().gallery_image_url.$value['image_name'];?>" class="img-responsive">
                                                <?php } else { ?>
                                                <img src="https://via.placeholder.com/100C/O https://placeholder.com/" class="img-responsive">
                                                <?php }?>
                                            </td>
                                            <td><?=$value['image_originalname'];?></td>
                                            <td><button class="btn btn-danger" onclick="delete_info('<?=$value['image_id'];?>');"><i class="fa fa-close"></i> Delete</button></td>
                                        </tr>
                                        <?php $i++; }} else { ?>
                                        <tr>
                                            <td colspan="4"><?php echo "No records found! "; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

<!-- Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Record</h4>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('admin/save_gallery');?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fileupload">Image File</label>
                                    <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" id="fileupload" multiple>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_title">Image Title</label>
                                    <input type="text" name="image_title" class="form-control" id="image_title">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success ">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- FOOTER -->
    <script>
        var delete_info = function(image_id) {
            var result = confirm("Want to delete?");
            if (result) {
                var url = '<?=base_url(); ?>admin/Home/delete_galleryInfo';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {image_id: image_id},
                })
                .done(function(result){
                    var res = JSON.parse(result);
                    if(res.status == 1 ) {
                        $('#rowId_'+image_id).hide();
                    }
                    alert(res.message);
                }); 
            }
        };
    </script>
    <?php $this->load->view('admin/common_page/footer'); ?>
<!-- END FOOTER -->