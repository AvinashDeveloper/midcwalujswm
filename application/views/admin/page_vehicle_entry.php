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
          <h1 class="page-header text-overflow">Vehicle Entry List</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li><a href="#"><i class="demo-pli-home"></i></a></li>
          <li><a href="#">Pages</a></li>
          <li class="active">Vehicle Entry List</li>
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
                <h4 class="panel-title">Vehicle Entry / Exit List</h4>
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
                <table id="vehical_example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Sr.no</th>
                      <th>Date</th>
                      <th>Ticket Number</th>
                      <th>Item Name</th>
                      <th>Vehicle Number</th>
                      <th>Weight Measurement By</th>
                      <th>Net Weight</th>
                      <th>Gross Weight</th>
                      <th>Tare Weight</th>
                      <th class="min-tablet">Entry Time</th>
                      <th class="min-tablet">Exit Time</th>
                      <th class="min-desktop">Supervisor Name</th>
                      <th class="min-desktop">Vehicle Company Name</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($vehical_info)){
                            $i = 1;
                            foreach($vehical_info as $value){
                    ?>
                    <tr id="rowId_<?=$value['vehical_id'];?>">
                      <td><?=$i;?></td>
                      <td><?=$value['vehical_create_dt'];?></td>
                      <td><?=$value['ticket_no'];?></td>
                      <td><?=$value['item_name'];?></td>
                      <td><?=$value['vehical_number'];?></td>
                      <td><?=$value['vehical_weight_measure'];?></td>
                      <td><?=$value['vehical_weight'];?></td>
                      <td><?=$value['gross_weight'];?></td>
                      <td><?=$value['tare_weight'];?></td>
                      <td><?=$value['vehical_entry_time'];?></td>
                      <td><?=$value['vehical_exist_time'];?></td>
                      <td><?=$value['supervisor_name'];?></td>
                      <td><?=$value['vehical_company_name'];?></td>
                      <td><button data-target="#update" data-toggle="modal" onclick="get_vehicalinfo('<?=$value['vehical_id'];?>','update');" class="btn btn-success">Update</button></td>
                      <td><button class="btn btn-danger" onclick="delete_info('<?=$value['vehical_id'];?>');"><i class="fa fa-close"></i> Delete</button></td>
                    </tr>
                    <?php $i++; }} else { ?>
                      <tr>
                          <td colspan="9">No Record Found! </td>
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
          <form action="<?=base_url('admin/save_vehical');?>" method="post" id="vehical_add">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="vehical_create_dt" class="form-control" id="vehical_create_dt">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_number">Ticket Number</label>
                  <input type="text" name="ticket_no" class="form-control" id="ticket_no">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Item Name</label>
                  <input type="text" name="item_name" class="form-control" id="item_name" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_number">Vehicle Number</label>
                  <input type="text" name="vehical_number" class="form-control" id="vehical_number">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Measure By</label>
                    <select class="form-control" name="vehical_weight_measure" id="vehical_weight_measure">
                      <?=weightMeasurOption();?>
                    </select>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Weight">Net Weight</label>
                  <div class="combine_f">
                    <input type="weight" name="vehical_weight" class="form-control" id="vehical_weight">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Gross weight</label>
                    <div class="combine_f">
                      <input type="weight" name="gross_weight" class="form-control" id="gross_weight">
                  </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Weight">Tare weight</label>
                  <div class="combine_f">
                    <input type="weight" name="tare_weight" class="form-control" id="tare_weight">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="entry_time">Entry Time</label>
                  <input type="time" name="vehical_entry_time" class="form-control" id="vehical_entry_time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exit_time">Exit Time</label>
                  <input type="time" name="vehical_exist_time" class="form-control" id="vehical_exist_time">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Supervisor_name">Supervisor Name</label>
                  <input type="text" name="supervisor_name" class="form-control" id="supervisor_name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_company_name">Vehicle Company Name</label>
                  <input type="text" name="vehical_company_name" class="form-control" id="vehical_company_name">
                </div>
              </div>
              <div class="col-md-6">
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
          <form action="<?=base_url('admin/update_vehical');?>" id="vehical_update" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="edit_vehical_create_dt" class="form-control" id="edit_vehical_create_dt" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_number">Ticket Number</label>
                  <input type="text" name="edit_ticket_no" class="form-control" id="edit_ticket_no">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="date">Item Name</label>
                  <input type="text" name="edit_item_name" class="form-control" id="edit_item_name" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_number">Vehicle Number</label>
                  <input type="text" name="edit_vehical_number" class="form-control" id="edit_vehical_number">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Measure By</label>
                    <select class="form-control" name="edit_vehical_weight_measure" id="edit_vehical_weight_measure">
                      <?=weightMeasurOption();?>
                    </select>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Weight">Net weight</label>
                  <div class="combine_f">
                    <input type="weight" name="edit_vehical_weight" class="form-control" id="edit_vehical_weight">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Gross weight</label>
                    <div class="combine_f">
                      <input type="weight" name="edit_gross_weight" class="form-control" id="edit_gross_weight">
                  </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Weight">Tare weight</label>
                  <div class="combine_f">
                    <input type="weight" name="edit_tare_weight" class="form-control" id="edit_tare_weight">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="entry_time">Entry Time</label>
                  <input type="time" name="edit_vehical_entry_time" class="form-control" id="edit_vehical_entry_time">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exit_time">Exit Time</label>
                  <input type="time" name="edit_vehical_exist_time" class="form-control" id="edit_vehical_exist_time">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Supervisor_name">Supervisor Name</label>
                  <input type="text" name="edit_supervisor_name" class="form-control" id="edit_supervisor_name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vehicle_company_name">Vehicle Company Name</label>
                  <input type="text" name="edit_vehical_company_name" class="form-control" id="edit_vehical_company_name">
                </div>
              </div>
            </div>
            <input type="hidden" name="edit_vehical_id" id="edit_vehical_id">
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
      var delete_info = function(vehical_id) {
          var result = confirm("Want to delete?");
          if (result) {
              var url = '<?=base_url(); ?>admin/Home/delete_vehicalInfo';
              $.ajax({
                  type: "POST",
                  url: url,
                  data: {vehical_id: vehical_id},
              })
              .done(function(result){
                  var res = JSON.parse(result);
                  if(res.status == 1 ) {
                      $('#rowId_'+vehical_id).hide();
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
          url:"<?=base_url(); ?>admin/Import_ctrl/vehicalInfo_import",
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

