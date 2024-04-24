<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel {
    
    public function array_to_excel($data_set=array(),$headers=array(),$fname='sample',$is_assoc=TRUE) {
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        $row = 1; $col = 'A';
        //add headers if
        foreach($headers AS $header) {
            $sheet->setCellValue("{$col}{$row}", "{$header}");
            $sheet->getStyle("{$col}{$row}")->getFont()->setBold(true);
            $col++;
        }
        $col = 'A';
        if($headers){$row = 2;}
        
        //add data if
        foreach($data_set AS $data) {
            if($is_assoc){
                foreach($data AS $key=>$value){
                    $sheet->setCellValue("{$col}{$row}", "{$value}");
                    $col++;
                }
            } else {
                foreach($data AS $$value){
                    $sheet->setCellValue("{$col}{$row}", "{$value}");
                    $col++;
                }
            }
            
            $col = 'A';
            $row++;
        }
        
        //generate excel sheet
        $fname .= '.xlsx';
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fname).'"');
        $writer->save('php://output');
        
    }//end-func
    
    public function excel_to_array($res,$exclude_first_row = FALSE,$keys=array()){
        // Load the Excel file
        $spreadsheet = IOFactory::load($_FILES[$res]['tmp_name']);

        // Select the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row and column indices
        $row_h = $worksheet->getHighestRow();
        $col_h = $worksheet->getHighestColumn();

        // Loop through each row of the worksheet
        $temp = array();
        $row_start = 1;
        if($exclude_first_row){$row_start = 2;}
        for ($row = $row_start; $row <= $row_h; $row++) {
            // Read cell values for each column in the current row
            $tmp = array();
            $i = 0;
            for ($col = 'A'; $col <= $col_h; $col++) {
                $value = $worksheet->getCell($col.$row)->getValue();
                if($keys) { 
                    $tmp[$keys[$i]] = $value;
                    $i++;
                } else {
                    array_push($tmp, $value);
                }
            }
            array_push($temp,$tmp);
        }
        
        return $temp;
    }//end-func
    
}//end-class	

//end-file