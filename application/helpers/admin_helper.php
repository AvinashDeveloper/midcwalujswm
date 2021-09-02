<?php

	function resizeImage($file_name,$upload_path){
		$CI = &get_instance();
		$config1['source_image'] = $upload_path.$file_name;
		$config1['new_image'] =  re_gallery_image_url.$file_name;
		$config1['maintain_ratio'] = FALSE;
		$config1['width'] = 200;
		$config1['height'] = 200; 
		$CI->load->library('image_lib', $config1); 
		if ( ! $CI->image_lib->resize()){ 
			return false;
		}
		return true;
	}


    function weightMeasurOption($sel = NULL){
        $CI = &get_instance();
        $arrInfo = array('Kilograms');//,'Pounds','Ounces','Grams','Stones'
        $option = '<option value="">Select weight measure </option>';
		if(!empty($arrInfo)){
			foreach($arrInfo as $val){
					$selVal = '';
					if(is_int($sel)){
						if($sel == $val){
							$selVal = 'selected';	
						}
					}
					$option .= '<option value="'.$val.'" '.$selVal.' >'.ucfirst($val).'</option>';
			}
			return $option;	
		} else {
			return $option;	
		}
    }

    function getVehicalOption($sel = null){
        $CI = &get_instance();
		$resultArr = $CI->common->select('vehical_info');
		$option = '<option value="">Select vehical number</option>';
		if(!empty($resultArr)){
			foreach($resultArr as $val){
					$selVal = '';
					if(is_int($sel)){
						if($sel == $val['vehical_id']){
							$selVal = 'selected';	
						}
					} else if(is_string($sel)){
						if($sel == $val['vehical_number']){
							$selVal = 'selected';	
						}
					}	
					$option .= '<option value="'.$val['vehical_id'].'" '.$selVal.' >'.ucfirst($val['vehical_number']).'</option>';
			}
			return $option;	
		} else {
			return $option;	
		}
    }

    function VehicalNumber($vehical_id = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('vehical_info'," where vehical_id ='".$vehical_id."'");
		if(!empty($resultArr)){
			return $resultArr[0]['vehical_number'];
		} else {
			return false;
		}
	}
	
	function GetSliderInfo(){
		$CI = &get_instance();
		$CI->db->select('*');
		$CI->db->from('slider_images');
		$CI->db->where('slider_status','Active');
		$CI->db->order_by('slider_id','desc');
		$query = $CI->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	function GetGalleryInfo(){
		$CI = &get_instance();
		$CI->db->select('*');
		$CI->db->from('gallery_images');
		$CI->db->where('image_status','Active');
		$CI->db->order_by('image_id','desc');
		$query = $CI->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	function GetWasteCollection($startdate,$enddata){
		$CI = &get_instance();

		$CI->db->select('total_wet_waste_collection as wc,total_dry_waste_collection as dc,total_garden_waste_collection as gc,total_wet_waste_processing as wp,total_dry_waste_processing as dp,total_garden_waste_processing as gp,	non_processable_dry_waste_dispose as dispose,rejects_send_landfill_sites as landfill,measurement,CONCAT(total_wet_waste_collection+total_dry_waste_collection+total_garden_waste_collection) as total_waste_collection,DATE_FORMAT(processing_create_dt, "%m/%d/%Y") AS processing_create_dt');
		$CI->db->from('waste_processing');
		if($startdate && $enddata){
			$CI->db->where("processing_create_dt BETWEEN '".$startdate."' AND '".$enddata."'");
		} else {
			if($startdate){
				$CI->db->where('processing_create_dt',$startdate);	
			}else if($enddata){
				$CI->db->where('processing_create_dt',$enddata);
			}
		}

		$query = $CI->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	function GetWasteSchedule(){
		$CI = &get_instance();

		$CI->db->select('waste_schedule.*,vehical_info.vehical_number,DATE_FORMAT(create_date, "%m/%d/%Y") AS create_date');	
		$CI->db->from('waste_schedule');
		$CI->db->join('vehical_info','vehical_info.vehical_id = waste_schedule.vehical_number','LEFT');
		$CI->db->order_by('schedule_id','desc');
		$query = $CI->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}
?>