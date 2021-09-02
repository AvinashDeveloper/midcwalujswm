<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Admin_model extends CI_Model{

        public function getUsersInfo($role=''){
            $this->db->select('*');
            $this->db->from('users');
            if(!empty($role)){
                $this->db->where('user_role',$role);
            }
            $this->db->order_by('user_id','desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getGalleryImagesInfo(){
            $this->db->select('*');
            $this->db->from('gallery_images');
            $this->db->order_by('image_id','desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getVehicalInfo(){
            $this->db->select('*,DATE_FORMAT(vehical_create_dt, "%m/%d/%Y") AS vehical_create_dt,DATE_FORMAT(vehical_exist_time, "%h:%i %p") AS vehical_exist_time,DATE_FORMAT(vehical_entry_time, "%h:%i %p") AS vehical_entry_time');
            $this->db->from('vehical_info');
            $this->db->order_by('vehical_id ','desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getWasteScheduleInfo(){
            $this->db->select('*,DATE_FORMAT(create_date, "%m/%d/%Y") AS create_date,DATE_FORMAT(time_in, "%h:%i %p") AS time_in,DATE_FORMAT(time_out, "%h:%i %p") AS time_out');
            $this->db->from('waste_schedule');
            $this->db->order_by('schedule_id ','desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getWasteProcessingInfo($post = NULL){
            $this->db->select('*,CONCAT(total_wet_waste_collection+total_dry_waste_collection+total_garden_waste_collection) as total_waste_collection,DATE_FORMAT(processing_create_dt, "%m/%d/%Y") AS processing_create_dt');
            $this->db->from('waste_processing');
            if(!empty($post)){
                if($post['startdate'] && $post['enddata']){
                    $this->db->where("processing_create_dt BETWEEN '".$post['startdate']."' AND '".$post['enddata']."'");
                }
            }
            $this->db->order_by('processing_id ','desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getSliderImagesInfo(){
            $this->db->select('*');
            $this->db->from('slider_images');
            $this->db->order_by('slider_id','desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

    }
?>