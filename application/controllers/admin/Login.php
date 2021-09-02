<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->load->view('admin/page_login');
        }

        public function login_fn(){
            if($this->session->userdata('Login')){
                redirect('admin/dashboard');
            } else {
                $post = $this->input->post();
                if(!empty($post)){
                    $Login =  $this->common->select('users'," where user_name = '".$post['username']."' and user_password = '".$post['password']."' and (user_role = 'super_admin' or user_role = 'admin')");
                   // echo $this->db->last_query();die();
                    if(!empty($Login)) {
                        if($Login[0]['user_status']=="Inactive"){
                            $this->session->set_flashdata('warning', 'Your account is Inactive.');
                        } else {
                            $this->session->set_userdata('Login',$Login);
                            $this->session->set_flashdata('success', 'Successfully login.');
                            redirect('admin/dashboard');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Login Error Please Try Again ');
                    }
                }
                redirect('admin');
            }
        }

        public function registration_fn(){
            $post = $this->input->post();
            if(!empty($post)){
                $blankArr = array(
                    'fullname' => '',
                    'email' => '',
                    'mobile' => '',
                    'username' => '',
                    'password' => ''
                );
                $post = array_merge($blankArr,$post);
                $dataArr = array(
                    'user_firstname' => $post['fullname'],
                    'user_email' => $post['email'],
                    'user_mobile' => $post['mobile'],
                    'user_name' => $post['username'],
                    'user_password' => $post['password'],
                    'user_role' => 'admin',
                    'user_status' => 'Inactive',
                );

                if(!empty($_FILES['profile']['name'])){
                    $image_name = time()."_".preg_replace('/[\ _]/','-', $_FILES['profile']['name']);
                    $config['upload_path'] = './'.user_profile_image_url;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $image_name;
                    $config['overwrite'] = TRUE;
                    $config['max_size'] = '2048000';
                    $config['max_width'] = '2200';
                    $config['max_height'] = '1100';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('profile')){
                        $this->session->set_flashdata('warning', 'Somthing missing in image uploading');
                    } else {
                        $fileData = $this->upload->data();
                        $dataArr = array_merge($dataArr, array('user_profile_img' => $fileData['file_name']));
                    }
                }
                $id = $this->common->insert('users',$dataArr);
                if(!empty($id)){
                    $this->session->set_flashdata('success',"Successfully admin user info save.");
                    redirect('admin');
                } else {
                    $this->sesscion->set_flashdata('error',"Admin user info not save.");
                }
            }
            $this->load->view('admin/pages_register');
        }

        public function logout_fn(){
            $this->session->unset_userdata('Login');
            $this->session->set_flashdata('success',"Successfully Logout!");
            redirect('admin','refresh');
        }
    }
?>