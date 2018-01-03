<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Handle ip blocking api related requests
**/
class Ip_block_model extends CI_Model {
    protected $table_name = 'ip_blocked';
    
    /**
	* Get the user's public ip and see if it's blocked
    *
    * @return bool is blocked from chatra
    */
    public function is_blocked_ip() {
        // get the IP address for the current user
        $ip = $this->input->ip_address();
        print_r($ip);
        die();

        // if the IP address is not valid, ip_address() will return ‘0.0.0.0’
        
        // // sanitary check
        // if ($ip == '0.0.0.0') {
        //     return FALSE;
        // }

        // $query = $this->db->get_where('ip_blocked', array('ip' => $ip), 1);

		// return ($query->num_rows() === 1);
    }

}