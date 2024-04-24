<?php
	
//returns the current date & tme as a string in YYYY-MM-DD HH:MM:SS format
function get_cur_date_time() {
    date_default_timezone_set("Asia/Colombo");
    return date('Y-m-d H:i:s');
}//end-func

//end-file