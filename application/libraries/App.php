<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class App {

    private $CI ;

    public function __construct() {
        $this->CI =& get_instance();
    }//end-func
    
    //sets common data set needed for views
    public function set_data() {
        $data = array();
        $data['is_notification'] = FALSE;						
        return $data;
    }//end-func

    /* 
     * check user login and role
     * user role = user only cheks the signin
     */
    public function is_admin($is_redirect = TRUE) {
        $status = $this->CI->session->userdata('is_signin') && $this->CI->session->userdata('user_role') === 'admin'; 
        
        if($is_redirect && !$status) {
            redirect('home');
        } else {
            return $status;
        }
    }//end-func
    
     public function is_staff($is_redirect = TRUE) {
        $status = $this->CI->session->userdata('is_signin') && $this->CI->session->userdata('user_role') === 'staff'; 
        
        if($is_redirect && !$status) {
            redirect('home/signout');
        } else {
            return $status;
        }
    }//end-func
    
    

    //sets the pagination
    public function set_pagination($num_rows,$url, $per_page = '') {

        $this->CI->load->library('pagination');

        $config['base_url']   	  = $url;
        $config['total_rows'] 	  = $num_rows;
        
        if ($per_page != '') {
            $config['per_page']   = $per_page;
        } else {
            $config['per_page']	  = $this->CI->config->item('rows_per_page');
        }
        $config['first_link'] 	  = FALSE;
        $config['last_link']  	  = FALSE;
        $config['num_links']  	  = 10;
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['cur_tag_open']   = "<li class='active' ><a>";	
        $config['cur_tag_close']  = "</a></li>";
        $config['next_link'] 	  = "<span class='glyphicon glyphicon-chevron-right' />";
        $config['next_tag_open']  = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] 	  = "<span class='glyphicon glyphicon-chevron-left' />";
        $config['prev_tag_open']  = '<li>';
        $config['prev_tag_close'] = '</li>';

        $this->CI->pagination->initialize($config);

    }//end-func
}//end-class

//end-file 