<?php

class Test extends CI_Controller{
    
   public function email(){
        $this->load->library('mail');
            $data_set_mail = array(
                'recipient_address' => 'ruckshanweerasinghe@gmail.com',
                'recipient_name'    => 'Test User',
                'subject'	    => 'Test Mail',
                'body'              => 'This is a test email'
            );
        var_dump($this->mail->send($data_set_mail));
    }//end-func
    
    public function excel() {
        $data_set = array(
            array('ABC','M',65,'Cont'),
            array('LMN','F',29,'Cont'),
            array('PQR','M',44,'Dead'),
            array('XYZ','M',56,'Await'),
        );
        $headers = array('Name','Gender','Age','Status');
        
        $this->load->library('excel');
        $my_excel = new Excel();
        $my_excel->array_to_excel($data_set, $headers,'patients');
    }//end-func
    
    public function pdf() {
        $name   = 'Mr. Asdsds ASASaasa';
        $reg_no = 45342;
        $url    = site_url("verify/{$reg_no}");
        
        $str =  "<html><body>
                    <h4 style='margin-bottom:0px;text-align:center;'>NINDT - Patient ID</h4>
                    <br/>
                    <table style='width:100%;'>
                        <tr>
                            <td style='width:60%;' valign='middle'>
                                <b>{$name}</b><br/>
                                {$reg_no}
                            </td>
                            <td align='right'>
                                <barcode code='{$url}' size='1' type='QR' disableborder='1' error='M' class='barcode' />
                            </td>
                        </tr>
                    </table >
                </html></body>";

        $this->load->library('Pdf');
        $mpdf = $this->pdf->new(array(
            'format'=>array(100,50),
            'margin_top' => 5,
            'margin_right' => 5,
            'margin_bottom' => 5,
            'margin_left' => 5
        ));
        $mpdf->WriteHTML($str);
        return $mpdf->Output("patient_id_{$reg_no}.pdf", 'D');
    }//end-func
    
    
    public function psw() {
        $enc_psw = password_hash($this->config->item('psw_default'),PASSWORD_BCRYPT );
        var_dump($enc_psw);
        
    }//end-func
    
}//end-class

//end-file