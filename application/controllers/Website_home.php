<?php

    defined('BASEPATH') OR exit('No direct script access allowed');



    class Website_home extends CI_Controller {



        public function __construct(){

            parent::__construct();

            // if(!$this->session->userdata('Login')){

            //     redirect('admin');

            // }

        }



        public function index(){

            $this->load->view('website/home');

        }



        public function account_details()
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


            $this->load->view('website/account',$data);

        }



        public function contact_us(){

            $post = $this->input->post();

            if(!empty($post)){

                $blankArr = array(

                    'full_name' => '',

                    'phone_number' => '',

                    'message' => '',

                    'email' => ''

                );

                $post = array_merge($blankArr,$post);

                $dataArr = array(

                    'contactus_name' => $post['full_name'],

                    'contactus_mobile' => $post['phone_number'],

                    'contactus_message' => $post['message'],

                    'contactus_email' => $post['email'],

                    'contactus_status' => 'Active',

                );

                $id = $this->common->insert('contact_us',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully send mail");

                } else {

                    $this->sesscion->set_flashdata('error',"User info not save.");

                }

                redirect('Contact-us','refresh');

            }

            $this->load->view('website/contact');

        }



        public function complain_save(){

            $post = $this->input->post();

            if(!empty($post)){

                $dataArr = array(

                    'complainer_name' => $post['complainer_name'],

                    'complainer_email' => $post['complainer_email'],

                    'complainer_mobile' => $post['complainer_mobile'],

                    'complain_text' => $post['complain_text']

                );

                $id = $this->common->insert('complain_tbl',$dataArr);

                if(!empty($id)){

                    $this->session->set_flashdata('success',"Successfully save");

                }

            }

            redirect('Account-details');

        }



        public function get_processingdata(){

            $post = $this->input->post();

            $html = "";

            if(!empty($post)){

                $waste_processing = $this->admin->getWasteProcessingInfo($post);

                if($waste_processing){

                    $i = 1;

                    foreach($waste_processing as $value) {

                        $html = "<tr id=''><td>".$i."</td><td>".$value['processing_create_dt']."</td>";

                        $html .= "<td>".$value['measurement']."</td><td>".$value['wc']."</td><td>".$value['dc']."</td>";

                        $html .= "<td>".$value['gc']."</td><td>".$value['wp']."</td><td>".$value['dp']."</td>";

                        $html .= "<td>".$value['gp']."</td><td>".$value['dispose']."</td><td>".$value['total_waste_collection']."</td>";

                        $html .= "<td>".$value['landfill']."</td></tr>";

                    }

                } else {

                    $html = "<tr><td colspan='14'> No Record Found! </td></tr>";

                }



            } else {

                $waste_processing = $this->admin->getWasteProcessingInfo();

                if($waste_processing){

                    $i = 1;

                    foreach($waste_processing as $value) {

                        $html = "<tr id=''><td>".$i."</td><td>".$value['processing_create_dt']."</td>";

                        $html .= "<td>".$value['measurement']."</td><td>".$value['wc']."</td><td>".$value['dc']."</td>";

                        $html .= "<td>".$value['gc']."</td><td>".$value['wp']."</td><td>".$value['dp']."</td>";

                        $html .= "<td>".$value['gp']."</td><td>".$value['dispose']."</td><td>".$value['total_waste_collection']."</td>";

                        $html .= "<td>".$value['landfill']."</td></tr>";

                    }

                } else {

                    $html = "<tr><td colspan='14'> No Record Found! </td></tr>";

                }

            }

            echo $html;exit();

        }



    }

?>