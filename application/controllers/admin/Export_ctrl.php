<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Export_ctrl extends CI_Controller {

        public function __construct() {
            parent::__construct();
            // $this->load->model('Export', 'export');
            // if(!$this->session->userdata('Login')){
            //     redirect('admin');
            // }
        }

        public function index(){
            // Read an Excel File
            $tmpfname = "example.xls";
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $objPHPExcel = $excelReader->load($tmpfname);
            
            // Set document properties
            $objPHPExcel->getProperties()->setCreator("Furkan Kahveci")
                                ->setLastModifiedBy("Furkan Kahveci")
                                ->setTitle("Office 2007 XLS Test Document")
                                ->setSubject("Office 2007 XLS Test Document")
                                ->setDescription("Description for Test Document")
                                ->setKeywords("phpexcel office codeigniter php")
                                ->setCategory("Test result file");

            // Create a first sheet
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->setCellValue('A1', "Furkan");
            $objPHPExcel->getActiveSheet()->setCellValue('B1', "Kahveci");
            $objPHPExcel->getActiveSheet()->setCellValue('C1', "KLU");
            $objPHPExcel->getActiveSheet()->setCellValue('D1', "Software Engineering");
            $objPHPExcel->getActiveSheet()->setCellValue('E1', "11.06.2019");

            // Hide F and G column
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setVisible(false);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setVisible(false);

            // Set auto size
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

            // Add data
            for ($i = 10; $i <= 50; $i++) 
            {
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "Name $i")
                                            ->setCellValue('B' . $i, "Surname $i")
                                            ->setCellValue('C' . $i, "University $i")
                                            ->setCellValue('D' . $i, "Department $i")
                                            ->setCellValue('E' . $i, "Date");
            }

            // Set Font Color, Font Style and Font Alignment
            $stil=array(
                'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                )
                ),
                'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );
            $objPHPExcel->getActiveSheet()->getStyle('A3:E3')->applyFromArray($stil);

            // Merge Cells
            $objPHPExcel->getActiveSheet()->mergeCells('A5:E5');
            $objPHPExcel->getActiveSheet()->setCellValue('A5', "MERGED CELL");
            $objPHPExcel->getActiveSheet()->getStyle('A5:E5')->applyFromArray($stil);
            
            // Save Excel xls File
            $filename="filename.xls";
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            ob_end_clean();
            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename='.$filename);
            $objWriter->save('php://output');
        }

        public function user_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getUsersRecords($get);      
        
            $fileName = 'user-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('SERIAL NUMBER','Date Of Creation','User','Email','Mobile','Nationality','Gender','Age','Residence','city','Plan','Expiry Date','Expiry Account','Status','Payment(Inapp/Distributer)','Total');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                        date('m/d/yy',strtotime($value['added_date'])),
                        $value['user_name'],
                        $value['user_email'],
                        getMobileNo($value['user_mobile']),
                        nationalityString($value['user_nationality']),
                        $value['user_gender'],
                        $value['user_age'],
                        $value['address']."<br>".countryString($value['user_country']),
                        cityString($value['user_city']),
                        getUserPlanSubscriptionStr($value['plan_id']),
                        $value['expire_date'],
                        $value['expire_account'],
                        $value['user_status'],
                        $value['payment_by'],
                        $value['total_amount'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

    }
?>