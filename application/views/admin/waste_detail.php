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

          <h1 class="page-header text-overflow">Waste Processing detail </h1>

        </div>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <!--End page title-->

        <!--Breadcrumb-->

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <ol class="breadcrumb">

          <li><a href="#"><i class="demo-pli-home"></i></a></li>

          <li><a href="#">Pages</a></li>

          <li class="active">Waste Processing detail</li>

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

                <h4 class="panel-title">Waste Processing detail</h4>

                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#add" ><i class="demo-pli-add"></i> Add Entry</button>

              </div>

              <div class="excel_upload">

                                <form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url('admin/Import_ctrl/collectionInfo_import')?>">

                                    <label for="excelfile" class="btn btn-default">Select Excel File</label>

                                    <input type="file" name="excelfile" id="excelfile" required accept=".xls, .xlsx" style="display:none"; />

                                    <input type="submit" name="import" value="Import" class="btn btn-info" />

                                </form>

                            </div>

              <div class="panel panel-body text-center">

                <div class="table table-bordered table-hover">

                  <table id="collection_example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>

                      <tr>

                        <th>Sr.no</th>

                        <th>Date</th>

                        <th>Measure By</th>

                        <th>Total Wet Waste collection</th>

                        <th>Total Dry Waste collection</th>

                        <th>Total Garden Waste Collection</th>

                        <th>Total Wet Waste Processing</th>

                        <th>Total Dry Waste Processing</th>

                        <th>Total Garden Waste Processing</th>

                        <th>Non Processable Dry waste Dispose</th>

                        <th>Total waste collection in a day</th>

                        <th>Rejects Send to Landfill Sites</th>

                        <!-- <th>View</th>                                    -->

                        <th>Update</th>

                        <th>Delete</th>

                      </tr>

                    </thead>

                    <tbody>

                      <?php if($waste_processing){

                              $i = 1;

                              foreach($waste_processing as $value) {

                      ?>

                      <tr id="rowId_<?=$value['processing_id'];?>">

                        <td><?=$i;?></td>

                        <td><?=$value['processing_create_dt'];?></td>

                        <td><?=$value['measurement'];?></td>

                        <td><?=$value['total_wet_waste_collection'];?></td>

                        <td><?=$value['total_dry_waste_collection'];?></td>

                        <td><?=$value['total_garden_waste_collection'];?></td>

                        <td><?=$value['total_wet_waste_processing'];?></td>

                        <td><?=$value['total_dry_waste_processing'];?></td>

                        <td><?=$value['total_garden_waste_processing'];?></td>

                        <td><?=$value['non_processable_dry_waste_dispose'];?></td>

                        <td><?=$value['total_waste_collection'];?></td>

                        <td><?=$value['rejects_send_landfill_sites'];?></td>

                        <!-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view" onclick="get_wasteProcessinginfo('<?=$value['processing_id'];?>','update');" ><i class="demo-pli-eye"></i> View Report</button></td> -->

                        <td><button data-target="#update" onclick="get_wasteProcessinginfo('<?=$value['processing_id'];?>','update');" data-toggle="modal" class="btn btn-success">Update</a> </td>

                        <td><button class="btn btn-danger" onclick="delete_info('<?=$value['processing_id'];?>');"><i class="fa fa-close"></i> Delete</button></td>

                      </tr>

                      <?php $i++; }} else { ?>

                      <tr>

                        <td colspan="14"> No Record Found! </td>

                      </tr>

                      <?php } ?>

                    </tbody>

                  </table>

                </div>

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

    <?php $this->load->view('admin/common_page/navigation'); ?>

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

          <form action="<?=base_url('admin/save_waste_detail');?>" method="post">

            <div class="form-group ">

              <label for="date">Date</label>

              <input type="date" name="processing_create_dt" class="form-control" id="processing_create_dt">

            </div>

            <div>

              <label for="">Measure By</label>

              <select class="form-control" name="measurement" id="measurement">

                <?=weightMeasurOption();?>

              </select>

            </div>

            <div class="form-group flex_justify_between">

              <label>Total Wet Waste collection</label>

              <div class="combine_f">

                <input type="weight" name="total_wet_waste_collection" class="form-control" id="total_wet_waste_collection">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Dry Waste collection</label>

              <div class="combine_f">

                <input type="weight" name="total_dry_waste_collection" class="form-control" id="total_dry_waste_collection">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Garden Waste Collection</label>

              <div class="combine_f">

                <input type="weight" name="total_garden_waste_collection" class="form-control" id="total_garden_waste_collection">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Wet Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="total_wet_waste_processing" class="form-control" id="total_wet_waste_processing">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div>

            <div class="form-group flex_justify_between">

              <label>Total Dry Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="total_dry_waste_processing" class="form-control" id="total_dry_waste_processing">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Garden Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="total_garden_waste_processing" class="form-control" id="total_garden_waste_processing">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Non Processable Dry waste Dispose</label>

              <div class="combine_f">

                <input type="weight" name="non_processable_dry_waste_dispose" class="form-control" id="non_processable_dry_waste_dispose">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <!-- <div class="form-group flex_justify_between">

              <label>Rejects Send to Landfill Sites</label>

              <strong id="reject_landfill">000</strong>

            </div> -->

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

          <form action="<?=base_url('admin/update_waste_detail');?>" method="post" >

            <div class="form-group ">

              <label for="date">Date</label>

              <input type="date" name="edit_processing_create_dt" class="form-control" id="edit_processing_create_dt">

            </div>

            <div>

              <label for="">Measure By</label>

              <select class="form-control" name="edit_measurement" id="edit_measurement">

                <?=weightMeasurOption();?>

              </select>

            </div>

            <div class="form-group flex_justify_between">

              <label>Total Wet Waste collection</label>

              <div class="combine_f">

                <input type="weight" name="edit_total_wet_waste_collection" class="form-control" id="edit_total_wet_waste_collection">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Dry Waste collection</label>

              <div class="combine_f">

                <input type="weight" name="edit_total_dry_waste_collection" class="form-control" id="edit_total_dry_waste_collection">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Garden Waste Collection</label>

              <div class="combine_f">

                <input type="weight" name="edit_total_garden_waste_collection" class="form-control" id="edit_total_garden_waste_collection">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Wet Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="edit_total_wet_waste_processing" class="form-control" id="edit_total_wet_waste_processing">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Dry Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="edit_total_dry_waste_processing" class="form-control" id="edit_total_dry_waste_processing">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div>

            <div class="form-group flex_justify_between">

              <label>Total Garden Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="edit_total_garden_waste_processing" class="form-control" id="edit_total_garden_waste_processing">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Non Processable Dry waste Dispose</label>

              <div class="combine_f">

                <input type="weight" name="edit_non_processable_dry_waste_dispose" class="form-control" id="edit_non_processable_dry_waste_dispose">

                <!-- <select class="form-control">

                  <?=weightMeasurOption();?>

                </select> -->

              </div>

            </div> 

            <!-- <div class="form-group flex_justify_between">

              <label>Rejects Send to Landfill Sites</label>

              <strong>12300</strong>

            </div>  -->

            <input type="hidden" name="edit_processing_id" id="edit_processing_id">

            <input type="submit" name="submit" class="btn btn-success ">

          </form>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

      </div>

    </div>

  </div>



  <div id="view" class="modal fade" role="dialog">

    <div class="modal-dialog">

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">View Report</h4>

        </div>

        <div class="modal-body">

          <form action="#">

            <div class="form-group ">

              <label for="date">Date</label>

              <input type="date" name="date" class="form-control" id="date">

            </div>

            <div class="form-group flex_justify_between">

              <label>Total Wet Waste collection</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Dry Waste collection</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Garden Waste Collection</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Wet Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Dry Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Total Garden Waste Processing</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Non Processable Dry waste Dispose</label>

              <div class="combine_f">

                <input type="weight" name="date" class="form-control" id="Weight">

                <select class="form-control">

                  <?=weightMeasurOption();?>

                </select>

              </div>

            </div> 

            <div class="form-group flex_justify_between">

              <label>Rejects Send to Landfill Sites</label>

              <strong>12300</strong>

            </div> 

            <input type="submit" name="submit" class="btn btn-success ">

          </form>

        </div>

      </div>

    </div>

  </div>

<!-- FOOTER -->

    <script>

      var delete_info = function(processing_id) {

          var result = confirm("Want to delete?");

          if (result) {

              var url = '<?=base_url(); ?>admin/Home/delete_processingInfo';

              $.ajax({

                  type: "POST",

                  url: url,

                  data: {processing_id: processing_id},

              })

              .done(function(result){

                  var res = JSON.parse(result);

                  if(res.status == 1 ) {

                      $('#rowId_'+processing_id).hide();

                  }

                  alert(res.message);

              }); 

          }

      };

    </script>

    <?php $this->load->view('admin/common_page/footer'); ?>

    <script>

     /* $('#import_form').on('submit', function(event){

        event.preventDefault();

        $.ajax({

          url:"<?=base_url(); ?>admin/Import_ctrl/collectionInfo_import",

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

      });*/
      
      $(document).on('submit', '#import_form', function(e){
       alert()
        var formURL = $(this).attr("action");
        var postData = $(this).serializeArray();
        $.ajax({
            url : formURL,
            type: "POST",
            data : postData,
            dataType:'json',
            cache: false,
            success:function(data)
            {
                if (data.msg)
                {
                    alert(data.msg);                  
                }

                if (data.response == 1)
                    window.location.href = data.url;
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                
            }
        });
        e.preventDefault();
        //e.unbind();
    });

    </script>

<!-- END FOOTER -->