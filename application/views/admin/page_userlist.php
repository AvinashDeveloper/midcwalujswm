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
                    <h1 class="page-header text-overflow">Users List</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Users List</li>
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
                                <h4 class="panel-title">Users List</h4>
                                <!-- <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#add" ><i class="demo-pli-add"></i> Add Entry</button> -->
                            </div>
                            <div class="excel_upload">
                                <form method="post" id="import_form" enctype="multipart/form-data">
                                    <label for="excelfile" class="btn btn-default">Select Excel File</label>
                                    <input type="file" name="excelfile" id="excelfile" required accept=".xls, .xlsx" style="display:none"; />
                                    <input type="submit" name="import" value="Import" class="btn btn-info" />
                                </form>
                            </div>
                            <div class="panel panel-body text-center" >
                                <table id="user_example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="printableTable">
                                        <?php if(!empty($user_info)){ 
                                            $i = 1;
                                                foreach($user_info as $value){    
                                        ?>
                                        <tr id="rowId_<?=$value['user_id'];?>">
                                            <td><?=$i;?></td>
                                            <td>
                                                <?php   if(!empty($value['user_profile_img'])){ ?>
                                                    <img src="<?=base_url().user_profile_image_url.$value['user_profile_img']; ?>" class="img-responsive">
                                                <?php  } else { ?>
                                                    <img src="https://via.placeholder.com/100C/O https://placeholder.com/" class="img-responsive">
                                                <?php } ?>
                                            </td>
                                            <td><?=$value['user_firstname']; ?></td>
                                            <td><?=$value['user_email']; ?></td>
                                            <td><?=$value['user_mobile']; ?></td>
                                            <td><?=$value['user_name']; ?></td>
                                            <td><?=$value['user_password']; ?></td>
                                            <td>
                                                <?php if($value['user_status'] == 'Active'){?>
                                                    <button class="btn btn-danger" onclick="status_change('Inactive','<?=$value['user_id'];?>');"><i class="fa fa-close"></i> Unverify</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-success" onclick="status_change('Active','<?=$value['user_id'];?>');"><i class="fa fa-close"></i> Verify</button>
                                                <?php } ?>
                                            </td>
                                            <td><button data-target="#update" onclick="get_userinfo('<?=$value['user_id']; ?>');" data-toggle="modal" class="btn btn-success">Update</button> </td>
                                            <td><button class="btn btn-danger" onclick="delete_info('<?=$value['user_id'];?>');"><i class="fa fa-close"></i> Delete</button></td>
                                        </tr>
                                        <?php $i++; }}else {?>
                                            <tr>
                                                <td colspan="9"><?php echo "No records found! "; ?></td>
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
                    <div class="row">
                        <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
                        <div class="col-12 alert alert-success" id="success" role="alert"></div>
                    </div>
                    <form action="<?=base_url('admin/save_users');?>" method="post" enctype="multipart/form-data" id="add_user_infos">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fileupload">Image File</label>
                                    <input type="file" name="user_profile" id="user_profile" class="form-control" id="fileupload">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" name="user_fullname" id=user_fullname class="form-control" id="Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail">E-mail</label>
                                    <input type="email" name="user_email" id="user_email" class="form-control" id="mail">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="text" name="user_mobile" id="user_mobile" class="form-control" id="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="UserName">UserName</label>
                                    <input type="text" name="user_name" id="user_name" class="form-control" id="UserName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" name="user_password" id="user_password" class="form-control" id="Password">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-success ">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="update" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Record</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
                        <div class="col-12 alert alert-success" id="success" role="alert"></div>
                    </div>
                    <form action="<?=base_url('admin/update_users');?>" method="post" id="update_user_infos" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fileupload">Image File</label>
                                    <input type="file" name="edit_user_profile" class="form-control" id="edit_user_profile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" name="edit_user_fullname" class="form-control" id="edit_user_fullname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail">E-mail</label>
                                    <input type="email" name="edit_user_email" class="form-control" id="edit_user_email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input type="text" name="edit_user_mobile" class="form-control" id="edit_user_mobile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="UserName">UserName</label>
                                    <input type="text" name="edit_user_name" class="form-control" id="edit_user_name" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="Password" name="edit_user_password" class="form-control" id="edit_user_password">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="edit_profile_name" id="edit_profile_name">
                        <input type="hidden" name="edit_user_id" id="edit_user_id">
                        <input type="submit" name="submit" class="btn btn-success ">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- FOOTER -->
    <script>
        var delete_info = function(user_id) {
            var result = confirm("Want to delete?");
            if (result) {
                var url = '<?=base_url(); ?>admin/Home/delete_userInfo';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {user_id: user_id},
                })
                .done(function(result){
                    var res = JSON.parse(result);
                    if(res.status == 1 ) {
                        $('#rowId_'+user_id).hide();
                    }
                    alert(res.message);
                }); 
            }
        };

        var status_change = function(status,user_id) {
            var result = confirm('Do you want to change status?');
            if(result) {
                var url = '<?=base_url();?>admin/Home/changeUserStatus';
                $.ajax({
                    type : "POST",
                    url : url,
                    data : {status : status,user_id:user_id},
                }).done(function(result){
                    var res = JSON.parse(result);
                    if(res.status == 1 ) {
                        // $('#rowId_'+user_id).hide();
                        location.reload();
                    }
                    alert(res.message);
                });
            }
        }
    </script>
    <?php $this->load->view('admin/common_page/footer'); ?>
    <script>
        $('#import_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"<?=base_url(); ?>admin/Import_ctrl/user_import",
				method:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data){
					$('#excelfile').val('');
					alert("Successfully Inserted Information.");
					location.reload(true);
				}
			})
		});
    </script>
<!-- END FOOTER -->