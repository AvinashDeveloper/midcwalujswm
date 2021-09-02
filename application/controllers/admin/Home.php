<?php

    defined('BASEPATH') OR exit('No direct script access allowed');



    class Home extends CI_Controller {



        public function __construct(){

            parent::__construct();

            if(!$this->session->userdata('Login')){

                redirect('admin');

            }

        }



        public function dashboard()
        {
            $this->db->select_sum('total_wet_waste_collection');
            $data['totalwet_waste'] = $this->db->get('waste_processing')->row();  

            $this->db->select_sum('total_dry_waste_collection');
            $data['totaldry_waste'] = $this->db->get('waste_processing')->row(); 

            $this->db->select_sum('total_garden_waste_collection');
            $data['totalgarden_waste'] = $this->db->get('waste_processing')->row();
            
            $this->db->select_sum('total_wet_waste_processing');
            $data['totalwet_process'] = $this->db->get('waste_processing')->row();  

            $this->db->select_sum('total_dry_waste_processing');
            $data['totaldry_process'] = $this->db->get('waste_processing')->row(); 

            $this->db->select_sum('total_garden_waste_processing');
            $data['totalgarden_process'] = $this->db->get('waste_processing')->row();

            $this->load->view('admin/dashboard',$data);

        }



        public function gallery(){

            $image_info = $this->admin->getGalleryImagesInfo();

            $this->load->view('admin/page_gallery',['image_info' => $image_info]);

        }



        public function save_galleryInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $dataArr = array(

                    'image_title' => $post['image_title']

                );

                $count = count($_FILES['gallery_images']['name']);

                for($i=0; $i < $count; $i++){

                    if(!empty($_FILES['gallery_images']['name'][$i])){

                        $ext = pathinfo($_FILES['gallery_images']['name'][$i], PATHINFO_EXTENSION);

                        $card_type = "image";

                        $image_name = str_replace('.'.$ext, '', preg_replace('/[\ _]/','-', $_FILES['gallery_images']['name'][$i])).'_'.time().'.' . $ext;

                        

                        $_FILES['file']['name']     = $image_name;

                        $_FILES['file']['type']     = $_FILES['gallery_images']['type'][$i];

                        $_FILES['file']['tmp_name'] = $_FILES['gallery_images']['tmp_name'][$i];

                        $_FILES['file']['error']     = $_FILES['gallery_images']['error'][$i];

                        $_FILES['file']['size']     = $_FILES['gallery_images']['size'][$i];

                        

                        $config['upload_path'] = "./".gallery_image_url;

                        $config['allowed_types'] = 'gif|jpg|png|jpeg';

                        $config['file_name'] = $image_name;

                        $config['overwrite'] = TRUE;

                        $config['max_size'] = '2048000';

                        

                        $this->load->library('upload', $config);

                        $this->upload->initialize($config);

                        

                        if(!$this->upload->do_upload('file')){

                            $this->session->set_flashdata('error', "Somthing error comes in uploading");

                        } else {

                            $fileData = $this->upload->data();

                            //Image Resizing 

                            // $re = resizeImage($fileData['file_name'],gallery_image_url);

                            // if($re == false){

                            //     $this->session->set_flashdata('error',"Resize failed!");

                            // }

                            $dataArr = array_merge($dataArr, array('image_name' => $fileData['file_name'],'image_originalname' => $_FILES['gallery_images']['name'][$i]));

                        }



                        $id = $this->common->insert('gallery_images',$dataArr);

                        unset($_FILES['file']);

                    }

                }

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully gallery info save.");

                } else {

                    $this->sesscion->set_flashdata('error',"Gallery info not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed gallery info saving");

            }

            redirect('admin/gallery','refresh');

        }



        public function delete_galleryInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['image_id'];

                $col_name = 'image_id';

                $table_name = 'gallery_images';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $url = gallery_image_url.$result[0]['image_name'];

                    if(file_exists($url)){

                        @unlink(gallery_image_url.$result[0]['image_name']);    

                    }

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }



        public function slider(){

            $image_info = $this->admin->getSliderImagesInfo();

            $this->load->view('admin/page_slider',['image_info' => $image_info]);

        }



        public function save_sliderInfo(){

            $post = $this->input->post();

            $dataArr = array();

            if(!empty($post)){

                $count = count($_FILES['slider_images']['name']);

                for($i=0; $i < $count; $i++){

                    if(!empty($_FILES['slider_images']['name'][$i])){

                        $ext = pathinfo($_FILES['slider_images']['name'][$i], PATHINFO_EXTENSION);

                        $card_type = "image";

                        $image_name = str_replace('.'.$ext, '', preg_replace('/[\ _]/','-', $_FILES['slider_images']['name'][$i])).'_'.time().'.' . $ext;

                        

                        $_FILES['file']['name']     = $image_name;

                        $_FILES['file']['type']     = $_FILES['slider_images']['type'][$i];

                        $_FILES['file']['tmp_name'] = $_FILES['slider_images']['tmp_name'][$i];

                        $_FILES['file']['error']     = $_FILES['slider_images']['error'][$i];

                        $_FILES['file']['size']     = $_FILES['slider_images']['size'][$i];

                        

                        $config['upload_path'] = "./".slider_image_url;

                        $config['allowed_types'] = 'gif|jpg|png|jpeg';

                        $config['file_name'] = $image_name;

                        $config['overwrite'] = TRUE;

                        $config['max_size'] = '2048000';

                        

                        $this->load->library('upload', $config);

                        $this->upload->initialize($config);

                        

                        if(!$this->upload->do_upload('file')){

                            $this->session->set_flashdata('error', "Somthing error comes in uploading");

                        } else {

                            $fileData = $this->upload->data();                        

                            $dataArr = array('slider_image' => $fileData['file_name']);

                        }



                        $id = $this->common->insert('slider_images',$dataArr);

                        unset($_FILES['file']);

                    }

                }

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully slider image save.");

                } else {

                    $this->sesscion->set_flashdata('error',"Slider image not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed slider image saving");

            }

            redirect('admin/slider','refresh');

        }



        public function delete_sliderInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['slider_id'];

                $col_name = 'slider_id';

                $table_name = 'slider_images';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $url = slider_image_url.$result[0]['slider_image'];

                    if(file_exists($url)){

                        @unlink(slider_image_url.$result[0]['slider_image']);    

                    }

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }



        public function userlist(){

            $user_info = $this->admin->getUsersInfo('user');

            $this->load->view('admin/page_userlist',['user_info' => $user_info]);

        }



        public function save_userInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'user_fullname' => '',

                    'user_email' => '',

                    'user_mobile' => '',

                    'user_name' => '',

                    'user_password' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'user_firstname' => $post['user_fullname'],

                    'user_email' => $post['user_email'],

                    'user_mobile' => $post['user_mobile'],

                    'user_name' => $post['user_name'],

                    'user_password' => $post['user_password'],

                    'user_role' => 'user',

                    'user_status' => 'Active',

                );



                if(!empty($_FILES['user_profile']['name'])){

                    $image_name = time()."_".preg_replace('/[\ _]/','-', $_FILES['user_profile']['name']);

                    $config['upload_path'] = './'.user_profile_image_url;

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $config['file_name'] = $image_name;

                    $config['overwrite'] = TRUE;

                    $config['max_size'] = '2048000';

                    $config['max_width'] = '2200';

                    $config['max_height'] = '1100';

                    $this->load->library('upload', $config);

                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('user_profile')){

                        $this->session->set_flashdata('warning', 'Somthing missing in image uploading');

                    } else {

                        $fileData = $this->upload->data();

                        $dataArr = array_merge($dataArr, array('user_profile_img' => $fileData['file_name']));

                    }

                }

                $id = $this->common->insert('users',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully user info save.");

                } else {

                    $this->sesscion->set_flashdata('error',"User info not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed user info saving");

            }

            redirect('admin/users');

        }



        public function get_userInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $id = $post['user_id'];

                $result = $this->common->select('users'," where user_id=".$id);

                $output = array(

                    'status' => 1,

                    'result' => $result,

                    'message' => 'Successfully get info.'

                );

            } else {

                $output = array(

                    'status' => 0,

                    'message' => "Detail not found",

                );

            }

            echo json_encode($output);die;

        }



        public function update_userInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'edit_user_fullname' => '',

                    'edit_user_email' => '',

                    'edit_user_mobile' => '',

                    'edit_user_name' => '',

                    'edit_user_password' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'user_firstname' => $post['edit_user_fullname'],

                    'user_email' => $post['edit_user_email'],

                    'user_mobile' => $post['edit_user_mobile'],

                    'user_name' => $post['edit_user_name'],

                    'user_password' => $post['edit_user_password'],

                    'user_status' => 'Active',

                );



                if(!empty($_FILES['edit_user_profile']['name'])){

                    $image_name = time()."_".preg_replace('/[\ _]/','-', $_FILES['edit_user_profile']['name']);

                    $config['upload_path'] = './'.user_profile_image_url;

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $config['file_name'] = $image_name;

                    $config['overwrite'] = TRUE;

                    $config['max_size'] = '2048000';

                    $config['max_width'] = '2200';

                    $config['max_height'] = '1100';

                    $this->load->library('upload', $config);

                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('edit_user_profile')){

                        $this->session->set_flashdata('warning', 'Somthing missing in image uploading');

                    } else {

                        if($post['edit_profile_name']){

                            if(file_exists(user_profile_image_url.$post['edit_profile_name'])){

                                @unlink(user_profile_image_url.$post['edit_profile_name']);

                            }

                        }

                        $fileData = $this->upload->data();

                        $dataArr = array_merge($dataArr, array('user_profile_img' => $fileData['file_name']));

                    }

                }



                $whereArr = array(

                    'user_id' => $post['edit_user_id']

                );

                $this->common->update('users',$dataArr, $whereArr);

                $this->session->set_flashdata('success',"Successfully user info update");

            } else { 

                $this->session->set_flashdata('error',"Failed user info updation");

            }

            redirect('admin/users');

        }



        public function delete_userInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['user_id'];

                $col_name = 'user_id';

                $table_name = 'users';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $url = user_profile_image_url.$result[0]['user_profile_img'];

                    if(file_exists($url)){

                        @unlink(user_profile_image_url.$result[0]['user_profile_img']);    

                    }

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }



        public function vehical_entry(){

            $vehical_info = $this->admin->getVehicalInfo();

            $this->load->view('admin/page_vehicle_entry',['vehical_info' => $vehical_info]);

        }



        public function save_vehicalInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'vehical_number' => '',

                    'vehical_weight' => '',

                    'vehical_entry_time' => '',

                    'vehical_exist_time' => '',

                    'supervisor_name' => '',

                    'vehical_company_name' => '',

                    'vehical_create_dt' => '',

                    'ticket_no' => '',

                    'item_name' => '',

                    'gross_weight' => '',

                    'tare_weight' => '',

                    'vehical_weight_measure' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'vehical_number' => $post['vehical_number'],

                    'vehical_weight' => $post['vehical_weight'],

                    'vehical_entry_time' => $post['vehical_entry_time'],

                    'vehical_exist_time' => $post['vehical_exist_time'],

                    'supervisor_name' => $post['supervisor_name'],

                    'vehical_company_name' => $post['vehical_company_name'],

                    'vehical_create_dt' => $post['vehical_create_dt'],

                    'vehical_weight_measure' => $post['vehical_weight_measure'],

                    'ticket_no' => $post['ticket_no'],

                    'item_name' => $post['item_name'],

                    'gross_weight' => $post['gross_weight'],

                    'tare_weight' => $post['tare_weight'],

                );



                $id = $this->common->insert('vehical_info',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully vehical info save.");

                } else {

                    $this->sesscion->set_flashdata('error',"Vehical info not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed vehical info saving");

            }

            redirect('admin/vehical_info');

        }



        public function get_vehicalInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $id = $post['vehical_id'];

                $result = $this->common->select('vehical_info'," where vehical_id=".$id,'*,DATE_FORMAT(vehical_create_dt, "%Y-%m-%d") AS vehical_create_dt');

                $output = array(

                    'status' => 1,

                    'result' => $result,

                    'message' => 'Successfully get info.'

                );

            } else {

                $output = array(

                    'status' => 0,

                    'message' => "Detail not found",

                );

            }

            echo json_encode($output);die;

        }



        public function update_vehicalInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'edit_vehical_number' => '',

                    'edit_vehical_weight' => '',

                    'edit_vehical_entry_time' => '',

                    'edit_vehical_exist_time' => '',

                    'edit_supervisor_name' => '',

                    'edit_vehical_company_name' => '',

                    'edit_ticket_no' => '',

                    'edit_item_name' => '',

                    'edit_gross_weight' => '',

                    'edit_tare_weight' => '',

                    'edit_vehical_weight_measure' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'vehical_number' => $post['edit_vehical_number'],

                    'vehical_weight' => $post['edit_vehical_weight'],

                    'vehical_entry_time' => $post['edit_vehical_entry_time'],

                    'vehical_exist_time' => $post['edit_vehical_exist_time'],

                    'vehical_company_name' => $post['edit_vehical_company_name'],

                    'supervisor_name' => $post['edit_supervisor_name'],

                    'ticket_no' => $post['edit_ticket_no'],

                    'item_name' => $post['edit_item_name'],

                    'gross_weight' => $post['edit_gross_weight'],

                    'tare_weight' => $post['edit_tare_weight'],

                    'vehical_weight_measure' => $post['edit_vehical_weight_measure'],

                    'vehical_status' => 'Active',

                );

                $whereArr = array(

                    'vehical_id' => $post['edit_vehical_id']

                );

                if($this->common->update('vehical_info',$dataArr, $whereArr)){

                    $this->session->set_flashdata('success',"Successfully vehical info update");

                } else {

                    $this->session->set_flashdata('error',"Failed vehical info updation");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed vehical info updation");

            }

            redirect('admin/vehical_info');

        }



        public function delete_vehicalInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['vehical_id'];

                $col_name = 'vehical_id';

                $table_name = 'vehical_info';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }



        public function waste_collection_schedule(){

            $waste_schedule = $this->admin->getWasteScheduleInfo();

            $this->load->view('admin/waste_collection_sehedule',['waste_schedule' => $waste_schedule]);

        }



        public function save_scheduleInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'vehical_number' => '',

                    'location' => '',

                    'time_in' => '',

                    'time_out' => '',

                    'driver_name' => '',

                    'company_name' => '',

                    'create_date' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'vehical_number' => $post['vehical_number'],

                    'location' => $post['location'],

                    'time_in' => $post['time_in'],

                    'time_out' => $post['time_out'],

                    'driver_name' => $post['driver_name'],

                    'company_name' => $post['company_name'],

                    'create_date' => $post['create_date']

                );



                $id = $this->common->insert('waste_schedule',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully waste schedule info save.");

                } else {

                    $this->sesscion->set_flashdata('error',"Waste schedule info not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed waste schedule info saving");

            }

            redirect('admin/waste_schedule');

        }



        public function get_scheduleInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $id = $post['schedule_id'];

                $result = $this->common->select('waste_schedule'," where schedule_id=".$id,'*,DATE_FORMAT(create_date, "%Y-%m-%d") AS create_date');//,DATE_FORMAT(time_in, "%h:%i %p") AS time_in,DATE_FORMAT(time_out, "%h:%i %p") AS time_out

                $output = array(

                    'status' => 1,

                    'result' => $result,

                    'message' => 'Successfully get info.'

                );

            } else {

                $output = array(

                    'status' => 0,

                    'message' => "Detail not found",

                );

            }

            echo json_encode($output);die;

        }



        public function update_scheduleInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'edit_vehical_number' => '',

                    'edit_location' => '',

                    'edit_time_in' => '',

                    'edit_time_out' => '',

                    'edit_driver_name' => '',

                    'edit_company_name' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'vehical_number' => $post['edit_vehical_number'],

                    'location' => $post['edit_location'],

                    'time_in' => $post['edit_time_in'],

                    'time_out' => $post['edit_time_out'],

                    'company_name' => $post['edit_company_name'],

                    'driver_name' => $post['edit_driver_name'],

                    'status' => 'Active',

                );

                $whereArr = array(

                    'schedule_id' => $post['edit_schedule_id']

                );

                if($this->common->update('waste_schedule',$dataArr, $whereArr)){

                    $this->session->set_flashdata('success',"Successfully schedule info update");

                } else {

                    $this->session->set_flashdata('error',"Failed schedule info updation");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed schedule info updation");

            }

            redirect('admin/waste_schedule');

        }



        public function delete_scheduleInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['schedule_id'];

                $col_name = 'schedule_id';

                $table_name = 'waste_schedule';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }



        public function waste_detail(){

            $waste_processing = $this->admin->getWasteProcessingInfo();

            $this->load->view('admin/waste_detail',['waste_processing' => $waste_processing]);

        }



        public function save_processingInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'total_wet_waste_collection' => '',

                    'total_dry_waste_collection' => '',

                    'total_garden_waste_collection' => '',

                    'total_wet_waste_processing' => '',

                    'total_dry_waste_processing' => '',

                    'total_garden_waste_processing' => '',

                    'non_processable_dry_waste_dispose' => '',

                    'processing_create_dt' => '',

                    'rejects_send_landfill_sites' => '',

                    'measurement' => ''

                );

                $post = array_merge($blankArr,$post);

                

                $dataArr = array(

                    'total_wet_waste_collection' => $post['total_wet_waste_collection'],

                    'total_dry_waste_collection' => $post['total_dry_waste_collection'],

                    'total_garden_waste_collection' => $post['total_garden_waste_collection'],

                    'total_wet_waste_processing' => $post['total_wet_waste_processing'],

                    'total_dry_waste_processing' => $post['total_dry_waste_processing'],

                    'total_garden_waste_processing' => $post['total_garden_waste_processing'],

                    'rejects_send_landfill_sites' => ($post['total_wet_waste_collection'] - $post['total_wet_waste_processing']) + ($post['total_dry_waste_collection'] - $post['total_dry_waste_processing'] - $post['non_processable_dry_waste_dispose']),//$post['rejects_send_landfill_sites'],

                    'processing_create_dt' => $post['processing_create_dt'],

                    'measurement' => $post['measurement'],

                    'non_processable_dry_waste_dispose' => $post['non_processable_dry_waste_dispose']

                );



                $id = $this->common->insert('waste_processing',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully waste processing info save.");

                } else {

                    $this->sesscion->set_flashdata('error',"Waste processing info not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed Waste processing info saving");

            }

            redirect('admin/waste_detail');

        }



        public function get_processingInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $id = $post['processing_id'];

                $result = $this->common->select('waste_processing'," where processing_id=".$id,'*,DATE_FORMAT(processing_create_dt, "%Y-%m-%d") AS processing_create_dt');

                $output = array(

                    'status' => 1,

                    'result' => $result,

                    'message' => 'Successfully get info.'

                );

            } else {

                $output = array(

                    'status' => 0,

                    'message' => "Detail not found",

                );

            }

            echo json_encode($output);die;

        }



        public function update_processingInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'edit_total_wet_waste_collection' => '',

                    'edit_total_dry_waste_collection' => '',

                    'edit_total_garden_waste_collection' => '',

                    'edit_total_wet_waste_processing' => '',

                    'edit_total_dry_waste_processing' => '',

                    'edit_total_garden_waste_processing' => '',

                    'edit_non_processable_dry_waste_dispose' => '',

                    'edit_rejects_send_landfill_sites' => '',

                    'edit_processing_create_dt' => '',

                    'edit_measurement' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'total_wet_waste_collection' => $post['edit_total_wet_waste_collection'],

                    'total_dry_waste_collection' => $post['edit_total_dry_waste_collection'],

                    'total_garden_waste_collection' => $post['edit_total_garden_waste_collection'],

                    'total_wet_waste_processing' => $post['edit_total_wet_waste_processing'],

                    'total_garden_waste_processing' => $post['edit_total_garden_waste_processing'],

                    'total_dry_waste_processing' => $post['edit_total_dry_waste_processing'],

                    'rejects_send_landfill_sites' => ($post['edit_total_wet_waste_collection'] - $post['edit_total_wet_waste_processing']) + ($post['edit_total_dry_waste_collection'] - $post['edit_total_dry_waste_processing'] - $post['edit_non_processable_dry_waste_dispose']),//$post['edit_rejects_send_landfill_sites'],

                    'non_processable_dry_waste_dispose' => $post['edit_non_processable_dry_waste_dispose'],

                    'processing_create_dt' => $post['edit_processing_create_dt'],

                    'processing_status' => 'Active',

                    'measurement' => $post['edit_measurement']

                );

                $whereArr = array(

                    'processing_id' => $post['edit_processing_id']

                );

                if($this->common->update('waste_processing',$dataArr, $whereArr)){

                    $this->session->set_flashdata('success',"Successfully weight processing info update");

                } else {

                    $this->session->set_flashdata('error',"Failed weight processing info updation");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed weight processing info updation");

            }

            redirect('admin/waste_detail');

        }



        public function delete_processingInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['processing_id'];

                $col_name = 'processing_id';

                $table_name = 'waste_processing';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }



        public function changeUserStatus(){

            $post = $this->input->post();

            $output = array();

            if(!empty($post)){

                if($this->common->update('users',array('user_status' => $post['status']),array('user_id' => $post['user_id']))){

                    $output = array(

                        'status' => 1,

                        'message' => "Status change successfully"

                    );

                } else {

                    $output = array(

                        'status' => 0,

                        'message' => "Status not change"

                    );

                }

            }

            echo json_encode($output);exit();

        }



        public function adminuserlist(){

            $user_info = $this->admin->getUsersInfo('admin');

            $this->load->view('admin/page_adminuserlist',['user_info' => $user_info]);

        }



        public function save_adminuserInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'user_fullname' => '',

                    'user_email' => '',

                    'user_mobile' => '',

                    'user_name' => '',

                    'user_password' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'user_firstname' => $post['user_fullname'],

                    'user_email' => $post['user_email'],

                    'user_mobile' => $post['user_mobile'],

                    'user_name' => $post['user_name'],

                    'user_password' => $post['user_password'],

                    'user_role' => 'admin',

                    'user_status' => 'Active',

                );



                if(!empty($_FILES['user_profile']['name'])){

                    $image_name = time()."_".preg_replace('/[\ _]/','-', $_FILES['user_profile']['name']);

                    $config['upload_path'] = './'.user_profile_image_url;

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $config['file_name'] = $image_name;

                    $config['overwrite'] = TRUE;

                    $config['max_size'] = '2048000';

                    $config['max_width'] = '2200';

                    $config['max_height'] = '1100';

                    $this->load->library('upload', $config);

                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('user_profile')){

                        $this->session->set_flashdata('warning', 'Somthing missing in image uploading');

                    } else {

                        $fileData = $this->upload->data();

                        $dataArr = array_merge($dataArr, array('user_profile_img' => $fileData['file_name']));

                    }

                }

                $id = $this->common->insert('users',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully user info save.");

                } else {

                    $this->sesscion->set_flashdata('error',"User info not save.");

                }

            } else { 

                $this->session->set_flashdata('error',"Failed user info saving");

            }

            redirect('admin/users');

        }



        public function get_adminuserInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $id = $post['user_id'];

                $result = $this->common->select('users'," where user_id=".$id);

                $output = array(

                    'status' => 1,

                    'result' => $result,

                    'message' => 'Successfully get info.'

                );

            } else {

                $output = array(

                    'status' => 0,

                    'message' => "Detail not found",

                );

            }

            echo json_encode($output);die;

        }



        public function update_adminuserInfo(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'edit_user_fullname' => '',

                    'edit_user_email' => '',

                    'edit_user_mobile' => '',

                    'edit_user_name' => '',

                    'edit_user_password' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'user_firstname' => $post['edit_user_fullname'],

                    'user_email' => $post['edit_user_email'],

                    'user_mobile' => $post['edit_user_mobile'],

                    'user_name' => $post['edit_user_name'],

                    'user_password' => $post['edit_user_password'],

                    'user_status' => 'Active',

                );



                if(!empty($_FILES['edit_user_profile']['name'])){

                    $image_name = time()."_".preg_replace('/[\ _]/','-', $_FILES['edit_user_profile']['name']);

                    $config['upload_path'] = './'.user_profile_image_url;

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';

                    $config['file_name'] = $image_name;

                    $config['overwrite'] = TRUE;

                    $config['max_size'] = '2048000';

                    $config['max_width'] = '2200';

                    $config['max_height'] = '1100';

                    $this->load->library('upload', $config);

                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('edit_user_profile')){

                        $this->session->set_flashdata('warning', 'Somthing missing in image uploading');

                    } else {

                        if($post['edit_profile_name']){

                            if(file_exists(user_profile_image_url.$post['edit_profile_name'])){

                                @unlink(user_profile_image_url.$post['edit_profile_name']);

                            }

                        }

                        $fileData = $this->upload->data();

                        $dataArr = array_merge($dataArr, array('user_profile_img' => $fileData['file_name']));

                    }

                }



                $whereArr = array(

                    'user_id' => $post['edit_user_id']

                );

                $this->common->update('users',$dataArr, $whereArr);

                $this->session->set_flashdata('success',"Successfully user info update");

            } else { 

                $this->session->set_flashdata('error',"Failed user info updation");

            }

            redirect('admin/users');

        }



        public function delete_adminuserInfo(){

            $post = $this->input->post();

            if($post && !empty($post)){

                $id = $post['user_id'];

                $col_name = 'user_id';

                $table_name = 'users';

                $where = " where  ".$col_name." = '".$id."'";

                $result = $this->common->select($table_name, $where);

        

                if(!empty($result)){

                    $url = user_profile_image_url.$result[0]['user_profile_img'];

                    if(file_exists($url)){

                        @unlink(user_profile_image_url.$result[0]['user_profile_img']);    

                    }

                    $this->common->delete($table_name, $id, $col_name);

                    // $this->session->set_flashdata('success',"Successfully Delete Info.");

                    $message = array('status' => 1, 'message' => "Successfully Delete Info.");

                }else{

                    // $this->session->set_flashdata('error',"Info not found.");

                    $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info not found.");

                }

            }else{

                // $this->session->set_flashdata('error',"Info Deletion Failed.");

                $message = array('status' => 0, 'error' => __LINE__, 'message' => "Info Deletion Failed.");

            }

            echo json_encode($message); die;

        }

    }



?>