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
          <h1 class="page-header text-overflow">Waste Collection Schedule</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li><a href="#"><i class="demo-pli-home"></i></a></li>
          <li><a href="#">Pages</a></li>
          <li class="active">Waste Collection Schedule</li>
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
                <h4 class="panel-title">Waste Collection Schedule</h4>
                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#add" ><i class="demo-pli-add"></i> Add Entry</button>
              </div>
              <div class="excel_upload">
                                <form method="post" id="import_form" enctype="multipart/form-data">
                                    <label for="excelfile" class="btn btn-default">Select Excel File</label>
                                    <input type="file" name="excelfile" id="excelfile" required accept=".xls, .xlsx" style="display:none"; />
                                    <input type="submit" name="import" value="Import" class="btn btn-info" />
                                </form>
                            </div>
              <div class="panel panel-body text-center">
                <table id="schedule_example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Date</th>
                      <th>Vehicle Number</th>
                      <th>Location</th>
                      <th class="min-tablet">In Time</th>
                      <th class="min-tablet">out Time</th>
                      <th class="min-desktop">Driver Name</th>
                      <th class="min-desktop">Vehicle Company Name</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($waste_schedule)){
                            $i = 1;
                            foreach($waste_schedule as $value){  
                    ?>
                    <tr id="rowId_<?=$value['schedule_id'];?>">
                      <td><?=$i;?></td>
                      <td><?=$value['create_date'];?></td>
                      <td><?=strtoupper(VehicalNumber($value['vehical_number']));?></td>
                      <td><?=$value['location'];?></td>
                      <td><?=$value['time_in'];?></td>
                      <td><?=$value['time_out'];?></td>
                      <td><?=$value['driver_name'];?></td>
                      <td><?=$value['company_name'];?></td>
                      <td><button data-target="#update" onclick="get_wasteScheduleinfo('<?=$value['schedule_id'];?>','update');" data-toggle="modal" class="btn btn-success">Update</button> </td>
                      <td><button class="btn btn-danger" onclick="delete_info('<?=$value['schedule_id'];?>');"><i class="fa fa-close"></i> Delete</button></td>
                    </tr>
                    <?php $i++; }} else { ?>
                    <tr>
                      <td colspan="10">No Records Found! </td>
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
          <form action="<?=base_url('admin/save_waste_schedule');?>" method="post" >
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="create_date" class="form-control" id="create_date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="driver_name">Driver Name</label>
                  <input type="text" name="driver_name" class="form-control" id="driver_name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_number">Vehicle Number</label>
                  <select name="vehical_number" class="form-control" id="vehical_number" onclick="get_vehicalinfo(this.value,'list');">
                      <?php echo getVehicalOption();?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_company_name">Vehicle Company Name</label>
                  <input type="text" name="company_name" class="form-control" id="company_name" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Weight">Location</label>
                  <input type="text" name="location" class="form-control" id="location">
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="time_in">Time-in</label>
                  <input type="time" name="time_in" class="form-control" id="time_in">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="time_out">Time-out</label>
                  <input type="time" name="time_out" class="form-control" id="time_out">
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
          <form action="<?=base_url('admin/update_waste_schedule');?>" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="edit_create_date" class="form-control" id="edit_create_date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="driver_name">Driver Name</label>
                  <input type="text" name="edit_driver_name" class="form-control" id="edit_driver_name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_number">Vehicle Number</label>
                  <select name="edit_vehical_number" class="form-control" id="edit_vehical_number" onclick="get_vehicalinfo(this.value,'list');">
                      <?php echo getVehicalOption();?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_company_name">Vehicle Company Name</label>
                  <input type="text" name="edit_company_name" class="form-control" id="edit_company_name" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Weight">Location</label>
                  <input type="text" name="edit_location" class="form-control" id="edit_location">
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="time_in">Time-in</label>
                  <input type="time" name="edit_time_in" class="form-control" id="edit_time_in">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="time_out">Time-out</label>
                  <input type="time" name="edit_time_out" class="form-control" id="edit_time_out">
                </div>
              </div>
            </div>
            <input type="hidden" name="edit_schedule_id" id="edit_schedule_id">
            <input type="submit" name="submit" class="btn btn-success ">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- FOOTER -->
    <script>
      var delete_info = function(schedule_id) {
          var result = confirm("Want to delete?");
          if (result) {
              var url = '<?=base_url(); ?>admin/Home/delete_scheduleInfo';
              $.ajax({
                  type: "POST",
                  url: url,
                  data: {schedule_id: schedule_id},
              })
              .done(function(result){
                  var res = JSON.parse(result);
                  if(res.status == 1 ) {
                      $('#rowId_'+schedule_id).hide();
                  }
                  alert(res.message);
              }); 
          }
      };
    </script>
    <?php $this->load->view('admin/common_page/footer'); ?>
    <script>
      $('#import_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
          url:"<?=base_url(); ?>admin/Import_ctrl/scheduleInfo_import",
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