<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Import_ctrl extends CI_Controller{

        public function __construct()

        {

            parent::__construct();

            $this->load->library('excel');

        }

        

        function user_import()
        {

            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP); 

            if(isset($_FILES["excelfile"]["name"]))

            {

                $path = $_FILES["excelfile"]["tmp_name"];

                $object = PHPExcel_IOFactory::load($path);

                foreach($object->getWorksheetIterator() as $worksheet)

                {

                    $highestRow = $worksheet->getHighestRow();

                    $highestColumn = $worksheet->getHighestColumn();

                    for($row=2; $row<=$highestRow; $row++)

                    {

                        $user_role      = 'user';

                        $user_firstname = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                        $user_name      = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                        $user_mobile    = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                        $user_email     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $user_password  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                        

                        $data[] = array(

                            'user_firstname'=>	$user_firstname,

                            'user_role'		=>	$user_role,

                            'user_name'		=>	$user_name,

                            'user_email'	=>	$user_email,

                            'user_mobile'	=>	$user_mobile,

                            'user_password' =>  $user_password,

                            'user_status'   =>  'Inactive'

                        );

                    }

                }

                $this->common->excelInsert('users', $data);

                echo 'Data Imported successfully';

            }	

        }



        function admin_import()
        {

            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP); 

            if(isset($_FILES["excelfile"]["name"]))

            {

                $path = $_FILES["excelfile"]["tmp_name"];

                $object = PHPExcel_IOFactory::load($path);

                foreach($object->getWorksheetIterator() as $worksheet)

                {

                    $highestRow = $worksheet->getHighestRow();

                    $highestColumn = $worksheet->getHighestColumn();

                    for($row=2; $row<=$highestRow; $row++)

                    {

                        $user_role      = 'admin';

                        $user_firstname = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                        $user_name      = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                        $user_mobile    = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                        $user_email     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $user_password  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                        $user_status    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                        

                        $data[] = array(

                            'user_firstname'=>	$user_firstname,

                            'user_role'		=>	$user_role,

                            'user_name'		=>	$user_name,

                            'user_email'	=>	$user_email,

                            'user_mobile'	=>	$user_mobile,

                            'user_password' =>  $user_password,

                            'user_status'   =>  'Inactive'

                        );

                    }

                }

                $this->common->excelInsert('users', $data);

                echo 'Data Imported successfully';

            }	

        }



        function vehicalInfo_import()
        {

            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP); 

            if(isset($_FILES["excelfile"]["name"]))

            {

                $path = $_FILES["excelfile"]["tmp_name"];

                $object = PHPExcel_IOFactory::load($path);

                foreach($object->getWorksheetIterator() as $worksheet)

                {

                    $highestRow = $worksheet->getHighestRow();

                    $highestColumn = $worksheet->getHighestColumn();

                    for($row=2; $row<=$highestRow; $row++)

                    {

                        $ticket_no = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                        $vehical_number      = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                        $item_name    = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                        $gross_weight     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $tare_weight  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                        $vehical_weight    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                        $vehical_entry_time    = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                        $vehical_exist_time    = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                        $supervisor_name    = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

                        $vehical_company_name    = $worksheet->getCellByColumnAndRow(9, $row)->getValue();

                        

                        $data[] = array(

                            'ticket_no'=>	$ticket_no,

                            'vehical_number'		=>	$vehical_number,

                            'item_name'		=>	$item_name,

                            'gross_weight'	=>	$gross_weight,

                            'tare_weight'	=>	$tare_weight,

                            'vehical_weight' =>  $vehical_weight,

                            'vehical_entry_time'   =>  $vehical_entry_time,

                            'vehical_exist_time'   =>  $vehical_exist_time,

                            'supervisor_name'   =>  $supervisor_name,

                            'vehical_company_name'   => $vehical_company_name

                        );

                    }

                }

                $this->common->excelInsert('vehical_info', $data);

                echo 'Data Imported successfully';

            }	

        }



        function scheduleInfo_import()
        {

            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP); 

            if(isset($_FILES["excelfile"]["name"]))

            {

                $path = $_FILES["excelfile"]["tmp_name"];

                $object = PHPExcel_IOFactory::load($path);

                foreach($object->getWorksheetIterator() as $worksheet)

                {

                    $highestRow = $worksheet->getHighestRow();

                    $highestColumn = $worksheet->getHighestColumn();

                    for($row=2; $row<=$highestRow; $row++)

                    {

                        $vehical_number = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                        $location      = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                        $time_in    = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                        $time_out     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $driver_name  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                        $company_name    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                        

                        $data[] = array(

                            'vehical_number'=>	$vehical_number,

                            'location'		=>	$location,

                            'time_in'		=>	$time_in,

                            'time_out'	=>	$time_out,

                            'company_name'	=>	$company_name,

                            'driver_name' =>  $driver_name

                        );

                    }

                }

                $this->common->excelInsert('waste_schedule', $data);

                echo 'Data Imported successfully';

            }	

        }



        function collectionInfo_import()
        {
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP); 

            if(isset($_FILES["excelfile"]["name"]))

            {

                $path = $_FILES["excelfile"]["tmp_name"];

                $object = PHPExcel_IOFactory::load($path);

                foreach($object->getWorksheetIterator() as $worksheet)

                {

                    $highestRow = $worksheet->getHighestRow();

                    $highestColumn = $worksheet->getHighestColumn();

                    for($row=2; $row<=$highestRow; $row++)

                    {

                        $measurement      = 'tons';

                        $total_wet_waste_collection = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                        $total_dry_waste_collection      = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                        $total_garden_waste_collection    = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                        $total_wet_waste_processing     = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $total_dry_waste_processing  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                        $total_garden_waste_processing    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                        $non_processable_dry_waste_dispose    = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                        

                        $data[] = array(

                            'total_wet_waste_collection'=>	$total_wet_waste_collection,

                            'total_dry_waste_collection'		=>	$total_dry_waste_collection,

                            'user_ntotal_garden_waste_collectioname'		=>	$total_garden_waste_collection,

                            'total_wet_waste_processing'	=>	$total_wet_waste_processing,

                            'total_dry_waste_processing'	=>	$total_dry_waste_processing,

                            'total_garden_waste_processing' =>  $total_garden_waste_processing,

                            'non_processable_dry_waste_dispose' =>  $non_processable_dry_waste_dispose,

                            'rejects_send_landfill_sites' =>  (($total_wet_waste_collection - $total_wet_waste_processing) + ($total_dry_waste_collection - $total_dry_waste_processing - $non_processable_dry_waste_dispose))

                        );

                    }

                }

                print_r($data);
         die('dfdf');

                $data = $this->common->excelInsert('waste_processing', $data);

                // $output= 'Data Imported successfully';
                if ($data!='') 
                {
                    echo json_encode(array('response' => 1 , 'msg'=>'Data Imported successfully'));
                    exit;
                }
                else
                {
                    echo json_encode(array('response' => 2 , 'msg'=>'Data Not Imported'));
                    exit;
                }
                

            }	

        }

    }

?>