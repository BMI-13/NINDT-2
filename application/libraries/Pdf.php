<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }
use Mpdf\Mpdf;

class Pdf {
    //this connects the mPDF library with CI for CI way to use
    function __construct(){
        //require_once APPPATH . '/third_party/vendor/autoload.php';
        require_once APPPATH. '/third_party/vendor/autoload.php';
        
    }//end-function
    
    public function new($config='') {
        $mpdf;
        
        if($config !== '') {
            $mpdf = new Mpdf($config);
        } else {
            $mpdf = new Mpdf();
        }
        return $mpdf;
    }//end-func 
	
}//end-class

//end-file