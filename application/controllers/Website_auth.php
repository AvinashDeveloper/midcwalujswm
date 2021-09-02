<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Website_auth extends CI_Controller {

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->load->view('website/login');
        }

        public function login(){
            if($this->session->userdata('web_login')){
                redirect('/');
            } else {
                $post = $this->input->post();
                if(!empty($post)){
                    $Login =  $this->common->select('users'," where user_name = '".$post['username']."' and user_password = '".$post['password']."' and user_role = 'user'");
                    if(!empty($Login)) {
                        if($Login[0]['user_status'] == 'Inactive'){
                            $this->session->set_flashdata('warning',"Your account not verified from admin.");
                            redirect('Login');
                        } else {
                            $this->session->set_userdata('web_login',$Login);
                            $this->session->set_flashdata('success', 'Successfully login.');
                            redirect('/');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Login Error Please Try Again ');
                    }
                }
                redirect('Login');
            }
        }

        public function registration(){
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
                    'user_role' => 'user',
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
                    $this->session->set_flashdata('success',"Successfully user registred.");
                    redirect('/');
                } else {
                    $this->sesscion->set_flashdata('error',"User registration failed.");
                }
            }
            $this->load->view('website/register');
        }

        public function logout(){
            $this->session->unset_userdata('web_login');
            $this->session->set_flashdata('success',"Successfully Logout!");
            redirect('/','refresh');
        }
    }
?>
