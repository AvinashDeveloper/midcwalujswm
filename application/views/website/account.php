<?php $this->load->view('website/header'); ?>

<?php if(!empty($_GET)){

          $startdate = $_GET['startdate'];

          $enddata = $_GET['enddata'];

      } else {

          $startdate = '';

          $enddata = '';

      }

  ?>

          <style type="text/css">

            .image-container {

              position: relative;

            }

            .d-flex {

    display: flex;

    justify-content: space-between;

}

            .image {

              opacity: 1;

              display: block;

              width: 100%;

              height: auto;

              transition: .5s ease;

              backface-visibility: hidden;

            }



            .middle {

              transition: .5s ease;

              opacity: 0;

              position: absolute;

              top: 50%;

              left: 50%;

              transform: translate(-50%, -50%);

              -ms-transform: translate(-50%, -50%);

              text-align: center;

            }



            .image-container:hover .image {

              opacity: 0.3;

            }



            .image-container:hover .middle {

              opacity: 1;

            }

            .fb-profile img.fb-image-lg{

              z-index: 0;

              width: 100%;  

              margin-bottom: 10px;

            }



            .fb-image-profile

            {

              margin: -90px 10px 0px 50px;

              z-index: 9;

              width: 20%; 

            }



            @media (max-width:768px)

            {



              .fb-profile-text>h1{

                font-weight: 700;

                font-size:16px;

              }



              .fb-image-profile

              {

                margin: -45px 10px 0px 25px;

                z-index: 9;

                width: 20%; 

              }

            }

          </style>

          <div class="container">

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-body">

                    <div class="card-title mb-4">

                      <div class="d-flex justify-content-start">

                        <div class="fb-profile">

                          <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>

                          <?php $session = $this->session->userdata('web_login'); if(!empty($session)){ ?>

                          <img align="left" class="fb-image-profile thumbnail" src="<?=base_url().user_profile_image_url.$session[0]['user_profile_img'];?>" alt="Profile image example"/>

                          <div class="fb-profile-text">

                            <h1><?=$session[0]['user_firstname'];?></h1>

                            <p><?=$session[0]['user_email'];?></p>

                          <?php } ?>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">

                  <li class="nav-item">

                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Waste Processing Details</a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Total waste Processing Details</a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" id="complain-box" data-toggle="tab" href="#complainBox" role="tab" aria-controls="connectedServices" aria-selected="false">Complain Here</a>

                  </li>

                </ul>

                <div class="tab-content ml-1" id="myTabContent" style="padding-top:20px;">

                  

                  <div class="tab-pane active "  id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

                  <form id="filter">

                    <div class="d-flex">

                    <div>

                      <lebel>Start Date</lebel>

                      <input type="date" name="startdate" id="startdate" value="<?=$startdate;?>">

                  

                      <label>End Date</label>

                      <input type="date" name="enddata" id="enddata" value="<?=$enddata;?>">

                          </div>

                    <div>

                      <button class="btn btn-success" type="submit">Filter</button>

                      <button class="btn btn-success" onclick="resetform();">Reset</button>

                    </div>

                    </div>

                

                  </form>

                    <table class="table">

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

                    </tr>

                  </thead>

                  <tbody id="waste_tdbody">

                    <?php 

                          $waste_processing = GetWasteCollection($startdate,$enddata);

                          if($waste_processing){

                            $i = 1;

                            foreach($waste_processing as $value) {

                    ?>

                    <tr id="">

                      <td><?=$i;?></td>

                      <td><?=$value['processing_create_dt'];?></td>

                      <td><?=$value['measurement'];?></td>

                      <td><?=$value['wc'];?></td>

                      <td><?=$value['dc'];?></td>

                      <td><?=$value['gc'];?></td>

                      <td><?=$value['wp'];?></td>

                      <td><?=$value['dp'];?></td>

                      <td><?=$value['gp'];?></td>

                      <td><?=$value['dispose'];?></td>

                      <td><?=$value['total_waste_collection'];?></td>

                      <td><?=$value['landfill'];?></td>

                    </tr>

                    <?php $i++; }} else { ?>

                    <tr>

                      <td colspan="14"> No Record Found! </td>

                    </tr>

                    <?php } ?>

                  </tbody>

                    </table>

                  </div>

                  <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
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
                                                        <span class="sr-only">10% Complete</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                  </div>

                  <div class="tab-pane fade" id="complainBox" role="tabpanel" aria-labelledby="complain-box">

                      <form id="contactForm" action="<?=base_url('Complain-save');?>" method="POST" data-email-subject="My Rota" class="ct-js-validate ct-formAppointment">

                          <div class="form-header">

                              <h4 class="text-uppercase">Complain form</h4>

                          </div>

                          <div class="form-group">

                              <label for="full_name" class="col-sm-2 control-label short-label">Name <span>*</span></label>

                              <div class="col-sm-10">

                                  <input type="text" class="form-control ct-input" id="complainer_name" data-placeholder="Name" placeholder="" name="complainer_name" required="required" value="<?=$this->session->userdata('web_login')[0]['user_firstname'];?>">

                              </div>

                          </div>

                          <div class="form-group">

                              <label for="email" class="col-sm-2 control-label short-label">Email <span>*</span></label>

                              <div class="col-sm-10">

                                  <input type="email" class="form-control ct-input" id="complainer_email" data-placeholder="Email" placeholder="" name="complainer_email" required="required" value="<?=$this->session->userdata('web_login')[0]['user_email'];?>">

                              </div>

                          </div>

                          <div class="form-group">

                              <label for="phone_number" class="col-sm-2 control-label short-label">Phone number</label>

                              <div class="col-sm-10">

                                  <input type="text" class="form-control ct-input ct-input--short" data-placeholder="Phone number" id="complainer_mobile"

                                  placeholder="" name="complainer_mobile" value="<?=$this->session->userdata('web_login')[0]['user_mobile'];?>">

                              </div>

                          </div>

                          <div class="form-group">

                              <label for="desc" class="col-lg-2 col-md-2 col-sm-12 control-label short-label">Complain <span>*</span></label>

                              <div class="col-lg-10 col-md-10 col-sm-12">

                                  <textarea class="form-control ct-input ct-input--wide" id="complain_text" placeholder="" name="complain_text" required="required" data-placeholder="Message">

                                  </textarea>

                              </div>

                          </div>

                          <div class="btn-group ct-u-paddingBoth20">

                              <button type="submit" class="btn btn-accent">send complain</button>

                          </div>

                      </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

<?php $this->load->view('website/footer'); ?>

<script>

  var resetform = function(){

      $("#startdate").val();

      $("#enddata").val();

  }

</script>